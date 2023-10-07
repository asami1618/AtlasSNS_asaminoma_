<?php

namespace App\Http\Controllers;

use App\User;
use App\follows;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    // フォローする
    public function follow(Request $request)
    {
        User::firstOrCrete([
            'followed_id' => $request->post_user,
            'following_id' => $request->auth_user
        ]);
        return true;
    }
    // フォロー解除する
    public function unfollow(Request $request)
    {
        $follow = User::where('followed_id',$request->post_user)
        ->where('following_id',$request->auth)->first();

        if($follow){
            $follow->delete();
            return false;
        }
    }
}
