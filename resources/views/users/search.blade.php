@extends('layouts.login')

@section('content')
<head>
    <title>User list</title>
</head>
<!-- 検索フォーム -->
<div class="search-form">
    <form action="{{ url('/search') }}">
        <div class="form-search">
            <input type="search" name="keyword" value="{{ $keyword }}" placeholder="ユーザー名">
            <button><a href="/search" class="search_btn"><img src="{{ asset('/images/search.png') }}" width="30" height="30"></a></button>
        </div>
    </form>
    
</div>

<div class="user">
    <h1>[ ユーザー 一覧表示 ]</h1>
    <table class="user_table">
    @foreach ( $users as $user )
    <tr>
        <td>{{ $user->username }}</td>
        <td>
        @if (auth()->user()->isFollowing($user->id))
        <!-- フォロー解除 -->
            <a href="{{ route('unfollow' , $user->id) }}" class="btn unfollow_btn">フォロー解除</a>
        @else
        <!-- フォローする -->
            <a href="{{ route('follow' , $user->id) }}" class="btn follow_btn">フォローする</a>
        @endif
        </td>
    </tr>
</div>

    @endforeach
    </table>    
    
<!--　検索ワード表示 -->
@if(!empty($keyword))
<p>検索ワード:{{ $keyword }}</p>
@endif

@endsection

