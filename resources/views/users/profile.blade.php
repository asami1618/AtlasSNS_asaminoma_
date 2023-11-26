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
        @else
        <div class="images">
            <img src="{{ asset('storage/' .$user->images ) }}" alt="" width="30" height="30">
        </div>
            <div class="othersProfile">
                <p>{{$user->username}}</p>
                <p>{{$user->bio}}</p>
            </div>
        @endif

            
        @if(auth()->user()->isFollowing($user->id))
        <!-- フォロー解除 -->
            <a href="{{ route('unfollow' , $user->id) }}" class="btn unfollow_btn">フォロー解除</a>
        @else
        <!-- フォローする -->
            <a href="{{ route('follow' , $user->id) }}" class="btn follow_btn">フォローする</a>
        @endif
    </div>
</div>
@endsection