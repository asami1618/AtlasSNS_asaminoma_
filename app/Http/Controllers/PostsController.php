<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    // 8/20 投稿フォーム
    public function index(){
        return view('posts/index');
    }
}
