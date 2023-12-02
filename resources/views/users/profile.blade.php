@extends('layouts.login')

@section('content')
<!-- ログインユーザーのプロフィール -->
    @if( Request::routeIs('profile') )
        <div class="my_profile">
            <img src="{{ asset('storage/' .$users->images ) }}" alt="" width="60" height="60">
        </div>
            <div class="">
                <p>{{ Auth::user()->username }}</p>
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