<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    $_SESSION['error']='ログアウトしています。再度ログインしてください。';
    header('Location:../staff_login/staff_login.php');
    exit();
}

// if(isset($_POST['disp'])==true)
// {
//     if(isset($_POST['staffcode'])==false)
//     {
//         header('Location:staff_ng.php');
//         exit();
//     }
//     $staff_code=$_POST['staffcode'];
//     header('Location:staff_disp.php?staffcode='.$staff_code);
//     exit();
// }


if(isset($_POST['add'])==true)
{
    header('Location:staff_add.php');
    exit();
}
    
if(isset($_POST['edit'])==true)
{
    
    $staff_code=$_POST['staffcode'];
    header('Location:staff_edit.php?staffcode='.$staff_code);
    exit();
}

if(isset($_POST['delete'])==true)
{
    
    $staff_code=$_POST['staffcode'];
    header('Location:staff_delete.php?staffcode='.$staff_code);
    exit();
}

?>