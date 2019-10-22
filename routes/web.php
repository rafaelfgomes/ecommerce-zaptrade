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

    Route::group([ 'prefix' => 'pages' ], function () {

        Route::get('contact', 'PagesController@contact')->name('contact.page');

        Route::group(['prefix' => 'products'], function () {

            Route::get('detail', 'ProductsController@details')->name('product.details');

        });

    });

    Route::group([ 'prefix' => 'auth' ], function () {

        Route::get('admin', 'PagesController@adminLogin')->name('admin.login.page');
        Route::post('admin', 'Auth\LoginController@login')->name('admin.login');

    });

    Route::group([ 'prefix' => 'dashboard' ], function () {

        Route::get('', 'DashboardController@index')->name('dashboard.index');
        Route::get('users/profile', 'DashboardController@profile')->name('dashboard.user.profile');
        Route::get('products', 'DashboardController@products')->name('dashboard.products.page');
        Route::get('categories', 'DashboardController@categories')->name('dashboard.categories.page');

    });

    Route::group([ 'prefix' => 'categories' ], function () {

        Route::get('{name}', 'CategoriesController@show')->name('category.page');
        Route::post('', 'CategoriesController@store')->name('category.store');

    });

});

Auth::routes();
