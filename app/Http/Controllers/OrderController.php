<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function saveOrder(OrderRequest $request) {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $input['file'] = $file->getClientOriginalName();
            $file->move(public_path().'/files/',$input['file']);
            $data = [
                'user_id' => auth()->user()->id,
                'title' =>  $request['text'],
                'text' =>  $request['text'],
                'file' =>  $input['file']
            ];
            $order = new Order();
            $order->fill($data);
            if($order->save()){
                return redirect('orderList')->with('status','Заявка добавленна!');
            } else {
                return redirect('order')->with('status','Ошибка !');
            }
        }
        dd(2);
    }
}
