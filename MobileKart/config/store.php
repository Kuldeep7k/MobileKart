<?php
session_start();
include('config/db.php');
// If the values are posted, insert them into the database.
if (isset($_POST['submit']))
{
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile= $_POST['mobile'];
    $gender=  $_POST['gender'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm_password'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $city=$_POST['city'];

   //Creating token using random bytes in range of 15
    $token=bin2hex(random_bytes(15));
    $slquery = "SELECT * FROM userdata WHERE email = '$email'";
    $selectresult = mysqli_query($con,$slquery);
    if(mysqli_num_rows($selectresult)>0)
    {
      echo '<script>alert("email already exists")</script>';
    }
    elseif($password != $cpassword){
      echo '<script>alert("passwords NOT match")</script>';
     }
    else
    {    
        //Encryption of password using hash algorithum in binary
         $code=password_hash($password,PASSWORD_BCRYPT);
          $query = "insert into userdata (username,email,mobile,gender,address,city,pincode,password,token,status) 
          values ('$username','$email','$mobile','$gender','$address','$city','$pincode','$code','$token','inactive')";
           $result = mysqli_query($con,$query);
          if($result)
          {    
            $subject = "Email Activation";
            $body = "Hi !, $username . Please Click Here to Activate your Account.  
             http://localhost/ProjectWeb/MobileKart/activate.php?token=$token ";
            $sender_email = "From:mobilekart.24x7@gmail.com";
            if(mail($email, $subject, $body, $sender_email)){
               $_SESSION['msg1']="Check Your Email to Activate Your Account $email";  
            }else{
               echo "Sorry, failed while sending mail!";
            }
             echo '<script>alert("Signup Successfully.")</script>';
             //echo '<script>window.location.href = "/MobileKart/Login.php";</script>';
             echo '<script> var url= "http://localhost/ProjectWeb/MobileKart/Login.php"; 
             window.location = url; </script>';
          }
    }
   }
?>
<?php
/*

Process for config Localhost to send email

Open XAMPP Installation Directory.

Go to C:\xampp\php and open the php.ini file.
Find [mail function] by pressing ctrl + f.
Search and pass the following values:
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = YourGmailId@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"


Now, go to C:\xampp\sendmail and open the sendmail.ini file.

Find [sendmail] by pressing ctrl + f.
Search and pass the following values
smtp_server=smtp.gmail.com
smtp_port=587 or 25 //use any of them
error_logfile=error.log
debug_logfile=debug.log
auth_username=YourGmailId@gmail.com
auth_password=Your-Gmail-Password
force_sender=YourGmailId@gmail.com(optional)

Here is the actual code that you have to write
Script To Send Mail:

script >>>>

<?php

$to_email = "receipient@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>

**Note: If you are getting a warning message then Please configure “Less secure apps” settings as shown below. Sometimes without turning on the 'less secure apps' is the main reason the user didn't receive the mail.

=> Turning on 'less secure apps' settings as mailbox user

Go to your (Google Account).
On the left navigation panel, click Security.
On the bottom of the page, in the Less secure app access panel, click Turn on access.
If you don't see this setting, your administrator might have turned off less secure app account access (check the instruction above).
Click the Save button.

*/
?>