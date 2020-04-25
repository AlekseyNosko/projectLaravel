<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function panel(){
        return view('management.panel');
    }

    public function allOrderList(){
        $orders = Order::orderBy('created_at','desc')->get();
        return view('management.allOrderList',['orders' => $orders]);
    }

    public function managementOrder($id){
        $order = Order::where('id', $id)->first();
        $order->fill(['viewed_at' => Carbon::now()]);
        $order->save();
        return view('management.managementOrder',['order' => $order]);
    }

    public function addToWorkOrder($id) {
        $order = Order::where('id', $id)->first();
        $order->fill(['working' => true]);
        $order->save();
        return redirect()->back()->with('status','Успешно добавлена в работу!');
    }

    public function getAllOrderList(){

    }

}
