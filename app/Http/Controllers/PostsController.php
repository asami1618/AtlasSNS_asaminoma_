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
        $post = Post::get();
        return view('posts.index',['posts' => $post]);
    }
    // 新規投稿
    public function added(Request $request)
    {        
        // $id = $request->input('id');
        // $user_id = $request->input('userId');
        $post = $request->input('newPost');

        Post::create([
            // 'id' => Auth::user()->id,
            'user_id' => Auth::id(),
            'post' => $post
            ]);
        return back();
    }
}

