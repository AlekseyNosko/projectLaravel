<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;

class ControlPanel extends Controller
{
    public function getUsers()
    {
        $users = User::orderBY('name','desc')->get();
        return view('controlPanel', ['users' => $users]);
    }
    public function editUsers($id)
    {
        $users = User::where('id', $id)->first();
        return response()->json($users);
    }
    public function saveEditUser(Request $request)
    {
        $users = User::find(intval($request['id']));
        $data = [
            'name' =>  $request['login'],
            'email' =>  $request['email']
        ];
        $users->fill($data);
        $users->save();
        return response()->json($users);
    }

    public function delUser($id)
    {
        $users = User::find($id);
        $users->delete();
    }
    public function addUser(Request $request)
    {
        $users = new User();
        $data = [
            'name'     => $request['login'],
            'email'    => $request['email'],
            'password' => $request['password']
        ];
        $users->fill($data);
        $users->save();
        return response()->json($users);
    }
}
