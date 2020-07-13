<?php
    
    try
    {
        
    require_once('../common/common.php');
    
    $year=$_POST['year'];
    $month=$_POST['month'];
    
    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT namecode,name,stocking,expect,sale,shop,date,saledate,remarks FROM hurugi_product 
    WHERE substr(saledate,1,4)=? AND substr(saledate,6,2)=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $year;
    $data[] = $month;
    $stmt->execute($data);
    
    $dbh = null;
    
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="bootstrap.css"/>
    </head>
    <body>
        
    <p>販売月表示</p>
    <p><?php print $year; ?>年&nbsp;&nbsp;<?php print $month; ?>月</p>
    
    <a href="hurugi_list.php">一覧へ戻る</a>
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

    </body>
</html>