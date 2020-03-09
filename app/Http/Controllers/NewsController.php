<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $requestData = $request->all();
        //上傳檔案
        $file_name = $request->file('img')->store('', 'public');
        $requestData['img'] = $file_name;
        $thisNewsData = News::create($requestData);

        foreach ($request->file('news_imgs') as $item) {
            $img_name = $item->store('', 'public');

            $newsImgData = new NewsImg();
            $newsImgData->news_id = $thisNewsData->id;
            $newsImgData->img = $img_name;
            $newsImgData->save();
        }

        return redirect('/home/news');
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('auth/news/edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $thisNewsData = News::find($id);

        $requsetData = $request->all();
        if ($request->hasFile('img')) { //如果使用者有重新上傳主圖片
            if (Storage::disk('public')->exists($thisNewsData->img)) {
                Storage::disk('public')->delete($thisNewsData->img); //刪除原本主圖
            }

            //上傳圖片
            $file_name = $request->file('img')->store('', 'public');
            $requsetData['img'] = $file_name;
        }
        $thisNewsData->update($requsetData);

        //多個檔案
        if ($request->hasFile('news_imgs')) {
            foreach ($request->file('news_imgs') as $item) {
                //上傳圖片
                $img_name = $item->store('', 'public');

                $newsImgData = new NewsImg();
                $newsImgData->news_id = $thisNewsData->id;
                $newsImgData->img = $img_name;
                $newsImgData->save();
            }
        }

        return redirect('/home/news');
    }

    public function delete(Request $request, $id)
    {
        $thisNewsData = News::find($id);

        //單一圖片的刪除
        if (Storage::disk('public')->exists($thisNewsData->img)) {
            Storage::disk('public')->delete($thisNewsData->img); //刪除原本主圖
        }
        $thisNewsData->delete();

        //多張圖片的刪除
        $newsImgsData = NewsImg::where('news_id', $id)->get();
        foreach ($newsImgsData as $item) {
            if (Storage::disk('public')->exists($item->img)) {
                Storage::disk('public')->delete($item->img);
            }

            $item->delete();
        }

        return redirect('/home/news');
    }

    public function ajax_delete_img(Request $request)
    {
        //多張圖片組的單一圖片刪除
        $thisNewsImgData = NewsImg::where('id', $request->img_id)->first();
        if (Storage::disk('public')->exists($thisNewsImgData->img)) {
            Storage::disk('public')->delete($thisNewsImgData->img);
        }
        $thisNewsImgData->delete();
    }

    public function ajax_edit_sort(Request $request)
    {
        $thisNewsImgData = NewsImg::where('id', $request->img_id)->first();
        $thisNewsImgData->sort=$request->img_sort;
        $thisNewsImgData->save();
    }
}
