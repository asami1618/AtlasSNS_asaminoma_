<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Models\follows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{
    //ログインユーザーのプロフィール
    public function profile()
    {
        $users = Auth::user();
        return view('users.profile' , compact('users'));
    }

    // 他ユーザーのプロフィール
    public function othersprofile($id)
    {
        $users = User::where('id' , $id)->first();
        $posts = Post::with('user')->where('user_id' , $id)->get();
        return view('users.profile' , compact('users','posts'));
    }

    // プロフィール編集
    public function editprofile(Request $request)
    {
        // インスタンスを作成 ['値の配列'=>'検証ルールの配列']
        // Validator::make($request->all()として入力された全ての値を取得
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|min:5|max:40|email',
            'password' => 'required|alpha_num|min:8|max:20',
            'password_comfirmation' => 'required|alpha_num|min:8|max:20|confirmed:password',
            'bio' => 'min:150',
            'images' => 'mimes:jpg,png,bmp,gif,svg',
        ]);
        // 項目名　検証ルール　=> メッセージ
        $message = [
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
            'password.confirmed' => 'パスワードが一致していません。',

            'bio.min' => '150文字以下で入力してください。',
            'images.mimes' => '指定のファイル形式以外は添付できません。',
        ];

        // 検証 failメソッドは失敗していたら"true"を返す
        if ($validator->fails()) {
            // エラー発生時の処理
            return redirect('/top')
            // withErrorsは引数の値を$errors変数へ保存してリダイレクト先まで引き継ぐメソッド
            ->withErrors($validator) 
            ->withInput();
        }
        // $inputs = $request->all();
        return view('users.profile',['msg' => '正しく入力されました!']);
    }

    public function store(Request $request)
    {


        // 画像フォームでリクエストした画像を取得
        // $img = $request->file('images');

        // 画像情報がセットされていれば保存処理を実行
        // if (isset($img)){
            // storage > public　配下に画像が保存される
            // $path = $img->store('public');
            // store処理が実行できたらDBに保存
        //     if ($path) {
        //         Item::create([
        //             'images' => $path,
        //         ]);
        //     }
        // }
    }


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
            return redirect('/follow-list');
        }
    }

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
        return redirect('/follower-list');
    }
    
    // 検索処理
    public function search(Request $request){
        // 1つ目の処理
        // Model::where('column', '!=', 'value')->get(); 見本
        $users = User::where('id','!=',Auth::id())->get();
        // 22行目で処理がされなければ29行目へ
        $keyword = $request->input('keyword');
        $query = User::query();
        // dd($request);
        // 2つ目の処理 
        if(!empty($keyword)){
            $users = $query->where('username', 'like', '%' .$keyword. '%')->get();
        }
        // 3つ目の処理
        return view('users.search',compact('users','keyword'));
    }
    // 検索結果表示
    public function searchview(Request $request){
        // 1つ目の処理
        $users = User::get();
        $keyword = $request->input('keyword');
        $query = User::query(); 
        // 2つ目の処理
        if(!empty($keyword)){
            $query->where('username', 'like', '%' .$keyword. '%');
        }
        // 3つ目の処理
        return view('users.search',compact('keyword'));
    }

    // ログイン処理
    public function login(){
        $users = Users::get();
        return view('web.php',['users'=>$users]);    
    }

    public function index()
    {
        $users = Users::get();
        return view('web.php');
    }
}

