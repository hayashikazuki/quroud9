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
    $year = $_POST['year'];
    $month = $_POST['month'];
    
    $dsn = 'mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = '
    SELECT
        *
    FROM 
        king_info
    WHERE 
        substr(king_info.date,1,4) = ?
        AND substr(king_info.date,6,2) = ?
    ';
    $stmt = $dbh -> prepare($sql);
    $data[] = $year;
    $data[] = $month;
    $stmt->execute($data);
        
    $dbh = null;
    
    $csv = '受付コード,受付日時,お名前,メール,件名';
    $csv.="\n";
    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false)
        {
            break;
        }
        $csv.=$rec['code'];
        $csv.=',';
        $csv.=$rec['date'];
        $csv.=',';
        $csv.=$rec['name'];
        $csv.=',';
        $csv.=$rec['email'];
        $csv.=',';
        $csv.=$rec['subject'];
        $csv.="\n";
    }
    
    // print nl2br($csv);
    
    $file=fopen('./uketuke.csv','w');
    $csv = mb_convert_encoding($csv,'SJIS','UTF-8');
    fputs($file,$csv);
    fclose($file);
    
    
    
    
    }
    catch(Exception $e)
    {
        print'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>CONTACT管理ページ</title>
        <link rel="stylesheet" href="order.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
    
        <div class="loginarea">
            <p><?php print $login; ?>さん、ログイン中</p>
        </div>
        <section class="menu">
            <p>ダウンロード</p>
            <ul class="selectmenu">
                <li>
                    <a href="uketuke.csv">"注文データのダウンロード"</a>
                    <br />
                    <br />
                </li>
                <li>
                    <a href="order_download.php">日付選択へ</a>
                </li>
                <li>
                    <a href="../info/king_info_list.php">トップメニューへ</a>
                </li>
            </ul>
        </section>
        
    </body>
</html>