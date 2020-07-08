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
        session_start(); // sessionを利用するにはまずsession_start()を行う必要があります。
        if(isset($_SESSION['error'])==true){
            $error = $_SESSION['error'];
        }
        ?>
        
        <section class="login">
        <p><?php print $error; ?></p>
        <p class=stafflogin>スタッフログイン</p>

        <form method="post" action="staff_login_check.php">
            <ul class=staffinput>
                <li>
                    <p>スタッフコード</p>
                    <input type="text" name="code"><br />
                </li>
                <li>
                    <p>パスワード</p>
                    <input type="password" name="pass">
                </li>
            </ul>
            <input type="submit" value="ログイン" class="loginbtn">
        </form>
        </section>
    
    
    </body>
</html>