<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
    //下記追記 7/23
    public function users()
    {
        $users = Users::get();
        return view('web.php',['users'=>$users]);
    }
}
