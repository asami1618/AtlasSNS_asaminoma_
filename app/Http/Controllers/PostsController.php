<?php

namespace App\Http\Controllers;

use App\posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // 8/20 投稿フォーム
    public function index(){
        return view('posts/index');
    }
    public function added(Request $request){
        $posts = Posts::get();
        return redirect('posts/index');
    }
}
