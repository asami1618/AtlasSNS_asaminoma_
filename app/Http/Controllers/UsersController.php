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
    public function login()
    {
        $users = Users::get();
        return view('web.php',['users'=>$users]);    
    }
    public function index()
    {
        $users = Users::get();
        return view('web.php');
    }
}