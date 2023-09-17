<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>AtlasSNS</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('js/script.js') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        <div id = "head">
            <h1><a href="{{ URL::to('/top') }}"><img src="{{ asset('/images/atlas.png') }}" width="110" height="40"></a></h1>
            <div id="accordion">
                <div class="accordion-container">
                    <div class="accordion-title js-accordion-title">
                    <p>{{ Auth::user()->username }}  さん <img src="{{ asset('/images/icon1.png') }}" width="50" height="50"></p>
                        <ul class="menu">
                            <li>
                                <button class="accordion_btn" type="button">
                                    <li><a class="home" href="{{ URL::to('/top') }}">HOME</a></li>
                                    <li><a class="profile" href="{{ URL::to('/profile') }}">プロフィール</a></li>
                                    <li><a class="center" href="{{ URL::to('/logout') }}">ログアウト</a></li>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
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
                </tr>
                @endforeach
            </table>
        </div >
        <div class="modalopen" data-target="modal01"></div>
            <div class="modal-main js-modal" id="modal01">
                <div class="modal-innner">
                    <div class="inner-content">
                        <p class="inner-text"></p>
                        <p class="send-button modalClose"></p>
                    </div>
                </div>
            </div>
        <div id="side-bar">
            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follow-list"><button>フォローリスト</button></a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follower-list"><button>フォロワーリスト</button></a></p>
            </div>
            <p class="pull-right"><a class="but but-success" href="/search"><button>ユーザー検索</button></a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
