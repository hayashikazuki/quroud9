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
    
    
    $send = '送信いたしました...';
    
    }
    catch (Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    
    ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>hayashi_kazuki</title>
        <link rel="stylesheet" href="king_info.css"/>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    </head>
    <body>
    
    
    <div class="send">
        <p><?php print $send; ?></p>
        <p><?php print $info_name; ?>さま、</p>
        <p>お問い合わせありがとうございます。</p>
        <p>後日ご連絡を差し上げます。</p>
        <p class="top"><a href="../hp/king.html">トップへ戻る</a></p>
        <a href="https://mobile.twitter.com/hakayazu1998" target="_blank"><i class="fab fa-twitter fa-fw faa-wrench animated-hover fa-2x"></i></a>
        <a href=""><i class="fab fa-facebook fa-fw faa-wrench animated-hover fa-2x"></i></a>
        <a href="../hp/works.html" target="_blank"><i class="fas fa-portrait fa-fw faa-wrench animated-hover fa-2x"></i></a>
    </div>
    
    </body>
</html>