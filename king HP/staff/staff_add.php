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
        <link rel="stylesheet" href="staff.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
        
        <section class="addmenu">
        
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
        
        <section class="add">
            <p>スタッフ追加</p>
            <form method ="post" action="staff_add_cheak.php">
                <ul class="addstaff">
                    <li>
                        <p>スタッフ名を入力してください。</p>
                        <input type="text" name="name">
                    </li>
                    <li>
                        <p>パスワードを入力してください。</p>
                        <input type="password" name="pass">
                    </li>
                    <li>
                        <p>パスワードをもう１度入力してください。</p>
                        <input type="password" name="pass2">
                    </li>
                </ul>
            <input type="button" onclick="history.back()" value="戻る" class="btn">
            <input type="submit" value="OK" class="btn">
            </form>
        </section>
    
        
        </section>
        
        
        
        
        
    </body>
</html>