<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $news_data = News::all();
        return view('auth/news/index', compact('news_data'));
    }

    public function create()
    {
        return view('auth/news/create');
    }

    public function store(Request $request){
        $news_data = $request->all();
        News::create($news_data)->save();

        return redirect('/home/news');
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('auth/news/edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        News::find($id)->update($request->all());

        return redirect('/home/news');
    }

    public function delete(Request $request, $id)
    {
        News::find($id)->delete();

        return redirect('/home/news');
    }
}
