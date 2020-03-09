<?php

namespace App\Http\Controllers;

use App\News;
use App\Product;

class FrontController extends Controller
{
    public function index()
    {
        return view('front/index');
    }
    public function news()
    {
        $news_data = News::orderBy('sort', 'desc')->get();
        return view('front/news', compact('news_data'));
    }
    public function news_content($id)
    {
        $news_data = News::with('news_imgs')->find($id);
        return view('front/news_content', compact('news_data'));
    }
    public function product()
    {
        $products_data = Product::orderBy('sort', 'desc')->get();
        return view('front/product', compact('products_data'));
    }
}
