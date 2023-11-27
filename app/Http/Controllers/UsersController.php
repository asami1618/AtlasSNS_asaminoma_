<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Models\follows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{
    //
    public function profile($id)
    {
        $user = Auth::user();
        return view('users.profile' , compact('user'));
    }

    public function othersprofile($id)
    {
        $users = User::where('id' , $id)->first();
        $posts = Post::with('user')->where('user_id' , $id)->get();
        return view('users.profile' , compact('users','posts'));
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

