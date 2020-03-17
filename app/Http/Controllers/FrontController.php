<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\OrderShipped;
use App\News;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    public function product_content($id)
    {
        $product_data = Product::with('product_types')->find($id);
        return view('front/product_content', compact('product_data'));
    }
    public function cart()
    {
        // $userID = Auth::user()->id;
        $items = \Cart::getContent()->sort(); //session($userID)->
        return view('front/cart', compact('items'));
    }
    public function add_cart(Request $request, $productId)
    {
        $Product = Product::find($productId); // assuming you have a Product model with id, name, description & price
        // $rowId = 456; // generate a unique() row ID
        // $userID = Auth::user()->id; // the user ID to bind the cart contents

        $requestData = $request->all();

        // add the product to cart
        \Cart::add(array( //session($userID)->
            'id' => $productId,
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => $requestData['quantity'],
            'attributes' => array(),
            'associatedModel' => $Product,
        ));
        return redirect('/cart');
    }
    public function update_cart(Request $request, $productId)
    {
        $qty = $request->quantity;

        \Cart::update($productId, array(
            'quantity' => $qty, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        return 'success';
    }
    public function delete_cart($productId)
    {
        \Cart::remove($productId);
        return 'success';
    }
    public function cart_checkout()
    {
        // $userID = Auth::user()->id;
        $items = \Cart::getContent()->sort(); //session($userID)->
        return view('front/cart_checkout', compact('items'));
    }
    public function post_cart_checkout(Request $request)
    {
        $total_price = \Cart::getTotal();
        if ($total_price > 1200) {
            $shipping_price = 0;
        } else {
            $shipping_price = 120;
        }

        $order = new Order();
        $order->recipient_name  = $request->recipient_name;
        $order->recipient_phone  = $request->recipient_phone;
        $order->recipient_address  = $request->recipient_address;
        $order->shipping_time  = $request->shipping_time;
        $order->total_price  = $total_price;
        $order->shipping_price  = $shipping_price;
        $order->save();

        $items=\Cart::getContent()->sort();
        foreach ($items as $row) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $row->id;
            $order_detail->quantity = $row->quantity;
            $order_detail->price = $row->price;
            $order_detail->save();
        }
    }

    public function contact_us()
    {
        return view('front/contact_us');
    }
    public function contact_us_store(Request $request)
    {
        $requestData = $request->all();
        Contact::create($requestData);
        Mail::to('ning0253@gmail.com')->send(new OrderShipped($requestData));
        return redirect('/contact_us');
    }
}
