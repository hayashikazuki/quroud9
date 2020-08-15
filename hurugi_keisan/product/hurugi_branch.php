<?php

if(isset($_POST['add'])==true)
{
    $hurugi_code=$_POST['hurugicode'];
    header('Location:hurugi_add.php?hurugicode='.$hurugi_code);
    exit();
}

if(isset($_POST['edit'])==true)
{
    $hurugi_code=$_POST['hurugicode'];
    header('Location:hurugi_edit.php?hurugicode='.$hurugi_code);
    exit();
}

if(isset($_POST['delete'])==true)
{
    $hurugi_code=$_POST['hurugicode'];
    header('Location:hurugi_delete.php?hurugicode='.$hurugi_code);
    exit();
}


?>