<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::count();

        return Inertia::render('Dashboard', [
            'articles' => $articles
        ]);
    }
}
