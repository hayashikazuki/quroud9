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
    
    try
    {
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $name = $_POST['name'];
    $shop = $_POST['shop'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $saleyear = $_POST['saleyear'];
    $salemonth = $_POST['salemonth'];
    
    
    
    if(!empty($_SESSION['request'])){
        $name = $_SESSION['request']['name'];
        $shop = $_SESSION['request']['shop'];
        $year = $_SESSION['request']['year'];
        $month = $_SESSION['request']['month'];
        $saleyear = $_SESSION['request']['saleyear'];
        $salemonth = $_SESSION['request']['salemonth'];
        
        
        
    }
    
    $_SESSION['request'] = $_REQUEST;
    
    $sort = $_GET['sort'];
    $type = $_GET['type'];
    
    
    $whereFlg = false;
    
    $sql = 'SELECT code,namecode,name,danjo,stocking,expect,sale,fee,postage,other,sales_channel,shop,date,saledate,remarks FROM hurugi_product ';
    // $sql .= 'WHERE user_code = ' . $_SESSION['userCode'];
    
    
    if(!empty($name)){
        $sql .= 'WHERE name like "%'.$name . '%"';
        
        $whereFlg = true;
        
    }
    
    if(!empty($shop)){
        
        if($whereFlg == true){
            $sql .= ' AND shop like "%'.$shop . '%"';
        }else{
            $sql .= 'WHERE shop like "%'.$shop . '%"';
            
            $whereFlg = true;
        }
        
    }
    
    if(!empty($year) && !empty($month)){
        if($whereFlg == true){
            $sql .= ' AND substr(hurugi_product.date,1,4) = ' . $year;
            $sql .= ' AND substr(hurugi_product.date,6,2) = ' . $month;
        }else{
            $sql .= ' WHERE substr(hurugi_product.date,1,4) = ' . $year;
            $sql .= ' AND substr(hurugi_product.date,6,2) = ' . $month;
            
            $whereFlg = true;
        }
    }
    
    if(!empty($saleyear) && !empty($salemonth)){
        if($whereFlg == true){
            $sql .= ' AND substr(hurugi_product.saledate,1,4) = ' . $saleyear;
            $sql .= ' AND substr(hurugi_product.saledate,6,2) = ' . $salemonth;
        }else{
            $sql .= ' WHERE substr(hurugi_product.saledate,1,4) = ' . $saleyear;
            $sql .= ' AND substr(hurugi_product.saledate,6,2) = ' . $salemonth;
            
        }
    }
    
    if(!empty($sort)){
        $sql .= ' ORDER BY ' . $sort . ' '. $type;
    }
    
    
   
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    $dbh = null;
    
    
    ?>
<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="bootstrap.css"/>
        <link rel="stylesheet" href="hurugi.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
    
    
    <?php
    require_once('../common/common.php');
    ?>
    
    <section class="listmenu">
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
    
　  <section class="main">
　     
　      
　      <section class="reserch">
    
            
                <form method="post" action="hurugi_list.php">
                    
                
                    
                <p>
                    [商品絞り込み]&nbsp;&nbsp;
                    商品名&nbsp;
                    <input type="text" name="name" value="<?php print $name; ?>" />
                    &nbsp;&nbsp;
                    
                    仕入先&nbsp;
                    <input type="text" name="shop" value="<?php print $shop; ?>" />
                    &nbsp;&nbsp;
                    
                    購入月&nbsp;
                    <?php pulldown_year($year); ?>&nbsp;年&nbsp;
                    <?php pulldown_month($month); ?>&nbsp;月&nbsp;
                    &nbsp;&nbsp;
                    
                    販売月&nbsp;
                    <?php pulldown_saleyear($saleyear); ?>&nbsp;年&nbsp;
                    <?php pulldown_salemonth($salemonth); ?>&nbsp;月&nbsp;
                    &nbsp;&nbsp;
                    <input type="submit" value="検索"/>
                    &nbsp;&nbsp;
                    <a href="hurugi_list.php">条件クリア</a>
                </p>
                
                </form>
            
        </section>
        
        
    
        
        <p class="listtitle">仕入れ商品一覧</p>
        
        <form method="post" action="hurugi_branch.php">
            <input type="submit" value="商品を追加する" name="add">
        </form>
    
        <table class="table table-bordered">

            <tr>
                <td>商品コード</td>
                <td><a href="?sort=name">商品名</a></td>
                <td>カテゴリー</td>
                <td>仕入額 <a href="?sort=stocking&type=desc">↑  </a><a href="?sort=stocking&type=asc">↓</a></td>
                <td>販売予想額 <a href="?sort=expect&type=desc">↑  </a><a href="?sort=expect&type=asc">↓</a></td>
                <td>販売額 <a href="?sort=sale&type=desc">↑  </a><a href="?sort=sale&type=asc">↓</a></td>
                <td>手数料</td>
                <td>送料</td>
                <td>その他</td>
                <td>利益</td>
                <td>利益率</td>
                <td>販路</td>
                <td>仕入先</td>
                <td>購入日</td>
                <td>販売日</td>
                <!--<td>備考</td>-->
            </tr>
        <?php
        while(true)
        {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec==false)
            {
                break;
            }
        ?>
    
    
        <tr>
            <td>
                <?php print $rec['namecode']; ?>
            </td>
            <td>
                <a href="hurugi_disp.php?hurugicode=<?php print $rec['code']; ?>">
                    <?php print $rec['name']; ?>
                </a>
            </td>
            <td>
                <?php
                if($rec['danjo'] == 'man')
                {
                    print 'メンズ';
                }
                else
                {
                    print 'レディース';
                }
                ?>
            </td>
            <td>
                <?php print number_format($rec['stocking']); ?>
            </td>
            <td>
                <?php print number_format($rec['expect']); ?>
            </td>
            <td>
                <?php print number_format($rec['sale']); ?>
            </td>
            <td>
                <?php print $rec['fee']; ?>
            </td>
            <td>
                <?php print number_format($rec['postage']); ?>
            </td>
            <td>
                <?php print number_format($rec['other']); ?>
            </td>
            
                    <?php
                       $sale = $rec['sale'] * (100 - $rec['fee']) * 0.01 - ($rec['postage'] + $rec['other']);
                       $profit = $sale - $rec['stocking'];
                    ?>
            <td>
                <?php print $profit; ?>
            </td>
            <td>
                <?php print floor($profit / $sale * 100); ?>
            </td>
            <td>
                
                <?php
                        switch($rec['sales_channel'])
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
            </td>
            <td>
                <?php print $rec['shop']; ?>
            </td>
            <td>
                <?php print $rec['date']; ?>
            </td>
            <td>
                <?php print $rec['saledate']; ?>
            </td>
            
        </tr>
    <?php 
    }
    ?>
    </table>
    
    </section>
    
    </section>
    
    <a href="hurugi_add.php" class="add-btn-link">
    <div class="add-btn">
        <i class="fas fa-plus"></i>
    </div>
    </a>
    
    <?php
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="hurugi.js"></script>
    
    </body>
</html>