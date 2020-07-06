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
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>CONTACT管理ページ</title>
        <link rel="stylesheet" href="staff.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
        
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
        </section>
        </form>
        
        
        
        
        
    </body>
</html>