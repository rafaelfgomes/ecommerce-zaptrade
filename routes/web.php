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

        Route::group(['prefix' => 'categories'], function () {

            Route::get('{name}', 'PagesController@show')->name('category.page');

        });

        Route::group(['prefix' => 'products'], function () {

            Route::get('{id}', 'PagesController@details')->name('product.details');

        });

    });

    Route::group([ 'prefix' => 'auth' ], function () {

        Route::get('dashboard', 'DashboardController@login')->name('dashboard.login.page');
        Route::post('dashboard', 'Auth\LoginController@login')->name('dashboard.login');
        Route::post('logout', 'Auth\LoginController@logout')->name('dashboard.logout');

    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('register', 'UserController@register')->name('users.register.page');
        Route::post('', 'UserController@store')->name('users.store');
        Route::post('{id}', 'UserController@update')->name('users.update');
    });

    Route::group([ 'prefix' => 'dashboard' ], function () {

        Route::get('', 'DashboardController@index')->name('dashboard.index');
        Route::get('products', 'DashboardController@products')->name('dashboard.products.page');
        Route::get('categories', 'DashboardController@categories')->name('dashboard.categories.page');

    });

    Route::group([ 'prefix' => 'categories' ], function () {

        Route::get('register', 'CategoriesController@register')->name('category.register.page');
        Route::post('', 'CategoriesController@store')->name('category.store');
        Route::post('update', 'CategoriesController@update')->name('category.update');

    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('register', 'ProductsController@register')->name('product.register.page');
        Route::post('', 'ProductsController@store')->name('product.store');
        Route::get('{id}', 'ProductsController@show')->name('product.get');
        Route::post('{id}', 'ProductsController@update')->name('product.update');
        Route::post('toggle-approve/{id}', 'ProductsController@toggleApprove')->name('product.toggle.approve');

    });

});

//Auth::routes();
