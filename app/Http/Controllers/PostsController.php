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
        // $post = Post::latest()->get(); //postモデル(postsテーブル)からレコード情報を取得
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $post = Post::with('user')->whereIn('user_id' , $following_id)->orWhere('user_id' , Auth::user()->id)->latest()->get();
        return view('posts.index',['posts' => $post]); 
        //viewヘルパを使用し、()の中に画面表示したいファイル名と受け渡したい変数名を記述
    }
    // 新規投稿
    public function added(Request $request)
    {    
        $rules = [
            'post' => 'required|string|min:1|max:150',
        ];
        $message = [
            'post.required' => '投稿は入力必須です。',
            'post.min' => '投稿は1文字以上で入力してください。',
            'post.max' => '投稿は150文字以下で入力してください。',
        ];
        // //デバック関数
        // dd($request);

        $validator = Validator::make($request->all(), $rules, $message);

        // 検証 failメソッドは失敗していたら"true"を返す
        if ($validator->fails()) {
            // エラー発生時の処理
            return redirect('/top') // 戻したいURLを設定する
            // withErrorsは引数の値を$errors変数へ保存してリダイレクト先まで引き継ぐメソッド
            ->withErrors($validator) 
            ->withInput();
        }
    // $id = $request->input('id');←新規登録の際は$id不要
        // $user_id = $request->input('userId');
        $post = $request->input('post');// $request内にフォームで入力した内容が入る→$post

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
                'post.required' => '投稿は入力必須です。',
                'post.min' => '投稿は1文字以上で入力してください。',
                'post.max' => '投稿は150文字以下で入力してください。',
            ];
            // //デバック関数
            // dd($request);

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
            $up_post = $request->input('post');

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

