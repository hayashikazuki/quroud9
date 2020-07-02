<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print'ログインできません。<br />';
    print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print $_SESSION['staff_name'];
    print'さんログイン中<br />';
    print'<br />';
}
?>
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
    
    $sql = 'SELECT date,name,email,subject,messages FROM king_info WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $king_code;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $king_date = $rec['date'];
    $king_name = $rec['name'];
    $king_email= $rec['email'];
    $king_subject = $rec['subject'];
    $king_messages = $rec['messages'];
    
    $dbh = null;
    
    }
    catch(Exception $e)
    {
        print'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    
    ?>
    
    ご依頼者情報参照<br />
    <br />
    <受付コード><br />
    <?php print $king_code; ?>
    <br />
    <br />
    <ご依頼者名><br />
    <?php print $king_name; ?>
    <br />
    <br />
    <受付時間><br />
    <?php print $king_date; ?>
    <br />
    <br />
    <メールアドレス><br />
    <?php print $king_email; ?> 
    <br />
    <br />
    <件名><br />
    <?php print $king_subject; ?> 
    <br />
    <br />
    <ご依頼者からのメッセージ><br />
    <?php print $king_messages; ?> 
    <br />
    <br />
    
    <form>
    <input type="button" onclick="history.back()" value="戻る">
    </form>
    
    </body>
</html>