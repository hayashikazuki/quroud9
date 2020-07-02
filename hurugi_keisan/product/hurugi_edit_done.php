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
    $hurugi_name=$post['name'];
    $hurugi_stocking=$post['stocking'];
    $hurugi_sale=$post['sale'];
    $hurugi_shop=$post['shop'];
    $hurugi_date=$post['date'];
    $hurugi_remarks=$post['remarks'];
    
    
     if(preg_match('/\A[0-9]+\z/',$hurugi_stocking)==0 || preg_match('/\A[0-9]+\z/',$hurugi_sale)==0)
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
    
    $sql = 'UPDATE hurugi_product SET name=?,stocking=?,sale=?,shop=?,date=?,remarks=? WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$hurugi_name;
    $data[]=$hurugi_stocking;
    $data[]=$hurugi_sale;
    $data[]=$hurugi_shop;
    $data[]=$hurugi_date;
    $data[]=$hurugi_remarks;
    $data[]=$hurugi_code;
    $stmt->execute($data);
    
    $dbh = null;
    
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
    