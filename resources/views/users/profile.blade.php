@extends('layouts.login')

@section('content')
<!-- ログインユーザーのプロフィール -->
    @if( Request::routeIs('profile') )
        <div class="my_profile">
            <!-- <img src="{{ asset('storage/' .$users->images ) }}" alt="" width="60" height="60"> -->
            <!-- 編集 -->
            {!! Form::open([ 'url' => '/users/edit/profile', 'method' => 'post', 'files' => true ]) !!}
            <!-- <form action="{{ route('editprofile') }}" method="GET" > -->

            <div class="prpfile_form_input">
                <div class="profile_container">
                    <ul>
                        <!-- ユーザーネーム -->
                        <li class="form-group_profile">
                            <h1 class="box-name">user name</h1>
                            <input type="text" class="form-group_box" name="username" value="{{ Auth::user()->username }}">
                        </li>
                        <!-- メール -->
                        <li class="form-group_profile">
                            <h1 class="box-name">mail adress</h1>
                            <input type="text" class="form-group_box" name="mail" value="{{ Auth::user()->mail }}">
                        </li>
                        <!-- パスワード -->
                        <li class="form-group_profile">
                            <h1 class="box-name">password</h1>
                            <input type="password" class="form-group_box" name="password" value="">
                        </li>
                        <!-- パスワード確認 -->
                        <li class="form-group_profile">
                            <h1 class="box-name">password comfirm</h1>
                            <input type="password" class="form-group_box" name="password_comfirm" value="">
                        </li>
                        <!-- 自己紹介 -->
                        <li class="form-group_profile">
                        <h1 class="box-name">bio</h1>
                            <input type="text" class="form-group_box" name="bio" value="{{ Auth::user()->bio }}">
                        </li>
                        <!-- アイコン画像 -->
                        <li class="form-group_profile">
                            <h1 class="box-name">icon image</h1>
                            <!-- Form::file('name属性')-->
                            {{ Form::file('file') }} 
                            {{ Form::submit('更新', ['class' => 'btn btn-default']) }}
                            <!-- <img src="{{ asset('storage/' .Auth::user()->images) }}"> -->
                        </li>
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
                    </ul>
                </div>
            </div>
        </div>
    @else

<!-- 他ユーザーのプロフィール -->
<div class="container">
    <div class="other_profile">
        <div class="images">
            <img src="{{ asset('storage/' .$users->images ) }}" alt="" width="60" height="60">
        </div>
            <div class="othersProfile">
            @foreach($users as $user)
                <tr>
                    <td>{{ $users->username }}</td>
                    <td><input type="text" name="bio" value="{{ Auth::user()->bio }}"></td>
                </tr>
            @endforeach
            </div>

        <div>
            @if (auth()->user()->isFollowing($users->id))
            <!-- フォロー解除 -->
                <a href="{{ route('unfollow' , $users->id) }}" class="btn unfollow_btn">フォロー解除</a>
            @else
            <!-- フォローする -->
                <a href="{{ route('follow' , $users->id) }}" class="btn follow_btn">フォローする</a>
            @endif
        </div>

        <div class="other_post">
            <h1> Post List </h1>
            <table>
                @foreach($posts as $post)
                <tr>
                    <td><img src="{{ asset('storage/' .$users->images ) }}" alt="" width="30" height="30"></td>
                    <td>{{ $post->user->username }}</td>
                    <td>{{ $post->post}}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endif
@endsection