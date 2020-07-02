<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
    </head>
    <body>
    <?php
    
    require_once('../common/common.php');
    
    $post = sanitize($_POST);
    $hurugi_name=$post['name'];
    $hurugi_stocking=$post['stocking'];
    $hurugi_sale=$post['sale'];
    $hurugi_shop=$post['shop'];
    $hurugi_date=$post['date'];
    $hurugi_remarks=$post['remarks'];
    
    
    print'商品名：';
    print $hurugi_name;
    print'<br />';

    
    if(preg_match('/\A[0-9]+\z/',$hurugi_stocking)==0)
    {
        print'仕入額：';
        print'正しく半角数字で記入して下さい。';
        print'<br />';
    
    }
    else
    {
        print'仕入額：';
        print $hurugi_stocking;
        print'<br />';
    }
    
    if(preg_match('/\A[0-9]+\z/',$hurugi_sale)==0)
    {
        print'販売額：';
        print'正しく半角数字で記入して下さい。';
        print'まだ販売していないときは、"0"を入力して下さい。';
        print'<br />';
    }
    else
    {
        print'販売額：';
        print $hurugi_sale;
        print'<br />';
    }
    
    
    print'店名：';
    print $hurugi_shop;
    print'<br />';

    print '購入日：';
    print $hurugi_date;
    print'<br />';
    
    
    if(preg_match('/\A[0-9]+\z/',$hurugi_stocking)==0 || preg_match('/\A[0-9]+\z/',$hurugi_stocking)==0)
    {
        print'<form>';
        print'<input type="button" onclick="history.back()" value="戻る">';
        print'</form>';
    }
    else
    {
        print'上記の情報を追加します。<br />';
        print'<form method="post" action="hurugi_add_done.php">';
        print'<input type="hidden" name="name" value="'.$hurugi_name.'">';
        print'<input type="hidden" name="stocking" value="'.$hurugi_stocking.'">';
        print'<input type="hidden" name="sale" value="'.$hurugi_sale.'">';
        print'<input type="hidden" name="shop" value="'.$hurugi_shop.'">';
        print'<input type="hidden" name="date" value="'.$hurugi_date.'">';
        print'<input type="hidden" name="remarks" value="'.$hurugi_remarks.'">';
        print'<input type="button" onclick="history.back()" value="戻る">';
        print'<input type="submit" value="OK">';
        print'</form>';
    }
    
    
    ?>
    </body>
</html>