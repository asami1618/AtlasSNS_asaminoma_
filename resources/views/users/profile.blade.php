@extends('layouts.login')

@section('content')
<!-- ログインユーザーのプロフィール -->
    @if( Request::routeIs('profile') )
        <div class="my_profile">
            <img src="{{ asset('storage/' .$users->images ) }}" alt="" width="50" height="50">
        </div>
            <div class="">
                <p>{{ Auth::user()->username }}</p>
            </div>
    @else

<!-- 他ユーザーのプロフィール -->
<div class="container">
    <div class="profile">
        @foreach($posts as $post)
        <div class="images">
            <img src="{{ asset('storage/' .$users->images ) }}" alt="" width="30" height="30">
        </div>
            <div class="othersProfile">
                <p>{{ $post->user->username }}</p>
                <p><textarea name="introduction"></textarea></p>
            </div>
        @endforeach

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