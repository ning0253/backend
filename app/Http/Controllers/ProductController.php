<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products_data = Product::all();
        return view('auth/products/index', compact('products_data'));
    }

    public function create()
    {
        return view('auth/products/create');
    }

    public function store(Request $request){
        $products_data = $request->all();
        Product::create($products_data)->save();

        return redirect('/home/product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('auth/products/edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        Product::find($id)->update($request->all());

        return redirect('/home/product');
    }

    public function delete(Request $request, $id)
    {
        Product::find($id)->delete();

        return redirect('/home/product');
    }
}

