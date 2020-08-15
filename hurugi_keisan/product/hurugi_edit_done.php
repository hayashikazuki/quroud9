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
    $shopcode = $_SESSION['shopcode'];
    $employ = $_SESSION['employ'];
}
?>
<?php
    
    try
    {
        
    require_once('../common/common.php');
    
    $post = sanitize($_POST);
    $hurugi_code=$post['code'];
    $hurugi_namecode=$post['namecode'];
    $hurugi_name=$post['name'];
    $hurugi_stocking=$post['stocking'];
    $hurugi_expect=$post['expect'];
    $hurugi_sale=$post['sale'];
    $hurugi_shop=$post['shop'];
    $hurugi_date=$post['date'];
    $hurugi_saledate=$post['saledate'];
    $hurugi_remarks=$post['remarks'];
    
    $hurugi_gazou_name_old = $post['gazou_name_old'];
    $hurugi_gazou = $_FILES['gazou'];
    
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
    
    $hurugi_salestatus=$post['salestatus'];
    
    $hurugi_profit = floor($hurugi_sale * (100 - $hurugi_fee) * 0.01 - ($hurugi_postage + $hurugi_other));
    $hurugi_profit_rate = ($hurugi_profit / $hurugi_sale) * 100;
                
    
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
        
        
        <section class="edit_done">
            
            <p class="edittitle">商品修正</p>

    
            <?php
            
            if($hurugi_gazou['size'] > 0)
            {
                if($hurugi_gazou['size'] > 10000000)
                {
                    
            ?>
                <p>画像サイズを小さくしてください。</p>
                
            <?php
                }
                else
                {
                    move_uploaded_file($hurugi_gazou['tmp_name'],'./gazou/'.$hurugi_gazou['name']);
                }
            }
            
            ?>
            
            
            
            
            
            <?php
    
            if(preg_match('/\A[0-9]+\z/',$hurugi_stocking)==0 || preg_match('/\A[0-9]+\z/',$hurugi_sale)==0 || preg_match('/\A[0-9]+\z/',$hurugi_expect)==0 || 
            $hurugi_gazou['size'] > 100000000 || preg_match('/\A[0-9]+\z/',$hurugi_other)==0 || preg_match('/\A[0-9]+\z/',$hurugi_postage)==0 || preg_match('/^[0-9]+(\.[0-9]*)?$/',$hurugi_fee)==0)
            {
                print'<p>数字は正しく半角で入力してください。</p>';
                print'<br />';
                print'<form>';
                print'<input type="button" onclick="history.back()" value="戻る" class="edit_back_btn">';
                print'</form>';
                exit();
    
            }
    
            $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
            $user='root';
            $password='';
            $dbh = new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $sql = 'UPDATE hurugi_product SET namecode=?,name=?,danjo=?,salestatus=?,stocking=?,expect=?,sale=?,sales_channel=?,fee=?,postage=?,other=?,
            profit=?,profit_rate=?,shop=?,date=?,saledate=?,remarks=?,gazou=?,
            status=?,length=?,width=?,sleeve=?,shoulder=?,brand=?,color=?,material=?,era=? WHERE code=?';
            $stmt = $dbh->prepare($sql);
            
            $data[]=$hurugi_namecode;
            $data[]=$hurugi_name;
            
            // if($hurugi_danjo == 'man')
            //     {
            //         $data[] = 'man';
            //     }
            //     else
            //     {
            //         $data[] = 'women';
            //     }
            $data[] = $hurugi_danjo;
            // if($hurugi_salestatus == 'notsale')
            // {
            //     $data[] = 'notsale';
            // }
            // elseif($hurugi_salestatus == 'onsale')
            // {
            //     $data[] = 'onsale';
            // }
            // else
            // {
            //     $data[] = 'sold';
            // }
            
            $data[] = $hurugi_salestatus;
                
            $data[] = $hurugi_stocking;
            $data[] = $hurugi_expect;
            $data[] = $hurugi_sale;
            
            // switch($hurugi_sales_channel)
            //     {
            //         case'mel':
            //             $data[] = 'mel';
            //             break;
                    
            //         case'raku':
            //             $data[] = 'raku';
            //             break;
                        
            //         case'yah':
            //             $data[] = 'yah';
            //             break;
                    
            //         case'premium':
            //             $data[] = 'premium';
            //             break;
                    
            //         case'otherapp':
            //             $data[] = 'otherapp';
            //             break;
                // }
            $data[] = $hurugi_sales_channel;
            
                
            $data[] = $hurugi_fee;
            $data[] = $hurugi_postage;
            $data[] = $hurugi_other;
            $data[] = $hurugi_profit;
            $data[] = $hurugi_profit_rate;
            $data[]=$hurugi_shop;
            $data[]=$hurugi_date;
            $data[]=$hurugi_saledate;
            $data[]=$hurugi_remarks;
            $data[]=$hurugi_gazou['name'];
            
            // switch($hurugi_status)
            //     {
            //         case'new':
            //             $data[] = 'new';
            
            //             break;
                    
            //         case'near':
            //             $data[] = 'near';
                        
            //             break;
                        
            //         case'nodird':
            //             $data[] = 'nodird';
                        
            //             break;
                    
            //         case'somewhat':
            //             $data[] = 'somewhat';
                        
            //             break;
                    
            //         case'dirt':
            //             $data[] = 'dirt';
                        
            //             break;
                        
            //         case'bad':
            //             $data[] = 'bad';
                        
            //             break;
            //     }
            $data[] = $hurugi_status;
            $data[] = $hurugi_length;
            $data[] = $hurugi_width;
            $data[] = $hurugi_sleeve;
            $data[] = $hurugi_shoulder;
            $data[] = $hurugi_brand;
            $data[] = $hurugi_color;
            $data[] = $hurugi_material;
            $data[] = $hurugi_era;
    
            $data[]=$hurugi_code;
            
            $stmt->execute($data);
            
            $dbh = null;
            
            if($hurugi_gazou_name_old != $hurugi_gazou['name'])
            {
                if($hurugi_gazou_name_old != '')
                {
                    unlink('./gazou/'.$hurugi_gazou_name_old);
                }
            }
            
            }
            catch(Exception $e)
            {
                print 'ただいま障害により大変ご迷惑をお掛けしております。';
                exit();
            }
            ?>
            
            
            <br />
            <p class="done_word">修正しました。</p>
            
            <a href="hurugi_list.php" class="to_list">一覧へ戻る</a>
    
    
        </section>
        
        </section>
    </body>
</html>
    