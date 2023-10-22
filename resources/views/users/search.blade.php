@extends('layouts.login')

@section('content')
<!-- 検索フォーム -->
@foreach ($users as $user)
<div class="search-form">
    <form action="{{ url('search') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="search" name="keyword" value="{{ $keyword }}" class="form-control" placeholder="ユーザー名">
        </div>
        <p class="pull-right"><a href="/search"><button><img src="{{ asset('/images/search.png') }}" width="30" height="30"></button></a></p>
    </form>
</div>
@endforeach
<head>
    <title>User list</title>
</head>

<h1>[ ユーザー 一覧表示 ]</h1>
    <table class="user_table">
    @foreach ( $users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>
            @if (auth()->user()->isFollowing($user->id))
                <form action="{{ route('unfollow' , ['id' => $user->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow' , ['id' => $user->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">フォローする</button>
                </form>
            @endif
            </td>
        </tr>
    @endforeach

<!--　検索ワード表示 -->
@if(!empty($keyword))
<p>検索ワード:{{ $keyword }}</p>
@endif

@endsection

