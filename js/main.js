$(function() {
    // ==================================================
    // ナビゲーションの表示・非表示の切り替え
    // ==================================================
    var $nav = $('.nav');
    var $btn = $('.nav__btn');
    var $openBtn = $btn.find('.nav__btn-open');
    var $closeBtn = $btn.find('.nav__btn-close');

    $btn.on('click', function() {
        $nav.toggleClass('open');
        if ($nav.hasClass('open')) {
            $nav.stop(true).animate({
                left: '0px'
            }, 300);
            $closeBtn.css('opacity', 1);
            $openBtn.hide();
        } else {
            $nav.stop(true).animate({
                left: '-300px'
            }, 300);
            $closeBtn.css('opacity', 0);
            $openBtn.show();
        }
    });
});
