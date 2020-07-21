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
            //     {
            //         $("#fee").val(channel.fee);
            //     }
                    
            
            // }    
                
            });
            
            $("#sales_channel").trigger("change");
        });
     
});