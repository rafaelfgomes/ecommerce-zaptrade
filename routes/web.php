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
        Route::get('users/profile', 'DashboardController@userProfile')->name('dashboard.user.profile');
        Route::get('products/register', 'DashboardController@productRegister')->name('dashboard.product.register');
        Route::get('categories/register', 'DashboardController@categoryRegister')->name('dashboard.category.register');

    });
    
    Route::group([ 'prefix' => 'categories' ], function () {

        Route::get('{name}', 'CategoriesController@show')->name('category.page');

    });

});

Auth::routes();
