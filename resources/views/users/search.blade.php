@extends('layouts.login')

@section('content')
<head>
    <div>
        <!-- 検索フォーム -->
        <div class="search-form">
            <form action="{{ url('/search') }}">
                <div class="search-area">
                    <div class="search_content">
                            <input type="search" class="search_box" name="keyword" value="{{ $keyword }}" placeholder="ユーザー名">
                        <button class="search_btn">
                            <a href="/search"><img src="{{ asset('/images/search.png') }}" class="search_btn" width="50" height="50"></a>
                        </button>
                        <!--　検索ワード表示 -->
                        <div>
                            @if(!empty($keyword))
                            <p>検索ワード:{{ $keyword }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>        

    <!-- ユーザー一覧 -->
    <div class="user">
        <div class="user_list">
            <table class="user_table">
            @foreach ( $users as $user )
                <tr>
                    <td class="user_item"><img src="{{ asset('storage/' .$user->images) }}" class="img-search-icon" width="50" height="50"></td>
                    <td class="search-post-name">{{ $user->username }}</td>

                    <td>
                        @if (auth()->user()->isFollowing($user->id))
                        <!-- フォロー解除 -->
                            <button type="button"><a href="{{ route('unfollow' , $user->id) }}" class="btn btn-danger">フォロー解除</a></button>
                        @else
                        <!-- フォローする -->
                            <button type="button"><a href="{{ route('follow' , $user->id) }}" class="btn btn-primary">フォローする</a></button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</head>
    
    
@endsection

