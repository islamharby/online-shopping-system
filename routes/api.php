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
Route::group(['middleware' => ['guest']], function () {
// auth routes
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
//item routes
    Route::post('Item/add', 'ItemController@add');
    Route::put('Item/update/{i}', 'ItemController@update');
    Route::get('Item/get_all', 'ItemController@get_all');
    Route::get('Item/get_by_id/{i}', 'ItemController@get_by_id');
    Route::delete('Item/delete/{i}', 'ItemController@delete');
});
Route::group(['middleware' => ['auth', 'role:user']], function () {
//Purchases
    Route::post('Purchases/add', 'PurchasesController@add');
    Route::get('Purchases/get_all', 'PurchasesController@get_all');

});
