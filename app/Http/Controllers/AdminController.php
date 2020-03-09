<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    // public function ajax_delete_img(Request $request)
    // {
    //     //多張圖片組的單一圖片刪除
    //     $thisNewsImgData = NewsImg::where('id', $request->img_id)->first();
    //     if (Storage::disk('public')->exists($thisNewsImgData->img)) {
    //         Storage::disk('public')->delete($thisNewsImgData->img);
    //     }
    //     $thisNewsImgData->delete();
    // }

    // public function ajax_edit_sort(Request $request)
    // {
    //     $thisNewsImgData = NewsImg::where('id', $request->img_id)->first();
    //     $thisNewsImgData->sort = $request->img_sort;
    //     $thisNewsImgData->save();
    // }

    public function ajax_upload_summernote_img()
    {
        // A list of permitted file extensions
        $allowed = array('png', 'jpg', 'gif', 'zip');
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if (!in_array(strtolower($extension), $allowed)) {
                echo '{"status":"error"}';
                exit;
            }
            $name = strval(time() . md5(rand(100, 200)));
            $ext = explode('.', $_FILES['file']['name']);
            $filename = $name . '.' . $ext[1];
            //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
            if (!is_dir('storage/')) {
                mkdir('storage/');
            }
            //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
            if (!is_dir('storage/img')) {
                mkdir('storage/img');
            }
            $destination = public_path() . '/storage/img/' . $filename; //change this directory
            $location = $_FILES["file"]["tmp_name"];
            move_uploaded_file($location, $destination);
            echo "/storage/img/" . $filename; //change this URL
        }
        exit;
    }

    public function ajax_delete_summernote_img(Request $request)
    {
        dd($request->file_link);
        if (file_exists(public_path() . $request->file_link)) {
            File::delete(public_path() . $request->file_link);
        }
    }

}
