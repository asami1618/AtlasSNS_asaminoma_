@extends('layouts.login')

@section('content')
<div class="container">
    {!! Form::open(['url' => '/added']) !!}
    {{Form::token()}}
    <div class="form-group">
    {!! Form::input('text','newPost', null, ['required','class' => 'form-control','placeholder' => '投稿内容' ]) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">追加</button>

    {!! Form::close() !!}
</div>
<!-- モーダル -->
<body>
        <!-- モーダルの中身 -->
        <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="" method="">
                <textarea name="" class="modal_post"></textarea>
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
            </form>
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div> 
        <h2 class="page-header">投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th>{{ Auth::user()->username }}</th>
                <th>No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
                <th></th>
            </tr>
            @foreach ( $posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                <td><a class="js-modal-open" href="/post/{{ $post->id }}" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('/images/edit.png') }}" alt="modal01" width="30" height="30"></a></td>
                <td><img src="{{ asset('/images/trash.png') }}" width="30" height="30"></td>
            </tr>
            @endforeach
        </table>
    </div >
</body>

@endsection