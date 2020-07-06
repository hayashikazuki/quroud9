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

try
    {

require_once('../common/common.php');
    
    $post = sanitize($_POST);
    $staff_name = $post['name'];
    $staff_pass = $post['pass'];
    
    
    $dsn='mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'INSERT INTO king_staff(name,password)VALUES(?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $stmt->execute($data); // ←変数名が $date になっています、正しくは $data です。
    
    $dbh = null;
    
    
    
    }
    catch (Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>CONTACT管理ページ</title>
        <link rel="stylesheet" href="staff.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
        <section class="done">
            <p><?php print $staff_name; ?>さんを</p>
            <p>追加しました。</p>
            <a href ="staff_list.php">戻る</a>
        </section>
   
    </body>
</html>