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
<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="hurugi.css"/>
    </head>
    <body>
        
        <section class="dawnloadmenu">
            
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
        
        <?php require_once('../common/common.php'); ?>
        
        <section class="dawnload">
        
        <p class="dawnloadtitle">購入月ダウンロード</p>
        <form method="post" action="hurugi_download_done.php">
            <?php dawnload_pulldown_year() ?>
            <p>年</p>
            <?php dawnload_pulldown_month() ?>
            <p>月</p>
            <label><input type='checkbox' name='field[]' value='namecode' checked>商品コード</label>
            <br />
            <label><input type='checkbox' name='field[]' value='name' checked>商品名</label>
            <br />
            <label><input type='checkbox' name='field[]' value='danjo' checked>カテゴリー</label>
            <br />
            <label><input type='checkbox' name='field[]' value='brand' checked>ブランド名</label>
            <br />
            <label><input type='checkbox' name='field[]' value='era' checked>年代</label>
            <br />
            <p>利益、利益率を選択する場合</p>
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
           
            
            <input type="submit" value="ダウンロード">
        </form>
        
        </section>
        </section>
        
    </body>
</html>
    