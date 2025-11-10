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
}