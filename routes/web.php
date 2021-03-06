<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'FrontController@index');

Route::get('/news', 'FrontController@news');
Route::get('/news/{nid}', 'FrontController@news_content');

Route::get('/contact_us', 'FrontController@contact_us');
Route::post('/contact_us/store', 'FrontController@contact_us_store');

Route::get('/product', 'FrontController@product');//產品總覽
Route::get('/product/{pid}', 'FrontController@product_content');//產品內容
Route::get('/cart', 'FrontController@cart');//購物車
Route::post('/add_cart/{pid}', 'FrontController@add_cart');//加入購物車
Route::post('/update_cart/{pid}', 'FrontController@update_cart');//更新購物車產品數量
Route::post('/delete_cart/{pid}', 'FrontController@delete_cart');//刪除購物車中一產品
Route::get('/cart_checkout', 'FrontController@cart_checkout');//結帳
Route::post('/cart_checkout', 'FrontController@post_cart_checkout');//結帳
Route::prefix('cart_ecpay')->group(function(){//綠界

    //當消費者付款完成後，綠界會將付款結果參數以幕後(Server POST)回傳到該網址。
    Route::post('notify', 'FrontController@notifyUrl')->name('notify');

    //付款完成後，綠界會將付款結果參數以幕前(Client POST)回傳到該網址
    Route::post('return', 'FrontController@returnUrl')->name('return');
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => '/home'], function () {
    Route::get('/', 'HomeController@index')->name('home');

//summernote
    Route::post('/ajax_upload_summernote_img', 'AdminController@ajax_upload_summernote_img');
    Route::post('/ajax_delete_summernote_img', 'AdminController@ajax_delete_summernote_img');

//News
    Route::get('/news', 'NewsController@index');

    Route::get('/news/create', 'NewsController@create');
    Route::post('/news/store', 'NewsController@store');

    Route::get('/news/edit/{id}', 'NewsController@edit');
    Route::post('/news/update/{id}', 'NewsController@update');

    Route::post('/news/delete/{id}', 'NewsController@delete');

    Route::post('/ajax_delete_img', 'NewsController@ajax_delete_img');
    Route::post('/ajax_edit_sort', 'NewsController@ajax_edit_sort');

//ProductType
    Route::get('/productType', 'ProductTypeController@index');

    Route::get('/productType/create', 'ProductTypeController@create');
    Route::post('/productType/store', 'ProductTypeController@store');

    Route::get('/productType/edit/{id}', 'ProductTypeController@edit');
    Route::post('/productType/update/{id}', 'ProductTypeController@update');

    Route::post('/productType/delete/{id}', 'ProductTypeController@delete');

//Product
    Route::get('/product', 'ProductController@index');

    Route::get('/product/create', 'ProductController@create');
    Route::post('/product/store', 'ProductController@store');

    Route::get('/product/edit/{id}', 'ProductController@edit');
    Route::post('/product/update/{id}', 'ProductController@update');

    Route::post('/product/delete/{id}', 'ProductController@delete');
});
