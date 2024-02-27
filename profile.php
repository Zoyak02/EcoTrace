<?php
require("connection.php");

// Check if the 'success' parameter is set in the URL
if (isset($_GET['success'])) {
  $success_message = $_GET['success'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/favicon.png">
  <title>Profile Page</title>
  <!-- CSS FILES START -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/color.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/slick.css" rel="stylesheet">
  <link href="css/profile.css" rel="stylesheet">
  <!-- CSS FILES End -->
</head>
<body>
  <!--Inner Header Start-->
  <section class="wf100 p100 inner-header">

  </section>
   <!-- Button to open the modal -->
  <div class="text-right">
   <button id="editProfileBtn">Edit Profile</button>
  </div>

  <!-- Modal -->
   <div id="editProfileModal" class="modal">
      <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Edit Profile</h2>
      <form id="editProfileForm">
         <!-- Input fields for editing profile details -->
         <label for="name">Name:</label>
         <input type="text" id="name" name="name" value="John Doe">
         
         <!-- Add more input fields for other profile details -->
         
         <button type="submit">Save Changes</button>
      </form>
      </div>
   </div>

  <!--Inner Header End--> 
   <!-- Profile Header Section Start -->
   <div class="cover-photo">
      <!-- Cover photo content goes here -->
   </div>
   <div class="container">
      <div class="row">
      <div class="col-md-3">
         <div class="profile-photo">
            <!-- Round shaped profile photo -->
            <img src="profile.jpg" alt="Profile Photo">
         </div>
      </div>
      <div class="col-md-9">
         <h1 class="user-name">John Doe</h1>
      </div>
      </div>
   </div>
   <!-- Profile Header Section End -->

   <!-- About You Section Start -->
<div id="about-you" class="container">
   <div class="row">
      <div class="col-md-12 text-center">
         <div class="section-title-2">
            <h2>About You</h2>
         </div>
      </div>
      <div class="col-md-12">
         <p>User's information goes here...</p>
      </div>
   </div>
</div>
<!-- About You Section End -->

  <!-- Badges Section Start -->
  <div class="col-md-12 text-center">
    <div class="section-title-2">
      <h2>Your Badges</h2>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <div class="tab-content" id="myTabContent">
            <!--WildLife Slider Start-->
            <div class="tab-pane fade show active" id="wildlife" role="tabpanel" aria-labelledby="wildlife-tab">
               <div class="cpro-slider owl-carousel owl-theme">
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro1.jpg" alt="">
                        <h5>Forest & Tree Planting</h5>
                        <div class="pro-hover">
                           <h6>Forest & Tree Planting</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro2.jpg" alt="">
                        <h5>Recycling & Waste Management</h5>
                        <div class="pro-hover">
                           <h6>Recycling & Waste Management</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro3.jpg" alt="">
                        <h5>Solar & Wind
                           Energy 
                        </h5>
                        <div class="pro-hover">
                           <h6>Solar & Wind
                              Energy 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro4.jpg" alt="">
                        <h5>Saving Wildlife
                           & their Cubs 
                        </h5>
                        <div class="pro-hover">
                           <h6>Saving Wildlife
                              & their Cubs 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro5.jpg" alt="">
                        <h5>Forest & Tree Planting</h5>
                        <div class="pro-hover">
                           <h6>Forest & Tree Planting</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro6.jpg" alt="">
                        <h5>Recycling & Waste Management</h5>
                        <div class="pro-hover">
                           <h6>Recycling & Waste Management</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro7.jpg" alt="">
                        <h5>Solar & Wind
                           Energy 
                        </h5>
                        <div class="pro-hover">
                           <h6>Solar & Wind
                              Energy 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro8.jpg" alt="">
                        <h5>Saving Wildlife
                           & their Cubs 
                        </h5>
                        <div class="pro-hover">
                           <h6>Saving Wildlife
                              & their Cubs 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
               </div>
            </div>
            <!--WildLife Slider End--> 
            <!--Water Resources Slider Start-->
            <div class="tab-pane fade" id="water" role="tabpanel" aria-labelledby="water-tab">
               <div class="cpro-slider owl-carousel owl-theme">
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro5.jpg" alt="">
                        <h5>Forest & Tree Planting</h5>
                        <div class="pro-hover">
                           <h6>Forest & Tree Planting</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro6.jpg" alt="">
                        <h5>Recycling & Waste Management</h5>
                        <div class="pro-hover">
                           <h6>Recycling & Waste Management</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro7.jpg" alt="">
                        <h5>Solar & Wind
                           Energy 
                        </h5>
                        <div class="pro-hover">
                           <h6>Solar & Wind
                              Energy 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro8.jpg" alt="">
                        <h5>Saving Wildlife
                           & their Cubs 
                        </h5>
                        <div class="pro-hover">
                           <h6>Saving Wildlife
                              & their Cubs 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro1.jpg" alt="">
                        <h5>Forest & Tree Planting</h5>
                        <div class="pro-hover">
                           <h6>Forest & Tree Planting</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro2.jpg" alt="">
                        <h5>Recycling & Waste Management</h5>
                        <div class="pro-hover">
                           <h6>Recycling & Waste Management</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro3.jpg" alt="">
                        <h5>Solar & Wind
                           Energy 
                        </h5>
                        <div class="pro-hover">
                           <h6>Solar & Wind
                              Energy 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro4.jpg" alt="">
                        <h5>Saving Wildlife
                           & their Cubs 
                        </h5>
                        <div class="pro-hover">
                           <h6>Saving Wildlife
                              & their Cubs 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
               </div>
            </div>
            <!--Water Resources Slider End--> 
            <!--Solar Energy Slider Start-->
            <div class="tab-pane fade" id="solar" role="tabpanel" aria-labelledby="solar-tab">
               <div class="cpro-slider owl-carousel owl-theme">
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro7.jpg" alt="">
                        <h5>Solar & Wind
                           Energy 
                        </h5>
                        <div class="pro-hover">
                           <h6>Solar & Wind
                              Energy 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro8.jpg" alt="">
                        <h5>Saving Wildlife
                           & their Cubs 
                        </h5>
                        <div class="pro-hover">
                           <h6>Saving Wildlife
                              & their Cubs 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro5.jpg" alt="">
                        <h5>Forest & Tree Planting</h5>
                        <div class="pro-hover">
                           <h6>Forest & Tree Planting</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro6.jpg" alt="">
                        <h5>Recycling & Waste Management</h5>
                        <div class="pro-hover">
                           <h6>Recycling & Waste Management</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro3.jpg" alt="">
                        <h5>Solar & Wind
                           Energy 
                        </h5>
                        <div class="pro-hover">
                           <h6>Solar & Wind
                              Energy 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro4.jpg" alt="">
                        <h5>Saving Wildlife
                           & their Cubs 
                        </h5>
                        <div class="pro-hover">
                           <h6>Saving Wildlife
                              & their Cubs 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro1.jpg" alt="">
                        <h5>Forest & Tree Planting</h5>
                        <div class="pro-hover">
                           <h6>Forest & Tree Planting</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro2.jpg" alt="">
                        <h5>Recycling & Waste Management</h5>
                        <div class="pro-hover">
                           <h6>Recycling & Waste Management</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
               </div>
            </div>
            <!--Solar Energy Slider End--> 
            <!--Recycling Slider Start-->
            <div class="tab-pane fade" id="recycling" role="tabpanel" aria-labelledby="recycling-tab">
               <div class="cpro-slider owl-carousel owl-theme">
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro7.jpg" alt="">
                        <h5>Solar & Wind
                           Energy 
                        </h5>
                        <div class="pro-hover">
                           <h6>Solar & Wind
                              Energy 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro8.jpg" alt="">
                        <h5>Saving Wildlife
                           & their Cubs 
                        </h5>
                        <div class="pro-hover">
                           <h6>Saving Wildlife
                              & their Cubs 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro3.jpg" alt="">
                        <h5>Solar & Wind
                           Energy 
                        </h5>
                        <div class="pro-hover">
                           <h6>Solar & Wind
                              Energy 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro4.jpg" alt="">
                        <h5>Saving Wildlife
                           & their Cubs 
                        </h5>
                        <div class="pro-hover">
                           <h6>Saving Wildlife
                              & their Cubs 
                           </h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro1.jpg" alt="">
                        <h5>Forest & Tree Planting</h5>
                        <div class="pro-hover">
                           <h6>Forest & Tree Planting</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
                  <!--Pro Box-->
                  <div class="item">
                     <div class="pro-box">
                        <img src="images/current-pro2.jpg" alt="">
                        <h5>Recycling & Waste Management</h5>
                        <div class="pro-hover">
                           <h6>Recycling & Waste Management</h6>
                           <p>We are working over 20 years on Waste Management & Material Recycling Projects.</p>
                           <a href="#">Read More</a> 
                        </div>
                     </div>
                  </div>
                  <!--Pro Box End--> 
               </div>
            </div>
            <!--Recycling Slider End--> 
         </div>
      </div>
   </div>
  </div>
  <!-- Badges Section End -->
  <!--   JS Files Start  --> 
  <script src="js/jquery-3.3.1.min.js"></script> 
  <script src="js/jquery-migrate-1.4.1.min.js"></script> 
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap.min.js"></script> 
  <script src="js/owl.carousel.min.js"></script> 
  <script src="js/jquery.prettyPhoto.js"></script> 
  <script src="js/isotope.min.js"></script> 
  <script src="js/custom.js"></script>
  <script src="js/profile.js"></script>
</body>
</html>


