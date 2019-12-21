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

Route::get('/', 'HomeController@view'); //done

Route::group(['middleware' => ['guest']], function () {

    Route::get('login', 'AuthController@view_login')->name('login'); //done
    Route::post('login_process', 'AuthController@login_process'); //done

    Route::get('register', 'AuthController@view_register'); //done
    Route::post('register_process', 'AuthController@register_process'); //done
});

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('dashboard', 'AdminController@view_dashboard'); //done

    Route::get('Item/create', 'AdminController@view_create'); //done
    Route::post('Item/create/process', 'AdminController@create_process'); //done

    Route::get('Item/edit/{i}', 'AdminController@view_edit'); //done
    Route::put('Item/edit/process', 'AdminController@edit_process'); //done

    Route::get('Item/delete/{i}', 'AdminController@delete'); //done
});
Route::group(['middleware' => ['role:user']], function () {

    Route::get('home', 'UserController@view_home');//done
    Route::get('history', 'UserController@view_history');//done

    Route::post('Purchases/add', 'UserController@add_purchases');//done
    Route::get('purchases/billed/{i}', 'UserController@view_purchases');//done

    Route::post('info/check', 'UserController@check');//done
    Route::get('info/update/{i}', 'UserController@update_info_view');//done
    Route::post('info/update/process', 'UserController@update_info_process');//done


});
Route::get('logout', 'AuthController@logout')->middleware('auth');//done
