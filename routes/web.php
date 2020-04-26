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
    Route::get('/order', 'PublicViewsController@order')->name('order')->middleware('can:add_order');
    Route::post('/order', 'OrderController@saveOrder')->name('orderSave')->middleware('can:add_order');
    Route::get('/orderList', 'PublicViewsController@orderList')->name('orderList')->middleware('can:show_list_orders');
    Route::get('/viewOrder/{id}', 'PublicViewsController@viewOrder')->name('viewOrder')->middleware('can:show_order');
    Route::get('/closedOrder/{id}', 'OrderController@closedOrder')->name('closedOrder')->middleware('can:closed_order');
    Route::get('/about', 'PublicViewsController@about')->name('about');
    Route::post('/sendMessage', 'OrderController@sendMessage')->name('sendMessage');
});

Route::prefix('/manager')->middleware(['auth','can:view_manager_panel'])->group(function (){
    Route::get('/', 'ManagementController@panel')->name('panel');
    Route::get('/allOrderList', 'ManagementController@allOrderList')->name('allOrderList')->middleware('can:show_all_list_orders');
    Route::post('/getOrderList', 'ManagementController@getAllOrderList')->name('getOrderList')->middleware('can:show_all_list_orders');
    Route::get('/managementOrder/{id}', 'ManagementController@managementOrder')->name('managementOrder')->middleware('can:show_all_order');
    Route::get('/addToWorkOrder/{id}', 'ManagementController@addToWorkOrder')->name('addToWorkOrder')->middleware('can:add_to_worked');
});
