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

    // フォローされているユーザーを取得
    public function followed()
    { //多対多のリレーション
        return $this->belongsToMany(
            'App\Models\User',
            'follows',
            'following_id',
            'followed_id',
        );
    }
    // フォローしているユーザーを取得
    public function following()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'follows',
            'following_id',
            'followed_id',
        );
    }
}

