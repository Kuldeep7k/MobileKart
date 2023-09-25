<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Signup</title>
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
  <?php include('config/store.php'); ?>
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
  <div class="mt-5 mb-3"> spacing</div>
  <div class="signup-form mt-5">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      <h2>Sign Up</h2>
      <p>Please fill in this form to create an account!</p>
      <hr>
      <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username" required="required">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="mobile" placeholder="Mobile" pattern="[0-9]+" title="Please Check Your Mobile number" required="required">
      </div>
      <div class="form-group fs-5">
        &nbsp;Male
        <input type="radio" checked value="Male" name="gender">&nbsp;&nbsp; Female
        <input type="radio" value="Female" name="gender">&nbsp;&nbsp; Others
        <input type="radio" value="Others" name="gender">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="address" placeholder="Address" required></textarea>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="city" placeholder="City" required="required">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="pincode" placeholder="Pincode" required="required">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" pattern=".{8,}" title="Eight or more characters" required="required">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
      </div>
      <div class="form-group">
        <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="Terms of Use.php">Terms of Use</a> &amp; <a href="Privacy Policy.php">Privacy Policy</a></label>
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign Up</button>
      </div>
    </form>
    <div class="hint-text fs-5 ">Already have an account? <br><a href="Login.php"><button type="button" class="btn mx-3 mt-2 text-primary bg-white btn-lg">Login here</button></a></div>
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