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
    $shopcode= $_SESSION['shopcode'];
    $employ = $_SESSION['employ'];
}
?>
<?php
    
    try
    {
        
    require_once('../common/common.php');
    
    $year=$_POST['year'];
    $month=$_POST['month'];
    
    $fields = $_POST['field'];
    
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT namecode,name,danjo,stocking,expect,sale,fee,postage,other,sales_channel,
    shop,date,saledate,remarks,brand,era,salestatus,profit,profit_rate FROM hurugi_product 
    WHERE substr(saledate,1,4)=? AND substr(saledate,6,2)=? AND shopcode=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $year;
    $data[] = $month;
    $data[] = $shopcode;
    $stmt->execute($data);
    
    $dbh = null;
    
    
    
    
    $columns = [
        'namecode' => '商品コード',
        'name' => '商品名',
        'salestatus' => 'ステータス',
        'danjo' => 'カテゴリー',
        'brand' => 'ブランド名',
        'era' => '年代',
        'stocking' => '仕入額',
        'expect' => '販売予想額',
        'sale' => '販売額',
        'fee' => '手数料',
        'postage' => '送料',
        'other' => 'その他',
        'profit' => '利益',
        'profit_rate' => '利益率',
        'sales_channel' => '販路',
        'shop' => '仕入先',
        'date' => '購入日',
        'saledate' => '販売日',
        'remarks' => '備考',
        
    ];
    

    
    foreach($fields as $value){
        $csv .= $columns[$value] . ',';
    }
    
    
    $csv.="\n";
    
    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false)
        {
            break;
        }
        
        foreach($fields as $value){
            
            
            switch($value){
                case 'danjo':
                if($rec['danjo']=='man')
                {
                    $csv.='メンズ';
                }
                else
                {
                    $csv.='レディース';
                }
                
                break;
                    
                case 'salestatus':
                    
                if($rec['salestatus']=='notsale')
                {
                    $csv.='未販売';
                }
                elseif($rec['salestatus']=='onsale')
                {
                    $csv.='販売中';
                }
                else{
                    $csv.='販売済み';
                }
                    
                break;
                    
                case 'sales_channel':
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
                        $csv.=$app; 
                        
                        break;
                        
                        
                case 'profit_rate':
                    
                    $csv.=floor($rec['profit_rate']);
                    
                    break;
              
                
                default:
                    $csv.= $rec[$value];
                    break;
            }
            
            
            $csv.= ",";
        }
        
        $csv.= "\n";
    }
    
    // print nl2br($csv);
    
    $file=fopen('./hurugi_saledate.csv','w');
    $csv = mb_convert_encoding($csv,'SJIS','UTF-8');
    fputs($file,$csv);
    fclose($file);
    
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
        
        <section class="dawnloadmenu">
        
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
                < <?php
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
    
    
        <section class="dawnload">
            <p class="dawnloadtitle">販売月ダウンロード</p>

            <a href="hurugi_saledate.csv" class="dawnload_menu"><?php print $year; ?>年&nbsp;<?php print $month; ?>月&nbsp;ダウンロード</a><br />
            <br />
            <a href="saledate_download.php" class="more_add">日付選択へ</a><br />
            <br />
            <a href="hurugi_list.php" class="to_list">一覧へ戻る</a>
    
        </section>
        
        </section>
    
    </body>
</html>