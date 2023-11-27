@extends('layouts.login')

@section('content')
<div class="container">
    <div class="profile">
        @if( Request::routeIs('profile') )
        <div class="my_profile">
            <img src="{{ asset('storage/' .$user->images ) }}" alt="" width="50" height="50">
        </div>
            <div class="">
                <p>{{ Auth::user()->username }}</p>
            </div>
        @else
        @foreach($posts as $post)
        <div class="images">
            <img src="{{ asset('storage/' .$user->images ) }}" alt="" width="30" height="30">
        </div>
            <div class="othersProfile">
                <p>{{$post->username}}</p>
                <p>{{$post->bio}}</p>
            </div>
        @endforeach
        @endif            
    </div>
</div>
@endsection