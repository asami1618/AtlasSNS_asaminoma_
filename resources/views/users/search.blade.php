@extends('layouts.login')

@section('content')
<!-- 検索フォーム -->
<div class="search-form">
    <form class="form-inline" action="{{ url('/search') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="keyword" value="{{ $keyword }}" class="form-control" placeholder="ユーザー名">
        </div>
        <p class="pull-right"><a href="/search"><button><img src="{{ asset('/images/search.png') }}" width="30" height="30"></button></a></p>
    </form>
</div>

<!--　検索ワード表示 -->
@if(!empty($keyword))
<p>検索ワード:{{ $keyword }}</p>
@endif


@endsection