<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
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
