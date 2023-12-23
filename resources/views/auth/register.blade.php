@extends('layouts.logout')



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

<section>
    <div class="container">
        @section('content')
        <!-- 適切なURLを入力してください -->
        {!! Form::open(['url' => '/register']) !!}

        <div class="login_form">
            <p class="form">新規ユーザー登録</p>

            <div class="input_form">
                {{ Form::label('username') }}
                {{ Form::text('username',null,['class' => 'input']) }}

                {{ Form::label('mail') }}
                {{ Form::text('mail',null,['class' => 'input']) }}

                {{ Form::label('password') }}
                {{ Form::text('password',null,['class' => 'input']) }}

                {{ Form::label('password confirm') }}
                {{ Form::text('password_confirmation',null,['class' => 'input']) }}

                {{ Form::submit('登録') }}
                <p><a href="/login">ログイン画面へ戻る</a></p>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection


