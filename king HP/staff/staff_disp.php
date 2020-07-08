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
        
        <div class="loginarea">
            <p><?php print $login; ?>さん、ログイン中</p>
        </div>

        <section class="disp">
        <p>スタッフ情報参照</p>
        <ul class="dispstaff">
            <li>・スタッフコード&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $staff_code; ?></li>
            <li>・スタッフ名&nbsp;&nbsp;:&nbsp;&nbsp;<?php print $staff_name; ?></li>
        </ul>
        <form action=staff_branch.php method="post">
            <input type="hidden" name="staffcode" value="<?php print $staff_code; ?>">
            <input type="submit" name="edit" value="修正" class="listbtn">
            <input type="submit" name="delete" value="削除" class="listbtn">
            <input type="button" onclick="history.back()" value="戻る" class="listbtn">
        </form>
     </section>
    </body>
</html>