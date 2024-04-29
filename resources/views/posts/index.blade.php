@extends('layouts.login')
@section('content')

<!-- 投稿フォーム -->
<div class="post-form-container">
    {!! Form::open(['url' => '/added']) !!}
    {{Form::token()}}
    <div class="form-post">
        <!-- {!! Form::input ('text','newPost', null, ['required','class' => 'form-control','placeholder' => '投稿内容を入力してください' ]) !!} -->
        <a><img src="{{ asset('storage/' .Auth::user()->images ) }}" class="login_icon" width="50" height="50"></a>
        <textarea name="post" required class="form-control" placeholder="投稿内容を入力してください" cols="30" rows="10"></textarea>        
        <div class="post_bnt">
            <button class="submit_button"><img src="{{ asset('/images/post.png') }}" class="post_bnt" width="42" height="42"></button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
        <!-- バリデーションエラーメッセージ表示 -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


<!-- モーダル -->
<body>
    <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/post/update" method="POST">
                <textarea name="post" class="modal_post"></textarea>
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
    <ul class="post-area">
        <!-- 投稿アイコン -->
        @foreach ( $posts as $post )
        <li class="post-block">
            <div class="post-contents">
                <figure><img src="{{ asset('storage/' .$post->user->images) }}"></figure>

                <!-- 投稿エリア -->
                <div class="post_area">
                    <div class="post_left">
                        <div class="post-name">{{ $post->user->username}} さん</div>
                        <div class="post_content">{!! nl2br($post->post) !!}</div>
                    </div>
                </div>

                <!-- 投稿日時 ボタンエリア -->
                <div class="post_right">
                    <div class="post-day">{{ $post->created_at->format('Y-m-d H:i') }}</div>
                </div>
            </div>

            <div class="post_button">
                <!-- 編集ボタン -->
                <a class="js-modal-open" href="/post/{{ $post->id }}/update" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('/images/edit.png') }}" alt="modal01" width="30" height="30"></a>
                <!-- 削除ボタン -->
                @method('delete')
                <a class="delete-btn" href="/post/{{ $post->id }}/delete" post="{{ $post->post }}" onclick="return confirm('投稿を削除してもよろしいでしょうか？')" >
                    <img src="{{ asset('/images/trash.png') }}" width="30" height="30">
                    <img src="{{ asset('/images/trash-h.png') }}"  width="30" height="30">
                </a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection