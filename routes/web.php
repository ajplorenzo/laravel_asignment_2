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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'ProductController@home');

Route::post('/wishlist/add', 'WishlistController@store');

Route::get('/wishlist', 'WishlistController@index');

Route::get('/wishlist/delete', 'WishlistController@delete');
