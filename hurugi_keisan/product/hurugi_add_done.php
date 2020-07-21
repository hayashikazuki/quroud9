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
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'INSERT INTO hurugi_product(namecode,name,danjo,stocking,expect,sale,fee,postage,other,sales_channel,shop,date,saledate,remarks,gazou,
    status,length,width,sleeve,shoulder,brand,color,material,era)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $hurugi_namecode;
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
            <p class="addtitle">仕入れ情報追加</p>
            <p><?php print $hurugi_name; ?>を追加しました。</p>
            <br />
            <a href="hurugi_add.php">さらに追加する</a>
            <br />
            <br />
            <a href="hurugi_list.php">一覧へ戻る</a>
        </section>
    
    </section>
    </body>
</html>