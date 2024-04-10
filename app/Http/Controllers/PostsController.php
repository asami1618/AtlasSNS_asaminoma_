<?php

namespace App\Http\Controllers;

use App\post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //　投稿表示
    public function index()
    {
        // 例) $fruits = Fruit::latest()->get();で新しい順に
        $post = Post::latest()->get(); //postモデル(postsテーブル)からレコード情報を取得
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
        if ($request->isMethod('post')){
            $rules = [
                'post' => 'required|string|min:1|max:150',
            ];
            $message = [
                'post.required' => 'ユーザー名は入力必須です。',
                'post.min' => 'ユーザー名は1文字以上で入力してください。',
                'post.max' => 'ユーザー名は150文字以下で入力してください。',
            ];
            $validator = Validator::make($request->all(), $rules, $message);

            // 検証 failメソッドは失敗していたら"true"を返す
            if ($validator->fails()) {
                // エラー発生時の処理
                return redirect('/top') // 戻したいURLを設定する
                // withErrorsは引数の値を$errors変数へ保存してリダイレクト先まで引き継ぐメソッド
                ->withErrors($validator) 
                ->withInput();
            }
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
    }

    public function delete($id)
    {
        if ($request->isMethod('post')){
            $rules = [
                'post' => 'required|string|min:1|max:150',
            ];
            $message = [
                'post.required' => 'ユーザー名は入力必須です。',
                'post.min' => 'ユーザー名は1文字以上で入力してください。',
                'post.max' => 'ユーザー名は150文字以下で入力してください。',
            ];
    }
        Post::where('id',$id)->delete();
        return redirect('/top');
    }

    public function followList()
    {   
        //Postモデル経由でpostsテーブルのレコードを取得
        $posts = Post::get();
        // フォローしているユーザーのidを取得
        $following_id = Auth::user()->follows()->pluck('followed_id');
        // フォローしているユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
        return view('/follows/followList', compact('posts'))->with('posts',$posts);
    }

}

