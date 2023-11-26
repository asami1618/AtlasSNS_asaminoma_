@extends('layouts.login')

@section('content')
<div class="container">
    <div class="profile">
        @if( Request::routeIs('profile') )
        <div class="my_profile">
            <img src="{{ asset('storage/' .$user->images ) }}" alt="" width="30" height="30">
        </div>
            <div class="">
                <p>{{$user->username}}</p>
                <p>{{$user->bio}}</p>
            </div>
        @elseif( Request::routeIs('othersprofile') )
        <div class="images">
            <img src="{{ asset('storage/' .$user->images ) }}" alt="" width="30" height="30">
        </div>
            <div class="othersProfile">
                <p>{{$user->username}}</p>
                <p>{{$user->bio}}</p>
            </div>
        @endif            
    </div>
</div>
@endsection