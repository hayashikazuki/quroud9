<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print'ログインできません。<br />';
    print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print $_SESSION['staff_name'];
    print'さんログイン中<br />';
    print'<br />';
}
 try
    {
    
    $king_code=$_GET['kingcode'];
    
    $dsn = 'mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT date,name,email,subject,messages FROM king_info WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $king_code;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $king_date = $rec['date'];
    $king_name = $rec['name'];
    $king_email= $rec['email'];
    $king_subject = $rec['subject'];
    $king_messages = $rec['messages'];
    
    $dbh = null;
    
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
        <link rel="stylesheet" href="king_many_info.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />

    </head>
    <body>
        <section class="disp">
            <p>ご依頼者情報参照</p>
            <ul class="dispinfo">
                <li>
                    <p><受付コード></p>
                    <p><?php print $king_code; ?></p>
                    <br />
                </li>
                <li>
                    <p><ご依頼者名></p>
                    <p><?php print $king_name; ?></p>
                    <br />
                </li>
                <li>
                    <p> <メールアドレス></p>
                    <p><?php print $king_email; ?> </p>
                    <br />
                </li>
                <li>
                    <p><ご依頼日時></p>
                    <p><?php print $king_date; ?></p>
                    <br />
                </li>
                <li>
                    <p><件名></p>
                    <p><?php print $king_subject; ?> </p>
                    <br />
                </li>
                <li>
                    <p><ご依頼者からのメッセージ></p>
                    <p><?php print $king_messages; ?> </p>
                    <br />
                </li>
            </ul>
            
            <form>
                <input type="button" onclick="history.back()" value="戻る" class="btn">
            </form>
        </section>
    
    </body>
</html>