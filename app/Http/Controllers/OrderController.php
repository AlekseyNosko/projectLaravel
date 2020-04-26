<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\SendMessageRequest;
use App\Order;
use App\OrderMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
                Mail::send('mail',['order'=>$order],function ($message){
                    $message->to('manager@gmail.com','manager')->subject('send message');
                    $message->from(auth()->user()->email,auth()->user()->name);
                });
                return redirect('orderList')->with('status','Заявка добавленна!');
            } else {
                return redirect('order')->with('status','Ошибка !');
            }
    }

    public function closedOrder($id) {
        $order = Order::where('id', $id)->first();
        $order->fill(['closed_at' => Carbon::now()]);
        $order->save();
        Mail::send('mail',['order'=>$order],function ($message){
            $message->to('manager@gmail.com','manager')->subject('send message');
            $message->from(auth()->user()->email,auth()->user()->name);
        });
        return redirect()->back()->with('status','Заявка успешно закрыта!');
    }

    public function sendMessage(SendMessageRequest $request) {
        $data = [
            'order_id' => $request['order_id'],
            'user_id' => auth()->user()->id,
            'text' => $request['text']
        ];
        $orderMessage = new OrderMessage();
        $orderMessage->fill($data);
        if($orderMessage->save()){
            $order = Order::where('id',$request['order_id'])->first();
            Mail::send('mail',['order'=>$order],function ($message){
                $message->to('manager@gmail.com','manager')->subject('send message');
                $message->from(auth()->user()->email,auth()->user()->name);
            });
            return redirect()->back()->with('status','Сообщение отправлено!');
        } else {
            return redirect()->back()->with('status','Ошибка !');
        }
    }
}
