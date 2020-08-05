<?php

namespace App\Http\Controllers;


use App\User;
use Gate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // dd(Gate::check('view_manager_panel'));
        return view('home');
    }

}
