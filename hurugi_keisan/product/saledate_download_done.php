<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
    </head>
    <body>
    <?php
    
    try
    {
        
    require_once('../common/common.php');
    
    $year=$_POST['year'];
    $month=$_POST['month'];
    $day=$_POST['day'];
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT namecode,name,stocking,expect,sale,shop,date,saledate,remarks FROM hurugi_product 
    WHERE substr(saledate,1,4)=? AND substr(saledate,6,2)=? AND substr(saledate,9,2)=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $year;
    $data[] = $month;
    $data[] = $day;
    $stmt->execute($data);
    
    $dbh = null;
    
    $csv.='商品コード,商品名,仕入額,販売予想額,販売額,利益,利益率,仕入先,購入日,販売日,備考';
    $csv.="\n";
    
    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false)
        {
            break;
        }
        $csv.= $rec['namecode'];
        $csv.= ",";
        $csv.= $rec['name'];
        $csv.= ",";
        $csv.= $rec['stocking'];
        $csv.= ",";
        $csv.= $rec['expect'];
        $csv.= ",";
        $csv.= $rec['sale'];
        $csv.= ",";
        $csv.= $rec['sale']-$rec['stocking'];
        $csv.= ",";
        $csv.= ($rec['sale']-$rec['stocking']) / $rec['sale'] * 100;
        $csv.= ",";
        $csv.= $rec['shop'];
        $csv.= ",";
        $csv.= $rec['date'];
        $csv.= ",";
        $csv.= $rec['saledate'];
        $csv.= ",";
        $csv.= $rec['remarks'];
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
    
    <a href="hurugi_saledate.csv">ダウンロード</a><br />
    <br />
    <a href="saledate_download.php">日付選択へ</a><br />
    <br />
    <a href="hurugi_list.php">一覧へ戻る</a>
    
    </body>
</html>