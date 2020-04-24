<?php

namespace App\Http\Controllers;

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
        return view('orderList');
    }
}
