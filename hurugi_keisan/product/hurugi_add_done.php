<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
    </head>
    <body>
    <?php
    
    try{
    
    require_once('../common/common.php');
    
    $post = sanitize($_POST);
    $hurugi_namecode=$post['namecode'];
    $hurugi_name=$post['name'];
    $hurugi_stocking=$post['stocking'];
    $hurugi_expect=$post['expect'];
    $hurugi_sale=$post['sale'];
    $hurugi_shop=$post['shop'];
    $hurugi_date=$post['date'];
    $hurugi_saledate=$post['saledate'];
    $hurugi_remarks=$post['remarks'];
    
    $hurugi_gazou_name=$post['gazou_name'];
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'INSERT INTO hurugi_product(namecode,name,stocking,expect,sale,shop,date,saledate,remarks,gazou)VALUES(?,?,?,?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $hurugi_namecode;
    $data[] = $hurugi_name;
    $data[] = $hurugi_stocking;
    $data[] = $hurugi_expect;
    $data[] = $hurugi_sale;
    $data[] = $hurugi_shop;
    $data[] = $hurugi_date;
    $data[] = $hurugi_saledate;
    $data[] = $hurugi_remarks;
    $data[] = $hurugi_gazou_name;
    $stmt->execute($data);
    
    $dbh = null;
    
    print $hurugi_name;
    print 'を追加しました。<br />';
    
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    
    ?>
    
    <br />
    <a href="hurugi_add.php">さらに追加する</a>
    <br />
    <br />
    <a href="hurugi_list.php">戻る</a>
    </body>
</html>