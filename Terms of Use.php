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
  <title>Mobilekart - Terms of Use</title>
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
  <div class="container ">
    <section class="mt-1 mx-5 px-5 mb-5">
      <span>
        <h3> Mobilekart Terms of Use</h3>
      </span>
      <p>
        <br>
        This document is an electronic record in terms of Information Technology Act, 2000 and rules there under as applicable and the amended provisions pertaining to electronic records in various statutes as amended by the Information Technology Act, 2000. This electronic record is generated by a computer system and does not require any physical or digital signatures.

      </p>
      <p>
        This document is published in accordance with the provisions of Rule 3 (1) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of domain name [www.Mobilekart.com][www.Mobilekart.com] (“Website”), including the related mobile site and mobile application (hereinafter referred to as “Platform”)

      </p>
      <p>
        The Platform is owned by Mobilekart Internet Private Limited a company incorporated under the Companies Act, 1956 with its registered office at Buildings Alyssa, Begonia & Clover, Embassy Tech Village, Outer Ring Road, Devarabeesanahalli Village, Bengaluru – 560103, Karnataka, India and its branch offices at 2nd Floor, Block F (Flora), Embassy Tech Village, Outer Ring Road, Devarabeesanahalli Village, Bengaluru-560103, Karnataka, India and; 447/C, 12th Main, 4th Block, Koramangala, Bengaluru-560034, Karnataka, India (hereinafter referred to as Mobilekart").
      </p>
      <p>
        Your use of the Platform and services and tools are governed by the following terms and conditions ("Terms of Use") as applicable to the Platform including the applicable policies which are incorporated herein by way of reference. If You transact on the Platform, You shall be subject to the policies that are applicable to the Platform for such transaction. By mere use of the Platform, You shall be contracting with Mobilekart Internet Private Limited and these terms and conditions including the policies constitute Your binding obligations, with Mobilekart.
      </p>
      <p>
        For the purpose of these Terms of Use, wherever the context so requires "You" or "User" shall mean any natural or legal person who has agreed to become a buyer on the Platform by providing Registration Data while registering on the Platform as Registered User using the computer systems. Mobilekart allows the User to surf the Platform or making purchases without registering on the Platform. The term "We", "Us", "Our" shall mean Mobilekart Internet Private Limited.
      </p>
      <p>
        When You use any of the services provided by Us through the Platform, including but not limited to, (e.g. Product Reviews, Seller Reviews), You will be subject to the rules, guidelines, policies, terms, and conditions applicable to such service, and they shall be deemed to be incorporated into this Terms of Use and shall be considered as part and parcel of this Terms of Use. We reserve the right, at Our sole discretion, to change, modify, add or remove portions of these Terms of Use, at any time without any prior written notice to You. It is Your responsibility to review these Terms of Use periodically for updates / changes. Your continued use of the Platform following the posting of changes will mean that You accept and agree to the revisions. As long as You comply with these Terms of Use, We grant You a personal, non-exclusive, non-transferable, limited privilege to enter and use the Platform.
      </p>
      <p>
        ACCESSING, BROWSING OR OTHERWISE USING THE SITE INDICATES YOUR AGREEMENT TO ALL THE TERMS AND CONDITIONS UNDER THESE TERMS OF USE, SO PLEASE READ THE TERMS OF USE CAREFULLY BEFORE PROCEEDING. By impliedly or expressly accepting these Terms of Use, You also accept and agree to be bound by Mobilekart Policies ((including but not limited to Privacy Policy available at Privacy) as amended from time to time.
      </p>

      <h5>Your Account and Registration Obligations</h5>
      <p>
        If You use the Platform, You shall be responsible for maintaining the confidentiality of your Display Name and Password and You shall be responsible for all activities that occur under your Display Name and Password. You agree that if You provide any information that is untrue, inaccurate, not current or incomplete or We have reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete, or not in accordance with the this Terms of Use, We shall have the right to indefinitely suspend or terminate or block access of your membership on the Platform and refuse to provide You with access to the Platform.
      </p>
      <p>
        Your mobile phone number and/or e-mail address is treated as Your primary identifier on the Platform. It is your responsibility to ensure that Your mobile phone number and your email address is up to date on the Platform at all times. You agree to notify Us promptly if your mobile phone number or e-mail address changes by updating the same on the Platform through a onetime password verification.
      </p>
      <p>
        If You share or allow others to have access to Your account on the Platform (“Account”), by creating separate profiles under Your Account, or otherwise, they will be able to view and access Your Account information. You shall be solely liable and responsible for all the activities undertaken under Your Account, and any consequences therefrom.
      </p>
      <h5>Communications</h5>
      <p>
        When You use the Platform or send emails or other data, information or communication to us, You agree and understand that You are communicating with Us through electronic records and You consent to receive communications via electronic records from Us periodically and as and when required. We may communicate with you by email or by such other mode of communication, electronic or otherwise.
      </p>
      <h5>Contents Posted on Platform</h5>
      <p>
        All text, graphics, user interfaces, visual interfaces, photographs, trademarks, logos, sounds, music and artwork (collectively, "Content"), is a third party user generated content and Mobilekart has no control over such third party user generated content as Mobilekart is merely an intermediary for the purposes of this Terms of Use.
      </p>
      <p>
        Except as expressly provided in these Terms of Use, no part of the Platform and no Content may be copied, reproduced, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted or distributed in any way (including "mirroring") to any other computer, server, Platform or other medium for publication or distribution or for any commercial enterprise, without Mobilekart's express prior written consent.
      </p>
      <p>
        You may use information on the products and services purposely made available on the Platform for downloading, provided that You (1) do not remove any proprietary notice language in all copies of such documents, (2) use such information only for your personal, non-commercial informational purpose and do not copy or post such information on any networked computer or broadcast it in any media, (3) make no modifications to any such information, and (4) do not make any additional representations or warranties relating to such documents.
      </p>
      <p>
        SOME CONTENT OFFERED ON THE PLATFORM MAY NOT BE SUITABLE FOR SOME VIEWERS AND THEREFORE VIEWER DISCRETION IS ADVISED. ALSO, SOME CONTENT OFFERED ON THE PLATFORM MAY NOT BE APPROPRIATE FOR VIEWERSHIP BY CHILDREN. PARENTS AND/OR LEGAL GUARDIANS ARE ADVISED TO EXERCISE DISCRETION BEFORE ALLOWING THEIR CHILDREN AND/OR WARDS TO ACCESS CONTENT ON THE PLATFORM.
      </p>
      <h5>Privacy</h5>
      <p>
        We view protection of Your privacy as a very important principle. We understand clearly that You and Your Personal Information is one of Our most important assets. We store and process Your Information including any sensitive financial information collected (as defined under the Information Technology Act, 2000), if any, on computers that may be protected by physical as well as reasonable technological security measures and procedures in accordance with Information Technology Act 2000 and Rules there under.Our current Privacy Policy is available at Privacy. Our current Privacy Policy is available at Privacy. f You object to Your Information being transferred or used in this way please do not use Platform. If You object to Your Information being transferred or used in this way please do not use Platform.
      </p>
      <p>
        We may share personal information with our other corporate entities and affiliates. These entities and affiliatesmay market to you as a result of such sharing unless you explicitly opt-out.
      </p>
      <p>
        We may disclose personal information if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process. We may disclose personal information to law enforcement offices, third party rights owners, or others in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms or Privacy Policy; respond to claims that an advertisement, posting or other content violates the rights of a third party; or protect the rights, property or personal safety of our users or the general public.
      </p>
      </p>
      <h5>Privacy</h5>
      <p>
        This Platform, all the materials and products (including but not limited to software) and services, included on or otherwise made available to You through this site are provided on "as is" and "as available" basis without any representation or warranties, express or implied except otherwise specified in writing. Without prejudice to the forgoing paragraph, Mobilekart does not warrant that:
      </p>
      <p>
        This Platform will be constantly available, or available at all; or
      </p>
      <p>
        The information on this Platform is complete, true, accurate or non-misleading.
      </p>
      <p>
        Mobilekart will not be liable to You in any way or in relation to the Contents of, or use of, or otherwise in connection with, the Platform. Mobilekart does not warrant that this site; information, Content, materials, product (including software) or services included on or otherwise made available to You through the Platform; their servers; or electronic communication sent from Us are free of viruses or other harmful components.
      </p>
      <h5>Payment</h5>
      <p>
        All payments made against the purchases/services on Platform by you shall be compulsorily in Indian Rupees acceptable in the Republic of India. Platform will not facilitate transaction with respect to any other form of currency with respect to the purchases made on Platform.
      </p>
      <h5>Applicable Law</h5>
      <p>
        Terms of Use shall be governed by and interpreted and construed in accordance with the laws of India. The place of jurisdiction shall be exclusively in Bangalore.
      </p>
      <h5>Trademark, Copyright and Restriction</h5>
      <p>
        This site is controlled and operated by Mobilekart and products are sold by respective Sellers. All material on this site, including images, illustrations, audio clips, and video clips, are protected by copyrights, trademarks, and other intellectual property rights. Material on Platform is solely for Your personal, non-commercial use. You must not copy, reproduce, republish, upload, post, transmit or distribute such material in any way, including by email or other electronic means and whether directly or indirectly and You must not assist any other person to do so. Without the prior written consent of the owner, modification of the materials, use of the materials on any other Platform or networked computer environment or use of the materials for any purpose other than personal, non-commercial use is a violation of the copyrights, trademarks and other proprietary rights, and is prohibited. Any use for which You receive any remuneration, whether in money or otherwise, is a commercial use for the purposes of this clause.
      </p>
      <p>
        Trademark complaint
      </p>
      <p>
        Mobilekart respects the intellectual property of others. In case You feel that Your Trademark has been infringed, You can write to Mobilekart at Mobilekart.24x7@gmail.com.
      </p>
      <p>
        Product Description
      </p>
      <p>
        Mobilekart we do not warrant that Product description or other content of this Platform is accurate, complete, reliable, current, or error-free and assumes no liability in this regard.
      </p>
      <h5>Grievance Officer</h5>
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
      </p>
      <h5>Contact Us</h5>
      <p>
        Please contact us for any questions or comments (including all inquiries unrelated to copyright infringement) regarding this platform through the link: <a href="24x7.php">Customer Care</a>
      </p>
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