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
            <form action="/post/update" method="POST">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="UPDATE">
                <input type="submit" href="/top" value="更新">
                {{ csrf_field() }}
            </form>
            <a class="js-modal-close" href="">閉じる</a>
                <!-- {!! Form::close() !!} -->
        </div>
    </div> 

    <h2 class="page-header">[ 投稿一覧 ]</h2>
        <table class='table table-hover'>
            <div class="btn">
            <tr>
                <th>[ 投稿したユーザー ]</th>
                <th>[ 投稿内容 ]</th>
                <th>[ 投稿日時 ]</th>
                <th>[ 更新日時 ]</th> 
                <th></th>
                <th></th>
            </tr>
            @foreach ( $posts as $post )
            <tr>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <!-- 編集ボタン -->
                <td><a class="js-modal-open" href="/post/{{ $post->id }}/update" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('/images/edit.png') }}" alt="modal01" width="30" height="30"></a></td>
                <!-- 削除ボタン -->
                @method('delete')
                <td>
                    <a class="btn btn-danger" href="/post/{{ $post->id }}/delete" post="{{ $post->post }}" onclick="return confirm('投稿を削除してもよろしいでしょうか？')" >
                    <img src="{{ asset('/images/trash.png') }}" alt="1" width="30" height="30">
                    <img src="{{ asset('/images/trash-h.png') }}" alt="2" width="30" height="30">
                    </a>
                </td>
            </tr>
            </div>
            @endforeach
        </table>
    </div >
</body>

@endsection