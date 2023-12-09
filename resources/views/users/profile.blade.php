@extends('layouts.login')

@section('content')
<!-- ログインユーザーのプロフィール -->
    @if( Request::routeIs('profile') )
        <div class="my_profile">
            <img src="{{ asset('storage/' .$users->images ) }}" alt="" width="60" height="60">
        </div>
            <!-- 編集 -->
            <form action="" method="post" >
            <div class="container">
                <p>user name</p>
                    <input type="text" name="id" value="{{ Auth::user()->username }}">
                <p>mail address</p>
                    <input type="text" name="mail" value="{{ Auth::user()->mail }}">
                <p>password</p>
                    <input type="password" name="password" value="{{ Auth::user()->password }}">
                <p>password comfirm</p>
                    <input type="password" name="password" value="{{ Auth::user()->password }}">
                <p>bio</p>
                    <input type="text" name="bio" value="{{ Auth::user()->bio }}">
                <p>icon image</p>
                    <input type="text">
            </form>        
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