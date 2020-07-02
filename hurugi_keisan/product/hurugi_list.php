<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
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
    
    $sql = 'SELECT code,name,stocking,sale,shop,date,remarks FROM hurugi_product WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    $dbh = null;
    
    print '<p>仕入れ管理一覧</p>';
    print '<table border="1">';
    print '<tr>';
    print '<td>商品名</td>';
    print '<td>仕入額</td>';
    print '<td>販売額</td>';
    print '<td>利益</td>';
    print '<td>仕入先</td>';
    print '<td>購入日</td>';
    print '<td>備考</td>';
    print '</tr>';
    
    
    print '<form method="post" action="hurugi_branch.php">';
    
    while(true)
    {

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false)
        {
            break;
        }
        print '<tr>';
        print '<td>';
        print'<input type="radio" name="hurugicode" value="'.$rec['code'].'">';
        print $rec['name'];
        print '</td>';
        print '<td>';
        print $rec['stocking'];
        print '</td>';
        print '<td>';
        print $rec['sale'];
        print '</td>';
        print '<td>';
        print $rec['sale']-$rec['stocking'];
        print '</td>';
        print '<td>';
        print $rec['shop'];
        print '</td>';
        print '<td>';
        print $rec['date'];
        print '</td>';
        print '<td>';
        print $rec['remarks'];
        print '</td>';
        print '<br />';
        print '</tr>';
    }
    
    
    
    print '</table>';
    print'<input type="submit" value="追加" name="add">';
    print'<input type="submit" value="修正" name="edit">';
    print'<input type="submit" value="削除" name="delete">';
    print '</form>';
    
   
    }
    catch(Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
    
    <a href="hurugi_download.php">ダウンロードへ</a>
    
    <!--<p>仕入れ管理一覧</p>-->
    <!--<table border="1">-->
    <!--    <tr>-->
    <!--        <td>商品名</td>-->
    <!--        <td>仕入額</td>-->
    <!--        <td>販売額</td>-->
    <!--        <td>利益</td>-->
    <!--        <td>仕入先</td>-->
    <!--        <td>購入日</td>-->
    <!--        <td>備考</td>-->
    <!--    </tr>-->
    <!--</table>-->
    </body>
</html>