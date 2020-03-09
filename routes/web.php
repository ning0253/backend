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

use App\Product;

Route::get('/', 'FrontController@index');
Route::get('/news', 'FrontController@news');
Route::get('/news/{id}', 'FrontController@news_content');
Route::get('/product', 'FrontController@product');


Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix'=>'/home'], function () {
    Route::get('/', 'HomeController@index')->name('home');

//News
    Route::get('/news', 'NewsController@index');

    Route::get('/news/create', 'NewsController@create');
    Route::post('/news/store', 'NewsController@store');

    Route::get('/news/edit/{id}', 'NewsController@edit');
    Route::post('/news/update/{id}', 'NewsController@update');

    Route::post('/news/delete/{id}', 'NewsController@delete');

    Route::post('/ajax_delete_img','NewsController@ajax_delete_img');
    Route::post('/ajax_edit_sort','NewsController@ajax_edit_sort');

//Product
    Route::get('/product', 'ProductController@index');

    Route::get('/product/create', 'ProductController@create');
    Route::post('/product/store', 'ProductController@store');

    Route::get('/product/edit/{id}', 'ProductController@edit');
    Route::post('/product/update/{id}', 'ProductController@update');

    Route::post('/product/delete/{id}', 'ProductController@delete');
});


