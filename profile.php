<?php
require("connection.php");

// Check if the 'success' parameter is set in the URL
if (isset($_GET['success'])) {
  $success_message = $_GET['success'];
}

// Check if it's the user's first login
if (isset($_GET['first_login']) && $_GET['first_login'] === 'true') {
   echo '<script>openFirstLoginForm();</script>';
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

   <style>
      /* Style the modal */
      .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
      }

      /* Modal content */
      .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      }

      /* Close button */
      .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      }

      .close:hover,
      .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
      }

   </style>

</head>
<body>
  <!--Inner Header Start-->
  <section class="wf100 p100 inner-header">

  </section>
   <!-- Button to open the modal -->
  <div class="text-right">
   <button id="editProfileBtn">Edit Profile</button>
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

   <!-- FIRST-TIME LOGIN FORM -->
   <div id="first-login-modal" class="modal">
      <div class="modal-content">
         <span class="close">&times;</span>
         <h2>First Login Questionnaire</h2>
         <form id="first-login-form">
            <label for="transportation">What is your primary mode of transportation?</label><br>
            <select id="transportation" name="transportation">
               <option value="car_owner">Car owner</option>
               <option value="public_transportation">Public transportation user</option>
               <option value="active_commuter">Active commuter (walk, cycle)</option>
               <option value="other_transport">Other</option>
            </select>
            <input type="text" id="other_transport_text" name="other_transport" style="display: none;" placeholder="Please specify"><br>

            <label for="dietary_preferences">How would you describe your dietary preferences?</label><br>
            <select id="dietary_preferences" name="dietary_preferences">
               <option value="meat_lover">Meat lover</option>
               <option value="vegetarian">Vegetarian</option>
               <option value="vegan">Vegan</option>
               <option value="mixed_diet">Mixed diet</option>
               <option value="other_diet">Other</option>
            </select>
            <input type="text" id="other_diet_text" name="other_diet" style="display: none;" placeholder="Please specify"><br>

            <label for="housing">Do you live in a house or an apartment?</label><br>
            <input type="radio" id="house" name="housing" value="house">
            <label for="house">House</label><br>
            <input type="radio" id="apartment" name="housing" value="apartment">
            <label for="apartment">Apartment</label><br>

            <label for="air_conditioning">Do you have air conditioning?</label><br>
            <input type="radio" id="ac_yes" name="air_conditioning" value="yes">
            <label for="ac_yes">Yes</label><br>
            <input type="radio" id="ac_no" name="air_conditioning" value="no">
            <label for="ac_no">No</label><br>

            <label for="household_size">How many people are there in your household?</label><br>
            <select id="household_size" name="household_size">
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5+">5+</option>
            </select><br>

            <button type="submit">Submit</button>
         </form>
         <script>
            // JavaScript to toggle the visibility of the text input fields based on the selected options
            document.getElementById('transportation').addEventListener('change', function() {
               var otherTransportInput = document.getElementById('other_transport_text');
               otherTransportInput.style.display = this.value === 'other_transport' ? 'block' : 'none';
            });

            document.getElementById('dietary_preferences').addEventListener('change', function() {
               var otherDietInput = document.getElementById('other_diet_text');
               otherDietInput.style.display = this.value === 'other_diet' ? 'block' : 'none';
            });
         </script>
      </div>
   </div>

   <!-- EDIT PROFILE -->
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
   
   <script>
      // Function to open the first-login form modal
      function openFirstLoginForm() {
         var firstLoginModal = document.getElementById("first-login-modal");
         firstLoginModal.style.display = "block";
      }

      // Get the modal
      var firstLoginModal = document.getElementById("first-login-modal");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on the button, open the modal
      function openModal() {
         firstLoginModal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
         firstLoginModal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
      if (event.target == modal) {
         firstLoginModal.style.display = "none";
      }
      }

      // Get the Edit Profile modal
      var editProfileModal = document.getElementById("editProfileModal");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[1]; // Assuming it's the second element with class "close"

      // When the user clicks on the button, open the modal
      function openEditProfileModal() {
         editProfileModal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
         editProfileModal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
         if (event.target == editProfileModal) {
            editProfileModal.style.display = "none";
         }
      }
   </script>

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


