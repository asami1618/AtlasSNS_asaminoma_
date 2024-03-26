<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    // 9/3 追記
    // カラムにデータ挿入の許可をする
    // $fillable -> レコードを追加して良いカラムを設定(ホワイトリスト)
    protected $fillable = ['id','user_id', 'post'];
    protected $dates = ['created_at'];
    
    // $guarded -> レコードを追加しないカラムを設定(ブラックリスト)
    //protected $guarded = [];
    

    //リレーション
    public function posts(){
        return $this->hasMany('App\post');
    }

    // フォローリスト
    public function user(){
        return $this->belongsTo('App\User');
    }


}
