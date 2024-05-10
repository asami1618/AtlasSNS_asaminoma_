
@extends('layouts.logout')

<section>
@section('content')
    <div class="container">
    <!-- 適切なURLを入力してください -->
            {!! Form::open(['url' => '/login']) !!} 

        <div class="login_form">
            <p class="form">AtlasSNSへようこそ</p>

            <div class="form_input">
                {{ Form::label('e-mail') }}
                {{ Form::text('mail',null,['class' => 'input' ]) }}

                {{ Form::label('password') }}
                {{ Form::password('password',['class' => 'input']) }}
            </div>

            <div class="form_submit">
                {{ Form::submit('ログイン', ['class' => 'btn btn-danger']) }}
            </div>

            <p class="form"><a href="/register">新規ユーザーの方はこちら</a></p>

            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
