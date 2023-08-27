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

    Route::get('/profile','UsersController@profile'); //プロフィール
    Route::get('/search','UsersController@search'); //検索
    Route::get('/follow-list','FollowsController@followList'); //フォローリスト
    Route::get('/follower-list','FollowsController@followerList'); //フォロワーリスト
});

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

// 新規登録用　view
Route::get('/register', 'Auth\RegisterController@registerView');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

// ログアウト機能
Route::get('/logout','Auth\LoginController@logout');

// 投稿フォーム 表示用
// Route::get('/posts','PostsController@index')->name('posts.index');
// 投稿を押した時
// Route::post('/posts','PostsController@post01')->name('posts.post01');


