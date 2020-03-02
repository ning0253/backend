<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news;

class NewsController extends Controller
{
    public function index()
    {
        return view('auth/news/index');
    }
    public function store(Request $request){
        $news_data = $request->all();
        News::create($news_data)->save();

        return redirect('/home/news');
    }
}
