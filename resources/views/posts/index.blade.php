@extends('layouts.login')

@section('content')
<div class="container">
    <h2>機能を実装していきましょう。</h2>
    {!! Form::open(['url' => '/added']) !!}
    {{Form::token()}}
    <div class="form-group">
    {!! Form::input('text','newPost', null, ['required','class' => 'form-control','placeholder' => '投稿内容' ]) !!}
    </div>
    <button type="submit" class="btn btn-succecs pull-right">追加</button>
    {!! Form::close() !!}

</div>




@endsection