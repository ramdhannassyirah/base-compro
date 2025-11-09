<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Article;
use App\Models\Testimonial;


class FrontendController extends Controller
{
    public function index(){

    $testimonials = Testimonial::latest()->get();
    $testimonialCount = Testimonial::count();
        return Inertia::render('LandingPage',[
            'testimonials' => $testimonials,
            'testimonialCount' => $testimonialCount
        ]);
    }
}