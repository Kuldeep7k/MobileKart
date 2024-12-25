<?php
session_start();
ob_start();
$u = 0;
if (isset($_SESSION['username'])) {
  header('Location: ./');
}
if (isset($_SESSION['msg1'])) {
  $v = $_SESSION['msg1'];
  $u = strlen($v);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Login</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <link rel="stylesheet" href="css/Formstyle.css">
  <!-- add icon link -->
  <link rel="icon" href="img/1Mobilekart.png" type="image/x-icon">
  <?php include('config/check.php'); ?>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top scrolling-navbar">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand" href="./">
        <img src="img/Mobilekart.jpg" height="60" alt="" loading="lazy" />
      </a>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="mt-5 mb-3">
          <!-- Spacing -->
        </div>
        <div class="signup-form mt-5">
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="text-danger h3 mb-3">
              <?php
              if (isset($_SESSION['msg1'])) {
                echo $_SESSION['msg1'];
              }
              ?>
            </div>
            <h2>Login</h2>
            <p>Please Enter Your Registered Email & Password</p>
            <hr>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if (isset($_COOKIE['useremail'])) {
                                                                                                  echo $_COOKIE['useremail'];
                                                                                                } ?>" required="required">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="passcode" placeholder="Password" pattern=".{8,}"
                title="Eight or more characters" value="<?php if (isset($_COOKIE['userpassword'])) {
                                                                                          echo $_COOKIE['userpassword'];
                                                                                        } ?>" required="required">
            </div>
            <div class="form-group">
              <input type="checkbox" name="chkbox"> Remember Me
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
          </form>
          <div class="hint-text fs-5">New to Mobilekart? </div>
          <div class="hint-text fs-5"> <a href="Signup.php"><button type="button"
                class="btn text-primary bg-white btn-lg">Create your Mobilekart account</button></a></div>
        </div>
      </div>
    </div>
  </div>
  <!--  SCRIPTS  -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>

</html>
