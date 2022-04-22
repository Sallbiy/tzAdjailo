<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/','IndexController@index')->name('index');

Route::resource('/orders', 'OrderController');

//Route::get('/details/view/{id}','OrderController@details')->name('details.view');

//Тут бы и префикс не помешал)

Route::patch('/details/close/{id}', 'OrderController@closeStatus')->name('orders.close');

Route::patch('/details/approved/{id}', 'OrderController@approvedStatus')->name('orders.approved');
