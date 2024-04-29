@extends('layouts.login')

@section('content')
<!-- ログインユーザーのプロフィール -->
    @if( Request::routeIs('profile') )
        <div class="my_profile">
            <!-- <img src="{{ asset('storage/' .$users->images ) }}" alt="" width="60" height="60"> -->
            <!-- 編集 -->
            {!! Form::open([ 'url' => '/users/edit/profile', 'method' => 'post', 'files' => true ]) !!}
            <!-- <form action="{{ route('editprofile') }}" method="GET" > -->

            <div class="profile_container">
                    <!-- ユーザーネーム -->
                    <tr class="box-name">
                        <th><label>ユーザー名</label></th>
                        <td><input type="text" class="form-group_box" name="username" value="{{ Auth::user()->username }}"></td>
                    </tr>

                    <!-- メール -->
                    <tr>
                    <th><label>メールアドレス</label></th>
                        <td><input type="text" class="form-group_box" name="mail" value="{{ Auth::user()->mail }}"></td>
                    </tr>

                    <!-- パスワード -->
                    <tr>
                        <th><label>パスワード</label></th>
                        <input type="password" class="form-group_box" name="password" value="">
                    </tr>

                    <!-- パスワード確認 -->
                    <tr>
                        <th><label>パスワード確認</label></th>
                        <input type="password" class="form-group_box" name="password_comfirm" value="">
                    </tr>

                    <!-- 自己紹介 -->
                    <tr>
                        <th>自己紹介</th><th><label></label></th>
                        <input type="text" class="form-group_box" name="bio" value="{{ Auth::user()->bio }}">
                    </tr>

                    <!-- アイコン画像 -->
                    <tr>
                        <th>アイコン画像</th><th><label></label></th>
                        <!-- Form::file('name属性')-->
                        <td>
                        {{ Form::file('file') }} 
                        {{ Form::submit('更新', ['class' => 'btn btn-default']) }}
                        <!-- <img src="{{ asset('storage/' .Auth::user()->images) }}"> -->
                        </td>
                    </tr>
                    {{ Form::token() }}
                    {!! Form::close() !!}

                    <!-- バリデーションエラーメッセージ表示 -->
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            </div>
        </div>
    @else

<!-- 他ユーザーのプロフィール -->
<div>
    <ul class="other-post-area">
        <!-- 1ブロック目　アイコン -->
        <li>
            <li><figure><img src="{{ asset('storage/' .$users->images ) }}" alt="" width="60" height="60"></figure></li>

            <!-- 2ブロック目　名前&自己紹介エリア -->
            <li class="name-area">
                <div class="">name</div>
                <div class="bio-area">bio</div>
            </li>

            <!-- 3ブロック目　ユーザー名&自己紹介内容 -->
            <li class="content-area">
                <div>{{ $users->username }}</div>
                <div>{{ $users->bio}}</div>
            </li>

            <!-- 4ブロック目　ボタンエリア -->
            <li class="button-area">
                <div>
                    @if (auth()->user()->isFollowing($users->id))
                    <!-- フォロー解除 -->
                        <a href="{{ route('unfollow' , $users->id) }}" class="btn unfollow_btn">フォロー解除</a>
                    @else
                    <!-- フォローする -->
                        <a href="{{ route('follow' , $users->id) }}" class="btn follow_btn">フォローする</a>
                    @endif
                </div>
            </li>
        </li>
    </ul>

        <!-- 投稿一覧 -->
    <div>
        <ul class="post-area">
            <!-- 投稿アイコン -->
            @foreach($posts as $post)
            <li class="post-block">
                <div class="post-contents">
                    <div><img src="{{ asset('storage/' .$users->images ) }}" alt="" width="45" height="45"></div>

                <!-- 投稿エリア -->
                    <div class="post_area">
                        <div class="post_left">
                            <div class="post-name">{{ $post->user->username }}</div>
                            <div class="post_content">{{ $post->post }}</div>
                        </div>
                    </div>
                    <div class="post-day">{{ $post->created_at->format('Y-m-d H:i') }}</div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif
@endsection


