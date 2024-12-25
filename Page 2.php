<?php
//Check if any account is login or not
session_start();
$a = 0;
if (isset($_SESSION['username'])) {
  $name = $_SESSION['username'];
  $a = strlen($name);
}
//Connect to Database connection 
include("config/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Page 2 - MobileKart</title>
  <!-- MDB icon -->
  <link rel="icon" href="./img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- add icon link -->
  <link rel="icon" href="./img/1Mobilekart.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse justify-content-center mt-4" id="navbarCenteredExample">
          <!-- Left links -->
          <ul class="nav justify-content-center bg-white">
            <li class="nav-item ">
              <a class="nav-link active " href="./Brand.php?Brand=Apple"> <img class="image" width="40" src="./img/Icons/Apple_logo.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./Brand.php?Brand=Xiaomi"><img class="image" width="55" src="./img/Icons/Xiaomi_logo.png"></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link active" href="./Brand.php?Brand=Samsung"><img class="image" width="120" src="./img/Icons/Samsung.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./Brand.php?Brand=OnePlus"><img class="image" width="120" src="./img/Icons/OP+ logo.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./Brand.php?Brand=Realme"><img class="image" width="110" src="./img/Icons/Realme_logo.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active " href="./Brand.php?Brand=OPPO"><img class="image" width="95" src="./img/Icons/OPPO_LOGO.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./Brand.php?Brand=Vivo"><img class="image" width="100" src="./img/Icons/Vivo_logo.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active " href="./Brand.php?Brand=Redmi"><img class="image" width="78" src="./img/Icons/Redmi_by_Xiaomi_Logo.png"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./Brand.php?Brand=Asus"><img class="image" width="100" src="./img/Icons/AsusTek_logo.png"></a>
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <!-- Carousel images -->
    <div class="container px-1">
      <div id="carouselExampleControls" class="carousel slide shadow-sm p-2 mb-1 bg-white rounded" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="Products.php?Deviceid=15">
              <img src="./img/Banners/2.jpg" class="d-block w-100 img-fluid" alt="..." />
            </a>
          </div>
          <div class="carousel-item">
            <a href="Products.php?Deviceid=33">
              <img src="./img/Banners/D23951818_WLM_iQOO_Z3_Launch_GW_Design_SIM_Mob_Hero_1242x450._CB666974880_SY500_.jpg" class="d-block w-100 img-fluid" alt="..." />
            </a>
          </div>
          <div class="carousel-item">
            <a href="Products.php?Deviceid=12">
              <img src="./img/Banners/9-R_large_1xpng_.jpg" class="d-block w-100 img-fluid" alt="..." />
            </a>
          </div>
          <div class="carousel-item">
            <a href="Products.php?Deviceid=29">
              <img src="./img/Banners/D23221533_IN_WLME_iQOO7_SUD_GW_1242x450_2._CB669455003_SY500_.jpg" class="d-block w-100 img-fluid" alt="..." />
            </a>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Carousel images -->
  </header>
  <main class="mt-1">
    <div class="container">
      <!-- Content here -->
      <section class="text-center mt-4 mb-2">
        <div class="row">
          <?php
          include('config/db.php');
          $datafind = "select * from products where id>=18 AND id<=33 order by id DESC";
          $dataresult = mysqli_query($con, $datafind);
          if (mysqli_num_rows($dataresult) > 0) {
            while ($row = mysqli_fetch_array($dataresult)) {
          ?>
              <div class="col-md-3">
                <div class="card">
                  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="<?php echo $row['images']; ?>" class="card-img-top " />
                    <a href="<?php echo $row['url']; ?>">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                  </div>
                  <div class="card-body">
                    <a href="<?php echo $row['url']; ?>">
                      <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                    </a>
                    <h6 class="card-subtitle mb-2 text-muted">Available</h6>
                    <h4>₹ <?php echo $row['price']; ?></h4>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </section>
    </div>
    <!------Product section --->
    </div>
    <nav aria-label="...">
      <ul class="pagination pagination-circle justify-content-center my-4">
        <li class="page-item">
          <a class="page-link" href="./" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="./">1</a></li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="Page 2.php">2 <span class="visually-hidden">(current)</span></a>
        </li>
      </ul>
    </nav>
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
 
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Include Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/mdb.min.js"></script>

</html>