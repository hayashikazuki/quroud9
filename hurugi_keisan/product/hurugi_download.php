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
    
    if(isset($_SESSION['shopcode'])){
        $shopcode = $_SESSION['shopcode'];
    }else{
        header('Location:../staff_login/staff_login.php');
    }
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
        
        <section class="dawnloadmenu">
            
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
        
        <?php require_once('../common/common.php'); ?>
        
        <section class="dawnload">
        <p class="dawnloadtitle">購入月ダウンロード</p>
        
        <br />
        <form method="post" action="hurugi_download_done.php">
            <p><?php dawnload_pulldown_year() ?>&nbsp;年</p>
            <p><?php dawnload_pulldown_month() ?>&nbsp;月</p>
            <label><input type='checkbox' name='field[]' value='namecode' checked>商品コード</label>
            <br />
            <label><input type='checkbox' name='field[]' value='name' checked>商品名</label>
            <br />
            <label><input type='checkbox' name='field[]' value='salestatus' checked>ステータス</label>
            <br />
            <label><input type='checkbox' name='field[]' value='danjo' checked>カテゴリー</label>
            <br />
            <label><input type='checkbox' name='field[]' value='brand' checked>ブランド名</label>
            <br />
            <label><input type='checkbox' name='field[]' value='era' checked>年代</label>
            <br />
            <label><input type='checkbox' name='field[]' value='stocking' checked>仕入額</label>
            <br />
            <label><input type='checkbox' name='field[]' value='expect' checked>販売予想額</label>
            <br />
            <label><input type='checkbox' name='field[]' value='sale' checked>販売額</label>
            <br />
            <label><input type='checkbox' name='field[]' value='fee' checked>手数料</label>
            <br />
            <label><input type='checkbox' name='field[]' value='postage' checked>送料</label>
            <br />
            <label><input type='checkbox' name='field[]' value='other' checked>その他</label>
            <br />
            <label><input type='checkbox' name='field[]' value='profit' checked>利益</label>
            <br />
            <label><input type='checkbox' name='field[]' value='profit_rate' checked>利益率</label>
            <br />
            <label><input type='checkbox' name='field[]' value='sales_channel' checked>販路</label>
            <br />
            <label><input type='checkbox' name='field[]' value='date' checked>購入日</label>
            <br />
            <label><input type='checkbox' name='field[]' value='saledate' checked>販売日</label>
            <br />
            <label><input type='checkbox' name='field[]' value='remarks' checked>備考</label>
            <br />
            <br />
            
            <input type="submit" value="ダウンロード" class="dawnload_btn">
        </form>
        
            
            <br />
            <a href="hurugi_list.php" class="to_list">一覧へ戻る</a>
        
        </section>
        </section>
        
    </body>
</html>
    