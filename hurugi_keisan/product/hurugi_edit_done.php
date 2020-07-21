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
    
    ?>
<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="hurugi.css"/>
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
        
        
        <section class="edit">
            
            <p class="edittitle">商品修正</p>

    
            <?php
            
            if($hurugi_gazou['size'] > 0)
            {
                if($hurugi_gazou['size'] > 1000000)
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
            $hurugi_gazou['size'] > 1000000 || preg_match('/\A[0-9]+\z/',$hurugi_other)==0 || preg_match('/\A[0-9]+\z/',$hurugi_postage)==0 || preg_match('/^[0-9]+(\.[0-9]*)?$/',$hurugi_fee)==0)
            {
                print'<p>数字は正しく半角で入力してください。</p>';
                print'<br />';
                print'<form>';
                print'<input type="button" onclick="history.back()" value="戻る">';
                print'</form>';
                exit();
    
            }
    
            $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
            $user='root';
            $password='';
            $dbh = new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $sql = 'UPDATE hurugi_product SET namecode=?,name=?,danjo=?,stocking=?,expect=?,sale=?,fee=?,postage=?,other=?,sales_channel=?,
            shop=?,date=?,saledate=?,remarks=?,gazou=?,status=?,length=?,width=?,sleeve=?,shoulder=?,brand=?,color=?,material=?,era=? WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[]=$hurugi_namecode;
            $data[]=$hurugi_name;
            
            if($hurugi_danjo == 'man')
                {
                    $data[] = 'man';
                }
                else
                {
                    $data[] = 'women';
                }
                
            $data[]=$hurugi_stocking;
            $data[]=$hurugi_expect;
            $data[]=$hurugi_sale;
            $data[] = $hurugi_fee;
            $data[] = $hurugi_postage;
            $data[] = $hurugi_other;
            
            switch($hurugi_sales_channel)
                {
                    case'mel':
                        $data[] = 'mel';
                        break;
                    
                    case'raku':
                        $data[] = 'raku';
                        break;
                        
                    case'yah':
                        $data[] = 'yah';
                        break;
                    
                    case'premium':
                        $data[] = 'premium';
                        break;
                    
                    case'otherapp':
                        $data[] = 'otherapp';
                        break;
                }
            $data[]=$hurugi_shop;
            $data[]=$hurugi_date;
            $data[]=$hurugi_saledate;
            $data[]=$hurugi_remarks;
            $data[]=$hurugi_gazou['name'];
            
            switch($hurugi_status)
                {
                    case'new':
                        $data[] = 'new';
            
                        break;
                    
                    case'near':
                        $data[] = 'near';
                        
                        break;
                        
                    case'nodird':
                        $data[] = 'nodird';
                        
                        break;
                    
                    case'somewhat':
                        $data[] = 'somewhat';
                        
                        break;
                    
                    case'dirt':
                        $data[] = 'dirt';
                        
                        break;
                        
                    case'bad':
                        $data[] = 'bad';
                        
                        break;
                }
                
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
    
            <p>修正しました。</p>
            <a href="hurugi_list.php">一覧へ戻る</a>
    
    
        </section>
        
        </section>
    </body>
</html>
    