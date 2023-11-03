@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="">
    <h1>[ フォローリスト ]</h1>
    <div class="follow_icon">
        @foreach ($followings as $following)
        <a><img src="{{ asset('/storage/images/'.$following->user->images) }}" alt="フォローアイコン"></a>
        @endforeach
    </div>    
</div>
@endsection