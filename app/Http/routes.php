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

Route::get('/', 'Products\ProductController@index');                                // work

Route::group(['prefix' => '/admin', 'namespace' => 'Admin',], function () {
    Route::get('/', 'AdminController@index' )->name('admin.index');                 // work

    //TODO need delete
    Route::delete('/{product?}', 'AdminController@delete')->name('admin.delete');   // work
    //TODO need add
    Route::get('/create', 'AdminController@getEmptyProduct')->name('admin.getEmptyProduct');  // work
    Route::get('/add', 'AdminController@add')->name('admin.add');                   // work
    //TODO need changed
    Route::post('/', 'AdminController@saveProduct')->name('admin.save');            // need make

    Route::get('/{id}', 'AdminController@getProduct')->name('admin.getProduct');    // need make
});

Route::group(['prefix' => '/product', 'namespace' => 'Products'], function () {
    Route::get('/', 'ProductController@index')->name('product.index');

    Route::get('/{id}', 'ProductController@select')->name('product.select');


});

Route::auth();                                                                      // work

Route::get('/home', 'HomeController@index');                                        // work
