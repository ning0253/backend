<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product_data = Product::all();
        return view('auth/products/index', compact('product_data'));
    }

    public function create()
    {
        $product_type_data = ProductType::orderBy('sort', 'desc')->get();
        return view('auth/products/create', compact('product_type_data'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        //上傳檔案
        $file_name = $request->file('img')->store('product', 'public');
        $requestData['img'] = $file_name;
        $thisProductData = Product::create($requestData);

        return redirect('/home/product');
    }

    public function edit($id)
    {
        $product_type_data = ProductType::orderBy('sort', 'desc')->get();
        $product_data = Product::find($id);
        return view('auth/products/edit', compact('product_type_data', 'product_data'));
    }

    public function update(Request $request, $id)
    {
        $thisProductData = Product::find($id);

        $requsetData = $request->all();
        if ($request->hasFile('img')) { //如果使用者有重新上傳主圖片
            if (Storage::disk('public')->exists($thisProductData->img)) {
                Storage::disk('public')->delete($thisProductData->img); //刪除原本主圖
            }

            //上傳圖片
            $file_name = $request->file('img')->store('product', 'public');
            $requsetData['img'] = $file_name;
        }
        $thisProductData->update($requsetData);

        return redirect('/home/product');
    }

    public function delete(Request $request, $id)
    {
        $thisProductData = Product::find($id);

        //單一圖片的刪除
        if (Storage::disk('public')->exists($thisProductData->img)) {
            Storage::disk('public')->delete($thisProductData->img); //刪除原本主圖
        }
        $thisProductData->delete();

        return redirect('/home/product');
    }
}

