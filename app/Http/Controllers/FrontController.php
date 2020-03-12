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
    public function contact_us()
    {
        return view('front/contact_us');
    }
    public function add_cart($productId)
    {
        $Product = Product::find($productId); // assuming you have a Product model with id, name, description & price
        $rowId = 456; // generate a unique() row ID
        $userID = 1; // the user ID to bind the cart contents

        // add the product to cart
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => $Product
        ));
        return view('front/cart_total');
    }
}
