@extends('layouts.login')
@section('content')

<!-- 投稿フォーム -->
<div class="container">
    {!! Form::open(['url' => '/added']) !!}
    {{Form::token()}}
    <div>
        {!! Form::input('text','newPost', null, ['required','class' => 'form-control','placeholder' => '投稿内容を入力してください' ]) !!}
        <div class="post_bnt">
            <img src="{{ asset('/images/post.png') }}" class="submit_button" width="42" height="42">
        </div>
        <!-- <div class="post_icon">
        </div> -->
    </div>
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
        </div>
    </div> 
</body>

<!-- 投稿一覧 -->
<div>
    <ul class ="post-area">
        <!-- 投稿アイコン -->
        @foreach ( $posts as $post )
        <li class="post-block">
        <figure><img src="{{ asset('storage/' .$post->user->images) }}"></figure>

        <!-- 投稿エリア -->
            <div class="post_area">
                <div class="post_left">
                    <div class="post-name">{{ $post->user->username}} さん</div>
                    <div class="post_content">{{ $post->post }}</div>
                </div>
            </div>

            <!-- 投稿日時 ボタンエリア -->
            <div class="post_right">
                <div class="post-day">{{ $post->created_at }}</div>
                <div class="post_button">
                    <!-- 編集ボタン -->
                    <a class="js-modal-open" href="/post/{{ $post->id }}/update" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('/images/edit.png') }}" alt="modal01" width="30" height="30"></a>
                    <!-- 削除ボタン -->
                    @method('delete')
                    <a class="btn btn-danger" href="/post/{{ $post->id }}/delete" post="{{ $post->post }}" onclick="return confirm('投稿を削除してもよろしいでしょうか？')" >
                        <img src="{{ asset('/images/trash.png') }}" width="30" height="30">
                        <img src="{{ asset('/images/trash-h.png') }}"  width="30" height="30">
                    </a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection