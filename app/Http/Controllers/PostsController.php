<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //投稿フォーム　表示
    public function index(){
        return view('posts/index');
    }
    // 新規投稿　
    public function added(Request $request){
        $posts = Post::get(); //postsテーブル取得
        return redirect('posts/index');
    }
}
