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
        
    require_once('../common/common.php');
    
    $post = sanitize($_POST);
    
    $king_code=$post['kingcode'];
    
    $dsn = 'mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT name,email FROM king_info WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $king_code;
    $stmt->execute($data);
    
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $king_name = $rec['name'];
    $king_email = $rec['email'];
    
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
        
    <div class="loginarea">
        <p><?php print $login; ?>さん、ログイン中</p>
    </div>
    <section class="delete">
    <p>ご依頼者削除</p>
        <ul class="deleteinfo">
            <li>
                <p>ご依頼者コード：<?php print $king_code;; ?></p>
            </li>
            <li>
                <p>ご依頼者名：<?php print $king_name; ?></p>
            </li>
            <li>
                <p>メールアドレス：<?php print $king_email; ?></p>
            </li>
            <li>
                <p>このご依頼者を削除してよろしいですか？</p>
            </li>
        </ul>
    <form method="post" action="king_info_delete_done.php">
    <input type="hidden" name="code" value="<?php print $king_code; ?>">
    <input type="hidden" name="name" value="<?php print $king_name; ?>">
    <input type="button" onclick="history.back()" value="戻る" class="btn">
    <input type="submit" value="OK" class="btn">
    </form>
    </section>

    </body>
</html>