<?php
 include('config/db.php');
// If the values are posted, insert them into the database.
if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $passcode = $_POST['passcode'];
    $slquery = "SELECT * FROM userdata WHERE email = '$email' and status='active' ";
    $selectresult = mysqli_query($con,$slquery);
    if(mysqli_num_rows($selectresult))
    {    
      $email_pass=mysqli_fetch_assoc($selectresult);
      $db_pass=$email_pass['password'];
      $_SESSION['username']=$email_pass['username'];
      $pass_decode=password_verify($passcode,$db_pass);
      if($pass_decode)
      {
        if(isset($_POST['chkbox'])){
          
          setcookie('useremail',$email,time()+86400);
          setcookie('userpassword',$passcode,time()+86400);
          header('Location: Home.php');
        }
        else {
          setcookie('useremail',$email,time()+86400);
          header('Location: Home.php');
        }
    }
      else
      {
       echo '<script>alert("Password incorrect")</script>';
      }
    }
    else
    {
      echo '<script>alert("Email NOT exists")</script>';
   }
}
?>