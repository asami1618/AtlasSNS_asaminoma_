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
        <!-- ①<div class="accordion">
            ②<div class="accordion-container">
                ③<div class="accordion-item">
                    ④<h3 class="accordion-title js-accordion-title">アコーディオンタイトル1</h3>
                    /.accordion-title
                    <div class="accordion-content">
                    <p>コンテンツが入ります。</p>
                </div>
            /.accordion-content
            </div>
        /.accordion-item -->
<header>
    <!-- アコーディオンメニュー -->
        <div id = "head">
            <a href="{{ URL::to('/top') }}"><img src="{{ asset('/images/atlas.png') }}" class="title" width="110" height="40"></a>
            <div class="accordion_area">
                <div class="accordion"> 
                <div class="accordion-container">
                <a><img src="{{ asset('storage/' .Auth::user()->images }}" class="login_icon" width="50" height="50"></a>
                    <h3 class="accordion-title js-accordion-title">{{ Auth::user()->username }} さん</h3>
                        <div class="accordion-content">
                            <ul class="menu">
                                <li><a class="home" href="{{ URL::to('/top') }}">HOME</a></li>
                                <li><a class="profile" href="{{ URL::to('/users/profile') }}">PROFILE</a></li>
                                <li><a class="center" href="{{ URL::to('/logout') }}">LOGOUT</a></li>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
</header>

<!-- サイドバー -->
<body>
    <div id="row">
        <div id="container">
        @yield('content')
        </div>      
        <div id="side-bar">            
            <div id="confirm">
                <p class="list_user_name">{{ Auth::user()->username }}さんの</p>
                <div class="follow_box">
                    <div class="confirm_follow">
                        <p class="follows_count">
                            <a class="count1">フォロー数:{{ Auth::user()->follows()->get()->count() }}名</a>
                        </p>
                        <div class="list_area1">
                            <p class="btn btn-follow-list"><a href="/follow-list">フォローリスト</a></p>
                        </div>
                        <p class="follower_count"><a class="count2">フォロワー数:{{ Auth::user()->follower()->get()->count() }}名</a></p>
                        <div class="list_area2">
                            <p class="btn btn-follower-list" ><a href="/follower-list">フォロワーリスト</a></p>
                        </div>
                        <div class="search_area">
                            <p class="btn btn-search"><a href="/search">ユーザー検索</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
