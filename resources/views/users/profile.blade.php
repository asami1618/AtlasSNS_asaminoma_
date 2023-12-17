@extends('layouts.login')

@section('content')
<!-- ログインユーザーのプロフィール -->
    @if( Request::routeIs('profile') )
        <div class="my_profile">
            <!-- <img src="{{ asset('storage/' .$users->images ) }}" alt="" width="60" height="60"> -->
            <!-- 編集 -->
            {!! Form::open([ 'url' => '/users/edit/profile' ]) !!}
            <!-- <form action="{{ route('editprofile') }}" method="GET" > -->
            <div class="container">
                <div class="form-group">
                    {{ Form::label('username') }}
                    <input type="text" name="username" value="{{ Auth::user()->username }}">
                </div>
                
                <div class="form-group">
                    {{ Form::label('mail') }}
                    <input type="text" name="mail" value="{{ Auth::user()->mail }}">
                </div>

                <div class="form-group">
                    {{ Form::label('password') }}
                    <input type="password" name="password" value="">
                </div>

                <div class="form-group">
                    {{ Form::label('password comfirm') }}
                    <input type="password" name="password_comfirm" value="">
                </div>

                <div class="form-group">
                    {{ Form::label('bio') }}
                    <input type="text" name="bio" value="{{ Auth::user()->bio }}">
                </div>

                <div class="form-group">
                    {{ Form::label('icon image') }}
                    <form enctype="multipart/form-data" method="POST">
                    <input type="file" name="images">
                    <input type="submit" value="更新">
                    <!-- <img src="{{ asset('storage/' .$users->images) }}"> -->
                    </form> 
                </div>
                {{ Form::token() }}
                {!! Form::close() !!}
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
<div class="container">
    <div class="profile">
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

        <div>
            <h2> [ 投稿一覧 ] </h2>
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