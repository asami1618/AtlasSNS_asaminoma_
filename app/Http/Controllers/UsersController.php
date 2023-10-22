<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\follows;
use App\Http\Controllers\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    // 検索処理
    public function search(Request $request){
        // 1つ目の処理
        // Model::where('column', '!=', 'value')->get(); 見本
        $users = User::where('id','!=',Auth::id())->get();
        // 22行目で処理がされなければ29行目へ
        $keyword = $request->input('keyword');
        $query = User::query();
        // dd($request);
        // 2つ目の処理 
        if(!empty($keyword)){
            $users = $query->where('username', 'like', '%' .$keyword. '%')->get();
        }
        // 3つ目の処理
        return view('users.search',compact('users','keyword'));
    }
    // 検索結果表示
    public function searchview(Request $request){
        // 1つ目の処理
        $users = User::get();
        $keyword = $request->input('keyword');
        $query = User::query(); 
        // 2つ目の処理
        if(!empty($keyword)){
            $query->where('username', 'like', '%' .$keyword. '%');
        }
        // 3つ目の処理
        return view('users.search',compact('keyword'));
    }

    public function follow(User $user){
        //ユーザーを取得するgetAllUsers()メソッドにログインしているユーザーIDを引数で渡す
        $all_users = $user->getAllUsers(auth()->user()->id);
        return view('users.index', [
            'all_users' => $all_users
        ]);
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

