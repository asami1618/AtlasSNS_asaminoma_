@extends('layouts.login')

@section('content')

<!-- フォローされている人のアイコン一覧 -->
<div class="follower-list">
    <div class="follower_icon">
    <h1 class="follower-List">Follower List</h1>
        @foreach ($followed_users as $followed_user)
        <figure><img src="{{ asset('storage/' .$followed_user->images) }}" class="Follower-List-icon" alt="フォロワーアイコン"></figure>
        @endforeach
    </div>    
</div>

<!-- 投稿一覧 -->
<div>
    <ul class="post-area">
        <!-- 投稿アイコン -->
        @foreach($posts as $post)
        <li class="post-block">
            <a href="{{URL::to('/users/' .$post->user_id. '/othersprofile')}}"><img src="{{ asset('storage/' .$followed_user->images) }}" alt="フォロワーアイコン"></a>

            <!-- 投稿エリア -->
            <div class="post_area">
                <div class="post_left">
                    <div class="followerlist_name">{{ $post->user->username }}</div>
                    <div class="followerlist_post">{{ $post->post }}</div>
                </div>
            </div>
            <div class="followerlist_post_day">{{ $post->created_at->format('Y/m/d') }}</div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
