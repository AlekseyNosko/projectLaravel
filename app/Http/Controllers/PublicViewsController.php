<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderMessage;
use Illuminate\Http\Request;

class PublicViewsController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function order()
    {
        return view('order');
    }

    public function orderList()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('orderList', ['orders' => $orders]);
    }

    public function viewOrder($id)
    {
        $order = Order::where('id', $id)->first();
        $orderMessages = OrderMessage::where('order_id',$order['id'])->orderBy('created_at')->get();
        return view('viewOrder', ['order' => $order, 'orderMessages' => $orderMessages]);
    }

    public function about()
    {
        return view('about');
    }
}
