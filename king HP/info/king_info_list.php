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
    
    $sql = 'SELECT code,date,name,email,subject FROM king_info ';
    
    $year = $_POST['year'];
    $month = $_POST['month'];
    
    
    if(isset($year) && isset($month)){
        
        $sql .= ' WHERE substr(king_info.date,1,4) = ' . $year;
        $sql .= ' AND substr(king_info.date,6,2) = ' . $month;
        
    }else{
        
        $sql .= ' WHERE 1';
        
    }
    
    
    
    
    // $sql = 'SELECT code,date,name,email,subject FROM king_info WHERE 1';
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
        <link rel="stylesheet" href="king_many_info.css"/>
        <link rel="stylesheet" href="bootstrap.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
        
    <?php
    require_once('../common/common.php');
    ?>
        
    <section class="topmain">
        
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
    
        <section class="list"> 
    
            <p>ご依頼者一覧</p>
            <br />
            <!--<form method="post" action="king_info_dispmonth.php">-->
            <form method="post" action="king_info_list.php">
                <p><?php pulldown_year($year); ?>&nbsp;&nbsp;年&nbsp;&nbsp;<?php pulldown_month($month); ?>&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;<input type="submit" value="表示"></p>
            </form>
            <!--<a href="../staff_login/staff_top.php" class="topmenu">トップメニューへ</a>-->
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
</html>