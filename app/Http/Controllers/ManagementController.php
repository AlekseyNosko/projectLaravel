<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderMessage;
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
        $orderMessages = OrderMessage::where('order_id',$order['id'])->orderBy('created_at')->get();
        $order->fill(['viewed_at' => Carbon::now()]);
        $order->save();
        return view('management.managementOrder',['order' => $order, 'orderMessages' => $orderMessages]);
    }

    public function addToWorkOrder($id) {
        $order = Order::where('id', $id)->first();
        $order->fill(['working' => true]);
        $order->save();
        return redirect()->back()->with('status','Успешно добавлена в работу!');
    }

    public function getAllOrderList(Request $request){
        $orders = Order::with('orderUser');
        if($request['filter_viewed'] == 'view'){
            $orders->where('viewed_at','!=',null);
        } elseif ( $request['filter_viewed'] == 'notView') {
            $orders->where('viewed_at','=',null);
        }
        if($request['filter_closed'] == 'closed'){
            $orders->where('closed_at','!=',null);
        } elseif ( $request['filter_closed'] == 'notClosed') {
            $orders->where('closed_at','=',null);
        }
        if($request['filter_working'] == 'work'){
            $orders->where('working','=',true);
        } elseif ( $request['filter_working'] == 'notWork') {
            $orders->where('working','=',false);
        }
        $orders = $orders->orderBy('created_at','desc')->get()->toArray();
        return response()->json($orders,200);
    }

}
