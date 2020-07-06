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
    $login = $_SESSION['staff_name'];
    
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>CONTACT管理ページ</title>
        <link rel="stylesheet" href="staff_login.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
        
        <?php
        // session_start();
        // session_regenerate_id(true);
        // if(isset($_SESSION['login'])==false)
        // {
        //     print'<div class="loginarea">';
        //     print'<p>ログインできません。</p>';
        //     print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
        //     print'</div>';
        //     exit();
        // }
        // else
        // {
        //     print'<div class="loginarea>';
        //     print '<p>'.$_SESSION['staff_name'].'さんログイン中</p>';
        //     print'</div>';
        // }
        ?>
        
        <div class="loginarea">
            <p><?php print $login; ?>さん、ログイン中</p>
        </div>
        
        
        
        
        <section class="menu">
            <p class="topmenu">トップメニュー</p>
            <ul class="selectmenu">
                <li><a href="../staff/staff_list.php">スタッフ管理</a></li>
                <br />
                <li><a href="../info/king_info_list.php">ご依頼者管理</a></li>
                <br />
                <li><a href="../order/order_download.php">ご依頼者情報ダウンロード</a></li>
                <br />
                <li><a href="staff_logout.php">ログアウト</a></li>
            </ul>
        </section>
    </body>
</html>