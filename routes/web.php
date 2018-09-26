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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/connect', 'PagesController@connect');


Route::middleware('auth')->get('/cart', 'CartController@showCart');
Route::middleware('auth')->post('/cart', 'CartController@addToCart');
Route::middleware('auth')->get('/handle_payment', 'CartController@handlePayment');
Route::middleware('auth')->get('/order_status', 'CartController@orderStatus');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/breakfast', 'FoodItemsController@breakfast');
Route::get('/lunch', 'FoodItemsController@lunch');
Route::get('/cake', 'FoodItemsController@cake');


