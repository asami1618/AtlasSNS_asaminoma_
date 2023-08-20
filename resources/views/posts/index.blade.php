@extends('layouts.login')

@section('content')
<div class="container">
    <h2>機能を実装していきましょう。</h2>
    {!! Form::open(['url' => '/posts/index']) !!}
    {{Form::token()}}
    <div class="form-group">

    </div>


</div>




@endsection