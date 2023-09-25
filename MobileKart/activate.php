<?php
session_start();
include('config/db.php');
if(isset($_GET['token']))
{
 $token=$_GET['token'];
    $update_query="update userdata set status='active' where token='$token' ";
    $updated=mysqli_query($con,$update_query);
    if($update_query)
    {   
        if(isset($_SESSION['msg1']))
        {
        $_SESSION['msg1']="Account Created Successfully.";
        header('Location: Login.php');
        }
        else{
            $_SESSION['msg1']="You are Logged out.";
            header('Location: Login.php');
        }
    }else
    {
        $_SESSION['msg1']="Account NOT Updated.";
        header('Location: Login.php');
    }
}
?>