<?php

namespace App;

use App\User;
use App\follows;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Post()
    {
        return $this->hasMany('App\Post');
    }

    // フォローしているユーザーを取得
    public function follows()
    { //多対多のリレーション
        return $this->belongsToMany(
            'App\User',
            'follows',
            'following_id', 
            'followed_id',
        );
    }
    // フォローされているユーザーを取得
    public function follower()
    { //多対多のリレーション
        return $this->belongsToMany(
            'App\User',
            'follows',
            'followed_id',
            'following_id',
        );
    }

    // if文で使う関数をUser.phpに作成(bool値で返すようにすることで　@if(!isFollowing)を使用できる)
    // フォローしているか　※$user_idはログイン中のユーザー
    // bool値 → 真偽の値。TRUE または FALSE のどちらかになる。
    // $this Userクラスを定義している
    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('followed_id' , $user_id )->first();
    }

    public function isFollowed(Int $user_id)
    {
        return (bool) $this->followers()->where('following_id' , $user_id )->first();
    }

}

