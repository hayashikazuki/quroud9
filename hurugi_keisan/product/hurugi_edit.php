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
<?php
    
    try
    {
        
    require_once('../common/common.php');
    
    $hurugi_code=$_GET['hurugicode'];
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql ='SELECT * FROM hurugi_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$hurugi_code;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $hurugi_namecode=$rec['namecode'];
    $hurugi_name=$rec['name'];
    $hurugi_stocking=$rec['stocking'];
    $hurugi_expect=$rec['expect'];
    $hurugi_sale=$rec['sale'];
    $hurugi_shop=$rec['shop'];
    $hurugi_date=$rec['date'];
    $hurugi_saledate=$rec['saledate'];
    $hurugi_remarks=$rec['remarks'];
    $hurugi_gazou_name_old=$rec['gazou'];
    
    $hurugi_danjo=$rec['danjo'];
    $hurugi_sales_channel=$rec['sales_channel'];
    $hurugi_fee=$rec['fee'];
    $hurugi_postage=$rec['postage'];
    $hurugi_other=$rec['other'];
    
    $hurugi_status=$rec['status'];
    $hurugi_length=$rec['length'];
    $hurugi_width=$rec['width'];
    $hurugi_sleeve=$rec['sleeve'];
    $hurugi_shoulder=$rec['shoulder'];
    $hurugi_brand=$rec['brand'];
    $hurugi_color=$rec['color'];
    $hurugi_material=$rec['material'];
    $hurugi_era=$rec['era'];
    
    $hurugi_salestatus=$rec['salestatus'];
    $hurugi_profit=$rec['profit'];
    $hurugi_profit_rate=$rec['profit_rate'];
    
    $dbh=null;
    
    if($hurugi_gazou_name_old=='')
    {
        $disp_gazou='';
    }
    else
    {
        $disp_gazou='<img src="./gazou/'.$hurugi_gazou_name_old.'">';
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
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="hurugi.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="hurugi.js"></script>
    </head>
    <body>
        
        <section class="editmenu">
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
        
        <section class="edit">
    
            
            
            <section class="edit_main">
                
                <p class="edittitle">商品修正</p>

            <form action="hurugi_edit_done.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="code" value="<?php print $hurugi_code; ?>">
                <input type="hidden" name="gazou_name_old" value="<?php print $hurugi_gazou_name_old; ?>">
                <p>商品コード&nbsp;:&nbsp;<input type="text" name="namecode" required value="<?php print $hurugi_namecode; ?>"></p>
                
                <p>商品名&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="name" required value="<?php print $hurugi_name; ?>"></p>
                
                <p>ステータス&nbsp;&nbsp;:&nbsp;&nbsp;
                <?php
                    if($hurugi_salestatus == 'notsale')
                    {
                ?>
                    <input type="radio" name="salestatus" value="notsale" checked>未販売&nbsp;&nbsp;
                    <input type="radio" name="salestatus" value="onsale">販売中&nbsp;&nbsp;
                    <input type="radio" name="salestatus" value="sold">販売済み&nbsp;&nbsp;
                <?php
                    }
                    elseif($hurugi_salestatus == 'onsale')
                    {
                ?>
                    <input type="radio" name="salestatus" value="notsale" >未販売&nbsp;&nbsp;
                    <input type="radio" name="salestatus" value="onsale" checked>販売中&nbsp;&nbsp;
                    <input type="radio" name="salestatus" value="sold">販売済み&nbsp;&nbsp;
                <?php
                    }
                    else
                    {
                ?>
                    <input type="radio" name="salestatus" value="notsale" >未販売&nbsp;&nbsp;
                    <input type="radio" name="salestatus" value="onsale" >販売中&nbsp;&nbsp;
                    <input type="radio" name="salestatus" value="sold" checked>販売済み&nbsp;&nbsp;
                <?php
                    }
                ?>
                </p>
                
                <p>カテゴリー&nbsp;&nbsp;:&nbsp;&nbsp;
                
                <?php
                    if($hurugi_danjo == 'man')
                    {
                ?>
                        <input type="radio" name="danjo" value="man" checked>メンズ&nbsp;&nbsp;
                        <input type="radio" name="danjo" value="woman">レディース
                        
                <?php
                    }
                    else
                    {
                ?>
                
                        <input type="radio" name="danjo" value="man">メンズ&nbsp;&nbsp;
                        <input type="radio" name="danjo" value="woman" checked>レディース
                        
                <?php        
                    }
                ?>
                
                
                
                <p>仕入額&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="stocking" value="<?php print $hurugi_stocking; ?>">&nbsp;円</p>
               
                <p>販売予想額&nbsp;:&nbsp;<input type="text" name="expect" value="<?php print $hurugi_expect; ?>">&nbsp;円</p>
                
                <p>販売額&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="sale" value="<?php print $hurugi_sale; ?>">&nbsp;円</p>
                
                <p>
                    販路&nbsp;&nbsp;:&nbsp;&nbsp;
                    <select name="sales_channel" id="sales_channel">
                        <?php
                        if($hurugi_sales_channel == 'mel')
                        {
                        ?>
                            <option value="mel" selected>メルカリ</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="mel">メルカリ</option>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($hurugi_sales_channel == 'raku')
                        {
                        ?>
                            <option value="raku" selected>ラクマ</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="raku">ラクマ</option>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($hurugi_sales_channel == 'yah')
                        {
                        ?>
                            <option value="yah" selected>ヤフオク</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="yah">ヤフオク</option>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($hurugi_sales_channel == 'premium')
                        {
                        ?>
                            <option value="premium" selected>ヤフオク（プレミアム）</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="premium">ヤフオク（プレミアム）</option>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($hurugi_sales_channel == 'otherapp')
                        {
                        ?>
                            <option value="otherapp" selected>その他</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="otherapp">その他</option>
                        <?php
                        }
                        ?>
                        
                    </select>
                </p>
                
                <p>手数料&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="fee" id="fee" style="width:100px;" >&nbsp;%</p>
                
                <p>送料&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="postage" style="width:100px;" value="<?php print $hurugi_postage; ?>">&nbsp;円</p>
                
                <p>その他&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="other" style="width:100px;" value="<?php print $hurugi_other; ?>">&nbsp;円</p>
                
                <p>仕入先&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="shop" value="<?php print $hurugi_shop; ?>"></p>
                
                <p>購入日&nbsp;&nbsp;:&nbsp;&nbsp;<input type="date" name="date" value="<?php print $hurugi_date; ?>"></p>
                
                <p>販売日&nbsp;&nbsp;:&nbsp;&nbsp;<input type="datetime-local" name="saledate" value="<?php print $hurugi_saledate; ?>"></p>
                
                <p>備考欄&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="remarks"  value="<?php print $hurugi_remarks; ?>"></p>
                
                <p>画像&nbsp;&nbsp;:&nbsp;&nbsp;<input type="file" name="gazou"></p>
                
                <div class="gazou">
                    <?php print $disp_gazou; ?>
                </div>
            
            </section>
                
            <section class="edittenp">
                
                <p>さらに詳しく入力-テンプレート文書を自動的に作成できます-</p>
                
                <p>
                    商品状態&nbsp;&nbsp;:&nbsp;&nbsp;
                    <select name="status">
                        
                        <?php
                        if($hurugi_status == 'new')
                        {
                        ?>
                            <option value="new" selected>新品、未使用</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="new">新品、未使用</option>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($hurugi_status == 'near')
                        {
                        ?>
                            <option value="near" selected>未使用に近い</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="near">未使用に近い</option>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($hurugi_status == 'nodirt')
                        {
                        ?>
                            <option value="nodirt" selected>目立った傷や汚れなし</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="nodirt">目立った傷や汚れなし</option>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($hurugi_status == 'somewhat')
                        {
                        ?>
                            <option value="somewhat" selected>やや傷や汚れあり</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="somewhat">やや傷や汚れあり</option>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($hurugi_status == 'dirt')
                        {
                        ?>
                            <option value="dirt" selected>傷や汚れあり</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="dirt">傷や汚れあり</option>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($hurugi_status == 'bad')
                        {
                        ?>
                            <option value="bad" selected>全体的に状態が悪い</option>
                        <?php
                        }
                        else
                        {
                        ?>
                            <option value="bad">全体的に状態が悪い</option>
                        <?php
                        }
                        ?>
                        
                    </select>
                </p>
                
                <p>着丈&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="length" value="<?php print $hurugi_length; ?>"></p>
                
                <p>身幅&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="width" value="<?php print $hurugi_width; ?>"></p>
                
                <p>袖丈&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="sleeve" value="<?php print $hurugi_sleeve; ?>"></p>
                
                <p>肩幅&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="shoulder" value="<?php print $hurugi_shoulder; ?>"></p>
                
                <p>ブランド名&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="brand" value="<?php print $hurugi_brand; ?>"></p>
                
                <p>カラー&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="color" value="<?php print $hurugi_color; ?>"></p>
                
                <p>素材&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="material" value="<?php print $hurugi_material; ?>"></p>
                
                <p>
                    年代&nbsp;&nbsp;:&nbsp;&nbsp;
                    <!--<select name="era">-->
                    <!--    <option value="----">----</option>-->
                    <!--    <option value="1950">1950年代</option>-->
                    <!--    <option value="1960">1960年代</option>-->
                    <!--    <option value="1970">1970年代</option>-->
                    <!--    <option value="1980">1980年代</option>-->
                    <!--    <option value="1990">1990年代</option>-->
                    <!--    <option value="2000">2000年代</option>-->
                    <!--    <option value="2010">2010年代</option>-->
                    <!--    <option value="2020">2020年代</option>-->
                    <!--    <option value="2030">2030年代</option>-->
                    <!--</select>-->
                    <?php era_select($hurugi_era); ?>
                </p>
                <br />
                
                <input type="button" onclick="history.back()" value="戻る" class="edit_back_btn">
                
                <input type="submit" value="OK" class="edit_ok_btn">
                
            </form>
            
        </section>
            
        </section>
        
        </section>
        
        
    </body>
</html>
    