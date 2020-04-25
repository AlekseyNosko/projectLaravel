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
    Route::get('/closedOrder/{id}', 'OrderController@closedOrder')->name('closedOrder');
    Route::get('/about', 'PublicViewsController@about')->name('about');
});

Route::prefix('/manager')->middleware(['auth','can:view_manager_panel'])->group(function (){
    Route::get('/', 'ManagementController@panel')->name('panel');
    Route::get('/allOrderList', 'ManagementController@allOrderList')->name('allOrderList');
    Route::post('/getAllOrderList', 'ManagementController@getAllOrderList')->name('getAllOrderList');
    Route::get('/managementOrder/{id}', 'ManagementController@managementOrder')->name('managementOrder');
    Route::get('/addToWorkOrder/{id}', 'ManagementController@addToWorkOrder')->name('addToWorkOrder');
});
