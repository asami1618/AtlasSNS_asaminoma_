@extends('layouts.login')

@section('content')

<!-- フォローされている人のアイコン一覧 -->
<div class="follower-list">
    <h1>Follower-List</h1>
    <div class="follower_icon">
        @foreach ($followed_users as $followed_user)
        <a><img src="{{ asset('storage/' .$followed_user->images) }}" alt="フォロワーアイコン"></a>
        @endforeach
    </div>    
</div>

<div class="post_list">
    <h1> Post List </h1>
    <table class='table table-hover'>
        <div class="">
        @foreach($posts as $post)
            <tr>
                <th><a href="{{URL::to('/users/' .$post->user_id. '/othersprofile')}}"><img src="{{ asset('storage/' .$followed_user->images) }}" alt="フォロワーアイコン"></a></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>{{ $post->user->username }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
        @endforeach
        </div>
    </table>
</div>

@endsection