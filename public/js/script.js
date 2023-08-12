// 8/12 追記

// <jQuery 基本構文>
// $(‘セレクタ／#id／.class’).メソッド(‘引数’);
// ↓↓↓
// $(‘HTML要素に’).どんな動きor機能を加えるか(‘より具体的に’);

// 指定した要素をクリックするとクリックした要素のcssのcolorプロパティの値がピンクになる
// $(function(){//ーーー① 
//   $(".pink").click(function(){//ーーー②　
//     $(this).css('color','pink');//ーーー③
//   });
// });

// ①関数を設定する
// ②「.pink」要素に対して、clickイベントを発生させる。
// ③click(function(){〇〇})の〇〇のなかに、clickイベント発生時に動かす処理を記述する。
// 「this」は直近のセレクタを指すのでここでのthisは「.pink」と同じ意味になる。

jQuery(function ($) {
    $('.js-accordion-title').on('click' ,function () {
        // クリックでコンテンツを開閉
        $(this).next().slideToggle(200);
        // 矢印の向きを変更
        $(this).toggleClass('open', 200);
    }).next().hide();
});
