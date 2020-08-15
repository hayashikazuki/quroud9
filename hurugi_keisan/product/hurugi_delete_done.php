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
    $employ = $_SESSION['employ'];
}
?>
<?php
    
    try
    {
        
    require_once('../common/common.php');
    
    $post = sanitize($_POST);
    $hurugi_code=$post['code'];
    $hurugi_name=$post['name'];
    $hurugi_gazou_name=$post['gazou_name'];
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'DELETE FROM hurugi_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$hurugi_code;
    $stmt->execute($data);
    
    $dbh = null;
    
    if($hurugi_gazou_name != '')
    {
        unlink('./gazou/'.$hurugi_gazou_name);
    }
    
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="hurugi.css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="hurugi.js"></script>
    </head>
    <body>
        
        <section class="deletemenu">
        
        <section class="menu">
            <div class="toplist-loginarea">
                <p><?php print $login; ?>さん、ログイン中</p>
            </div>
            <p class="toplistmenu">トップメニュー</p>
            <ul class="selectmenu">
                <?php
                if($employ == 'admin')
                {
                ?>
                <li ><a href="../staff/staff_list.php">スタッフ管理</a></li>
                <br />
                <?php
                }
                ?>
                <li><a href="../product/hurugi_list.php">商品管理</a></li>
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
                 <?php
                if($employ == 'admin')
                {
                ?>
                
                <a href="../staff/staff_list.php" >
                    <div class="menu__item">スタッフ管理</div>
                </a>
                <br />
                
                <?php
                }
                ?>
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
    
        <section class="delete">
            <p class="deletetitle">商品削除</p>
            <br />
        
            <p class="done_word">削除しました。</p>
            <a href="hurugi_list.php" class="to_list">一覧へ戻る</a>
        </section>
        
        </section>
    </body>
</html>
    