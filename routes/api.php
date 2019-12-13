<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// auth routes
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login')->name('login');
Route::post('logout', 'UserController@logout');

//item routes
Route::post('Item/add', 'ItemController@add');
Route::put('Item/update/{i}', 'ItemController@update');
Route::get('Item/get_all', 'ItemController@get_all');
Route::get('Item/get_by_id/{i}', 'ItemController@get_by_id');
Route::delete('Item/delete/{i}', 'ItemController@delete');

//Purchases
Route::post('Purchases/add', 'PurchasesController@add');
Route::get('Purchases/get_all', 'PurchasesController@get_all');
