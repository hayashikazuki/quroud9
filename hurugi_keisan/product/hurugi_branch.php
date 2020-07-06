<?php

if(isset($_POST['disp'])==true)
{
    if(isset($_POST['hurugicode'])==false)
    {
        header('Location:hurugi_ng.php');
        exit();
    }
    
    $hurugi_code=$_POST['hurugicode'];
    header('Location:hurugi_disp.php?hurugicode='.$hurugi_code);
    exit();
}

if(isset($_POST['edit'])==true)
{
    if(isset($_POST['hurugicode'])==false)
    {
        header('Location:hurugi_ng.php');
        exit();
    }
    
    $hurugi_code=$_POST['hurugicode'];
    header('Location:hurugi_edit.php?hurugicode='.$hurugi_code);
    exit();
}

if(isset($_POST['delete'])==true)
{
    if(isset($_POST['hurugicode'])==false)
    {
        header('Location:hurugi_ng.php');
        exit();
    }
    
    $hurugi_code=$_POST['hurugicode'];
    header('Location:hurugi_delete.php?hurugicode='.$hurugi_code);
    exit();
}

if(isset($_POST['add'])==true)
{
    
    
    $hurugi_code=$_POST['hurugicode'];
    header('Location:hurugi_add.php');
    exit();
}

?>