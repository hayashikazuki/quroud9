<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="bootstrap.css"/>
    </head>
    <body>
    <?php
    
    try
    {
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT code,namecode,name,stocking,expect,sale,shop,date,saledate,remarks FROM hurugi_product WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    $dbh = null;
    
    
    ?>
    
    <p>仕入れ管理一覧</p>
    <form method="post" action="hurugi_branch.php">
        <input type="submit" value="追加" name="add">
    </form>
    <a href="hurugi_download.php">購入月からダウンロード</a>
    <br />
    <a href="saledate_download.php">販売日からダウンロード</a>
    
    <table class="table table-bordered">
        <tr>
            <td>商品コード</td>
            <td>商品名</td>
            <td>仕入額</td>
            <td>販売予想額</td>
            <td>販売額</td>
            <td>利益</td>
            <td>利益率</td>
            <td>仕入先</td>
            <td>購入日</td>
            <td>販売日</td>
            <td>備考</td>
        </tr>
    <?php
    while(true)
    {

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false)
        {
            break;
        }
        print '<tr>';
        print '<td>';
        print $rec['namecode'];
        print '</td>';
        print '<td>';
        print '<a href="hurugi_disp.php?hurugicode='.$rec['code'].'">';
        print $rec['name'];
        print '</a>';
        print '</td>';
        print '<td>';
        print $rec['stocking'];
        print '</td>';
        print '<td>';
        print $rec['expect'];
        print '</td>';
        print '<td>';
        print $rec['sale'];
        print '</td>';
        print '<td>';
        print $rec['sale']-$rec['stocking'];
        print '</td>';
        print '<td>';
        print floor(($rec['sale']-$rec['stocking']) / $rec['sale'] * 100);
        print '</td>';
        print '<td>';
        print $rec['shop'];
        print '</td>';
        print '<td>';
        print $rec['date'];
        print '</td>';
        print '<td>';
        print $rec['saledate'];
        print '</td>';
        print '<td>';
        print $rec['remarks'];
        print '</td>';
        print '</tr>';
    }
    ?>
    </table>
    
    <?php
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
    
    
    
    
    </body>
</html>