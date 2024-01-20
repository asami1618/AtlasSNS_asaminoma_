@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="follow-list">
    <div class="follow_icon">
    <h1 class="follow-List">Follow List</h1>
        @foreach ($followings as $following)
        <a><img src="{{ asset('storage/' .$following->images) }}" class="Follow-List-icon" alt="フォローアイコン"></a>
        @endforeach
    </div>    
</div>

<!-- 投稿一覧 -->
<div>
    <ul>
        @foreach($posts as $post)
        <li class="followlist_post_area">
            <!-- <div class="followlist_box"> -->
            <a href="{{URL::to('/users/' .$post->user_id.'/othersprofile')}}"><img src="{{ asset('storage/' .$following->images) }}" alt="フォローアイコン"></a>

                <!-- 投稿左側 -->
                <div class="followlist_content">
                    <div class="followlist_left">
                        <div class="followlist_name">{{ $post->user->username }}</div>
                        <div class="followlist_post">{{ $post->post }}</div>
                    </div>
                </div>

                <!-- 投稿右側 -->
                <div class="followlist_light">
                    <div class="followlist_post_day">{{ $post->created_at }}</div>
                </div>
            <!-- </div> -->
        </li>
        @endforeach
    </ul>
</div>
@endsection
