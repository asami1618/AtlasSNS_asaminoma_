@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="follow-list-wrapper">
    <h1 class="follow-List">Follow List</h1>
    <div class="follow_icon">
        @foreach ($followings as $following)
        <a href="{{URL::to('/users/' .$following->id.'/othersprofile')}}"><img src="{{ asset('storage/' .$following->images) }}" class="Follow-List-icon" width="70" height="70"></a>
        @endforeach
    </div>    
</div>

<!-- 投稿一覧 -->
<div>
    <ul class="post-area">
        <!-- 投稿アイコン -->
        @foreach($posts as $post)
        <li class="post-block">
            <div class="post-contents">
                <a href="{{URL::to('/users/' .$post->user_id.'/othersprofile')}}"><img src="{{ asset('storage/' .$following->images) }}" class="Follow-List-icon" width="70" height="70"></a>

                <!-- 投稿エリア -->
                <div class="post_area">
                    <div class="post_left">
                        <div class="followlist_name">{{ $post->user->username }}</div>
                        <div class="followlist_post">{!! nl2br($post->post) !!}</div>
                    </div>
                </div>
                <div class="followlist_post_day">{{ $post->created_at->format('Y-m-d H:i') }}</div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
