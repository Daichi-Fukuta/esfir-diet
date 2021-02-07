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

// =========================================================
// 画面が開かれたときの初期設定
// =========================================================
window.onload = function() {
    // --- ブラウザのデフォルト言語を取得して初回の表示 ----- 
    var wDef = (navigator.browserLanguage || navigator.language || navigator.userLanguage).substr(0,2);
    langSet(wDef);
}
// =========================================================
// 選択された言語のみ表示
// =========================================================
function langSet(argLang){
    // --- 切り替え対象のclass一覧を取得 ----------------------
    var elm = document.getElementsByClassName("lang-change");
    
    for (var i = 0; i < elm.length; i++) {
        // --- 選択された言語と一致は表示、その他は非表示 -------
        if(elm[i].getAttribute("lang") == argLang){
            elm[i].style.display = '';
        } else {
            elm[i].style.display = 'none';
        }
    }
}