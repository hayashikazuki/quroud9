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
    
    // shopcodeがない場合にSQLエラーが発生していたので処理を追加しました。
    if(isset($_SESSION['shopcode'])){
        $shopcode = $_SESSION['shopcode'];
    }else{
        header('Location:../staff_login/staff_login.php');
    }
    $employ = $_SESSION['employ'];
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
    $status = $_POST['status'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $saleyear = $_POST['saleyear'];
    $salemonth = $_POST['salemonth'];
    
    
    
    
    
    if(!empty($_SESSION['request'])){
        
        if(empty($_GET['page']) && !empty($_GET['sort']) && !empty($_GET['type']))
        {
            $name = $_SESSION['request']['name'];
            $shop = $_SESSION['request']['shop'];
            $status = $_SESSION['request']['status'];
            $year = $_SESSION['request']['year'];
            $month = $_SESSION['request']['month'];
            $saleyear = $_SESSION['request']['saleyear'];
            $salemonth = $_SESSION['request']['salemonth'];
        }
        
        if(!empty($_GET['page']))
        {
            $name = $_SESSION['request']['name'];
            $shop = $_SESSION['request']['shop'];
            $status = $_SESSION['request']['status'];
            $year = $_SESSION['request']['year'];
            $month = $_SESSION['request']['month'];
            $saleyear = $_SESSION['request']['saleyear'];
            $salemonth = $_SESSION['request']['salemonth'];
            $sort = $_SESSION['request']['sort'];
            $type = $_SESSION['request']['type'];
    
        }
        
        
    }
    
   if(empty($_GET['page']) && empty($_GET['sort']) && empty($_GET['type']))
    {
        $_SESSION['request'] = $_REQUEST;
    }
    
    
    
    
    
    
    if(isset($_GET['sort'])){
        // $_GET['sort']があった場合は$sortに値をセットする
        $sort = $_GET['sort'];
    }else{
        // GETでsortが指定されていない場合の初期値を指定しておく
        $sort = 'namecode';
    }
    
    
    
    if(isset($_GET['type'])){
        // $_GET['type']があった場合は$typeに値をセットする
        $type = $_GET['type'];
    }else{
        // GETでtypeが指定されていない場合の初期値を指定しておく
        $type = 'asc';
    }
    
    
    
    
    $page = $_GET['page'];
    
    
    
    
    
    
    
    $whereFlg = false;
    
    $sql = 'SELECT code,namecode,name,danjo,stocking,expect,sale,fee,postage,other,sales_channel,shop,
    date,saledate,remarks,salestatus,profit,profit_rate FROM hurugi_product ';
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
    
    if(!empty($status)){
        if($whereFlg == true){
            $sql .= ' AND salestatus = "'.$status .'"';
        }else{
            $sql .= 'WHERE salestatus = "'.$status .'"';
            
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
            
            $whereFlg = true;
            
        }
    }
    
    if($whereFlg == true){
        $sql .= ' AND shopcode = ' . $shopcode;
    }else{
        $sql .= ' WHERE shopcode = ' . $shopcode;
    }
    
    if(!empty($sort)){
        $sql .= ' ORDER BY ' . $sort . ' '. $type;
    }
    
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $cnt = count($stmt->fetchAll());
    
    
    
    $limit = 10;
    
    $sql .= ' LIMIT '.$limit;
    
    if(!isset($_GET['page'])){
        $page = 1;
    }
   
        
    $offset = $page * $limit - $limit;
            //   1     * 3      - 3 = 0
            //   2     * 3      - 3 = 3
            //   3     * 3      - 3 = 6
        
    $sql .= ' OFFSET '.$offset;
    
    
    
   
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
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
        <link rel="stylesheet" href="bootstrap.css"/>
        <link rel="stylesheet" href="hurugi.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
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
                <br />
                <li class="tool">
                    <a href=""><i class="fab fa-youtube fa-fw">youtube</i></a>
                    <p id="tooltip">当サイト管理者のyoutubeチャンネルへ</p>
                </li>
                <br />
                <li class="tool2">
                    <a href=""><i class="far fa-id-card fa-fw"></i>portfolio</a>
                    <p id="tooltip2">当サイト作成者情報、webアプリ、HP作成のご依頼へ</p>
                </li>
            </ul>
        </section>
        
        <section class="mobile-menu">
    
                <form method="post" action="hurugi_list.php">
                    <input type="search" name="name" style="width:300px;" class="name-search" placeholder="商品検索" value="<?php print $name; ?>" />
                    &nbsp;&nbsp;
                    <input type="submit" value="検索" class="search-btn" style="width:50px;"/>
                    &nbsp;&nbsp;
                    
                    
                
                
                
                <div class="menu-plus">
                    
                    <div class="search-icon">
                        <i class="fas fa-search-plus fa-4x"></i>
                    </div>
                    
                    
                    <div class="menu-more">
                        
                            販売状況&nbsp;
                            <?php salestatus($status); ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                            購入月&nbsp;
                            <?php pulldown_year($year); ?>&nbsp;年&nbsp;
                            <?php pulldown_month($month); ?>&nbsp;月&nbsp;
                            &nbsp;&nbsp;
                            
                            <a href="hurugi_list.php">条件クリア</a>
                            
                            
                        
                    </div>
            
                </div>
                
                </form>
            
            
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
                
                <div class="login-name">
                    <p><?php print $login; ?>さん、ログイン中<i class="fas fa-user-alt fa-fw fa-2x"></i></p>
                </div>
            </div>
            
        
        </section>
        
        
        
        
    
　  <section class="main">
　     
　      
　      <section class="reserch">
    
            
                <form method="post" action="hurugi_list.php">
                    
                
                    
                <p>
                    商品名&nbsp;
                    <input type="text" name="name"  value="<?php print $name; ?>" />
                    &nbsp;&nbsp;
                    
                    仕入先&nbsp;
                    <input type="text" name="shop"  value="<?php print $shop; ?>" />
                    &nbsp;&nbsp;
                    
                    販売状況&nbsp;
                    <?php salestatus($status); ?>
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
                
                <div class="listmenu-btn">
                <p><i class="fa fa-bars fa-3x" aria-hidden="true"></i></p>
                </div>
            
        </section>
        
        
        
        
        
    
        
        <p class="listtitle">仕入れ商品一覧</p>
        
        <form method="post" action="hurugi_branch.php">
            <input type="submit" value="商品を追加する" name="add" class="mobile-add-btn">
        </form>
    
        <table class="table table-bordered mobile-notdisplay">

            <tr>
                <?php if($sort == 'namecode'){ ?>
                <th class="sort-selected">
                    NO
                    
                    <?php if($type == 'asc'){ ?>
                        <a href="?sort=namecode&type=desc">
                            <i class="fas fa-sort-amount-up fa-2x"></i>
                        </a>
                    <?php }else{ ?>
                        <a href="?sort=namecode&type=asc">
                            <i class="fas fa-sort-amount-down fa-2x"></i>
                        </a>
                    <?php } ?>
                </th>
                <?php }else{ ?>
                <th>
                    NO
                        <a href="?sort=namecode&type=asc">
                            <i class="fas fa-sort-amount-up fa-2x"></i>
                        </a>
                </th>
                <?php } ?>
                
                <th>商品名</th>
                <th>販売状況</th>
                <th>カテゴリー</th>
                
                <?php if($sort == 'stocking'){ ?>
                <th class="sort-selected">
                    仕入額
                    
                    <?php if($type == 'desc'){ ?>
                        <a href="?sort=stocking&type=asc">
                            <i class="fas fa-sort-amount-down fa-2x"></i>
                        </a>
                    <?php }else{ ?>
                        <a href="?sort=stocking&type=desc">
                            <i class="fas fa-sort-amount-up fa-2x"></i>
                        </a>
                    <?php } ?>
                </th>
                <?php }else{ ?>
                <th>
                    仕入額
            
                        <a href="?sort=stocking&type=asc">
                            <i class="fas fa-sort-amount-up fa-2x"></i>
                        </a>
                </th>
                <?php } ?>
                 
                <?php if($sort == 'expect'){ ?>
                <th class="sort-selected">
                    販売予想額 
                    
                    <?php if($type == 'desc' || $sort != 'expect'){ ?>
                        <a href="?sort=expect&type=asc">
                            <i class="fas fa-sort-amount-down fa-2x"></i>
                        </a>
                    <?php }else{ ?>
                        <a href="?sort=expect&type=desc">
                            <i class="fas fa-sort-amount-up fa-2x"></i>
                        </a>
                    <?php } ?>
                </th>
                <?php }else{ ?>
                <th>
                    販売予想額 
                    
                        <a href="?sort=expect&type=asc">
                            <i class="fas fa-sort-amount-up fa-2x"></i>
                        </a>
                </th>
                <?php } ?>
                
                
                <?php if($sort == 'sale'){ ?>
                <th class="sort-selected">
                    販売額
                    
                    <?php if($type == 'desc' || $sort != 'sale'){ ?>
                    <a href="?sort=sale&type=asc">
                        <i class="fas fa-sort-amount-down fa-2x"></i>
                    </a>
                    <?php }else{ ?>
                    <a href="?sort=sale&type=desc">
                        <i class="fas fa-sort-amount-up fa-2x"></i>
                    </a>
                    <?php } ?>
                </th>
                <?php }else{ ?>
                <th>
                    販売額
                    
                    <a href="?sort=sale&type=asc">
                        <i class="fas fa-sort-amount-up fa-2x"></i>
                    </a>
                </th>
                <?php } ?>
                
                <th>手数料</th>
                <th>送料</th>
                <th>その他</th>
                
                <?php if($sort == 'profit'){ ?>
                <th class="sort-selected">
                    利益
                    
                    <?php if($type == 'desc' || $sort != 'profit'){ ?>
                    <a href="?sort=profit&type=asc">
                        <i class="fas fa-sort-amount-down fa-2x"></i>
                    </a>
                    <?php }else{ ?>
                    <a href="?sort=profit&type=desc">
                        <i class="fas fa-sort-amount-up fa-2x"></i>
                    </a>
                    <?php } ?>
                </th>
                <?php }else{ ?>
                <th>
                    利益
                    
                    <a href="?sort=profit&type=asc">
                        <i class="fas fa-sort-amount-up fa-2x"></i>
                    </a>
                </th>
                <?php } ?>
                
                <?php if($sort == 'profit_rate'){ ?>
                <th class="sort-selected">
                    利益率
                    
                    <?php if($type == 'desc' || $sort != 'profit_rate'){ ?>
                    <a href="?sort=profit_rate&type=asc">
                        <i class="fas fa-sort-amount-down fa-2x"></i>
                    </a>
                    <?php }else{ ?>
                    <a href="?sort=profit_rate&type=desc">
                        <i class="fas fa-sort-amount-up fa-2x"></i>
                    </a>
                    <?php } ?>
                </th>
                <?php }else{ ?>
                <th>
                    利益率
                    
                    <a href="?sort=profit_rate&type=asc">
                        <i class="fas fa-sort-amount-up fa-2x"></i>
                    </a>
                </th>
                <?php } ?>
                    
                <th>販路</th>
                <th>仕入先</th>
                <th>購入日</th>
                <th>販売日</th>
                
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
                if($rec['salestatus']=='notsale')
                {
                    print'<p class="notsale">未販売</p>';
                }
                elseif($rec['salestatus']=='onsale')
                {
                    print'<p class="onsale">販売中</p>';
                }
                else{
                    print'<p class="sold">販売済み</p>';
                }
                ?>
            </td>
            <td class="mobile">
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
            <td class="right">
                <?php print number_format($rec['stocking']); ?>
            </td>
            <td class="right">
                <?php print number_format($rec['expect']); ?>
            </td>
            <td class="right">
                <?php print number_format($rec['sale']); ?>
            </td>
            <td class="right">
                <?php print $rec['fee']; ?>
            </td>
            <td class="right">
                <?php print number_format($rec['postage']); ?>
            </td>
            <td class="right">
                <?php print number_format($rec['other']); ?>
            </td>
            
            <td class="right">
                <?php print number_format(floor($rec['profit'])); ?>
            </td>
            <td class="right">
                <?php print floor($rec['profit_rate']); ?>
            </td>
            <td class="mobile">
                
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
    
        
        <section class="mobile-list">
            <div class="namecode">
                <p>商品コード:<?php print $rec['namecode']; ?></p>
            </div>
            <div class="name">
                <p>
                    <a href="hurugi_disp.php?hurugicode=<?php print $rec['code']; ?>">
                    <?php print $rec['name']; ?>
                　　</a>
                </p>
            </div>
            <div class="salestatus">
                <?php
                if($rec['salestatus']=='notsale')
                {
                    print'<div class="mobile-notsale">未販売</div>';
                }
                elseif($rec['salestatus']=='onsale')
                {
                    print'<div class="mobile-onsale">販売中</div>';
                }
                else{
                    print'<div class="mobile-sold">販売済み</div>';
                }
                ?>
            </div>
            <div class="stocking">
                <p>仕入額:¥<?php print number_format($rec['stocking']); ?></p>
            </div>
            <div class="sale">
                <p>販売額:¥<?php print number_format($rec['sale']); ?></p>
            </div>
            <div class="fee">
                <p>手数料:<?php print $rec['fee']; ?>％</p>
            </div>
            <div class="postage">
                <p>送料:¥<?php print number_format($rec['postage']); ?></p>
            </div>
            <div class="other">
                <p>その他:¥<?php print number_format($rec['other']); ?></p>
            </div>
            <div class="profit">
                <p>利益:¥<?php print number_format(floor($rec['profit'])); ?></p>
            </div>
            <div class="profit_rate">
                <p>利益率:<?php print floor($rec['profit_rate']); ?>％</p>
            </div>
            <div class="date">
                <p><?php print $rec['date']; ?></p>
            </div>
        </section>
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
    if($cnt % 10 == 0)
    {
        $max = $cnt / 10;
        
    }else{
        $max = ($cnt / 10) +1;
    }
    ?>
    
    
    <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">

        <?php 
        if($page == 1){
        ?>
        
        <li class="page-item disabled">
            <a class="page-link" href="?page=<?php print $page -1 ?>&type=<?php print $type; ?>&sort=<?php print $sort; ?>">Prev</a>
        </li>
        
        <?php
        }else{
        ?>
        
        <li class="page-item">
            <a class="page-link" href="?page=<?php print $page -1 ?>&type=<?php print $type; ?>&sort=<?php print $sort; ?>">Prev</a>
        </li>
        
        <?php    
        }
        ?>
        
        
        <?php
        for($i=1; $i <= $max; $i++)
        {
            if($i == $page)
            {
        ?>
        
        <li class="page-item active">
            <span class="page-link">
            <a class="page-link" href="?page=<?php print $i; ?>&type=<?php print $type; ?>&sort=<?php print $sort; ?>"><?php print $i; ?></a>
            <span class="sr-only">(current)</span>
            </span>
        </li>
        
        <?php  
            }else{
        ?>
        
        
        <li class="page-item">
            <a class="page-link" href="?page=<?php print $i; ?>&type=<?php print $type; ?>&sort=<?php print $sort; ?>"><?php print $i; ?></a>
        </li>
        
        <?php
            }
        }
        ?>
        
        
        
        <?php 
        if($page == $max){
        ?>
        
        <li class="page-item disabled">
            <a class="page-link" href="?page=<?php echo $page +1 ?>&type=<?php print $type; ?>&sort=<?php print $sort; ?>">Next</a>
        </li>
        
        <?php
        }else{
        ?>
        
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo $page +1 ?>&type=<?php print $type; ?>&sort=<?php print $sort; ?>">Next</a>
        </li>
        
        <?php    
        }
        ?>
        
        
        
        
        
        
        
  </ul>
</nav>

    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="hurugi.js"></script>
    
    </body>
    
</html>