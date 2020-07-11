<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function () {
    Route::get('/', 'IndexController@index')->name('admin');
    Route::resource('category', 'CategoryController', ['as'=>'admin'])->except('show');
    Route::resource('product', 'ProductController', ['as'=>'admin'])->except('show');
    Route::resource('user', 'UserController', ['as'=>'admin'])->except('show');
});


Route::group(['middleware'=>['auth']], function() {

});

Route::get('/', 'MainController@index')->name('index');

Route::get('/category/{category_alias}', 'MainController@category')->name('category');
Route::get('/category/{category_alias}/{child_alias}', 'MainController@category')->name('category_child');
Route::get('/category/{category_alias}/{child_alias}/{product_alias}', 'MainController@product')->name('product');

Route::get('cart', 'CartController@index')->name('cart');
Route::get('cart/add/{id}', 'CartController@add')->name('addToCart');
Route::get('cart/deleteAll', 'CartController@deleteAll')->name('deleteAllFromCart');
Route::post('cart/order', 'CartController@sendToOrder')->name('order');

Route::get('bookmark', 'BookmarkController@index')->name('bookmark');
Route::get('bookmark/add/{id}', 'BookmarkController@add')->name('addToBookmark');
Route::get('bookmark/delete/{id}', 'BookmarkController@delete')->name('deleteFromBookmark');
Route::get('bookmark/clear', 'BookmarkController@clear')->name('clearBookmark');

Auth::routes();
