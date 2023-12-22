@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="follow-list">
    <h1>Follow-List</h1>
    <div class="follow_icon">
        @foreach ($followings as $following)
        <a><img src="{{ asset('storage/' .$following->images) }}" alt="フォローアイコン"></a>
        @endforeach
    </div>    
</div>


<div class="">
    <h1> Post List </h1>
    <table class='table table-hover'>
        
        <div>
        @foreach($posts as $post)
            <tr>
                <th><a href="{{URL::to('/users/' .$post->user_id.'/othersprofile')}}"><img src="{{ asset('storage/' .$following->images) }}" alt="フォローアイコン"></th>
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
