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
    
    $dsn = 'mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT code,name FROM king_staff WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
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
        <link rel="stylesheet" href="../info/bootstrap.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
        
        <div class="loginarea_list">
            <p><?php print $login; ?>さん、ログイン中</p>
        </div>
        <section class="list"> 
            <p>スタッフ一覧</p>
            <a href="../staff_login/staff_top.php">トップメニューへ</a>
            <form method="post" action="staff_branch.php">
                <input type="submit" name="add" value="追加" class="listbtn">
            </form>    
            <div class="staff-list">
                <table class="table table-striped">
                    <tr>
                        <td>スタッフコード</td>
                        <td>スタッフ名</td>
                    </tr>
            
                <?php
                while(true)
                {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                if($rec == false)
                {
                    break;
                }
                ?>
                
                <tr>
                    <td><?php print $rec['code']; ?></td>
                    <td>
                        <a href="staff_disp.php?staffcode=<?php print $rec['code']; ?>">
                            <?php print $rec['name']; ?>
                        </a>
                    </td>
                </tr>
                <?php } ?>
                </table>
            </div>
        </section>
   
    
    
    
    </body>
</html>