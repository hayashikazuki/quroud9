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
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="staff.css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="staff.js"></script>
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
                <li><a href="../product/hurugi_download.php">購入月ダウンロード</a></li>
                <br />
                <li><a href="../product/saledate_download.php">販売月ダウンロード</a></li>
                <br />
                <li><a href="../staff_login/staff_logout.php">ログアウト</a></li>
            </ul>
        </section>
        
        <section class="mobile-menu">
            
            <p><?php print $login; ?>さん、ログイン中<i class="fas fa-user-alt fa-fw fa-2x"></i></p>
            
            <div class="menu-btn">
                <p><i class="fa fa-bars fa-3x" aria-hidden="true"></i></p>
            </div>
            <div class="mobile-content">
                <a href="../staff/staff_list.php" >
                    <div class="menu__item">スタッフ管理</div>
                </a>
                <br />
                <a href="../product/hurugi_list.php" >
                    <div class="menu__item">商品一覧</div>
                </a>
                <br />
                <a href="../product/hurugi_download.php" >
                    <div class="menu__item">購入月ダウンロード</div>
                </a>
                <br />
                <a href="../product/saledate_download.php" >
                    <div class="menu__item">販売月ダウンロード</div>
                </a>
                <br />
                <a href="../staff_login/staff_logout.php" >
                    <div class="menu__item">ログアウト</div>
                </a>
            </div>
            
        </section>
        
        <section class="add">
            <p>スタッフ追加</p>
            <form method ="post" action="staff_add_cheak.php">
                <ul class="addstaff">
                    <li>
                        <p>スタッフ名を入力してください。</p>
                        <p><input type="text" name="name"></p>
                        <br />
                    </li>
                    <li>
                        <p>店舗コードを入力してください。</p>
                        <p><input type="text" name="shopcode"></p>
                        <br />
                    </li>
                    <li>
                        <p>
                            <input type="radio" name="employ" value="staff" checked>スタッフ&nbsp;&nbsp;
                    　　　　<input type="radio" name="employ" value="admin">管理者
                    　　</p>
                        <br />
                    </li>
                    <li>
                        <p>パスワードを入力してください。</p>
                        <p><input type="password" name="pass"></p>
                        <br />
                    </li>
                    <li>
                        <p>パスワードをもう１度入力してください。</p>
                        <p><input type="password" name="pass2"></p>
                        <br />
                    </li>
                </ul>
            <input type="submit" onclick="history.back()" value="戻る" class="btn add_back_btn">
            <input type="submit" value="OK" class="btn add_ok_btn">
            </form>
        </section>
    
        
        </section>
        
        
        
        
        
    </body>
</html>