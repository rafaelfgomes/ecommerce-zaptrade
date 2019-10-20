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

Route::group(['prefix' => '/'], function () {
    Route::get('', 'PagesController@index')->name('index');
    Route::get('admin', 'PagesController@adminLogin')->name('admin.login.page');
    Route::post('admin', 'Auth\LoginController@login')->name('admin.login');
    Route::get('contact', 'PagesController@contact')->name('contact.page');

    Route::group([ 'prefix' => 'categories' ], function () {
        
        Route::get('appliances', 'CategoriesController@appliances')->name('appliances.page');
        Route::get('computing', 'CategoriesController@computing')->name('computing.page');
        Route::get('furniture', 'CategoriesController@furniture')->name('furniture.page');
        Route::get('mobile', 'CategoriesController@mobile')->name('mobile.page');

    });

    Route::group(['prefix' => 'products'], function () {
        
        Route::get('detail', 'ProductsController@details')->name('product.details');

    });

});

Auth::routes();
