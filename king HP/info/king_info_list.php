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
    
    $sql = 'SELECT code,date,name,email,subject FROM king_info WHERE 1';
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
        <link rel="stylesheet" href="king_many_info.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
    
    <section class="list"> 
    
            <p>ご依頼者一覧</p>
            
            <form method="post" action="king_info_branch.php">
                <div class="kinginfo">
                <?php
                while(true)
                {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                if($rec == false)
                {
                    break;
                }
                print '<p class="king"><input type="radio" name="kingcode" value="'.$rec['code'].'">ご依頼者コード：'.$rec['code'].'</p>';
                print '<p class="king">ご依頼者名：'.$rec['name'].'</p>';
                print '<p class="king">メールアドレス：'.$rec['email'].'</p>';
                print '<p class="king">ご依頼日時：'.$rec['date'].'</p>';
                print '<p class="king">件名：'.$rec['subject'].'</p>';
                print '<p class="lastking"></p>';
                print '<br />';
                }
                ?>
                </div>
            <div class="listmenu">
                <input type="submit" name="disp" value="参照" class="listbtn">
                <input type="submit" name="delete" value="削除" class="listbtn">
            </div>
            </form>
            <a href="../staff_login/staff_top.php">トップメニューへ</a>
    </section>
    </body>
</html>