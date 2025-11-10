<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\Category;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::count();
        $testimonials = Testimonial::count();
        $categories = Category::count();

        return Inertia::render('Dashboard', [
            'articles' => $articles,
            'testimonials' => $testimonials,
            'categories' => $categories
        ]);
    }
}