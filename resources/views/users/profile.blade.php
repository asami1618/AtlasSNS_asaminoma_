@extends('layouts.login')

@section('content')
<div class="container">
    <div class="profile">
        <div class="images">
            @foreach($datas as $data)
            <img src="{{ asset('storage/' .$data->images ) }}" alt="" width="50" height="50">
            @endforeach
        </div>
            <div class="usersProfile">
                <p class="Name">{{$data->username}}</p>
                <p class="Bio">{{$data->bio}}</p>
            </div>
    </div>
</div>
@endsection