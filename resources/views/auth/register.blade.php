@extends('layouts.logout')
@section('content')
<section>


<!-- バリデーションメッセージ -->
@if($errors->any())
    <div class="register_error">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <!-- 適切なURLを入力してください -->
        {!! Form::open(['url' => '/register']) !!}
        <div class="login_form">
            <p class="form">新規ユーザー登録</p>

            <div class="form_input">
                {{ Form::label('username') }}
                {{ Form::text('username',null,['class' => 'input']) }}

                {{ Form::label('mail') }}
                {{ Form::text('mail',null,['class' => 'input']) }}

                {{ Form::label('password') }}
                {{ Form::password('password',['class' => 'input']) }}

                {{ Form::label('password confirm') }}
                {{ Form::password('password_confirmation',['class' => 'input']) }}
            </div>

            <div class="form_submit">
                {{ Form::submit('新規登録' , ['class' => 'btn btn-danger']) }}
            </div>

            <p><a href="/login" class="form">ログイン画面へ戻る</a></p>
        </div>
        {!! Form::close() !!}
    </div>
</section>
@endsection


