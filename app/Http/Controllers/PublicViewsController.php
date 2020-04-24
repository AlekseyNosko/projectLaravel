<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class PublicViewsController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function order(){
        return view('order');
    }
    public function orderList(){
        $orders = Order::where('user_id',auth()->user()->id)->get();
        return view('orderList',['orders' => $orders]);
    }
}
