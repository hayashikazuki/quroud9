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
    
    $post = sanitize($_POST);
    $hurugi_code=$post['code'];
    $hurugi_namecode=$post['namecode'];
    $hurugi_name=$post['name'];
    $hurugi_stocking=$post['stocking'];
    $hurugi_expect=$post['expect'];
    $hurugi_sale=$post['sale'];
    $hurugi_shop=$post['shop'];
    $hurugi_date=$post['date'];
    $hurugi_saledate=$post['saledate'];
    $hurugi_remarks=$post['remarks'];
    
    $hurugi_gazou_name_old = $post['gazou_name_old'];
    $hurugi_gazou = $_FILES['gazou'];
    
    if($hurugi_gazou['size'] > 0)
    {
        if($hurugi_gazou['size'] > 1000000)
        {
            print'画像が大き過ぎます。';
        }
        else
        {
            move_uploaded_file($hurugi_gazou['tmp_name'],'./gazou/'.$hurugi_gazou['name']);
        }
    }
    
    
     if(preg_match('/\A[0-9]+\z/',$hurugi_stocking)==0 || preg_match('/\A[0-9]+\z/',$hurugi_sale)==0 || preg_match('/\A[0-9]+\z/',$hurugi_expect)==0 || $hurugi_gazou['size'] > 1000000)
    {
        print'正しく半角数字で記入して下さい。';
        print'<br />';
        print'<form>';
        print'<input type="button" onclick="history.back()" value="戻る">';
        print'</form>';
        exit();
    
    }
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'UPDATE hurugi_product SET namecode=?,name=?,stocking=?,expect=?,sale=?,shop=?,date=?,saledate=?,remarks=?,gazou=? WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$hurugi_namecode;
    $data[]=$hurugi_name;
    $data[]=$hurugi_stocking;
    $data[]=$hurugi_expect;
    $data[]=$hurugi_sale;
    $data[]=$hurugi_shop;
    $data[]=$hurugi_date;
    $data[]=$hurugi_saledate;
    $data[]=$hurugi_remarks;
    $data[]=$hurugi_gazou['name'];
    $data[]=$hurugi_code;
    $stmt->execute($data);
    
    $dbh = null;
    
    if($hurugi_gazou_name_old != $hurugi_gazou['name'])
    {
        if($hurugi_gazou_name_old != '')
        {
            unlink('./gazou/'.$hurugi_gazou_name_old);
        }
    }
    
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
    
    <p>修正しました。</p>
    <a href="hurugi_list.php">戻る</a>
    </body>
</html>
    