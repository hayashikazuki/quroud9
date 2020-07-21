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
    $staff_code= $post['code'];
    $staff_name = $post['name'];
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
                <li><a href="../product/hurugi_list.php">商品管理</a></li>
                <br />
                <li><a href="../product/hurugi_download.php">購入月ダウンロード</a></li>
                <br />
                <li><a href="../product/saledate_download.php">販売月ダウンロード</a></li>
                <br />
                <li><a href="../staff_login/staff_logout.php">ログアウト</a></li>
            </ul>
        </section>
        
        <section class="editcheck">
            <p class="edittitle">スタッフ修正</p>
        <?php if($staff_name == '') { ?>
        
            <p>スタッフ名が入力されていません。</p>
            
        <?php } else { ?>
        
            <p>スタッフ名: <?php print $staff_name; ?></p>
            
        <?php } ?>
        
        <?php if($staff_pass == '') { ?>
        
            <p>パスワードが入力されてません。</p>
            
        <?php } if($staff_pass != $staff_pass2) { ?>
            <p>パスワードが一致しません。</p>
        <?php } ?>
        
        <?php if($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2) { ?>
    
            <form>
                <input type="button" onclick="history.back()" value="戻る" class="btn">
            </form>
        <?php } else { ?>
            <?php $staff_pass = md5($staff_pass); ?>
            <form method="post" action="staff_edit_done.php">
                <input type="hidden" name="code" value="<?php print $staff_code; ?>">
                <input type="hidden" name="name" value="<?php print $staff_name; ?>">
                <input type="hidden" name="pass" value="<?php print $staff_pass; ?>">
                <input type="button" onclick="history.back()" value="戻る" class="btn">
                <input type="submit" value="OK" class="btn">
            </form>
        <?php } ?>
        
        </section>
        
        </section>
        
    
    </body>
</html>