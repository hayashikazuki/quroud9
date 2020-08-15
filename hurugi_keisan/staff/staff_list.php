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
    
    $dsn = 'mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT code,name,shopcode,employ FROM hurugi_staff WHERE 1';
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
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="staff.css"/>
        <link rel="stylesheet" href="../product/bootstrap.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="staff.js"></script>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
        
        <section class="listmenu">
        
        <section class="menu">
            <div class="toplist-loginarea">
                <p><?php print $login; ?>さん、ログイン中</p>
            </div>
            <p class="toplistmenu">トップメニュー</p>
            <ul class="selectmenu">
                <li><a href="../staff/staff_list.php">スタッフ管理</a></li>
                <br />
                <li><a href="../product/hurugi_list.php">商品管理</a></li>
                <br />
                <li><a href="../product/hurugi_download.php">購入月ダウンロード</a></li>
                <br />
                <li><a href="../product/saledate_download.php">販売月ダウンロード</a></li>
                <br />
                <li><a href="../staff_login/staff_logout.php">ログアウト</a></li>
            </ul>
        </section>
        
        
        <section class="mobile-menu">
            
            <p><?php print $login; ?>さん、ログイン中<i class="fas fa-user-alt fa-fw fa-2x"></i></p>
            
            <div class="menu-btn">
                <p><i class="fa fa-bars fa-3x" aria-hidden="true"></i></p>
            </div>
            <div class="mobile-content">
                <a href="../staff/staff_list.php" >
                    <div class="menu__item">スタッフ管理</div>
                </a>
                <br />
                <a href="../product/hurugi_list.php" >
                    <div class="menu__item">商品一覧</div>
                </a>
                <br />
                <a href="../product/hurugi_download.php" >
                    <div class="menu__item">購入月ダウンロード</div>
                </a>
                <br />
                <a href="../product/saledate_download.php" >
                    <div class="menu__item">販売月ダウンロード</div>
                </a>
                <br />
                <a href="../staff_login/staff_logout.php" >
                    <div class="menu__item">ログアウト</div>
                </a>
            </div>
            
        </section>
        
        <section class="list"> 
            <p>スタッフ一覧</p>
            <form method="post" action="staff_branch.php">
                <input type="submit" name="add" value="追加" class="listbtn">
            </form>    
            <div class="staff-list">
                <table class="table table-striped">
                    <tr>
                        <th>スタッフコード</th>
                        <th>スタッフ名</th>
                        <th>店舗コード</th>
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
                    <td><p><?php print $rec['code']; ?></p></td>
                    
                    <?php 
                    if($rec['employ'] == 'admin')
                    {
                    ?>   
                    
                    <td>
                        <a href="staff_disp.php?staffcode=<?php print $rec['code']; ?>">
                            <p class="admin"><?php print $rec['name']; ?></p>
                        </a>
                    </td>
                    
                    <?php
                    }else{
                    ?>
                    <td>
                        <a href="staff_disp.php?staffcode=<?php print $rec['code']; ?>">
                            <p><?php print $rec['name']; ?></p>
                        </a>
                    </td>
                    
                    <?php
                    }
                    ?>
                    
                    <td><p><?php print $rec['shopcode']; ?></p></td>
                </tr>
                <?php } ?>
                </table>
            </div>
        </section>
        
        </section>
   
    
    
    
    </body>
</html>