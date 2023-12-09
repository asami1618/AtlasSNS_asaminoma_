<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {
    Route::get('/top','PostsController@index');

    Route::get('/follow-list','FollowsController@followList'); //フォローリスト
    Route::get('/follower-list','FollowsController@followerList'); //フォロワーリスト
});

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login'); //->name('login')　追記
Route::post('/login', 'Auth\LoginController@login');

// 新規登録用　view
Route::get('/register', 'Auth\RegisterController@registerView');
Route::post('/register', 'Auth\RegisterController@register');

//　新規投稿　一覧表示→24行目
// Route::get('/added', 'PostsController@added')->middleware('auth');
// 投稿機能
Route::post('/added', 'PostsController@added')->middleware('auth');
// 投稿の更新
Route::get('/index','PostsController@update');
Route::post('/post/update','PostsController@update');

// ログアウト機能
Route::get('/logout','Auth\LoginController@logout');

// 検索機能
// Route::get('/search','UsersController@search'); //検索
Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

// 検索結果表示
// Route::get('/search','UsersController@searchview');

// 削除機能
Route::get('/post/{id}/delete','PostsController@delete');

//フォローする
Route::get('/users/{user}/follow','FollowsController@follow')->name('follow');
// フォロー解除する
Route::get('/users/{user}/unfollow','FollowsController@unfollow')->name('unfollow');

//プロフィール
Route::get('/users/profile','UsersController@profile')->name('profile'); 
Route::get('/users/{id}/othersprofile','UsersController@othersprofile')->name('othersprofile');


