<?php
session_start();
session_destroy();
setcookie('useremail','',time()-86400);
setcookie('userpassword','',time()-86400);
header('Location: Home.php');
?>