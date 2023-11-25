@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="">
    <h1>[ フォローリスト ]</h1>
    <div class="follow_icon">
        @foreach ($followings as $following)
        <a><img src="{{ asset('storage/' .$following->images) }}" alt="フォローアイコン"></a>
        @endforeach
    </div>    
</div>

<div class="">
    <h1>[ 投稿一覧 ]</h1>
    <table class='table table-hover'>
        @foreach($posts as $post)
            <tr>
                <th>[ ユーザー名 ]{{ $post->user->username }}<a href="{{URL::to('/users/{id}/profile')}}"><img src="{{ asset('storage/' .$following->images) }}" alt="フォローアイコン"></th>
                <th>[ 投稿内容 ]</th>
                <th>[ 投稿日時 ]</th>
                <th>[ 更新日時 ]</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
        @endforeach
    </table>
</div>
@endsection