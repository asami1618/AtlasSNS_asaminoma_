@extends('layouts.logout')

@section('content')

<div id="clear">
  <div>
    <p class="login-name">{{ session('username') }}さん</p>
    <p class="login-comment">ようこそ!AtlasSNSへ!</p>
  </div>

  <div>
    <p class="login-subcomment01">ユーザー登録が完了しました。</p>
    <p class="login-subcomment02">早速ログインをしてみましょう!</p>
  </div>

  <p><a href="/login"  class="btn btn-danger">ログイン画面へ</a></p>
</div>

@endsection