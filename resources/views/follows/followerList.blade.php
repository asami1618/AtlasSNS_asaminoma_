@extends('layouts.login')

@section('content')

<!-- フォローされている人のアイコン一覧 -->
<div class="">
    <h1>[ フォロワーリスト ]</h1>
    <div class="follower_icon">
        @foreach ($followed_users as $followed_user)
        <a><img src="{{ asset('storage/' .$followed_user->images) }}" alt="フォロワーアイコン"></a>
        @endforeach
    </div>    
</div>

<div class="">
    <h1>[ 投稿一覧 ]</h1>
    <table class='table table-hover'>
        @foreach($posts as $post)
            <tr>
                <th><a href="{{URL::to('/users/' .$post->user_id. '/othersprofile')}}"><img src="{{ asset('storage/' .$followed_user->images) }}" alt="フォロワーアイコン"></a></th>
                <th>[ 投稿内容 ]</th>
                <th>[ 投稿日時 ]</th>
                <th>[ 更新日時 ]</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>{{ $post->user->username }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
        @endforeach
    </table>
</div>

@endsection