<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="width=device-width, initial-scale=1" />
    <title>AtlasSNS</title>
    <!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
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
    <a href="{{ URL::to('/top') }}"><img src="{{ asset('/images/atlas.png') }}" class="title" width="110" height="40"></a>
    <div class="accordion_area">
        <div class="accordion-container">
            <div class="accordion-title js-accordion-title">{{ Auth::user()->username }} さん</div>
            <div class="accordion-content">
                <ul class="menu">
                    <li><a class="home" href="{{ URL::to('/top') }}">HOME</a></li>
                    <li><a class="profile" href="{{ URL::to('/users/profile') }}">PROFILE</a></li>
                    <li><a class="center" href="{{ URL::to('/logout') }}">LOGOUT</a></li>
                </ul>
            </div>
            <a><img src="{{ asset('storage/' .Auth::user()->images ) }}" class="login_icon" width="50" height="50"></a>
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

                        <!-- フォロー -->
                        <div class="count1">フォロー数</div>
                            <p>{{ Auth::user()->follows()->get()->count() }}人</p>
                        <div class="list_area1">
                            <p><a href="/follow-list" class="btn btn-primary">フォローリスト</a></p>
                        </div>
                        <!-- フォロワー -->
                        <div class="count2">フォロワー数</div>
                            <p>{{ Auth::user()->follower()->get()->count() }}人</p>
                        <div class="list_area2">
                            <p><a href="/follower-list" class="btn btn-primary">フォロワーリスト</a></p>
                        </div>
                        <!-- 検索 -->
                        <div class="search_area">
                            <p><a href="/search" class="btn btn-primary">ユーザー検索</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
