<?php
session_start();
$a = 0;
if (isset($_SESSION['username'])) {
  $name = $_SESSION['username'];
  $a = strlen($name);
} else {
  header('Location: Login.php');
}
include('config/db.php');
$userfind = $_COOKIE['useremail'];
$userdatafind = "select * from userdata where email='$userfind'";
$userresult = mysqli_query($con, $userdatafind);
$resultdata = mysqli_fetch_array($userresult);
if (isset($_POST['submit'])) {
  $newusername = $_POST['newusername'];
  $newmobile = $_POST['newmobile'];
  $newaddress = $_POST['newaddress'];
  $newpincode = $_POST['newpincode'];
  $newcity = $_POST['newcity'];
  $userid = $resultdata['id'];
  $updatesquery = "UPDATE userdata SET username='$newusername',mobile='$newmobile',address='$newaddress',city='$newcity',pincode='$newpincode' WHERE id='$userid'";
  $updateresult = $selectquery = mysqli_query($con, $updatesquery);
  if ($updatesquery) {
    $_SESSION['username'] = $newusername;
    header('Location: Account.php');
  } else {
    header('Location: Login.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Profile</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- add icon link -->
  <link rel="icon" href="img/1Mobilekart.png" type="image/x-icon">
</head>

<body>
  <header>
    <!-- Navbar -->
    <!--  fixed-top scrolling-navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5 fixed-top scrolling-navbar">
      <!-- Container wrapper -->
      <div class="container-fluid ">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <a class="navbar-brand mt-2 mt-lg-0" href="./"> <!-- Updated link to point to the home page -->
            <img src="img/Mobilekart.jpg" height="57" alt="" loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
        <!-- Right elements -->
        <div class="d-flex align-items-center">
          <!-- Icon -->
          <a class="text-reset me-3" href="#">
          </a>
          </ul>
          <ul class="navbar-nav d-flex flex-row">
            <?php
            if ($a > 0) {
            ?> <li>
                <h4 class="mt-2">
                  <?php
                  echo $name;
                  ?>
                </h4>
              </li>
              &nbsp&nbsp&nbsp
            <?php
            } else {
            ?>
            <?php
            }
            ?>
            <li>
              <button type="button" onclick="window.location.href='Logout.php';" class="btn btn-link px-3 me-2 text-theme fs-6">
                Logout
              </button>
            </li>
            <li>
              <button type="button" onclick="window.location.href='Signup.php';" class="btn btn-primary btn-theme  fs-6">
                Sign up
              </button>
            </li>
          </ul>
        </div>
        <!-- Right elements -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <br><br><br>
  <div class="container">
    <section class="mt-1">
      <form name="" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="4">
                <h1 class="text-center  text-white py-2 bg-primary">Account</h1>
              </th>
            </tr>
          </thead>
          <tbody class="fs-5">
            <tr>
              <td></td>
              <td></td>
              <th scope="col">Username</th>
              <td><input type="text" name="newusername" value="<?php echo $resultdata['username']; ?>"></td>
            </tr>
            <tr>
            <tr>
              <td></td>
              <td></td>
              <th scope="col">Email</th>
              <td><?php echo $_COOKIE['useremail']; ?></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <th scope="col">Password</th>
              <td>xxxxxxxxxx</td>
            </tr>
            <tr>
            <tr>
              <td></td>
              <td></td>
              <th scope="col">Mobile Number</th>
              <td><input type="text" name="newmobile" value="<?php echo $resultdata['mobile']; ?>"></td>
            </tr>
            <tr>
            <tr>
              <td></td>
              <td></td>
              <th scope="col">Gender</th>
              <td> <?php echo $resultdata['gender']; ?> </td>
            </tr>
            <tr>
            <tr>
              <td></td>
              <td></td>
              <th scope="col">Address</th>
              <td>
                <textarea type="text" name="newaddress"><?php echo $resultdata['address']; ?></textarea>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <th scope="col">Pincode</th>
              <td><input type="text" name="newpincode" value="<?php echo $resultdata['pincode'];  ?>"></td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <th scope="col">City</th>
              <td><input type="text" name="newcity" value="<?php echo $resultdata['city']; ?>"></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><input type="submit" value="Update" class="btn btn-primary btn-lg " name="submit"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </section>
  </div>
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Links  -->
    <section class="d-flex justify-content-center justify-content-lg-between p-2 border-bottom">
      <div class="container text-center text-md-start mt-3">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="navbar-brand ms-auto" href="./">
                <img src="img/Mobilekart.jpg" height="57" alt="" loading="lazy" />
              </i>
            </h6>
            <p>
              Mobilekart Internet Private Limited,
              Buildings Alyssa, Begonia &
              Clove Embassy Tech Village,
              Outer Ring Road, Devarabeesanahalli Village,
              Bengaluru, 560103,
              Karnataka, India
            </p>
          </div>
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="./Brand.php?Brand=Redmi" class="text-reset">Redmi</a>
            </p>
            <p>
              <a href="./Brand.php?Brand=Apple" class="text-reset">Apple</a>
            </p>
            <p>
              <a href="./Brand.php?Brand=OnePlus" class="text-reset">OnePlus</a>
            </p>
            <p>
              <a href="./Brand.php?Brand=Samsung" class="text-reset">Samsung</a>
            </p>
            <p>
              <a href="./Brand.php?Brand=Realme" class="text-reset">Realme</a>
            </p>
          </div>
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              POLICY
            </h6>
            <p>
              <a href="Privacy Policy.php" class="text-reset">Privacy</a>
            </p>
            <p>
              <a href="Terms of Use.php" class="text-reset">Terms Of Use</a>
            </p>
            <p>
              <a href="24x7.php" class="text-reset">24x7 Customer Care</a>
            </p>
          </div>
          <!-- Grid column -->
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto  mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i>Chandigarh, Chandigarh 160037, India</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              mobilekart.24x7@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="./">Mobilekart.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
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