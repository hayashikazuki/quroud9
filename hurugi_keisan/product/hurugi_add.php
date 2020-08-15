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
<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="hurugi.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <script src="hurugi.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <script>
        
    </script>
    <body>
        <section class="addmenu">
        
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
        
        <section class="add">
            
        <section>
        
            <p class="addtitle">仕入れ情報追加</p>
    
            <form action="hurugi_add_check.php" method="post" enctype="multipart/form-data">
                
                <p>商品コード&nbsp;:&nbsp;<input type="text" name="namecode" required></p>
                
                <p>商品名&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="name" required></p>
                
                <p>ステータス&nbsp;&nbsp;:&nbsp;&nbsp;
                    <input type="radio" name="salestatus" value="notsale" checked>未販売&nbsp;&nbsp;
                    <input type="radio" name="salestatus" value="onsale">販売中&nbsp;&nbsp;
                    <input type="radio" name="salestatus" value="sold">販売済み&nbsp;&nbsp;
                </p>
                
                <p>カテゴリー&nbsp;&nbsp;:&nbsp;&nbsp;
                    <input type="radio" name="danjo" value="man" checked>メンズ&nbsp;&nbsp;
                    <input type="radio" name="danjo" value="woman">レディース
                </p>
                
                <p>仕入額&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="stocking" value="0" style="width:100px;">&nbsp;円</p>
                
                <p>販売予想額&nbsp;:&nbsp;<input type="text" name="expect" value="0" style="width:100px;">&nbsp;円</p>
                
                <p>販売額&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="sale" value="0" style="width:100px;">&nbsp;円</p>
                
                <p>
                    販路&nbsp;&nbsp;:&nbsp;&nbsp;
                    <select id="sales_channel" name="sales_channel">
                        <option value="mel">メルカリ</option>
                        <option value="raku">ラクマ</option>
                        <option value="yah">ヤフオク</option>
                        <option value="premium">ヤフオク（プレミアム）</option>
                        <option value="otherapp">その他</option>
                    </select>
                </p>
                
                <?php
                
                
                ?>
                <p>手数料&nbsp;&nbsp;:&nbsp;&nbsp;<input id="fee" type="text" name="fee"  style="width:100px;">&nbsp;%</p>
                
                <p>送料&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="postage" value="0" style="width:100px;">&nbsp;円</p>
                
                <p>その他&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="other" value="0" style="width:100px;">&nbsp;円</p>
                
                <p>仕入先&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="shop"></p>
                
                <p>購入日&nbsp;&nbsp;:&nbsp;&nbsp;<input type="date" name="date"></p>
                
                <p>販売日&nbsp;&nbsp;:&nbsp;&nbsp;<input type="datetime-local" name="saledate"></p>
                
                <p>備考欄&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="remarks"></p>
                
                <p>画像&nbsp;&nbsp;:&nbsp;&nbsp;<input type="file" name="gazou"></p>
                
        </section>
                
        <section class="addtenp">
                
                <p>さらに詳しく入力-テンプレート文書を自動的に作成できます-</p>
                
                <p>
                    商品状態&nbsp;&nbsp;:&nbsp;&nbsp;
                    <select name="status">
                        <option value="new">新品、未使用</option>
                        <option value="near">未使用に近い</option>
                        <option value="nodirt">目立った傷や汚れなし</option>
                        <option value="somewhat">やや傷や汚れあり</option>
                        <option value="dirt">傷や汚れあり</option>
                        <option value="bad">全体的に状態が悪い</option>
                    </select>
                </p>
                
                <p>着丈&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="length"></p>
                
                <p>身幅&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="width"></p>
                
                <p>袖丈&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="sleeve"></p>
                
                <p>肩幅&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="shoulder"></p>
                
                <p>ブランド名&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="brand"></p>
                
                <p>カラー&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="color"></p>
                
                <p>素材&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="material"></p>
                
                <p>
                    年代&nbsp;&nbsp;:&nbsp;&nbsp;
                    <select name="era">
                        <option value="----">----</option>
                        <option value="1950">1950年代</option>
                        <option value="1960">1960年代</option>
                        <option value="1970">1970年代</option>
                        <option value="1980">1980年代</option>
                        <option value="1990">1990年代</option>
                        <option value="2000">2000年代</option>
                        <option value="2010">2010年代</option>
                        <option value="2020">2020年代</option>
                        <option value="2030">2030年代</option>
                    </select>
                </p>
                
                
                <input type="button" onclick="history.back()" value="戻る" class="add_back_btn">
                <input type="submit" value="OK" class="add_ok_btn">
            </form>
            
        </section>
        
        </section>
        
        </section>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="hurugi.js"></script>
    </body>
</html>