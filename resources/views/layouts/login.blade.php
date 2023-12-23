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
    <!-- ヘッダー -->
    <header>
        <div id = "head">
            <a href="{{ URL::to('/top') }}"><img src="{{ asset('/images/atlas.png') }}" width="110" height="40"></a>
            <div id="accordion">
                <div class="accordion-container">
                    <div class="accordion-title js-accordion-title">
                    <p>{{ Auth::user()->username }}  さん <img src="{{ asset('/images/icon1.png') }}" width="50" height="50"></p>
                        <ul class="menu">
                            <li>
                                <button class="accordion_btn" type="button">
                                    <li><a class="home" href="{{ URL::to('/top') }}">HOME</a></li>
                                    <li><a class="profile" href="{{ URL::to('/users/profile') }}">プロフィール</a></li>
                                    <li><a class="center" href="{{ URL::to('/logout') }}">ログアウト</a></li>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    
        </div>
    </header>

<!-- サイドバー -->

    <div id="row">
        <div id="container">
        @yield('content')
        </div>      
        <div id="side-bar">            
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="follow_box">
                    <div class="confirm_follow">
                        <p>フォロー数:{{ Auth::user()->follows()->get()->count() }}名</p>
                        <p class="btn btn-follow-list"><a href="/follow-list">フォローリスト</a></p>
                        <p>フォロワー数:{{ Auth::user()->follower()->get()->count() }}名</p>
                        <p class="btn btn-follower-list" ><a href="/follower-list">フォロワーリスト</a></p>
                        <p class="btn btn-search"><a href="/search">ユーザー検索</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
