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
<?php
    
    require_once('../common/common.php');
    
    $post = sanitize($_POST);
    $hurugi_namecode=$post['namecode'];
    $hurugi_name=$post['name'];
    $hurugi_stocking=$post['stocking'];
    $hurugi_expect=$post['expect'];
    $hurugi_sale=$post['sale'];
    $hurugi_shop=$post['shop'];
    $hurugi_date=$post['date'];
    $hurugi_saledate=$post['saledate'];
    $hurugi_remarks=$post['remarks'];
    
    $hurugi_gazou=$_FILES['gazou'];
    
    $hurugi_danjo=$post['danjo'];
    $hurugi_sales_channel=$post['sales_channel'];
    $hurugi_fee=$post['fee'];
    $hurugi_postage=$post['postage'];
    $hurugi_other=$post['other'];
    
    $hurugi_status=$post['status'];
    $hurugi_length=$post['length'];
    $hurugi_width=$post['width'];
    $hurugi_sleeve=$post['sleeve'];
    $hurugi_shoulder=$post['shoulder'];
    $hurugi_brand=$post['brand'];
    $hurugi_color=$post['color'];
    $hurugi_material=$post['material'];
    $hurugi_era=$post['era'];
    
    ?>
<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="hurugi.css"/>
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
        
        <section class="add">
            
        <section>
            <p class="addtitle">仕入れ情報追加</p>
        
            <p>商品コード&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_namecode; ?></p>
            <p>商品名&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_name; ?></p>
            <p>
                カテゴリー&nbsp;&nbsp;:&nbsp;&nbsp;
                <?php 
                if($hurugi_danjo=='man')
                {
                    print'メンズ';
                }
                else
                {
                    print'レディース';
                }
                ?>
            </p>
            
            <?php
            if(preg_match('/\A[0-9]+\z/',$hurugi_stocking)==0)
            {
            ?>
                <p>仕入額&nbsp;&nbsp;:&nbsp;&nbsp;正しく半角数字で記入して下さい。</p>
            <?php
            }
            else
            {
            ?>
                <p>仕入額&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_stocking; ?>&nbsp;円</p>
            
            <?php
            }
            if(preg_match('/\A[0-9]+\z/',$hurugi_expect)==0)
            {
            ?>
                <p>販売予想額&nbsp;:&nbsp;正しく半角数字で記入して下さい。</p>
            <?php
            }
            else
            {
            ?>
                <p>販売予想額&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_expect; ?>&nbsp;円</p>
                
            <?php
            }
            
            if(preg_match('/\A[0-9]+\z/',$hurugi_sale)==0)
            {
            
            ?>
                <p>販売額&nbsp;&nbsp;:&nbsp;&nbsp;正しく半角数字で記入して下さい。まだ販売していないときは、"0"を入力して下さい。</p>：';
               
            <?php
            }
            else
            {
            ?>
               <p>販売額&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_sale; ?>&nbsp;円</p>
            
            <?php    
            }
            ?>
            
            <p>
                販路&nbsp;&nbsp;:&nbsp;&nbsp;
                <?php
                switch($hurugi_sales_channel)
                {
                    case'mel':
                        $app = 'メルカリ';
                        
                        break;
                    
                    case'raku':
                        $app = 'ラクマ';
                        
                        break;
                        
                    case'yah':
                        $app = 'ヤフオク';
                        
                        break;
                    
                    case'premium':
                        $app = 'ヤフオク（プレミアム）';
                        
                        break;
                    
                    case'otherapp':
                        $app = 'その他';
                        
                        break;
                }
                
                print $app;
                ?>
            </p> 
            
            <?php
            
            if(preg_match('/\A[0-9]+\z/',$hurugi_fee)==0)
            {
            ?>
                <p>手数料&nbsp;:&nbsp;正しく半角数字で記入して下さい。</p>
                
            <?php
            }
            else
            {
            ?>
                <p>手数料&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $fee_app; ?>%</p>
                
            <?php
            }
            ?>
            
            
            <?php
            
            if(preg_match('/\A[0-9]+\z/',$hurugi_postage)==0)
            {
            ?>
                <p>送料&nbsp;:&nbsp;正しく半角数字で記入して下さい。</p>
                
            <?php
            }
            else
            {
            ?>
                <p>送料&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_postage; ?></p>
                
            <?php
            }
            ?>
            
            <?php
            
            if(preg_match('/^[0-9]+(\.[0-9]*)?$/',$hurugi_fee)==0)
            {
            ?>
                <p>その他&nbsp;:&nbsp;正しく半角数字で記入して下さい。</p>
                
            <?php
            }
            else
            {
            ?>
                <p>その他&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_other; ?></p>
                
            <?php
            }
            ?>
            
            <p>仕入先&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_shop; ?></p>
              
            <p>購入日&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_date; ?></p>
              
            <p>販売日&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_saledate; ?></p>
            
            <?php
            if($hurugi_gazou['size'] > 0)
            {
                if($hurugi_gazou['size'] > 10000000)
                {
            ?>
                    <p>画像&nbsp;&nbsp;:&nbsp;&nbsp;画像サイズを小さくしてください。</p>
            <?php
                }
                else
                {
                    move_uploaded_file($hurugi_gazou['tmp_name'],'./gazou/'.$hurugi_gazou['name']);
                    print'<img src="./gazou/'.$hurugi_gazou['name'].'">';
                    print'<br />';
                }
            }
            
            ?>
            
            </section>
            
            <section class="addtenp">
            
            <p>
                商品状態&nbsp;&nbsp;:&nbsp;&nbsp;
                
                <?php
                switch($hurugi_status)
                {
                    case'new':
                        $status = '新品、未使用';
            
                        break;
                    
                    case'near':
                        $status = '未使用に近い';
                        
                        break;
                        
                    case'nodirt':
                        $status = '目立った傷や汚れなし';
                        
                        break;
                    
                    case'somewhat':
                        $status = 'やや傷や汚れあり';
                        
                        break;
                    
                    case'dirt':
                        $status = '傷や汚れあり';
                        
                        break;
                        
                    case'bad':
                        $status = '全体的に状態が悪い';
                        
                        break;
                }
                
                print $status;
                ?>
                
                
                
            </p>
            
            <p>着丈&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_length; ?></p>
              
            <p>身幅&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_width; ?></p>
              
            <p>袖丈&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_sleeve; ?></p>
            
            <p>肩幅&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_shoulder; ?></p>
            
            <p>ブランド名&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_brand; ?></p>
              
            <p>カラー&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_color; ?></p>
              
            <p>素材&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_material; ?></p>
            
            <p>年代&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_era; ?>年代</p>
            
            
            <?php
            
            if(preg_match('/\A[0-9]+\z/',$hurugi_stocking)==0 || preg_match('/\A[0-9]+\z/',$hurugi_stocking)==0 || 
            preg_match('/\A[0-9]+\z/',$hurugi_expect)==0 || $hurugi_gazou['size'] > 10000000 ||
            preg_match('/\A[0-9]+\z/',$hurugi_other)==0 || preg_match('/\A[0-9]+\z/',$hurugi_postage)==0 || preg_match('/^[0-9]+(\.[0-9]*)?$/',$hurugi_fee)==0)
            {
                
            ?>
                <form>
                    <input type="button" onclick="history.back()" value="戻る">
                </form>
                
            <?php
            }
            else
            {
            ?>
                <p>上記の情報を追加します。</p>
                <form method="post" action="hurugi_add_done.php">
                    <input type="hidden" name="namecode" value="<?php print $hurugi_namecode; ?>">
                    <input type="hidden" name="name" value="<?php print $hurugi_name; ?>">
                    <input type="hidden" name="stocking" value="<?php print $hurugi_stocking; ?>">
                    <input type="hidden" name="expect" value="<?php print $hurugi_expect; ?>">
                    <input type="hidden" name="sale" value="<?php print $hurugi_sale; ?>">
                    <input type="hidden" name="shop" value="<?php print $hurugi_shop; ?>">
                    <input type="hidden" name="date" value="<?php print $hurugi_date; ?>">
                    <input type="hidden" name="saledate" value="<?php print $hurugi_saledate; ?>">
                    <input type="hidden" name="remarks" value="<?php print $hurugi_remarks; ?>">
                    <input type="hidden" name="gazou_name" value="<?php print $hurugi_gazou['name']; ?>">
                    
                    <input type="hidden" name="danjo" value="<?php print $hurugi_danjo; ?>">
                    <input type="hidden" name="sales_channel" value="<?php print $hurugi_sales_channel; ?>">
                    <input type="hidden" name="fee" value="<?php print $hurugi_fee; ?>">
                    <input type="hidden" name="postage" value="<?php print $hurugi_postage; ?>">
                    <input type="hidden" name="other" value="<?php print $hurugi_other; ?>">
                    <input type="hidden" name="status" value="<?php print $hurugi_status; ?>">
                    <input type="hidden" name="length" value="<?php print $hurugi_length; ?>">
                    <input type="hidden" name="width" value="<?php print $hurugi_width; ?>">
                    <input type="hidden" name="sleeve" value="<?php print $hurugi_sleeve; ?>">
                    <input type="hidden" name="shoulder" value="<?php print $hurugi_shoulder; ?>">
                    <input type="hidden" name="brand" value="<?php print $hurugi_brand; ?>">
                    <input type="hidden" name="color" value="<?php print $hurugi_color; ?>">
                    <input type="hidden" name="material" value="<?php print $hurugi_material; ?>">
                    <input type="hidden" name="era" value="<?php print $hurugi_era; ?>">
                
                    <input type="button" onclick="history.back()" value="戻る">
                    <input type="submit" value="OK">
                </form>
            <?php
            }
        
            ?>
        </section>
         
        </section>
         
    </section>
    </body>
</html>