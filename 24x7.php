<?php
session_start();
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
  <title>24x7 - Customer Support</title>
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
  <style>
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

        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i> <!-- Font Awesome bars icon -->
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left links (custom-sized search form) -->
          <form action="" method="GET" name="">
            <div class="input-group" style="max-width: 250px;">
              <input class="form-control" type="search" name="k" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-outline-success" name="" type="submit">Search</button>
              </div>
            </div>
          </form>
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
    <div class="container">
      <div class="search-bar mt-5 margin-top-hidden">
        <?php
        // CHECK TO SEE IF THE KEYWORDS WERE PROVIDED
        if (isset($_GET['k'])) {
          // save the keywords from the url
          $k = trim($_GET['k']);
          //Check if search input is empty
          $m = strlen($k);
          if ($m <= 0) {
            echo '<br><br>No results found ! Please search something.. &nbsp;&nbsp;&nbsp; <a href="index.php"><button class="btn btn-dark" type="button">Clear</button></a>';
          } else {
            // create a base query and words string
            $query_string = "SELECT * FROM products WHERE ";
            $display_words = "";
            // seperate each of the keywords
            $keywords = explode(' ', $k);
            foreach ($keywords as $word) {
              $query_string .= " keywords LIKE '%" . $word . "%' OR ";
              $display_words .= $word . " ";
            }
            $query_string = substr($query_string, 0, strlen($query_string) - 3);
            // Executing Query
            $query = mysqli_query($con, $query_string);
            $result_count = mysqli_num_rows($query);
            // check to see if any results were returned
            if ($result_count > 0) {
              // display search result count to user
              echo '<div class="alert alert-info" role="alert">' . $result_count . '  Results Found ! You searched For : ' . $display_words . ' &nbsp&nbsp&nbsp <a href="index.php" class="btn btn-dark mt-2">Clear</a></div>';
              // display all the search results to the user
              while ($row = mysqli_fetch_assoc($query)) {
                echo '<div class="card mb-3">
                                  <div class="card-body">
                                      <h5 class="card-title"><a href="' . $row['url'] . '">' . $row['model'] . '</a></h5>
                                  </div>
                              </div>';
              }
            } else {
              echo '<div class="alert alert-warning" role="alert">No results found. Please search something else.</div>';
            }
          }
        }
        ?>
      </div>
    </div>

    <!-- Navbar -->
  </header>
  <br><br><br><br>
  <div class="container">
    <section class="mt-2 mx-5 px-5 mb-4">
      <span>
        <h3>24x7 Customer Care Support</h3>
        <br>
      </span>
      <p>
        The Mobilekart Help Centre page lists out various types of issues that you may have encountered so that there can be quick
        resolution and you can go back to shopping online. For example, you can get more information regarding order tracking, delivery
        date changes, help with returns (and refunds), and much more. The Mobilekart Help Centre also lists out more information that you
        may need regarding Mobilekart Plus, payment, shopping, and more. The page has various filters listed out on the left-hand side so
        that you can get your queries solved quickly, efficiently, and without a hassle. You can get the Mobilekart Help Centre number or
        even access Mobilekart Help Centre support if you need professional help regarding various topics. The support executive will ensure
        speedy assistance so that your shopping experience is positive and enjoyable. You can even inform your loved ones of the support
        page so that they can properly get their grievances addressed as well. Once you have all your queries addressed, you can pull
        out your shopping list and shop for all your essentials in one place. You can shop during festive sales to get your hands on
        some unbelievable deals online. This information is updated on 14-Jun-21
      </p>
      <!-- Grid column -->
      <div class="col-md-4 mb-4">
        <!-- Links -->
        <h5 class="text-uppercase fw-bold mt-2 mb-2">
          Contact Us
        </h5>
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
              <a href="Privacy Policy.php" class="text-reset">Privacy Policy</a>
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



  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>