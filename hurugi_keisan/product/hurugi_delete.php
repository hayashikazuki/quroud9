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
    
    $sql ='SELECT name,stocking,sale,shop,date,remarks FROM hurugi_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$hurugi_code;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $hurugi_name=$rec['name'];
    $hurugi_stocking=$rec['stocking'];
    $hurugi_sale=$rec['sale'];
    $hurugi_shop=$rec['shop'];
    $hurugi_date=$rec['date'];
    $hurugi_remarks=$rec['remarks'];
    
    $dbh=null;
    
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
    
    <p>商品修正</p>
    <?php print $hurugi_name; ?><br />
    <p>を消去してもよろしいですか？</p>
    
    <form action="hurugi_delete_done.php" method="post">
    <input type="hidden" name="code" value="<?php print $hurugi_code; ?>">
    <input type="hidden" name="name" value="<?php print $hurugi_name; ?>">
    <input type="hidden" name="stocking" value="<?php print $hurugi_stocking; ?>">
    <input type="hidden" name="sale" value="<?php print $hurugi_sale; ?>">
    <input type="hidden" name="shop" value="<?php print $hurugi_shop; ?>">
    <input type="hidden" name="date" value="<?php print $hurugi_date; ?>">
    <input type="hidden" name="remarks" value="<?php print $hurugi_remarks; ?>">
    <br />
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
    </body>
</html>
    