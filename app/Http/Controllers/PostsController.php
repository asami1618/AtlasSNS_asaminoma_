<?php

namespace App\Http\Controllers;

use App\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //　投稿表示
    public function index()
    {
        $post = Post::get(); //postモデル(postsテーブル)からレコード情報を取得
        return view('posts.index',['posts' => $post]); 
        //viewヘルパを使用し、()の中に画面表示したいファイル名と受け渡したい変数名を記述
    }
    // 新規投稿
    public function added(Request $request)
    {        
        // $id = $request->input('id');←新規登録の際は$id不要
        // $user_id = $request->input('userId');
        $post = $request->input('newPost');// $request内にフォームで入力した内容が入る→$post

        Post::create([
            // 'id' => Auth::user()->id,
            'user_id' => Auth::id(),// Auth認証はidのみ記述を簡単にできる。それ以外は28行目の記述。
            'post' => $post
            ]);
        return back();
    }
    public function updateForm($id)
    {
        $post = Post::where('id',$id)->first();
        return view('posts.index',['post' => $post]); 
    }
}

