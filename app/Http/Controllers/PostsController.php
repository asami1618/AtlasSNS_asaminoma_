<?php

namespace App\Http\Controllers;

use App\post;
use App\Models\User;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    //　投稿表示
    public function index(Request $request){
        return view('posts/index');
    }
    // 新規投稿
    public function added(Request $request)
    {
        $id = $request->input('id');
        $user_id = $request->input('user_id');
        $post = $request->input('post');

        Post::create([
            $id => 'id',
            $user_id => 'user_id',
            $post => 'post',
        ]);
        return back();
    }
}

