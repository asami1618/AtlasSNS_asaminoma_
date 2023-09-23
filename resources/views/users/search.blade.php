@extends('layouts.login')

@section('content')
<!-- 検索機能 -->
<div class="serch-form">
    <form action="/serch" method="POST">
        @csrf
        <input type="serch" name="keyword" class="form" placeholder="ユーザー名">
        <p class="pull-right"><a href="/search"><button>ユーザー検索</button></a></p>
        <a class="btn btn-success"><img src="{{ asset('/images/search.png') }}" width="30" height="30"></a>
</div>

@endsection