@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="follow-list">
    <div class="follow_icon">
    <h1 class="follow-List">Follow List</h1>
        @foreach ($followings as $following)
        <figure><img src="{{ asset('storage/' .$following->images) }}" class="Follow-List-icon" alt="フォローアイコン"></figure>
        @endforeach
    </div>    
</div>

<!-- 投稿一覧 -->
<div>
    <ul class="post-area">
        <!-- 投稿アイコン -->
        @foreach($posts as $post)
        <li class="post-block">
            <a href="{{URL::to('/users/' .$post->user_id.'/othersprofile')}}"><img src="{{ asset('storage/' .$following->images) }}" alt="フォローアイコン"></a>

            <!-- 投稿エリア -->
            <div class="post_area">
                <div class="post_left">
                    <div class="followlist_name">{{ $post->user->username }}</div>
                    <div class="followlist_post">{{ $post->post }}</div>
                </div>
            </div>
            <div class="followlist_post_day">{{ $post->created_at->format('Y/m/d') }}</div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
