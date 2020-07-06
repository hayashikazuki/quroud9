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
    
    $staff_code=$_GET['staffcode'];
    
    $dsn = 'mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT name FROM king_staff WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_code;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $staff_name = $rec['name'];
    
    $dbh = null;
    
    }
    catch(Exception $e)
    {
        print'ただいま障害により大変ご迷惑をお掛けしております。';
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
    
    <section class="edit">
        <p>スタッフ修正</p>
        
    <form method="post" action="staff_edit_check.php">
        <ul class="editstaff">
            <li>
                <p>スタッフコード: <?php print $staff_code; ?></p>
            </li>
            <li>
                <input type="hidden" name="code" value="<?php print $staff_code; ?>">
                <p>スタッフ名</p>
                <input type="text" name="name" value="<?php print $staff_name; ?>">
            </li>
            <li>
                <p>パスワードを入力してください。</p>
                <input type="password" name="pass" >
            </li>
            <li>
                <p>パスワードをもう1度入力して下さい。</p>
                <input type="password" name="pass2">
            </li>
        </ul>
        <input type="button" onclick="history.back()" value="戻る" class="btn">
        <input type="submit" value="OK" class="btn">
    </form>
    </section>
    
    </body>
</html>