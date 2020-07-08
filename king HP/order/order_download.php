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
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>CONTACT管理ページ</title>
        <link rel="stylesheet" href="order.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
    
    <?php
    require_once('../common/common.php');
    ?>
    
        <div class="loginarea">
            <p><?php print $login; ?>さん、ログイン中</p>
        </div>
    
        <section class="dawnload">
            <p>ダウンロード</p>
            <form method="post" action="order_download_done.php">
                <p>ダウンロードしたい月を選んでください。</p>
                <p><?php pulldown_year(); ?>&nbsp;&nbsp;年</p>
                <p><?php pulldown_month(); ?>&nbsp;&nbsp;月</p>
                <br />
                <input type="button" onclick="history.back()" value="戻る" class="btn">
                <input type="submit" value="OK" class="btn">
            </form>
        </section>
        
    </body>
</html>