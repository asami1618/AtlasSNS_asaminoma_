@extends('layouts.login')

@section('content')
<head>
    <title>User list</title>
</head>
<!-- 検索フォーム -->
@foreach ($users as $user)
<div class="search-form">
    <form action="{{ url('/search') }}">
        @csrf
        <div class="form-group">
            <input type="search" name="keyword" value="{{ $keyword }}" class="form-control" placeholder="ユーザー名">
        </div>
        <p class="pull-right"><a href="/search"><button><img src="{{ asset('/images/search.png') }}" width="30" height="30"></button></a></p>
    </form>
    
</div>
<!-- @endforeach -->

<h1>[ ユーザー 一覧表示 ]</h1>
    <table class="user_table">
    @foreach ( $users as $user)
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
    @endforeach
    </table>    
    
<!--　検索ワード表示 -->
@if(!empty($keyword))
<p>検索ワード:{{ $keyword }}</p>
@endif

@endsection

