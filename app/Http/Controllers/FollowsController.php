<?php

namespace App\Http\Controllers;

use App\User;
use App\Follow;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FollowsController extends Controller
{
    // フォローリスト
    public function followList()
    {
        // フォローしているユーザーのidを取得
        $following_id = Auth::user()->follows()->pluck('followed_id');

        $followings = User::whereIn('id', $following_id)->get();
        return view('/follows/followList' , compact('followings'));
    }


    // フォロワーリスト
    public function followerList()
    {
        // フォローされているユーザーのidを取得
        $followed_id = Auth::user()->follows()->pluck('following_id');

        $followed_users = User::whereIn('id', $followed_id)->get();
        return view('/follows/followerList' , compact('followed_users'));
    }
    // public function postCount(){
    //     $posts = Post::get();
    //     return view('follows.followList', compact('posts'));
    // }

    // フォロー
    public function follow($userId)
    {
        // フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($userId);

        // フォロ-していなければ下記のフォロー処理を実行
        if(!$is_following) {
            // 自分のユーザーidを取得
            $loggedInUserId = auth()->user()->id;

            // ユーザーを取得
            $followedUser = User::find($userId);
            $followedUserId = $followedUser->id;

            // フォローデータをデータベースに登録
            Follow::create([
                'following_id' => $loggedInUserId,
                'followed_id' => $followedUserId,
            ]);
            // フォロー後元のページに戻る
            return redirect('/search');
        }
    }
        // $follower = auth()->user();
        // //フォローしているか
        // $is_following = $follower->isFollowing($user->id);
        // if(!$isfollowing) {
        //     //フォローしていなければフォローする
        //     $follower->follow($user->id);
        //     return back();

    // フォロー解除
    public function unfollow($userId)
    {
        // フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($userId);

        // フォロしていれば下記のフォロー解除を実行
        if($is_following) {
            $loggedInUserId = auth()->user()->id;
            Follow::where([
                ['followed_id', '=', $userId],
                ['following_id', '=', $loggedInUserId],
            ])->delete();
        }       
        return redirect('/search');
    }
}
