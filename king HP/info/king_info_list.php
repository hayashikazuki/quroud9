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
    
    $dsn = 'mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT code,date,name,email,subject FROM king_info WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    $dbh = null;
    
    print'ご依頼者一覧<br /><br />';
    
    print'<form method="post" action="king_info_branch.php">';
    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false)
        {
            break;
        }
        print'<input type="radio" name="kingcode" value="'.$rec['code'].'">';
        print $rec['date'].'<br />';
        print 'ご依頼者名:'.$rec['name'].'<br />';
        print 'メールアドレス:'.$rec['email'].'<br />';
        print '件名:'.$rec['subject'].'<br />';
        print'<br />';
    }
    print'<input type="submit" name="disp" value="参照">';
    print'<input type="submit" name="delete" value="削除">';
    print'</form>';
    }
    catch(Exception $e)
    {
        print'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    
    ?>
    
    <br />
    <a href="../staff_login/staff_top.php">トップメニューへ</a><br />
    </body>
</html>