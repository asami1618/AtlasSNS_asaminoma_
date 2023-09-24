<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Post;
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
        $query = User::query();
        // 2つ目の処理 
        return view('users.search',compact('keyword'));
    }
    // 検索結果表示
    public function searchview(Request $request){
        // 1つ目の処理
        $keyword = $request->input('keyword');
        $query = User::query(); 
        // 2つ目の処理
        if(!empty($keyword)){
            $query->where('username', 'like', '%' .$keyword. '%');
        }
        // 3つ目の処理
        return view('users.search',compact('keyword'));
    }
    // 3つ目の処理




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

