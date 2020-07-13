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
        <link rel="stylesheet" href="bootstrap.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
        <section class="listmonth"> 
    
            <p><?php print $year; ?>年&nbsp;&nbsp;<?php print $month; ?>月&nbsp;&nbsp;表示</p>
            <!--<a href="../staff_login/staff_top.php" class="topmenu">トップメニューへ</a>-->
            <a href="king_info_list.php">トップメニューへ</a>
            <br />
            <div class="kinginfo">
                <table class="table table-striped">
                    <tr>
                        <td>コード</td>
                        <td>ご依頼者名</td></td>
                        <td>件名</td>
                        <td>ご依頼日時</td>
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
                        <td><?php print $rec['name']; ?></td>
                        <td>
                            <a href="king_info_disp.php?kingcode=<?php print $rec['code']; ?>">
                                <?php print $rec['subject']; ?>
                            </a>
                        </td>
                        <td><?php print $rec['date']; ?></td>
                    </tr>
            
                <?php } ?>
            
                </table>   
            </div>
        </section>
    </section>
    </body>