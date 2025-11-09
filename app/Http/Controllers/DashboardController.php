<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Testimonial;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::count();
        $testimonials = Testimonial::count();

        return Inertia::render('Dashboard', [
            'articles' => $articles,
            'testimonials' => $testimonials
        ]);
    }
}
