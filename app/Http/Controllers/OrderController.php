<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\SendMessageRequest;
use App\Order;
use App\OrderMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function saveOrder(OrderRequest $request) {
        $data = [];
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $input['file'] = $file->getClientOriginalName();
            $file->move(public_path() . '/files/', $input['file']);
            $data += ['file' =>  $input['file']];
        }
            $data += [
                'user_id' => auth()->user()->id,
                'title' =>  $request['text'],
                'text' =>  $request['text']
            ];
            $order = new Order();
            $order->fill($data);
            if($order->save()){
                return redirect('orderList')->with('status','Заявка добавленна!');
            } else {
                return redirect('order')->with('status','Ошибка !');
            }
    }

    public function closedOrder($id) {
        $order = Order::where('id', $id)->first();
        $order->fill(['closed_at' => Carbon::now()]);
        $order->save();
        return redirect()->back()->with('status','Заявка успешно закрыта!');
    }

    public function sendMessage(SendMessageRequest $request) {
        $data = [
            'order_id' => $request['order_id'],
            'user_id' => auth()->user()->id,
            'text' => $request['text']
        ];
        $order = new OrderMessage();
        $order->fill($data);
        if($order->save()){
            return redirect()->back()->with('status','Сообщение отправлено!');
        } else {
            return redirect()->back()->with('status','Ошибка !');
        }
    }
}
