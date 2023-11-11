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
@endsection