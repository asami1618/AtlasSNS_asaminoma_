@extends('layouts.login')

@section('content')

<!-- フォローされている人のアイコン一覧 -->
<div class="follower-list">
    <h1>Follower-List</h1>
    <div class="follower_icon">
        @foreach ($followed_users as $followed_user)
        <a><img src="{{ asset('storage/' .$followed_user->images) }}" alt="フォロワーアイコン"></a>
        @endforeach
    </div>    
</div>

<!-- 投稿一覧 -->
<div>
    <ul>
        @foreach($posts as $post)
        <li class="followerlist_post_area">
            <div class="followerlist_box">
            <a href="{{URL::to('/users/' .$post->user_id. '/othersprofile')}}"><img src="{{ asset('storage/' .$followed_user->images) }}" alt="フォロワーアイコン"></a>

                <!-- 投稿左側 -->
                <div class="followerlist_content">
                    <div class="followerlist_left">
                        <div class="followerlist_name">{{ $post->user->username }}</div>
                        <div class="followerlist_post">{{ $post->post }}</div>
                    </div>
                </div>

                <!-- 投稿右側 -->
                <div class="followerlist_light">
                    <div class="followerlist_post_day">{{ $post->created_at }}</div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
