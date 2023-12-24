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
        $(this).next('.accordion-content').slideToggle(300);
        // 矢印の向きを変更
        $(this).toggleClass('open', 300);
    }).next().hide();
});

// モーダル部分
// $(function () {
//     $('.modalopen').each(function () {
//         $(this).on('click',function () {
//             var target = $(this).data('target');
//             var modal = document.getElementById(target);
//             console.log(modal);
//             $(modal).fadeIn();
//             return false;
//         });
//     });
//     $('modalClose').on('click',function () {
//         $('.js-modal').fadeOut();
//         return false;
//     });
// });

// モーダル処理
$(function(){
    // index.blade45行目→編集ボタン(class="js-modal-open")が押されると動作する
    $('.js-modal-open').on('click',function(){
        // モーダルの中身(class="js-modal")の表示
        $('.js-modal').fadeIn();
        // 押されたボタンから投稿内容を取得し変数へ格納
        var post = $(this).attr('post');
        // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
        var post_id = $(this).attr('post_id');

        // 取得した投稿内容をモーダルの中身へ渡す
        $('.modal_post').text(post);
        // 取得した投稿のidをモーダルの中身へ渡す
        $('.modal_id').val(post_id);
        return false;
    });

    // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
    $('.js-modal-close').on('click',function(){
        // モーダルの中身(class="js-modal")を非表示
        $('.js-modal').fadeOut();
        return false;
    });
});
