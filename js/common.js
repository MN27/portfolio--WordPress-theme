$(function(){
  // メニュー表示切り替え
  $('.menu_trigger').on('click', function() {
    $('.menu_trigger').toggleClass('active');
    $('nav .sp').slideToggle('fast');
    return false;
  });

  // メニューの項目をクリックするとメニューを閉じる
  $('nav a').on('click', function() {
    $('.menu_trigger').removeClass('active');
    $('nav .sp').slideUp('fast');
  });

  // メニューの現在地の切り替え
  function presentSectionChange() {
    var scrollTop = $(window).scrollTop(); // 現在のスクロールの位置を取得

    $('section').each(function() {
      var elPosition = $(this).offset().top, // sectionのtopの位置を取得
          changePosition = elPosition + $(this).height() - 70; // 切り替え位置を設定
      
      // 現在のスクロール位置が、次の切り替え位置よりも小さいときのみ処理
      if ( scrollTop < changePosition ) {
        var changeId = $(this).attr('id');
        
        // スクロール前のsectionとスクロール後のsectionが異なる場合には処理を行う
        if ( presentId !== changeId ) {
          var href = '[href^="#' + changeId + '"]';
          $('nav a').removeClass('present');
          $('nav li').find(href).addClass('present');
          presentId = changeId;
        }

        return false;
      }
    });
  }

  // スクロールアニメーション
  function scrollAddClass(findClassName, addClassName) {
    var windowH = $(window).height(),
        scrollCenter = $(window).scrollTop() + (windowH / 2);
    
    $(findClassName).each(function() {
      var elPosition = $(this).offset().top + ($(this).height() / 2);

      // 下からのスクロールにも対応
      // 要素の位置から現在のスクロール位置を引いた数値が、画面の高さの1/3より小さければ描画する
      if ( Math.abs(elPosition - scrollCenter) < (windowH / 3) ) {
        $(this).addClass(addClassName);
      }
    });
  }
  
  var presentId;
  $(window).scroll(function() {
    presentSectionChange();
    scrollAddClass('.draw', 'draw_active');
    scrollAddClass('.fade', 'fade_in');
  });

  // スムーススクロール
  $('a[href^="#"]').click(function(){

    // .no_scrollクラスを持つa要素はスクロールしない（メニュー表示ボタン対策）
    if ( $(this).hasClass('no_scroll') ) {
      return false;
    }

    var speed = 500,
        href= $(this).attr('href'),
        target = $(href == '#' || href == "" ? 'html' : href),
        position = target.offset().top;
    $('html, body').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
});
