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
    
    $dsn = 'mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT code,name FROM king_staff WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
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
        <section class="list"> 
            <p>スタッフ一覧</p>
            <form method="post" action="staff_branch.php">
                <?php
                while(true)
                {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                if($rec == false)
                {
                    break;
                }
                print '<p class="staff"><input type="radio" name="staffcode" value="'.$rec['code'].'">スタッフコード：'.$rec['code'].'</p>';
                print '<p class="staff">スタッフ名：'.$rec['name'].'</p>';
                print '<br />';
                }
                ?>
            <div class="listmenu">
                <input type="submit" name="add" value="追加" class="listbtn">
                <input type="submit" name="edit" value="修正" class="listbtn">
                <input type="submit" name="delete" value="削除" class="listbtn">
            </div>
            </form>
            
            <a href="../staff_login/staff_top.php">トップメニューへ</a>
        </section>
   
    
    
    
    </body>
</html>