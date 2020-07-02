<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>CONTACT管理ページ</title>
    </head>
    <body>
    
    <?php
    
    try
    {
    
    $king_code=$_GET['kingcode'];
    
    $dsn = 'mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT name,email FROM king_info WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $king_code;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $king_name = $rec['name'];
    $king_email = $rec['email'];
    
    $dbh = null;
    
    
    }
    catch(Exception $e)
    {
        print'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    
    ?>
    
    ご依頼者削除<br />
    <br />
    受付コード<br />
    <?php print $king_code; ?>
    <br />
    ご依頼者名<br />
    <?php print $king_name; ?>
    <br />
    メールアドレス<br />
    <?php print $king_email; ?>
    <br />
    このご依頼者を削除してよろしいですか？<br />
    <br />
    <form method="post" action="king_info_delete_done.php">
    <input type="hidden" name="code" value="<?php print $king_code; ?>">
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
    </form>
    
    </body>
</html>