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
    
    
    $dbh = null;
    
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
    
    <p>参照</p>
    <?php print $disp_gazou; ?><br />
    <br />
    <ul>
        <li>商品コード：<?php print $hurugi_namecode; ?></li>
        <li>商品名：<?php print $hurugi_name; ?></li>
        <li>仕入額：<?php print $hurugi_stocking; ?></li>
        <li>販売予想額：<?php print $hurugi_expect; ?></li>
        <li>販売額：<?php print $sale; ?></li>
        <li>利益：<?php print $rec['sale']-$rec['stocking']; ?></li>
        <li>利益率：<?php print ($rec['sale']-$rec['stocking']) / $rec['sale'] * 100; ?></li>
        <li>仕入先：<?php print $hurugi_shop; ?></li>
        <li>購入日時：<?php print $hurugi_date; ?></li>
        <li>販売日時：<?php print $hurugi_saledate; ?></li>
        <li>備考：<?php print $hurugi_remarks; ?></li>
    </ul>
    
    <form method="post" action="hurugi_branch.php">
        <input type="hidden" name="hurugicode" value="<?php print $hurugi_code; ?>">
        <input type="submit" value="修正" name="edit">
        <input type="submit" value="削除" name="delete">
    </form>
    
    
    <a href="hurugi_list.php">一覧へ戻る</a>
    
    </body>
</html>