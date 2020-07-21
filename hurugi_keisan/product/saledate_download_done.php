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
    
    $year=$_POST['year'];
    $month=$_POST['month'];
    
    $fields = $_POST['field'];
    
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT namecode,name,danjo,stocking,expect,sale,fee,postage,other,sales_channel,
    shop,date,saledate,remarks,brand,era FROM hurugi_product 
    WHERE substr(saledate,1,4)=? AND substr(saledate,6,2)=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $year;
    $data[] = $month;
    
    $stmt->execute($data);
    
    $dbh = null;
    
    
    
    
    $columns = [
        'namecode' => '商品コード',
        'name' => '商品名',
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
                case 'profit':
                    $csv.= $rec['sale'] * (100 - $rec['fee']) * 0.01 - ($rec['postage'] + $rec['other']) - $rec['stocking'];
                    break;
                    
                case 'profit_rate':
                    $profit = $rec['sale'] * (100 - $rec['fee']) * 0.01 - ($rec['postage'] + $rec['other']) - $rec['stocking'];
                    $sale = $rec['sale'] * (100 - $rec['fee']) * 0.01 - ($rec['postage'] + $rec['other']);
                    $csv.= $profit / $sale * 100;
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
    </head>
    <body>
        
        <section class="dawnloadmenu">
        
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
    
    
        <section class="dawnload">
            <p class="dawnloadtitle">販売月ダウンロード</p>

            <a href="hurugi_saledate.csv"><?php print $year; ?>年&nbsp;<?php print $month; ?>月&nbsp;ダウンロード</a><br />
            <br />
            <a href="saledate_download.php">日付選択へ</a><br />
            <br />
            <a href="hurugi_list.php">一覧へ戻る</a>
    
        </section>
        
        </section>
    
    </body>
</html>