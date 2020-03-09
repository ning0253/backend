<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $product_type_data = ProductType::all();
        return view('auth/productsType/index', compact('product_type_data'));
    }

    public function create()
    {
        return view('auth/productsType/create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        ProductType::create($requestData);

        return redirect('/home/productType');
    }

    public function edit($id)
    {
        $product_type = ProductType::find($id);
        return view('auth/productsType/edit', compact('product_type'));
    }

    public function update(Request $request, $id)
    {
        $thisProductTypeData = ProductType::find($id);

        $requsetData = $request->all();
        $thisProductTypeData->update($requsetData);

        return redirect('/home/productType');
    }

    public function delete(Request $request, $id)
    {
        $thisProductTypeData = ProductType::find($id);
        $thisProductTypeData->delete();
        return redirect('/home/productType');
    }
}
