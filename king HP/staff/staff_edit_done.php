<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
   $_SESSION['error']='ログアウトしています。再度ログインしてください。';
    header('Location:../staff_login/staff_login.php');
    exit();
}
else
{
    $login = $_SESSION['staff_name'];
}
try
    {
    
    require_once('../common/common.php');
    
    $post = sanitize($_POST);
    $staff_code= $post['code'];
    $staff_name = $post['name'];
    $staff_pass = $post['pass'];
    
    $dsn='mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'UPDATE king_staff SET name=?,password=? WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $data[] = $staff_code;
    $stmt->execute($data); 
    
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
        
        <section class="editmenu">
        
        <section class="menu">
            <div class="toplist-loginarea">
                <p><?php print $login; ?>さん、ログイン中</p>
            </div>
            <p class="toplistmenu">トップメニュー</p>
            <ul class="selectmenu">
                <li><a href="../staff/staff_list.php">スタッフ管理</a></li>
                <br />
                <li><a href="../info/king_info_list.php">ご依頼者管理</a></li>
                <br />
                <li><a href="../order/order_download.php">ご依頼者情報ダウンロード</a></li>
                <br />
                <li><a href="../staff_login/staff_logout.php">ログアウト</a></li>
            </ul>
        </section>
    
        <section class="done">
            <p class="edittitle">スタッフ修正</p>
            <p>修正しました。</p>
        </section>
        
        </section>
    
    </body>
</html>