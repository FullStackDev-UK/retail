<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

/* GET routes */
Route::get('/', 'PageController@home');
Route::get('home', 'PageController@home')->name('home');
Route::get('about', 'PageController@about')->name('about');
Route::get('contact', 'PageController@contact')->name('contact');

Route::get('profile', 'PageController@profile')->name('profile')->middleware('auth');
Route::get('admin', 'PageController@admin')->name('admin')->middleware('auth');

Route::get('product/{id}', 'ProductController@show');
Route::get('products', 'ProductController@index')->name('products');
Route::get('productlist', 'ProductController@list'); // No view

Route::get('users/{id}', 'UserController@show');
Route::get('users', 'UserController@index')->name('get-users');

/* POST routes */
Route::post('users', 'UserController@store');
Route::post('contact', 'ContactController@store');
Route::post('add-to-order/{id}', 'OrderController@addToOrder');
