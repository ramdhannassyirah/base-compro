<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\Product;


class FrontendController extends Controller
{
    public function index(){
        $articles = Article::latest()->get();
        $articleCount = Article::count();
        $products = Product::with('photos')->latest()->get()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'photos' => $product->photos_url,
            ];
        });
        $productCount = Product::count();
        $testimonials = Testimonial::latest()->get();
        $testimonialCount = Testimonial::count();
        return Inertia::render('LandingPage',[
            'testimonials' => $testimonials,
            'testimonialCount' => $testimonialCount,
            'articles' => $articles,
            'articleCount' => $articleCount,
            'products' => $products,
            'productCount' => $productCount
        ]);
    }


    public function ArticleIndex(){
       $articles = Article::with('author')->latest()->get()->map(function ($article) {
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
        return Inertia::render('Article/Index',[
            'articles' => $articles,
        ]);
    }

    public function ArticleShow($slug)
    {
        $article = Article::with('author')->where('slug', $slug)->firstOrFail();

        return Inertia::render('Article/Show', [
            'articles' => [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->description,
                'slug' => $article->slug,
                'thumbnail' => $article->thumbnail_url,
                'content' => $article->content,
                'author' => [
                    'name' => $article->author->name,
                ],
                'created_at' => $article->created_at->format('d M Y'),
            ],
        ]);
    }

     public function ProductIndex(){
       $products = Product::with(['category', 'photos'])->latest()->get()->map(function ($product) {
            return [
            'id' => $product->id,
            'photos' => $product->photos_url,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'category' => $product->category ? $product->category->name : '-',
            ];
        });
        return Inertia::render('Product/Index',[
            'products' => $products,
        ]);
    }

    public function ProductShow($slug)
    {
        $product = Product::with('author')->where('slug', $slug)->firstOrFail();

        return Inertia::render('Product/Show', [
            'products' => [
                'id' => $product->id,
                'title' => $product->title,
                'description' => $product->description,
                'slug' => $product->slug,
                'thumbnail' => $product->thumbnail_url,
                'content' => $product->content,
                'author' => [
                    'name' => $product->author->name,
                ],
                'created_at' => $product->created_at->format('d M Y'),
            ],
        ]);
    }

}
