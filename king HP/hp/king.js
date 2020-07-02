$(document).ready(function() {
    
    $('.works-btn').delay(400).queue(function(next) {
        $(this).addClass('hover').delay(1800).queue(function(next) {
            $(this).removeClass('hover');
        });
        next();
    });
    
    $('.about-btn').click(function(){
    $("html,body").animate({
        scrollTop:$('#about-btn').offset().top
    },500);
    });
    
    $('.skills-btn').click(function(){
    $("html,body").animate({
        scrollTop:$('#skills-btn').offset().top
    },500);
    });
    
    $('.works-btn1').click(function(){
    $("html,body").animate({
        scrollTop:$('#works-btn1').offset().top
    },500);
    });
    
    $('.contact-btn').click(function(){
    $("html,body").animate({
        scrollTop:$('#contact-btn').offset().top
    },500);
    });
    
    var pagetop = $('.top-btn');
    // ボタン非表示
    pagetop.hide();
    // 100px スクロールしたらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
     });
    
    $('.top-btn,.header-img').click(function(){
        $('body,html').animate({
            scrollTop:0
        },500);
        return false;
    });
    
    
    $(window).scroll(function() {
        
    // まずスクロール量を取得します
    var scroll = $(this).scrollTop();
    
    // 背景が黒くなっている辺りが1800だったのでそこを基準にします
    var maxScroll = 2000;
    
    // 基準値に対してどの程度スクロールされているかの割合を計算します
    var per = 1 - scroll / maxScroll;
    per = Math.round(per * 1000) / 1000;
    
    // 計算した割合を背景画像のopacityとして設定します
    $('.parallax-slider').css('opacity', per);
    
    // 割合が0以下になったら（1800以上スクロールされたら）背景画像を切り替えます
    if(per < 0){
        $('.parallax-slider').attr('src', 'img/pawel-czerwinski-lt891TUy6iw-unsplash.jpg').css('opacity', 1);
    }else{
        $('.parallax-slider').attr('src', 'img/pawel-czerwinski-rCbJXrD1l0Y-unsplash.jpg');
    }
    
    if(scroll > 3800)
    {
        $('.parallax-slider').attr('src', 'img/Blackout-hashtag-activism-e1591217908862.jpg');
    }
    
    });
    
    

  
    $('.menu-btn').on('click', function(){
        $('.menu').toggleClass('is-active');
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



