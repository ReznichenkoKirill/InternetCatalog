<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Products\ProductController@index');

Route::group(['prefix' => '/admin', 'namespace' => 'Admin',], function () {
    Route::get('/', 'AdminController@index' )->name('admin.index');
    Route::delete('/{product?}', 'AdminController@delete')->name('admin.delete');
    Route::get('/create', 'AdminController@getEmptyProduct')->name('admin.getEmptyProduct');
    Route::post('/', 'AdminController@saveProduct')->name('admin.save');
    Route::get('/{id}', 'AdminController@getProduct')->name('admin.getProduct');
    Route::patch('/', 'AdminController@saveChange')->name('admin.saveChange');
});
Route::group(['prefix' => '/product', 'namespace' => 'Products'], function () {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('/{id}', 'ProductController@select')->name('product.select');
});
Route::auth();
