<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        $home = \App\Models\Home::first();
        $subtitle=" نقدم حلول تقنية متكاملة لنجاح أعمالك ";
        return view('index', compact('home','subtitle'));    
        }

    public function services()
    {   
        $service = \App\Models\Service::first();
        $subtitle=" نقدم حلول تقنية متكاملة لنجاح أعمالك ";
        return view('services', compact('service','subtitle'));
    }

    public function products()
    {
        $product = \App\Models\Service::first();
        $subtitle=" تصفح أعمالنا ومشاريعنا الناجحة ";
        return view('products', compact('product','subtitle'));
    }

    public function about()
    {
        $about = \App\Models\About::first();
        $subtitle="شركة رائدة في مجال البرمجيات والتطوير";
        return view('about', compact('about','subtitle'));
    }
    public function contact()
    {
        return view('contact');
    }
}
