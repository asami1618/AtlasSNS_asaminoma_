@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="">
    <h1>[ フォローリスト ]</h1>
    @foreach ($follows as $follow)
    <ul>
        <li>
            <div class="follow_icon"><img src="{{ asset('storage/image'.$follow->user->images) }}" alt="フォローアイコン"></div>
        </li>
    </ul>
    @endforeach
</div>
@endsection