<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
     $products = Product::with(['category', 'photos'])
    ->latest()
    ->paginate(10)
    ->through(function ($product) {
        return [
            'id' => $product->id,
            'photos' => $product->photos_url,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'category' => $product->category ? $product->category->name : '-',
        ];
    });


        $categories= Category::all();
        return Inertia::render('Admin/Product/Index',[
            'categories' => $categories,
            'products' => $products
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'photos.*' => 'image|max:2048',
            'category_id' => 'required',
        ],[
            'name.required' => 'Nama produk harus diisi.',
            'price.required' => 'Harga produk harus diisi.',
            'category_id.required' => 'Kategori produk harus dipilih.',
            'photos.*.image' => 'Foto produk harus berupa gambar.',
        ]);


        $product = Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $photo) {
                $path = $photo->store('products', 'public');

                $product->photos()->create([
                    'photo_path' => $path,
                    'is_main'    => $index === 0,
                ]);
            }
        }


        return back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'photos.*' => 'image|max:2048',
            'category_id' => 'required',
        ]);

        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $photo) {
                $path = $photo->store('products', 'public');

                $product->photos()->create([
                    'photo_path' => $path,
                    'is_main'    => $index === 0,
                ]);
            }
        }

        return back()->with('success', 'Produk berhasil diperbarui.');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Produk berhasil dihapus.');
    }

}