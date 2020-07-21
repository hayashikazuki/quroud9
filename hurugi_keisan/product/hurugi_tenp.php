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
        
        
        $hurugi_code=$_GET['hurugicode'];    
        
        $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
        $user='root';
        $password='';
        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $sql ='SELECT namecode,name,danjo,stocking,expect,sale,fee,postage,other,sales_channel,shop,date,saledate,remarks,gazou,
        status,length,width,sleeve,shoulder,brand,color,material,era FROM hurugi_product WHERE code=?';
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
        $hurugi_gazou_name=$rec['gazou'];
        
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
        
    <section class="tenpmenu">
        
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
        
    <section class="tenp">
        <p class="tenptitle">テンプレート一覧</p>
        
        <p>テンプレート❶</p>
        
        <div class="tenp1">
            <p>閲覧いただき誠にありがとうございます^ ^</p>
            <br />
            <p>即購入大歓迎でございます。</p>
            <p>★フォローで10%割引★</p>
            <p>その他の値段交渉等も随時承ります。詳しくはプロフィールをご覧ください。</p>
            <br />
            <br />
            <br />
            <p>◯ 商品の状態: </p>
            <br />
            <p>こちらの商品は 【】ランクです。</p>
            <p>【新】新品または新品同様に近いもの。</p>
            <p>【1】多少使用感はあるが、目立つ傷や大きな汚れはないもの。</p>
            <p>【2】使用感や部分的にやや傷や汚れがあるが、着用には問題がないもの。普段古着を買う方なら気にならない程度。</p>
            <p>【3】使用感や傷、汚れがあるもの。古着慣れしている方におすすめ。</p>
            <p>【4】大きな傷や汚れが見られるもの。古着上級者さんや、気にならない方、リメイクに使われる方におすすめ。</p>
            <p>【R】デッドストック or 激レア。</p>
            <br />
            <br />
            <br />
            <p>★状態について★</p>
            <p>特に目立った傷や汚れのないお品物です。古着故、多少の使用感はございますが、普段古着を切られる方でしたら、まだまだお使い頂ける一枚かと思います。</p>
            <p>※出品している商品は古着、オールド品、ヴィンテージ品が主になります。</p>
            <p>多少の小キズ・スレ・汚れ等見落としてしまう場合があります。ご理解の上、ご購入をお願い致します。</p>
            <br />
            <br />
            <br />
            <p>◯ サイズ: </p>
            <p>実寸平置き</p>
            <br />
            <p>着丈&nbsp;&nbsp;<?php print $hurugi_length; ?>&nbsp;&nbsp;
               /&nbsp;&nbsp;身幅&nbsp;&nbsp;<?php print $hurugi_width; ?>&nbsp;&nbsp;
               /&nbsp;&nbsp;袖丈&nbsp;&nbsp;<?php print $hurugi_sleeve; ?>&nbsp;&nbsp;
               /&nbsp;&nbsp;肩幅&nbsp;&nbsp;<?php print $hurugi_shoulder; ?>&nbsp;&nbsp;</p>
            <br />
            <p>※素人採寸になりますので、測定値の若干の誤差はご了承下さいませ。</p>
            <br />
            <br />
            <br />
            <p>◯ ブランド: <?php print $hurugi_brand; ?></p>
            <br />
            <p>◯カラー：<?php print $hurugi_color; ?></p>
            <br />
            <p>◯ 素材: <?php print $hurugi_material; ?></p>
            <br />
            <p>◯ 年代: <?php print $hurugi_era; ?></p>
            <br />
            <br />
            <p>◯ 基本的には、ご購入から3日以内に発送させて頂きます。</p>
            <p>発送できない日もございますので、その時はメッセージさせていただきます。</p>
            <p>発送方法は、追跡機能、補償のついているメルカリ便（クロネコヤマト宅急便）で行います。</p>
            <br />
            <p>『#店の名前』</p>
            <p>↑他の商品も出品しておりますので、是非ご覧ください。</p>
            <p>最後までお読みいただきありがとうございました^ ^</p>
            <p>気持ちの良いお取引をどうぞよろしくお願い致します。</p>
        </div>
        
    </section>
    
    </section>
 
    </body>
</html>