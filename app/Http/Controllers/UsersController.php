<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    // 検索処理
    public function search(Request $request){
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
            $post = Post::where('username', 'like', '%' .$keyword. '%')->get();
        }else{
            $post = Post::all();
        }
        // 3つ目の処理
        return view('users.serch');
    }
    // ログイン処理
    public function login(){
        $users = Users::get();
        return view('web.php',['users'=>$users]);    
    }
    public function index()
    {
        $users = Users::get();
        return view('web.php');
    }
}

