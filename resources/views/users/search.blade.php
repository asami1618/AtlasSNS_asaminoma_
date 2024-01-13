@extends('layouts.login')

@section('content')
<head>
    <div>
        <!-- 検索フォーム -->
        <div class="search-form">
            <form action="{{ url('/search') }}">
                <div class="search-area">
                    <input type="search" class="search_box" name="keyword" value="{{ $keyword }}" placeholder="ユーザー名">
                    <a href="/search" class="search_btn"><img src="{{ asset('/images/search.png') }}" width="30" height="30"></a>
                </div>
            </form>
        </div>
    </div>        

    <!-- ユーザー一覧 -->
    <h1>User List</h1>
    <div class="user">
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
        @endforeach
        </table>    
    </div>
</head>
    
    
<!--　検索ワード表示 -->
<div>
    @if(!empty($keyword))
    <p>検索ワード:{{ $keyword }}</p>
    @endif
</div>
@endsection

