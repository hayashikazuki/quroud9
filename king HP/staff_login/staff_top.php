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
        
        トップメニュー<br />
        <br />
        <a href="../staff/staff_list.php">スタッフ管理</a><br />
        <br />
        <a href="../info/king_info_list.php">ご依頼者管理</a><br />
        <br />
        <a href="../order/order_download.php">ご依頼者ダウンロード</a><br />
        <br />
        <a href="staff_logout.php">ログアウト</a><br />
    </body>
</html>