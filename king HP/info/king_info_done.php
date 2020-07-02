<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>CONTACT管理ページ</title>
    </head>
    <body>
    <?php   
    
    try
    {
        
    require_once('../common/common.php');
    
    $post = sanitize($_POST);
    $info_name = $post['name'];
    $info_email = $post['email'];
    $info_subject = $post['subject'];
    $info_messages = $post['messages'];
    

    $dsn='mysql:dbname=king_hp_contact;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = 'INSERT INTO king_info(name,email,subject,messages)VALUES(?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $info_name;
    $data[] = $info_email;
    $data[] = $info_subject;
    $data[] = $info_messages;
    $stmt->execute($data);
    
    $dbh = null;
    
    print '送信いたしました。<br />';
    
    }
    catch (Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    
    ?>
    
    <a href="../hp/king.html">戻る</a>
    
    </body>
</html>