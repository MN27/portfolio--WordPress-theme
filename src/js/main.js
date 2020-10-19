jQuery(function () {
  // メニュー表示切り替え
  jQuery('.menu_trigger').on('click', function () {
    jQuery('.menu_trigger').toggleClass('active');
    jQuery('nav .sp').slideToggle('fast');
    return false;
  });

  // メニューの項目をクリックするとメニューを閉じる
  jQuery('nav a').on('click', function () {
    jQuery('.menu_trigger').removeClass('active');
    jQuery('nav .sp').slideUp('fast');
  });

  // メニューの現在地の切り替え
  function presentSectionChange() {
    var scrollTop = jQuery(window).scrollTop(); // 現在のスクロールの位置を取得

    jQuery('section').each(function () {
      var elPosition = jQuery(this).offset().top, // sectionのtopの位置を取得
        changePosition = elPosition + jQuery(this).height() - 70; // 切り替え位置を設定

      // 現在のスクロール位置が、次の切り替え位置よりも小さいときのみ処理
      if (scrollTop < changePosition) {
        var changeId = jQuery(this).attr('id');

        // スクロール前のsectionとスクロール後のsectionが異なる場合には処理を行う
        if (presentId !== changeId) {
          var href = '[href^="#' + changeId + '"]';
          jQuery('nav a').removeClass('present');
          jQuery('nav li').find(href).addClass('present');
          presentId = changeId;
        }
        return false;
      }
    });
  }

  // スクロールアニメーション
  function scrollAddClass(findClassName, addClassName) {
    var windowH = jQuery(window).height(),
      scrollCenter = jQuery(window).scrollTop() + windowH / 2;

    jQuery(findClassName).each(function () {
      var elPosition = jQuery(this).offset().top + jQuery(this).height() / 2;

      // 下からのスクロールにも対応
      // 要素の位置から現在のスクロール位置を引いた数値が、画面の高さの1/3より小さければ描画する
      if (Math.abs(elPosition - scrollCenter) < windowH / 3) {
        jQuery(this).addClass(addClassName);
      }
    });
  }

  var presentId;
  jQuery(window).scroll(function () {
    presentSectionChange();
    scrollAddClass('.draw', 'draw_active');
    scrollAddClass('.fade', 'fade_in');
  });

  // スムーススクロール
  jQuery('a[href^="#"]').click(function () {
    // .no_scrollクラスを持つa要素はスクロールしない（メニュー表示ボタン対策）
    if (jQuery(this).hasClass('no_scroll')) {
      return false;
    }

    var speed = 500,
      href = jQuery(this).attr('href'),
      target = jQuery(href == '#' || href == '' ? 'html' : href),
      position = target.offset().top;
    jQuery('html, body').animate({ scrollTop: position }, speed, 'swing');
    return false;
  });
});
