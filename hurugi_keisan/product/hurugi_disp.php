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
    
    $hurugi_salestatus=$rec['salestatus'];
    $hurugi_profit=$rec['profit'];
    $hurugi_profit_rate=$rec['profit_rate'];
    
    
    $dbh = null;
    
    if($hurugi_gazou_name=='')
    {
        $disp_gazou='';
    }
    else
    {
        $disp_gazou='<img src="./gazou/'.$hurugi_gazou_name.'">';
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
        <link rel="stylesheet" href="hurugi.css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="hurugi.js"></script>
    </head>
    <body>
        
        <section class="dispmenu">
            
        
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
    
    
        <section class="disp">
            <p class="disptitle">商品参照</p>
            
            <section class="dispmain">
            <div class="gazou">
                <?php print $disp_gazou; ?>
            </div>
            
            <div class="disptype">
                <ul>
                    <li>商品コード&nbsp;：&nbsp;<?php print $hurugi_namecode; ?></li>
                    <li>商品名&nbsp;：&nbsp;<?php print $hurugi_name; ?></li>
                    <li>ステータス&nbsp;&nbsp;:&nbsp;&nbsp;
                        <?php
                        if($hurugi_salestatus == 'notsale')
                        {
                            print'未販売';
                        }
                        elseif($hurugi_salestatus == 'onsale')
                        {
                            print'販売中';
                        }
                        else
                        {
                            print'販売済み';
                        }
                        ?>
                    <li>
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
                    </li>
                    <li>仕入額&nbsp;：&nbsp;<?php print number_format($hurugi_stocking); ?>&nbsp;円</li>
                    <li>販売予想額&nbsp;：&nbsp;<?php print number_format($hurugi_expect); ?>&nbsp;円</li>
                    <li>販売額&nbsp;：&nbsp;<?php print number_format($hurugi_sale); ?>&nbsp;円</li>
                    <li>
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
                    </li> 
                    <li>手数料&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_fee; ?>%</li>
                    <li>送料&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_postage; ?>円</li>
                    <li>その他&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_other; ?>円</li>
                    <li>利益&nbsp;：&nbsp;<?php print number_format(floor($hurugi_profit)); ?>円</li>
                    <li>利益率&nbsp;：&nbsp;<?php print floor($hurugi_profit_rate); ?>％</li>
                    <li>仕入先&nbsp;：&nbsp;<?php print $hurugi_shop; ?></li>
                    <li>購入日&nbsp;：&nbsp;<?php print $hurugi_date; ?></li>
                    <li>販売日&nbsp;：&nbsp;<?php print $hurugi_saledate; ?></li>
                    <li>備考&nbsp;：&nbsp;<?php print $hurugi_remarks; ?></li>
                </ul>
                
                <ul>
                    <li>
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
                        
                        
                        
                    </li>
                    
                    <li>着丈&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_length; ?></li>
                      
                    <li>身幅&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_width; ?></li>
                      
                    <li>袖丈&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_sleeve; ?></li>
                    
                    <li>肩幅&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_shoulder; ?></li>
                    
                    <li>ブランド名&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_brand; ?></li>
                      
                    <li>カラー&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_color; ?></li>
                      
                    <li>素材&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_material; ?></li>
                    
                    <li>年代&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $hurugi_era; ?></li>
                </ul>
            </div>
            
            
            
                <form method="post" action="hurugi_branch.php" class="btnmenu">
                    <input type="hidden" name="hurugicode" value="<?php print $hurugi_code; ?>">
                    <input type="submit" value="修正" name="edit" class="disp_edit_btn">
                    <input type="submit" value="削除" name="delete" class="disp_delete_btn">
                    <br />
                    
                    <br />
                    
                    <a href="hurugi_tenp.php?hurugicode=<?php print $hurugi_code; ?>" class="more_add">テンプレート文章作成</a>
                    
                    <br />
                    <br />
                    
                
                    <a href="hurugi_list.php" class="to_list">一覧へ戻る</a>
                </form>
                
                
            
            
            
            </section>
        
        </section>
        
        </section>
    
    </body>
</html>