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

        Route::get('dashboard', 'PagesController@login')->name('dashboard.login.page');
        Route::post('dashboard', 'Auth\LoginController@login')->name('dashboard.login');
        Route::post('logout', 'Auth\LoginController@logout')->name('dashboard.logout');

    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('register', 'UserController@register')->name('users.register.page');
        Route::post('', 'UserController@store')->name('users.store');
        Route::post('update/{id}', 'UserController@update')->name('users.update');
    });

    Route::group([ 'prefix' => 'dashboard' ], function () {

        Route::get('', 'DashboardController@index')->name('dashboard.index');
        Route::get('products', 'DashboardController@products')->name('dashboard.products.page');
        Route::get('categories', 'DashboardController@categories')->name('dashboard.categories.page');

    });

    Route::group([ 'prefix' => 'categories' ], function () {

        Route::get('register', 'CategoriesController@register')->name('category.register.page');
        Route::get('{name}', 'CategoriesController@show')->name('category.page');
        Route::post('', 'CategoriesController@store')->name('category.store');
        Route::post('update', 'CategoriesController@update')->name('category.update');
        Route::get('by-id/{id}', 'CategoriesController@getCategory')->name('category.get');

    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('register', 'ProductsController@register')->name('product.register.page');
        Route::post('', 'ProductsController@store')->name('product.store');
        Route::post('update/{id}', 'ProductsController@update')->name('product.update');

    });

});

//Auth::routes();
