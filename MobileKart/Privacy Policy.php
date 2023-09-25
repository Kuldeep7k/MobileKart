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
  <title>Privacy Policy</title>
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
    <section class="mt-1 mx-5 px-5 mb-5">
      <span>
        <h3> Privacy Policy</h3>
      </span>
      <p>
        <br>
        We value the trust you place in us and recognize the importance of secure transactions and information privacy. This Privacy Policy describes how Mobilekart Internet Private Limited and its affiliates (collectively “Mobilekart, we, our, us”) collect, use, share or otherwise process your personal information through Mobilekart website www.Mobilekart.com, its mobile application, and m-site (hereinafter referred to as the “Platform”).
      </p>
      <p>
        By visiting the Platform, providing your information or availing our product/service, you expressly agree to be bound by the terms and conditions of this Privacy Policy, the Terms of Use and the applicable service/product terms and conditions. If you do not agree, please do not access or use our Platform.
      </p>
      <h5>1. Collection of Your Information</h5>

      <p>
        When you use our Platform, we collect and store your information which is provided by you from time to time. In general, you can browse the Platform without telling us who you are or revealing any personal information about yourself. Once you give us your personal information, you are not anonymous to us. Where possible, we indicate which fields are required and which fields are optional. You always have the option to not provide information by choosing not to use a particular service, product or feature on the Platform.</p>
      <p>
        We collect personal information (such as email address, delivery address, name, phone number and payment instrument details) from you when you set up an account or transact with us. While you can browse some sections of our Platform without being a registered member, certain activities (such as placing an order or consuming our online content or services) do require registration. We do use your contact information to send you offers based on your previous orders and your interests. </p>
      <p>
        If you choose to post messages on our message boards, chat rooms or other message areas or leave feedback or if you use voice commands to shop on the Platform, we will collect that information you provide to us. We retain this information as necessary to resolve disputes, provide customer support and troubleshoot problems as permitted by law. </p>
      <p>
        If you send us personal correspondence, such as emails or letters, or if other users or third parties send us correspondence about your activities or postings on the Platform, we may collect such information into a file specific to you.</p>

      <h5>2. Use of Demographic / Profile Data / Your Information</h5>
      <p>
        We use your personal information to provide the product and services you request. To the extent we use your personal information to market to you, we will provide you the ability to opt-out of such uses. We use your personal information to assist sellers and business partners in handling and fulfilling orders; enhancing customer experience; resolve disputes; troubleshoot problems; help promote a safe service; collect money; measure consumer interest in our products and services; inform you about online and offline offers, products, services, and updates; customize and enhance your experience; detect and protect us against error, fraud and other criminal activity; enforce our terms and conditions; and as otherwise described to you at the time of collection of information.
      </p>
      <h5>3. Links to Other Sites</h5>
      <p>
        Our Platform may provide links to other websites or application that may collect personal information about you. We are not responsible for the privacy practices or the content of those linked websites.
      </p>
      <h5>4. Changes to this Privacy Policy</h5>
      <p>
        Please check our Privacy Policy periodically for changes. We may update this Privacy Policy to reflect changes to our information practices. We will alert you to significant changes by posting the date our policy got last updated, placing a notice on our Platform, or by sending you an email when we are required to do so by applicable law.
      </p>
      <h5>5. Grievance Officer</h5>
      <p>
        In accordance with Information Technology Act 2000 and rules made there under, the name and contact details of the Grievance Officer are provided below:
        <br>
        Mr. Rakesh
        <br>
        Mobilekart Internet Pvt Ltd.
        <br>
        Embassy tech village
        <br>
        8th floor Block 'B' Devarabeesanahalli Village,
        <br>
        Varthur Hobli, Bengaluru East Taluk,
        <br>
        Bengaluru District,
        <br>
        Karnataka, India, 560103.
        <br>
        Phone: 01 234 567 88
        <br>
        Email: Mobilekart.24x7@gmail.com.
        <br>
        Time: Mon - Sat (9:00 - 18:00)
        <br>
        To contact our customer support, please click here: <a href="24x7.php">Customer Care</a>
      </p>
      <h5>6. Queries</h5>
      <p>
        If you have a query, issue, concern, or complaint in relation to collection or usage of your personal information under this Privacy Policy, please contact us at the contact information provided above.</p>
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