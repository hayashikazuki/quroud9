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
    
    $staff_code=$_GET['staffcode'];
    
    $dsn = 'mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT name FROM king_staff WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_code;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $staff_name = $rec['name'];
    
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
        <link rel="stylesheet" href="staff.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
        
        <section class="deletemenu">
        
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
    
        <section class="delete">
        <p>スタッフ削除</p>
            <ul class="deletestaff">
                <li>
                    <p>スタッフコード:<?php print $staff_code; ?></p>
                </li>
                <li>
                    <p>スタッフ名: <?php print $staff_name; ?></p>
                </li>
                <li>
                    <p>このスタッフを削除してよろしいですか？</p>
                </li>
            </ul>
        <form method="post" action="staff_delete_done.php">
        <input type="hidden" name="code" value="<?php print $staff_code; ?>">
        <input type="hidden" name="name" value="<?php print $staff_name; ?>">
        <input type="button" onclick="history.back()" value="戻る" class="btn">
        <input type="submit" value="OK" class="btn">
        </form>
        </section>
        
        </section>
    
    </body>
</html>