<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="width=device-width, initial-scale=1" />
  <title></title>
  <!-- BootstrapのCSS読み込み -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/logout.css') }} ">
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
      <div class="container">
        <div class="atlas_logo"><img src="images/atlas.png" width="110" height="40"></div>
        <p class="words">Social Network Service</p>
          <div id="container">
            @yield('content')
          </div>
      </div>
</header>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <!-- jQuery読み込み -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <!-- BootstrapのJS読み込み -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>