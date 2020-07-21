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
        
        <section class="dispmenu">
        
        <section class="menu">
            <div class="toplist-loginarea">
                <p><?php print $login; ?>さん、ログイン中</p>
            </div>
            <p class="toplistmenu">トップメニュー</p>
            <ul class="selectmenu">
                <li><a href="../staff/staff_list.php">スタッフ管理</a></li>
                <br />
                <li><a href="../info/king_info_list.php">ご依頼者管理</a></li>
                <br />
                <li><a href="../order/order_download.php">ご依頼者情報ダウンロード</a></li>
                <br />
                <li><a href="../staff_login/staff_logout.php">ログアウト</a></li>
            </ul>
        </section>
        
        <section class="disp">
            <p>ご依頼者情報参照</p>
            <ul class="dispinfo">
                <li>
                    <p>・受付コード&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $king_code; ?></p>
                </li>
                <li>
                    <p>・ご依頼者名&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $king_name; ?></p>
                </li>
                <li>
                    <p>・メールアドレス&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $king_email; ?></p>
                </li>
                <li>
                    <p>・ご依頼日時&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $king_date; ?></p>
                </li>
                <li>
                    <p>・件名&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $king_subject; ?></p>
                </li>
                <li>
                    <p>・メッセージ&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $king_messages; ?></p>
                </li>
            </ul>
            
            <form method="post" action="king_info_delete.php">
                <input type="hidden" name="kingcode" value="<?php print $king_code; ?>">
                <input type="submit" name="delete" value="削除" class="btn">
            </form>

        </section>
        
        </section>
    
    </body>
</html>