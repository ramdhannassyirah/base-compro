<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Category;
use App\Http\Requests\Category\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
         $category = Category::latest()->paginate(10)->through(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
            ];
        });
        return Inertia::render('Admin/Category/Index',[
            'category' => $category
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }

   public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
