<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function index()
    {
        return view('auth/products/index');
    }

    public function store(Request $request)
    {
        $products_data = $request->all();
        Product::create($products_data)->save();
        return redirect('/home/product');
    }
}

