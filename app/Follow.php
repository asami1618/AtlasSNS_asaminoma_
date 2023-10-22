<?php

namespace App;

use App\User;
use App\follows;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $fillable = ['following_id' , 'followed_id'];
    protected $table = 'follows';

    // ユーザーの取得
    public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '!=', $user_id)->paginate(5);
    }
    
    // フォローする
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return $this->follows()->where('following_id', $user_id)->first(['id']);
    }
}
