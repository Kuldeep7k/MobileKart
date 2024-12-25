<?php
session_start();
if (isset($_GET['Brand'])) {
  $find = $_GET['Brand'];
} else {
  die("<h1>400 Bad Request Error</h1>");
}
$a = 0;
if (isset($_SESSION['username'])) {
  $name = $_SESSION['username'];
  $a = strlen($name);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?php echo $find ?></title>
  <!-- add icon link -->
  <link rel="icon" href="img/1Mobilekart.png" type="image/x-icon">
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <link href="http://cdn.shopify.com/s/files/1/0067/5617/1846/t/2/assets/timber.scss.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <!-- Include ElevateZoom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .product-image {
      max-width: 100%;
      height: auto;
    }

    .product-description {
      margin-top: 20px;
    }

    .hidden-margin {
      margin-top: 127px !important;
      /* Use !important to force the style */
    }



    .margin-top-hidden {
      margin-top: 70px !important;
    }

    /* Optional custom CSS for styling */
    .navbar {
      background-color: #ffffff;
    }

    .navbar-toggler-icon {
      color: black;
      /* Change the color of the navbar toggle icon to black */
      z-index: 1;
      /* Ensure the toggle icon remains above the navbar */
    }

    .navbar-toggler {
      border: none;
      /* Remove the border for the toggle button */
      padding: 0;
      /* Remove padding for the toggle button */
    }

    .navbar-collapse {
      padding: 0.5rem 1rem;
    }

    .navbar-nav .nav-link {
      padding: 0.5rem 1rem;
      margin-right: 0.5rem;
    }

    /* Add space after the search button */
    .input-group-append {
      margin-left: 10px;
    }

    /* Media query for mobile */
    @media (max-width: 767.98px) {

      /* Center the toggle button on mobile */
      .navbar-toggler {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 15px;
        color: black;
        /* Change the color of the toggle icon for mobile */
        background-color: transparent;
        /* Make the background transparent for the toggle button on mobile */
      }

      /* Adjust margin for right items on mobile */
      .navbar-nav.ml-lg-auto {
        margin-top: 15px;
      }
    }

    /* Media query for desktop */
    @media (min-width: 768px) {

      /* Right items aligned to the right on desktop */
      .navbar-nav.ml-lg-auto {
        margin-left: auto;
      }
    }
  </style>

</head>

<body>
  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3 px-lg-5 fixed-top scrolling-navbar">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
          <img src="./img/Mobilekart.jpg" height="57" alt="" loading="lazy" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>


        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left links -->

          <!-- Right elements (moved to the right) -->
          <ul class="navbar-nav ml-lg-auto">
            <?php
            if ($a > 0) {
            ?>
              <li class="nav-item">
                <h4 class="mt-2">
                  <?php
                  echo $name;
                  ?>
                </h4>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Logout.php">Logout</a>
              </li>
            <?php
            } else {
            ?>
              <li class="nav-item">
                <button type="button" onclick="window.location.href='Login.php';" class="btn btn-link text-theme">
                  Login
                </button>
              </li>
            <?php
            }
            ?>
            <li class="nav-item">
              <button type="button" onclick="window.location.href='Signup.php';" class="btn btn-primary btn-theme">
                Sign up
              </button>
            </li>
            <!-- Additional navigation items -->
            <li class="nav-item">
              <a class="nav-link" href="Account.php">My Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Orders.php">Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="24x7.php">24x7 Customer Care</a>
            </li>
            <!-- Add more items as needed -->
          </ul>
          <!-- Right elements (moved to the right) -->
        </div>
        <!-- Collapsible wrapper -->
      </div>
    </nav>
    <!-- Navbar -->
  </header>
  <br> <br>
  <main class="mt-1">

    <div class="container mt-5">
      <h1 class="text-center  text-white py-2 bg-info mt-5"><?php echo $find; ?></h1>
      <div class="d-flex justify-content-center row">
        <div class="col-md-10">
          <?php
          include('config/db.php');
          $datafind = "select * from products where brand='$find'  order by id DESC";
          $dataresult = mysqli_query($con, $datafind);
          if (mysqli_num_rows($dataresult) > 0) {
            while ($row = mysqli_fetch_array($dataresult)) {
          ?>
              <div class="row p-2 bg-white border rounded mt-2">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="<?php echo $row['images']; ?>"></div>
                <div class="col-md-6 mt-4">
                  <h3><?php echo $row['product_name']; ?></h3>
                  <div class="mt-3 mb-1 spec-1"><span><?php echo  $row['network']; ?></span></div>
                  <div class="mt-1 mb-1 spec-1"><span><?php echo $row['storage']; ?></span></div>
                  <div class="mt-1 mb-1 spec-1"><span><?php echo $row['processor']; ?></span></div>
                  <div class="mt-1 mb-1 spec-1"><span><?php echo  $row['cameras']; ?></span></div>
                  <div class="mt-1 mb-1 spec-1"><span><?php echo $row['os']; ?></span></div>

                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-3">
                  <div class="d-flex flex-row align-items-center">
                    <h4 class="mr-1">₹ <?php echo $row['price']; ?></h4> </span>
                  </div>
                  <div class="d-flex flex-row align-items-center">
                    <span class="strike-text">₹ <span class="text-decoration-line-through"><?php echo  $row['dprice']; ?></span>
                  </div>
                  <h6 class="text-success mt-1">In stock</h6>
                  <div class="d-flex flex-column mt-1">
                    <a href="./Checkout.php?Deviceid=<?php echo $row['id']; ?>">
                      <button type="button" class="btn  btn-primary btn-lg my-2 fs-6">Buy now </button>
                    </a>
                    <a href=" <?php echo $row['url']; ?>">
                      <button class="btn btn-outline-dark btn-lg" type="button">View More</button></a>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>

        </div>
      </div>
    </div>
  </main>
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
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Brands
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
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>

  <script>
  function myFunction() {
    alert("Please Login to Continue");
    window.location.href = "Login.php";
  }
</script>

  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- Include Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <!-- Include Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>