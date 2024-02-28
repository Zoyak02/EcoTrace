<?php
require("connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the 'success' parameter is set in the URL
if (isset($_GET['success'])) {
    $success_message = $_GET['success'];
}

// Number of items per page
$itemsPerPage = 6;

// Get current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Fetch content with pagination
$query = "SELECT title, description, content FROM eduContent LIMIT $offset, $itemsPerPage";
$result = mysqli_query($con, $query);
$fetch_src = FETCH_SRC;

// Pagination navigation
$queryCount = "SELECT COUNT(*) AS total FROM eduContent";
$resultCount = mysqli_query($con, $queryCount);
$rowCount = mysqli_fetch_assoc($resultCount)['total'];
$totalPages = ceil($rowCount / $itemsPerPage);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">
    <script src="https://kit.fontawesome.com/877d2cecdc.js" crossorigin="anonymous"></script>
    <!-- CSS FILES START -->
    <link href="css/custom3.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <!-- CSS FILES End -->
</head>
<body>
    <!--Header Start-->
    <header class="header-style-2">
    <nav class="navbar navbar-expand-lg">
        <a class="logo" href="index.html"><img src="images/EcoTrace Logo.png" alt="" style="height: 100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index-2.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="events-grid.html">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="causes.html">Causes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.html">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>

            <li class="nav-item" style="list-style: none;">
                <a class="login-btn" href="login-page" role="button"> Login </a>
            </li>
        </div>
    </nav>
    </header>

    <!--Inner Header Start-->
    <section class="wf100 inner-header">
    <div class="container">
        <h1>Educational Content </h1>
    </div>
    </section>
    <!--Inner Header End--> 

<div class="wrapper">
        <?php

        if ($result) {
            echo '<section class="wf100 p80-40 blog" style="padding-bottom:0px;">';
            echo '<div class="causes-grid">';
            echo '<div class="container">';
            echo '<div class="row">';

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="col-md-4 col-sm-6">';
              echo '<!-- campaign box start -->';
              echo '<div class="campaign-box" style="height:450px; overflow:hidden;">';
              echo '<div class="campaign-thumb"> <a href="#" data-toggle="modal" data-target="#contentModal" 
                                                  data-title="' . htmlspecialchars($row['title']) . '" 
                                                  data-image="' . htmlspecialchars($fetch_src . $row['content']) . '" 
                                                  data-description="' . htmlspecialchars($row['description']) . '"><i class="fas fa-link"></i></a>';
              echo '<div class="image-container" style="width: 100%; height: 200px; overflow: hidden;">';
              echo '<img src="' . $fetch_src . $row['content'] . '" alt="" style="width: 100%; height: 100%; object-fit: cover;">';
              echo '</div>';
              echo '</div>';
              echo '<div class="campaign-txt" style="padding-top:15px;">';
              echo '<h6 style="height:40px;">' . $row['title'] . '</a></h6>';
              echo '<p style="margin-bottom:0px;">' . truncateText($row['description'], 100) . '</p>'; //style="height:40px; padding-top:3px;"
              echo '<br>';
              // Add data attributes to the "View More" link for modal
              echo '<a href="#" class="dbutton" data-toggle="modal" data-target="#contentModal" 
                      data-title="' . htmlspecialchars($row['title']) . '" 
                      data-image="' . htmlspecialchars($fetch_src . $row['content']) . '" 
                      data-description="' . htmlspecialchars($row['description']) . '">View More</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          }
          
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
        } else {
            echo "Error retrieving data: " . mysqli_error($con);
        }
         
        // Function to truncate text
        function truncateText($text, $maxLength) {
          if (strlen($text) > $maxLength) {
              $text = substr($text, 0, $maxLength) . '...';
          }
          return $text;
      }

      // Pagination navigation
      echo '<div class="row" style="margin-bottom: 60px;">'; // Adjust the margin as needed
      echo '<div class="col-md-12">';
      echo '<div class="gt-pagination mt20">';
      echo '<nav>';
      echo '<ul class="pagination">';

      if ($totalPages > 1) {
          if ($page > 1) {
              echo '<li class="page-item"> <a class="page-link" href="?page=' . ($page - 1) . '" aria-label="Previous"> <i class="fas fa-angle-left"></i> </a> </li>';
          }

          for ($i = 1; $i <= $totalPages; $i++) {
              if ($i == $page) {
                  echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
              } else {
                  echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
              }
          }

          if ($page < $totalPages) {
              echo '<li class="page-item"> <a class="page-link" href="?page=' . ($page + 1) . '" aria-label="Next"> <i class="fas fa-angle-right"></i> </a> </li>';
          }
      }

      echo '</ul>';
      echo '</nav>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      ?>

        <!-- OnClick Modal Start -->
        <div class="modal fade" id="contentModal" tabindex="-1" role="dialog" aria-labelledby="contentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contentModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="" alt="" class="img-fluid" id="contentModalImage">
                            </div>
                            <div class="col-md-6">
                                <p id="contentModalDescription"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OnClick Modal End -->
    </div>

    <div class="ftco-section wf100">
            <footer class="footer">
              <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100" preserveAspectRatio="none">
                <path class="footer-wave-path" d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3C276.7,2.9,330,4,383,9.8 c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z"></path>
              </svg>
            </section>
            <footer class="footer-03">
               <div class="container">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="d-flex align-items-center justify-content-between mb-4">
                               
                              <div class="logo-space">
                                  <img src="images/EcoTrace Logo.png" alt="Eco Trace Logo" class="logo-img">
                              </div>
                          </div>
              
                           <div class="row">
                               <div class="col-md-6 mb-md-0 mb-4">
                                   <h2 class="footer-heading">Carbon Calculator</h2>
                                   <ul class="list-unstyled">
                                       <li><a href="#" class="py-1 d-block">How it Works</a></li>
                                       <li><a href="#" class="py-1 d-block">Log Your Activities</a></li>
                                       <li><a href="#" class="py-1 d-block">Reduce Your Footprint</a></li>
                                   </ul>
                               </div>
                               <div class="col-md-4 mb-md-0 mb-4">
                                   <h2 class="footer-heading">Resources</h2>
                                   <ul class="list-unstyled">
                                       <li><a href="#" class="py-1 d-block">Blog</a></li>
                                       <li><a href="#" class="py-1 d-block">Educational Materials</a></li>
                                       <li><a href="#" class="py-1 d-block">FAQs</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="row justify-content-end">
                               <div class="col-md-12 col-lg-11 mb-md-0 mb-4">
                                   
                                   <h2 class="footer-heading mt-5">Connect With Us</h2>
                                   <ul class="ftco-footer-social p-0">
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                       <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
                                   </ul>
                                   <h2 class="footer-heading mt-5">Subscribe to Our Newsletter</h2>
                                   <form action="#" class="subscribe-form">
                                       <div class="form-group d-flex">
                                           <input type="text" class="form-control rounded-left" placeholder="Enter your email address">
                                           <input type="submit" value="Subscribe" class="form-control submit px-3 rounded-right">
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row mt-5 pt-4 border-top">
                       <div class="col-md-6 col-lg-8">
                           <p class="copyright">© <script>document.write(new Date().getFullYear());</script> All rights reserved | EcoTrace - Track and Reduce Your Carbon Footprint</p>
                       </div>
                       <div class="col-md-6 col-lg-4 text-md-right">
                           <p class="mb-0 list-unstyled">
                               <a class="mr-md-3" href="#">Terms &amp; Conditions</a>
                               <a class="mr-md-3" href="#">Privacy Policy</a>
                           </p>
                       </div>
                   </div>
               </div>
           </footer>
</footer>
</div> 

    <!-- JS Files Start -->
    <!-- Include your existing JS script links -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-1.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/custom.js"></script>

    <!-- Add the new script for the modal -->
    <script>
        $(document).ready(function () {
            $('#contentModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var title = button.data('title');
                var image = button.data('content');
                var description = button.data('description');

                var modal = $(this);
                modal.find('.modal-title').text(title);
                modal.find('#contentModalImage').attr('src', image);
                modal.find('#contentModalDescription').text(description);
            });
        });
    </script>
    <!-- JS Files End -->
</body>

</html>
