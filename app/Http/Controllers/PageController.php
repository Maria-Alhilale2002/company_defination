<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    //
    public function index()
    {
        $home = \App\Models\Home::first();
        $featuredClients = \App\Models\Client::where('is_featured', true)
                                           ->where('role', 'client')
                                           ->orderBy('created_at', 'desc')
                                           ->limit(6)
                                           ->get();
        $subtitle = ' نقدم حلول تقنية متكاملة لنجاح أعمالك ';

        return view('index', compact('home', 'featuredClients', 'subtitle'));
    }

    public function services()
    {
        $service = \App\Models\Service::first();
        $subtitle = ' نقدم حلول تقنية متكاملة لنجاح أعمالك ';

        return view('services', compact('service', 'subtitle'));
    }

    public function products()
    {
        // جلب جميع المنتجات مع تصنيفها حسب النوع
        $products = \App\Models\Product::orderBy('created_at', 'desc')->get();
        $subtitle = ' تصفح أعمالنا ومشاريعنا الناجحة ';

        return view('products', compact('products', 'subtitle'));
    }

    public function about()
    {
        $about = \App\Models\About::first();
        $subtitle = 'شركة رائدة في مجال البرمجيات والتطوير';

        return view('about', compact('about', 'subtitle'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function client_view()
    {
        return view('client_view');
    }
}
