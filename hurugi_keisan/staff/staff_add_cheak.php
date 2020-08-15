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

require_once('../common/common.php');
    
    $post = sanitize($_POST);
    $staff_name = $post['name'];
    $shopcode = $post['shopcode'];
    $employ = $post['employ'];
    $staff_pass = $post['pass'];
    $staff_pass2 = $post['pass2'];
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
    
    <section class="addcheck">
        <p class="addtitle">スタッフ追加</p>
        <br />
    <?php if($staff_name == '') { ?>
    
        <p>スタッフ名が入力されていません。</p>
        
    <?php } else { ?>
    
        <p>スタッフ名: <?php print $staff_name; ?>[
        
        <?php 
                if($employ=='staff')
                {
                    print'スタッフ';
                }
                else
                {
                    print'管理者';
                }
        ?>
        
        ]</p>
        
    <?php } ?>
    
    
     <?php if(preg_match('/\A[0-9]+\z/',$shopcode)==0) { ?>
    
        <p>正しく半角数字で記入してください。</p>
        
    <?php } else { ?>
        <p>店舗コード：<?php print $shopcode; ?></p>
    <?php } ?>
    
    <?php if($staff_pass == '') { ?>
    
        <p>パスワードが入力されてません。</p>
        
    <?php } if($staff_pass != $staff_pass2) { ?>
        <p>パスワードが一致しません。</p>
    <?php } ?>
    
    <?php if($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2 || preg_match('/\A[0-9]+\z/',$shopcode)==0) { ?>

        <form>
            <input type="button" onclick="history.back()" value="戻る" class="add_back_btn btn">
        </form>
    <?php } else { ?>
        <?php $staff_pass = md5($staff_pass); ?>
        <form method="post" action="staff_add_done.php">
            <input type="hidden" name="name" value="<?php print $staff_name; ?>">
            <input type="hidden" name="shopcode" value="<?php print $shopcode; ?>">
            <input type="hidden" name="employ" value="<?php print $employ; ?>">
            <input type="hidden" name="pass" value="<?php print $staff_pass; ?>">
            <input type="button" onclick="history.back()" value="戻る" class="add_back_btn btn">
            <input type="submit" value="OK" class="add_ok_btn btn">
        </form>
    <?php } ?>
    
    </section>
    
    </section>
    </body>
</html>