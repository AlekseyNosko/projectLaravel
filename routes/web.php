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

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'PublicViewsController@welcome')->name('welcome');
    Route::get('/order', 'PublicViewsController@order')->name('order');
    Route::post('/order', 'OrderController@saveOrder')->name('orderSave');
    Route::get('/orderList', 'PublicViewsController@orderList')->name('orderList');
    Route::get('/viewOrder/{id}', 'PublicViewsController@viewOrder')->name('viewOrder');
});

Route::prefix('/manager')->middleware(['auth','check:view_manager_panel'])->group(function (){

});
