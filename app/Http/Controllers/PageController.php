<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function services()
    {
        return view('services');
    }

    public function products()
    {
        return view('products');
    }

    public function about()
    {
        $about = \App\Models\About::first();
        $subtitle="من نحن ";
        return view('about', compact('about','subtitle'));
    }
    public function contact()
    {
        return view('contact');
    }
}
