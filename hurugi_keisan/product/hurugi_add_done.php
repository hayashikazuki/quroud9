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
    
    try{
    
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
    
    $hurugi_gazou_name=$post['gazou_name'];
    
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
    $hurugi_profit=$post['profit'];
    $hurugi_profit_rate=$post['profit_rate'];
    
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'INSERT INTO hurugi_product(namecode,shopcode,name,danjo,stocking,expect,sale,fee,postage,other,sales_channel,shop,date,saledate,remarks,gazou,
    status,length,width,sleeve,shoulder,brand,color,material,era,salestatus,profit,profit_rate)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $hurugi_namecode;
    $data[] = $shopcode;
    $data[] = $hurugi_name;
    
    if($hurugi_danjo == 'man')
    {
        $data[] = 'man';
    }
    else
    {
        $data[] = 'women';
    }
    
    $data[] = $hurugi_stocking;
    $data[] = $hurugi_expect;
    $data[] = $hurugi_sale;
    $data[] = $hurugi_fee;
    $data[] = $hurugi_postage;
    $data[] = $hurugi_other;
    $data[] = $hurugi_sales_channel;
    $data[] = $hurugi_shop;
    $data[] = $hurugi_date;
    $data[] = $hurugi_saledate;
    $data[] = $hurugi_remarks;
    $data[] = $hurugi_gazou_name;

    $data[] = $hurugi_status;
    $data[] = $hurugi_length;
    $data[] = $hurugi_width;
    $data[] = $hurugi_sleeve;
    $data[] = $hurugi_shoulder;
    $data[] = $hurugi_brand;
    $data[] = $hurugi_color;
    $data[] = $hurugi_material;
    $data[] = $hurugi_era;
    
    if($hurugi_salestatus=='notsale')
    {
        $data[] = 'notsale';
    }
    elseif($hurugi_salestatus=='onsale')
    {
        $data[] = 'onsale';
    }
    else
    {
        $data[] = 'sold';
    }
    
    $data[] = $hurugi_profit;
    $data[] = $hurugi_profit_rate;

    
    $stmt->execute($data);
    
    $dbh = null;
    
    
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
        
        
        <section class="add_done">
            <p class="addtitle">仕入れ情報追加</p>
            <br />
            <p class="done_word"><?php print $hurugi_name; ?>を追加しました。</p>
            <br />
            <a href="hurugi_add.php" class="more_add">さらに追加する</a>
            <br />
            <a href="hurugi_list.php" class="to_list">一覧へ戻る</a>
        </section>
    
    </section>
    </body>
</html>