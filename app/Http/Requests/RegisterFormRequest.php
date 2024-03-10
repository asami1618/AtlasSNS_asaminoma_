<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // falseからtrueに変更　権限を持っているかどうかを判断する
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    //　バリデーション条件

    {
        return [
            //項目名　=> 検証ルール
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|min:5|max:40|unique:users,mail|email',
            'password' => 'required|regex:/^[a-zA-Z0-9]+$/|min:8|max:20|confirmed',
            'password_confirmation' => 'required|regex:/^[a-zA-Z0-9]+$/|min:8|max:20'
        ];
    }
    public function messages()
    {
        return [
             // 項目名　検証ルール　=> メッセージ
            'username.required' => 'ユーザー名は入力必須です。',
            'username.min' => 'ユーザー名は2文字以上で入力してください。',
            'username.max' => 'ユーザー名は12文字以下で入力してください。',

            'mail.required' => 'メールアドレスは入力必須です。',
            'mail.min' => 'メールアドレスは5文字以上で入力してください。',
            'mail.max' => 'メールアドレスは40文字以下で入力してください。',
            'mail.unique' => '登録済みのメールアドレスは使用不可です。',
            'mail.email' => 'メールアドレスの形式で入力してください。',

            'password.required' => 'パスワードは入力必須です。',
            'password.regex' => 'パスワードは英数字のみで入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => 'パスワードは20文字以下で入力してください。',
            
            'password_confirmation.required' => 'パスワード確認は入力必須です。',
            'password_confirmation.regex' => 'パスワード確認は英数字のみで入力してください。',
            'password_confirmation.min' => 'パスワード確認は8文字以上で入力してください。',
            'password_confirmation.max' => 'パスワード確認は20文字以下で入力してください。',
        ];
    }
}
