@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/followerList']) !!}

{{Form::token()}}

{!! Form::close() !!}



@endsection