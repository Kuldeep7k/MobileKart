<?php
session_start();
if (isset($_GET['Deviceid'])) {
  $find = $_GET['Deviceid'];
} else {
  die("<h1>400 Bad Request Error</h1>");
}
$a = 0;
if (isset($_SESSION['username'])) {
  $name = $_SESSION['username'];
  $a = strlen($name);
}
include('config/db.php');
$findquery = "select * from products where id='$find'";
$selectquery = mysqli_query($con, $findquery);
$result = mysqli_fetch_array($selectquery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?php echo $result['product_name']; ?></title>
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
  <main>
    <div class="container mt-5 hidden-margin">
      <div class="row">
        <br><br><br><br>
        <div class="col-md-5">
          <img id="zoomImage" class="product-image" data-image-id="" alt="Product Image" src="<?php echo $result['images']; ?>">
        </div>
        <div class="col-md-7">
          <h1 class="mt-3"><?php echo $result['product_name']; ?></h1>
          <div class="text-success">Available</div>
          <div class="product-price">
            <h3>₹ <?php echo $result['price']; ?></h3>
            <p class="text-decoration-line-through">₹ <?php echo $result['dprice']; ?></p>
          </div>
          <?php if ($a > 0) { ?>
            <a href="http://localhost/ProjectWeb/MobileKart/Checkout.php?Deviceid=<?php echo $find; ?>" class="btn btn-primary btn-lg mt-3 mb-2">Buy now</a>
          <?php } else { ?>
            <button type="button" onclick="myFunction()" class="btn btn-primary btn-lg mt-3 mb-2">Buy now</button>
          <?php } ?>
          <div class="product-description">
            <h4 class="mt-1">Specifications</h4>
            <dl class="row ">
              <dt class="col-sm-3">Brand</dt>
              <dd class="col-sm-9"><?php echo $result['brand']; ?></dd>
              <dt class="col-sm-3">Model</dt>
              <dd class="col-sm-9"> <?php echo  $result['model']; ?></dd>
              <dt class="col-sm-3">Display</dt>
              <dd class="col-sm-9"><?php echo  $result['display']; ?></dd>
              <dt class="col-sm-3">Networks</dt>
              <dd class="col-sm-9"><?php echo  $result['network']; ?></dd>
              <dt class="col-sm-3">Storage</dt>
              <dd class="col-sm-9"><?php echo $result['storage']; ?></dd>
              <dt class="col-sm-3">Proccessor</dt>
              <dd class="col-sm-9"> <?php echo $result['processor']; ?></dd>
              <dt class="col-sm-3">Camera</dt>
              <dd class="col-sm-9"><?php echo  $result['cameras']; ?></dd>
              <dt class="col-sm-3">OS</dt>
              <dd class="col-sm-9"> <?php echo  $result['os']; ?></dd>
              <dt class="col-sm-3">Battery</dt>
              <dd class="col-sm-9"><?php echo  $result['battery']; ?></dd>
              <dt class="col-sm-3">Warranty</dt>
              <dd class="col-sm-9">1 Year Warranty for Mobile and 6 Months for Accessories</dd>
          </div>
        </div>
      </div>
    </div>
  </main>
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

  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

  <!-- Include ElevateZoom JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>

  <!-- Initialize ElevateZoom -->
  <script>
    $(document).ready(function() {
      $('#zoomImage').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
      });
    });
  </script>

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

<!-- Your other scripts here -->
<script>
  $(document).ready(function() {
    $('#zoomImage').elevateZoom({
      zoomType: "inner",
      cursor: "crosshair",
    });
  });
</script>
<script>
  function myFunction() {
    alert("Please Login to Continue");
    window.location.href = "Login.php";
  }
</script>
<script type="text/javascript" src="js/mdb.min.js"></script>

</body>

</html>