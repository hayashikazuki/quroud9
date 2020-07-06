<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
    </head>
    <body>
    <?php
    
    try
    {
        
    require_once('../common/common.php');
    
    $hurugi_code=$_GET['hurugicode'];
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql ='SELECT namecode,name,stocking,expect,sale,shop,date,saledate,remarks,gazou FROM hurugi_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$hurugi_code;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $hurugi_namecode=$rec['namecode'];
    $hurugi_name=$rec['name'];
    $hurugi_stocking=$rec['stocking'];
    $hurugi_expect=$rec['expect'];
    $hurugi_sale=$rec['sale'];
    $hurugi_shop=$rec['shop'];
    $hurugi_date=$rec['date'];
    $hurugi_saledate=$rec['saledate'];
    $hurugi_remarks=$rec['remarks'];
    $hurugi_gazou_name_old=$rec['gazou'];
    
    $dbh=null;
    
    if($hurugi_gazou_name_old=='')
    {
        $disp_gazou='';
    }
    else
    {
        $disp_gazou='<img src="./gazou/'.$hurugi_gazou_name_old.'">';
    }
    
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
    
    商品修正
    
    
    <form action="hurugi_edit_done.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="code" value="<?php print $hurugi_code; ?>">
        <input type="hidden" name="gazou_name_old" value="<?php print $hurugi_gazou_name_old; ?>">
            <p>商品コード</p>
            <input type="text" name="namecode" required value="<?php print $hurugi_namecode; ?>">
            <br />
            <p>商品名</p>
            <input type="text" name="name" required value="<?php print $hurugi_name; ?>">
            <br />
            <p>仕入額</p>
            <input type="text" name="stocking" value="<?php print $hurugi_stocking; ?>">円
            <br />
            <p>販売予想額</p>
            <input type="text" name="expect" value="<?php print $hurugi_expect; ?>">円
            <br />
            <p>販売額</p>
            <input type="text" name="sale" value="<?php print $hurugi_sale; ?>">円
            <br />
            <p>仕入先</p>
            <input type="text" name="shop" required value="<?php print $hurugi_shop; ?>">
            <br />
            <p>購入日</p>
            <input type="date" name="date" required value="<?php print $hurugi_date; ?>">
            <br />
            <p>販売日</p>
            <input type="date" name="saledate" required value="<?php print $hurugi_saledate; ?>">
            <br />
            <p>備考欄</p>
            <input name="remarks" rows="5" cols="30" style="resize:none" value="<?php print $hurugi_remarks; ?>">
            <br />
            <p>画像</p>
            <br />
            <?php print $disp_gazou; ?>
            <br />
            <input type="file" name="gazou">
            <br />
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="OK">
    </body>
</html>
    