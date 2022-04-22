<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','IndexController@index')->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/orders', 'OrderController');
    Route::resource('/details','OrderMessageController');
    Route::patch('/details/close/{id}', 'OrderController@closeStatus')->name('orders.close');
});



