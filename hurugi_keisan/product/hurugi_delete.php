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
    $hurugi_gazou_name=$rec['gazou'];
    
    $dbh=null;
    
    if($hurugi_gazou_name=='')
    {
        $disp_gazou='';
    }
    else
    {
        $disp_gazou='<img src="./gazou/'.$hurugi_gazou_name.'">';
    }
    
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
    
    <p>商品修正</p>
    <?php print $hurugi_name; ?><br />
    <br />
    <?php print $disp_gazou; ?><br />
    <p>を消去してもよろしいですか？</p>
    
    <form action="hurugi_delete_done.php" method="post">
    <input type="hidden" name="code" value="<?php print $hurugi_code; ?>">
    <input type="hidden" name="name" value="<?php print $hurugi_name; ?>">
    <input type="hidden" name="gazou_name" value="<?php print $hurugi_gazou_name; ?>">
    <br />
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
    </body>
</html>
    