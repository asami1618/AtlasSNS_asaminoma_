<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    // 9/3 追記
    protected $fillable = ['id','user_id','post'];

    public function posts(){
        return $this->hasMany('App\post');
    }
}
