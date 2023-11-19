@extends('layouts.login')

@section('content')

<!-- フォローされている人のアイコン一覧 -->
<div class="">
    <h1>[ フォロワーリスト ]</h1>
    <div class="follower_icon">
        @foreach ($followed_users as $followed_user)
        <a><img src="{{ asset('storage/' .$followed_user->images) }}" alt="フォロワーアイコン"></a>
        @endforeach
    </div>    
</div>

<div class="">
    <h1>[ 投稿一覧 ]</h1>
        @foreach($posts as $post)
            <p>名前:{{ $post->user->username }}</p>
            <p>{{ $post->post }}</p>
        @endforeach
</div>

@endsection