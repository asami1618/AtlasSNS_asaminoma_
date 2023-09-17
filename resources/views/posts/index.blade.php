@extends('layouts.login')

@section('content')
<div class="container">
    <h2>機能を実装していきましょう。</h2>
    {!! Form::open(['url' => '/added']) !!}
    {{Form::token()}}
    <div class="form-group">
    {!! Form::input('text','newPost', null, ['required','class' => 'form-control','placeholder' => '投稿内容' ]) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">追加</button>

    {!! Form::close() !!}
</div>
<div class="modalopen" data-target="modal01"></div>
            <div class="modal-main js-modal" id="modal01">
                <div class="modal-innner"> 
                    <div class="inner-content">
                        <p class="inner-text"></p>
                        
                        <p class="send-button modalClose"></p>
                    </div>
                </div>
            </div>
            <h2 class="page-header">投稿一覧</h2>
            <table class='table table-hover'>
                <tr>
                    <th>{{ Auth::user()->username }}</th>
                    <th>No</th>
                    <th>投稿内容</th>
                    <th>投稿日時</th>
                </tr>
                @foreach ( $posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user_id }}</td>
                    <td>{{ $post->post }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td><img src="{{ asset('/images/edit.png') }}" alt="modal01" width="30" height="30"></td>
                    <td><img src="{{ asset('/images/trash.png') }}" width="30" height="30"></td>
                </tr>
                @endforeach
            </table>
        </div >


@endsection