$(document).ready(function() {

var add = $('.add-btn');
    // ボタン非表示
    add.hide();
    // 100px スクロールしたらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            add.fadeIn();
        } else {
            add.fadeOut();
        }
     });
     
     
     
     $(function(){
            
            // var channel = [
            //     {'name': 'mel','fee': 10},
            //     {'name': 'raku','fee': 3.85},
            //     {'name': 'yah','fee': 10},
            //     {'name': 'premium','fee': 8.8},
            //     {'name': 'otherapp','fee': 0}
            // ];
            
            $("#sales_channel").on("change", function(){
                var val = $(this).val();
                
                
                
                switch (val) {
                    case 'mel':
                        $("#fee").val(10);
                        // $("#fee").prop("disabled", true);
                        break;
                        
                    case 'raku':
                        $("#fee").val(3.85);
                        // $("#fee").prop("disabled", true);
                        break;
                        
                    case 'yah':
                        $("#fee").val(10);
                        // $("#fee").prop("disabled", true);
                        break;
                        
                    case 'premium':
                        $("#fee").val(8.8);
                        // $("#fee").prop("disabled", true);
                        break;
                    
                    case 'otherapp':
                        $("#fee").val(0);
                        // $("#fee").prop("disabled", false);
                        break;
                    
                }
                
                
            // for(i = 0; i < channel.length; i++)
            // {
            //     if(val == 'channel.name')
            //     // if(val == channel[i].name) // channelは配列なのでまず[]で番号を指定する必要があります。
            //     {
            //         $("#fee").val(channel.fee);
            //         // $("#fee").val(channel[i].fee); // 上記と同様です。
            //     }
            
            // }    
                
            });
            
            $("#sales_channel").trigger("change");
        });
        
        
        $(function () {
            $('#tooltip').hide();
            $('.tool').hover(
            function () {
                $(this).children('#tooltip').fadeIn('fast');
            },
            function () {
                $(this).children('#tooltip').fadeOut('fast');
            });
        });


        $(function () {
            $('#tooltip2').hide();
            $('.tool2').hover(
            function () {
                $(this).children('#tooltip2').fadeIn('fast');
            },
            function () {
                $(this).children('#tooltip2').fadeOut('fast');
            });
        });


    $('.menu-btn').on('click', function(){
        $('.mobile-content').toggleClass('is-active');
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
    
    
    $('.listmenu-btn').on('click', function(){
        $('.mobile-content').toggleClass('is-active');
    });
  　
  　
  　var flag = false;
    $('.listmenu-btn').on('click', function () {
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
    
    // $(function(){
    // $(".menu-plus").on("click", function() {
    // $(this).next().slideToggle();
    // });
    // });
    
    
     
     // アコーディオン
    $('.search-icon').click(function() {
    // var header = $('this').find('.header');
    $('.search-icon > i').hide();
    var menumore = $('.menu-more');
    
    if(menumore.hasClass('open')) { 
      menumore.removeClass('open');
      
      menumore.slideUp();

      
      $('.search-icon').html('<i class="fas fa-search-plus fa-4x"></i>');
      
    } else {
      menumore.addClass('open');
      
      menumore.slideDown();
      
      
      $('.search-icon').html('<i class="far fa-window-close fa-4x"></i>');
      
    }
  });
});