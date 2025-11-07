<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('author')->latest()->paginate(10) ->through(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->description,
                'slug' => $article->slug,
                'thumbnail' => $article->thumbnail_url,
                'content' => $article->content,
                'author' =>   $article->author->name,
                'created_at' => $article->created_at->format('d M Y'),
            ];
        });
        return Inertia::render('Admin/Article/Index', [
            'articles' => $articles
        ]);
    }



    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Article::create($data);

        return back()->with('success', 'Article created successfully');
    }



        public function update(UpdateArticleRequest $request, Article $article)
        {
            $data = $request->validated();

            if ($request->hasFile('thumbnail')) {
                if ($article->thumbnail) {
                    Storage::disk('public')->delete($article->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
            }

            $article->update($data);

            return back()->with('success', 'Article updated successfully');
        }


    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();

        return back()->with('success', 'Article deleted successfully');
    }
}