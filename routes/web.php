<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/category', 'CategoryController@index');
});

Route::get('/', 'IndexController@index');

Route::resource('rest', 'RestTestController')->names('restTest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
