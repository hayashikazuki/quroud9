$(document).ready(function() {




$('.menu-btn').on('click', function(){
        $('.mobile-content').toggleClass('is-active');
    });
    
 
    $(".animate-text").letterfx({
        "fx": "fall",
        "backwards": false,
        "timing": 60,
        "fx_duration": "350ms",
        "letter_end": "restore",
        "element_end": "restore"
  　});
  　
  　
  　var flag = false;
    $('.menu-btn').on('click', function () {
        if (flag == false) {
            bodyFix(); // bodyを固定させる関数
 
            // その他、ナビを開くときに起きるあれこれを記述
            flag = true;
            
        } else {
            closeNavi();
            flag = false;
        }
    });

    //ナビを閉じるときの関数
    function closeNavi() {
        bodyFixReset(); // body固定を解除する関数
 
        // その他、ナビを閉じるときに起きるあれこれを記述
 
    }
 
    //以下、bodyを固定する関数
    var bodyElm = $('body');
    var scrollPosi;
    function bodyFix() {
        scrollPosi = $(window).scrollTop();
        bodyElm.css({
            'position': 'fixed',
            'width': '100%',
            'z-index': '1',
            'top': -scrollPosi
         });
    }
 
    //以下、body固定を解除する関数
    function bodyFixReset() {
        bodyElm.css({
          'position': 'relative',
          'width': 'auto',
          'top': 'auto'
    });
    
    //scroll位置を調整
    $('html, body').scrollTop(scrollPosi);
    }
    
    
});