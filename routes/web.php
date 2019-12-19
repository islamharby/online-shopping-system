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
Route::group([ 'middleware' => ['guest'] ],function()
{
    Route::get('/','HomeController@view_welcome');
    Route::get('login','UserController@view_login')->name('login');
    Route::get('register', 'UserController@view_register'); 
});

Route::group([ 'middleware' => ['role:admin']],function()
{
    Route::get('/dashboard', 'HomeController@view_dashboard');
    Route::get('/Item/add', 'ItemController@view_add');
    Route::get('/Item/edit/{i}', 'ItemController@view_edit');    
});
Route::group([ 'middleware' => ['role:user']],function()
{
    Route::get('/home','HomeController@view_home');
    Route::get('/history', 'HomeController@view_history');
    // Route::get('/purchases', 'HomeController@view_purchases');
    Route::post('logout', 'UserController@logout');
});