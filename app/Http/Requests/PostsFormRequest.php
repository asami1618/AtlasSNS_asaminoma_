<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class posts extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    //バリデーション条件

    {
        return [ 
            //項目名　=> 検証ルール
            'post' => 'required|string|min:1 max:150' ,
        ];
    }
    public function messages()
    {
        return[
            'post.required' => '投稿内容は入力必須です。',
            'post.min' => '投稿内容は1文字以上入力して下さい。',
            'post.max' => '投稿内容は150文字以上入力して下さい。',
        ];
    }
}
