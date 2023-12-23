
@extends('layouts.logout')

<section>
    <div class="container">
    @section('content')
    <!-- 適切なURLを入力してください -->
            {!! Form::open(['url' => '/login']) !!}

            <div class="login_form">
                <p class="form">AtlasSNSへようこそ</p>

                <div class="input_form">
                {{ Form::label('e-mail') }}
                {{ Form::text('mail',null,['class' => 'input' ]) }}

                {{ Form::label('password') }}
                {{ Form::password('password',['class' => 'input']) }}
                </div>

                {{ Form::submit('Login') }}

                <p class="form"><a href="/register">新規ユーザーの方はこちら</a></p>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection
