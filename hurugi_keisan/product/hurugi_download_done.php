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
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT name,stocking,sale,shop,date,remarks FROM hurugi_product WHERE substr(date,1,4)=? AND substr(date,6,2)=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $year;
    $data[] = $month;
    $stmt->execute($data);
    
    $dbh = null;
    
    $csv.='商品名,仕入額,販売額,利益,仕入先,購入日,備考';
    $csv.="\n";
    
    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false)
        {
            break;
        }
        $csv.= $rec['name'];
        $csv.= ",";
        $csv.= $rec['stocking'];
        $csv.= ",";
        $csv.= $rec['sale'];
        $csv.= ",";
        $csv.= $rec['sale']-$rec['stocking'];
        $csv.= ",";
        $csv.= $rec['shop'];
        $csv.= ",";
        $csv.= $rec['date'];
        $csv.= ",";
        $csv.= $rec['remarks'];
        $csv.= "\n";
    }
    
    // print nl2br($csv);
    
    $file=fopen('./hurugi.csv','w');
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
    
    <a href="hurugi.csv">ダウンロード</a><br />
    <br />
    <a href="hurugi_download.php">日付選択へ</a><br />
    <br />
    <a href="hurugi_list.php">一覧へ戻る</a>
    
    </body>
</html>