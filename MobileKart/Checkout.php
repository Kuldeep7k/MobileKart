<?php
session_start();
if (isset($_GET['Deviceid'])) {
  $finddata = $_GET['Deviceid'];
} else {
  die("<h1>400 Bad Request Error</h1>");
  header('Location: Login.php');
}
$a = 0;
if (isset($_SESSION['username'])) {
  $name = $_SESSION['username'];
  $a = strlen($name);
} else {
  header('Location: Login.php');
}
include('config/db.php');
// "select * from products where id='$finddata'"
$finddataquery = "select * from products where id='$finddata'";
$selectquery = mysqli_query($con, $finddataquery);
$result = mysqli_fetch_array($selectquery);
$userfind = $_COOKIE['useremail'];
$userdatafind = "select * from userdata where email='$userfind'";
$userresult = $selectquery = mysqli_query($con, $userdatafind);
$resultdata = mysqli_fetch_array($userresult);
if (isset($_POST['submit'])) {
  $productid = $_POST['productid'];
  $productname = $_POST['productname'];
  $productamount = $_POST['productprice'];
  $productimage = $_POST['productimage'];
  $productaddress = $_POST['productaddress'];
  $producturl = $_POST['producturl'];
  $useremail = $_COOKIE['useremail'];
  $buyquery = "insert into orderdata (productid, useremail, productname, productprice,address, productimage,producturl) 
              values ('$productid','$useremail','$productname','$productamount','$productaddress','$productimage','$producturl')";
  $buyresult = mysqli_query($con, $buyquery);
  if ($buyresult) {
    $_SESSION['msg2'] = "Order Successfull.";
    header('Location: Done.php');
  } else {
    die("faild");
  }
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Buy Now - <?php echo $result['product_name']; ?></title>
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
          <a class="navbar-brand mt-2 mt-lg-0" href="./">
            <img src="img/Mobilekart.jpg" height="57" alt="" loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
        <!-- Right elements -->
        <div class="d-flex align-items-center">
          <!-- Icon -->
          <a class="text-reset me-3" href="#">
            <i class=""></i>
          </a>
          </ul>
          <ul class="navbar-nav d-flex flex-row">
            <!-- Icon dropdown -->
            <li class="nav-item me-3 me-lg-0 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-lg fa-user"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="account.php">My Account</a>
                </li>
                <li>
                  <a class="dropdown-item" href="Orders.php">Orders</a>
                </li>
                <li>
                  <a class="dropdown-item" href="24x7.php">24x7 Customer Care</a>
                </li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item fs-6" href="Logout.php">Logout</a>
              </ul>
            </li>
            <?php
            if ($a > 0) {
            ?> &nbsp<li>
                <h4 class="mt-2">
                  <?php
                  echo $name;
                  ?>
                </h4>
              </li>
              &nbsp&nbsp&nbsp&nbsp
            <?php
            } else {
            ?>
              <li>
                <button type="button" onclick="window.location.href='Login.php';" class="btn btn-link px-3 me-2 text-theme fs-6">
                  Login
                </button>
              </li>
            <?php
            }
            ?>
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
    <!--Section: Block Content-->
    <section>
      <!--Grid row-->
      <div class="row pt-2 mx-4">
        <h2 class="mb-1 text-center text-white bg-dark p-2">CHECKOUT</h2>
        <!--Grid column-->
        <div class="col-lg-8">
          <!-- Card -->
          <div class="mb-3">
            <div class="pt-4 wish-list">
              <h4 class="mb-4">Product :</h4>
              <div class="row mb-4">
                <div class="col-md-5 col-lg-3 col-xl-3">
                  <div class="view zoom overlay z-depth-2 rounded mb-3 mb-md-0">
                    <img class="img-fluid w-100" src="<?php echo $result['images']; ?>" alt="Sample">
                    <a href="#!">
                    </a>
                  </div>
                </div>
                <div class="col-md-7 col-lg-9 col-xl-9">
                  <div>
                    <div class="d-flex justify-content-between">
                      <div>
                        <h5><?php echo $result['product_name']; ?></h5>
                        <p class="mb-3 text-muted text-uppercase small">Quantity - 1</p>
                        <p class="mb-2 text-muted text-uppercase small">Storage : <?php echo $result['storage']; ?></p>
                        <p class="mb-3 text-muted text-uppercase small">Processor : <?php echo $result['processor']; ?></p>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i class="fas fa-heart mr-1"></i> Move to wish list </a>
                      </div>
                      <p class="mb-0"><span><strong id="summary"> </strong></span></p class="mb-0">
                    </div>
                  </div>
                </div>
              </div>
              <hr class="mb-3">
              <p class="text-danger mb-0"><i class="fas fa-info-circle mr-1"></i>Limited Stocks</p>
            </div>
          </div>
          <!-- Card -->
          <!-- Card -->
          <div class="mb-2">
            <div class="pt-2">
              <h4 class="mb-3">Shipping Details</h4>
              <ul class="list-unstyled">
                <li>
                  <h5><?php echo $resultdata['username']; ?></h5>
                </li>
                <li><?php echo $resultdata['address']; ?></li>
                <li><?php echo $resultdata['city']; ?> - <?php echo $resultdata['pincode'];  ?></li>
                <li><b>Phone number : </b><?php echo $resultdata['mobile']; ?></li>
                <ul>
            </div>
          </div>
          <!-- Card -->
          <!-- Card -->
          <div class="mb-4">
            <div class="pt-4">
              <h5 class="mb-4">Expected shipping delivery</h5>
              <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
            </div>
          </div>
          <!-- Card -->
        </div>
        <!--Grid column-->
        <!--Grid column-->
        <div class="col-lg-4">
          <!-- Card -->
          <div class="mb-3 mt-2">
            <div class="pt-4">
              <h5 class="mb-3">Price Details</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  Price
                  <span>Rs. <?php echo $result['dprice']; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                  Deal price
                  <span>Rs. <?php echo $result['price']; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  Discount
                  <span><strong>-</strong> Rs. <?php
                                                $e = 0;
                                                $f = 0;
                                                $e = $result['dprice'];
                                                $f = $result['price'];
                                                $e = str_replace(',', '', $e);
                                                $f = str_replace(',', '', $f);
                                                $g = $e - $f;
                                                echo $g . ".00";
                                                ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                  Shipping
                  <span>Rs. 50.00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                  <div>
                    <strong>Total Amount</strong>
                  </div>
                  <span><strong>Rs. <?php $g = $f + 50;
                                    echo $g; ?>.00</strong></span>
                </li>
              </ul>
              <form action="" method="POST">
                <input type="hidden" name="productid" value="<?php echo $result['id']; ?>">
                <input type="hidden" name="productname" value="<?php echo $result['product_name']; ?>">
                <input type="hidden" name="productprice" value="<?php echo $g; ?>">
                <input type="hidden" name="productimage" value="<?php echo $result['images']; ?>">
                <input type="hidden" name="productaddress" value="<?php echo $resultdata['address']; ?>">
                <input type="hidden" name="producturl" value="<?php echo $result['url']; ?>">
                <button type="submit" name="submit" class="btn btn-primary btn-block waves-effect waves-light btn-theme  fs-6 ">Confirm Order</button>
              </form>
            </div>
          </div>
          <!-- Card -->
          <!-- Card -->
          <div class="mb-3">
            <div class="pt-4">
              <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Add a discount code (optional)
                <span><i class="fas fa-chevron-down pt-1"></i></span>
              </a>
              <div class="collapse" id="collapseExample">
                <div class="mt-3">
                  <div class="md-form md-outline mb-0">
                    <input type="text" id="discount-code" class="form-control font-weight-light" placeholder="Enter discount code">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Card -->
        </div>
        <!--Grid column-->
      </div>
      <!-- Grid row -->
    </section>
    <!--Section: Block Content-->
  </div>
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-light text-muted">
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="./">Mobilekart.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>