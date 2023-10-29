<?php

namespace App\Http\Controllers;

use App\post;
use App\User;
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
    // 投稿の更新　
    public function update(Request $request)
    {
        // 1つ目の処理
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        // 2つ目の処理
        Post::where('id',$id)->update([
            'user_id' => Auth::id(),
            'post' => $up_post
        ]);
        // 3つ目の処理
        return redirect('/top'); // ←/indexだとエラーになる
    }
    public function delete($id)
    {
        Post::where('id',$id)->delete();
        return redirect('/top');
    }
}

