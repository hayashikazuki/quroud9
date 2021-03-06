<?php

try
{
    
require_once('../common/common.php');
    
$post = sanitize($_POST);
$staff_code = $post['code'];
$staff_pass = $post['pass'];
  
$staff_pass = md5($staff_pass);

$dsn = 'mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name,shopcode,employ FROM hurugi_staff WHERE code=? AND password=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff_code;
$data[] = $staff_pass;
$stmt->execute($data);

$dbh = null;

$rec = $stmt->fetch(PDO::FETCH_ASSOC);


if($rec == false)
{
    print'スタッフコードかパスワードが間違っています。<br />';
    print'<a href="staff_login.php">戻る</a>';
    
    var_dump($data);
}
else
{   
    session_start();
    $_SESSION['login']=1;
    $_SESSION['staff_code']=$staff_code;
    $_SESSION['staff_name']=$rec['name'];
    $_SESSION['shopcode']=$rec['shopcode'];
    $_SESSION['employ']=$rec['employ'];
    header('Location:../product/hurugi_list.php');
    exit();
}
   
}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}



?>