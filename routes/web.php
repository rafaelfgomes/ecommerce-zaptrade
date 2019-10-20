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
});

Auth::routes();
