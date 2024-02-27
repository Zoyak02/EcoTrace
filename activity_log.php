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
    <title>Activity Tracking</title>
    <!-- CSS FILES START -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <!-- CSS FILES End -->
</head>
<body>
  <div class="wrapper">
    <!--Header Start-->
    <header class="header-style-2">
           <nav class="navbar navbar-expand-lg">
              <a class="navbar-brand" href="index-2.html"><img src="images/h2logo.png" alt=""></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="index-2.html"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Home </a>
                       <ul class="dropdown-menu" >
                          <li><a href="index-2.html">Home One</a></li>
                          <li><a href="home-two.html">Home Two</a></li>
                          <li><a href="home-three.html">Home Three</a></li>
                       </ul>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="about.html">About</a> </li>
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="events-grid.html"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Events </a>
                       <ul class="dropdown-menu" >
                          <li><a href="events-grid.html">Events Grid</a></li>
                          <li><a href="events-grid-2.html">Events Grid Two</a></li>
                          <li><a href="events-grid-3.html">Events Grid Three</a></li>
                          <li><a href="events-list.html">Events List</a></li>
                          <li><a href="events-list-two.html">Events List Two</a></li>
                          <li><a href="event-details.html">Event Details</a></li>
                       </ul>
                    </li>
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="causes.html"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> EduHub </a>
                       <ul class="dropdown-menu" >
                          <li><a href="causes.html">Causes Grid</a></li>
                          <li><a href="causes-list.html">Causes List</a></li>
                          <li><a href="causes-details.html">Causes Details</a> </li>
                       </ul>
                    </li>
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="blog.html"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Social </a>
                       <ul class="dropdown-menu" >
                          <li><a href="blog.html">Blog Default</a></li>
                          <li><a href="blog-list.html">Blog List</a> </li>
                          <li><a href="blog-grid.html">Blog Grid</a></li>
                          <li><a href="blog-two-col.html">Blog Two Columns</a> </li>
                          <li><a href="blog-three-col.html">Blog Three Columns</a></li>
                          <li><a href="blog-details.html">Blog Details</a></li>
                       </ul>
                    </li>
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pages </a>
                       <ul class="dropdown-menu" >
                          <li>
                             <a href="#">Projects</a>
                             <ul class="dropdown-menu" >
                                <li><a href="projects.html">Projects</a> </li>
                                <li><a href="projects-grid.html">Projects Grid</a> </li>
                                <li><a href="projects-grid-two.html">Projects Grid Two</a> </li>
                                <li><a href="projects-list.html">Projects List</a> </li>
                                <li><a href="projects-details.html">Project Details</a> </li>
                             </ul>
                          </li>
                          <li>
                             <a href="#">Shop</a>
                             <ul class="dropdown-menu" >
                                <li><a href="shop.html">Shop</a> </li>
                                <li><a href="shop-two.html">Shop Two</a> </li>
                                <li><a href="shop-details.html">Shop Details</a> </li>
                             </ul>
                          </li>
                          <li>
                             <a href="team.html">Team</a>
                             <ul class="dropdown-menu" >
                                <li><a href="team.html">Team One</a> </li>
                                <li><a href="team-two.html">Team Two</a> </li>
                                <li><a href="team-details.html">Team Details</a> </li>
                             </ul>
                          </li>
                          <li>
                             <a href="#">Gallery</a>
                             <ul class="dropdown-menu" >
                                <li><a href="gallery-grid.html">Gallery Grid</a> </li>
                                <li><a href="gallery-full.html">Gallery Full</a> </li>
                                <li><a href="gallery-masonry.html">Gallery Masonry</a> </li>
                             </ul>
                          </li>
                          <li><a href="testimonials.html">Testimonials</a> </li>
                          <li><a href="donation.html">Donation</a> </li>
                          <li><a href="my-account.html">My Account</a> </li>
                          <li><a href="coming-soon.html">Coming Soon</a> </li>
                          <li><a href="page-404.html">404 Error</a> </li>
                       </ul>
                    </li>
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="contact.html"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Contact </a>
                       <ul class="dropdown-menu" >
                          <li><a href="contact-one.html">Contact One</a> </li>
                          <li><a href="contact-two.html">Contact Two</a> </li>
                       </ul>
                    </li>
                 </ul>
                 <ul class="topnav-right">
                    <li> <a class="mdonate" href="donation.html"><span>Make a Donation</span></a> </li>
                    <li> <a class="search-icon" href="#search"> <i class="fas fa-search"></i> </a> </li>
                    <li class="dropdown">
                       <a class="cart-icon" href="#" role="button" id="cartdropdown" data-toggle="dropdown"> <i class="fas fa-shopping-cart"></i></a>
                       <div class="dropdown-menu cart-box" aria-labelledby="cartdropdown">
                          Recently added item(s)
                          <ul class="list">
                             <li class="item">
                                <a href="#" class="preview-image"><img class="preview" src="images/pro.jpg" alt=""></a>
                                <div class="description"> <a href="#">Sample Course</a> <strong class="price">1 x $44.95</strong> </div>
                             </li>
                             <li class="item">
                                <a href="#" class="preview-image"><img class="preview" src="images/pro.jpg" alt=""></a>
                                <div class="description"> <a href="#">Sample Course</a> <strong class="price">1 x $44.95</strong> </div>
                             </li>
                          </ul>
                          <div class="total">Total: <strong>$44.95</strong></div>
                          <div class="view-link"><a href="#">Proceed to Checkout</a> <a href="#">View cart </a></div>
                       </div>
                    </li>
                    <li class="login-reg"> <a href="my-account.html">Login</a> | <a href="my-account.html">Signup</a> </li>
                 </ul>
              </div>
           </nav>
        </header>
        <div id="search">
           <button type="button" class="close">×</button>
           <form class="search-overlay-form">
              <input type="search" value="" placeholder="type keyword(s) here" />
              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
           </form>
        </div>
        <!--Header End-->
        <!--Inner Header Start-->
        <section class="wf100 p100 inner-header">
           <div class="container">
              <h1>My Account</h1>
              <ul>
                 <li><a href="#">Home</a></li>
                 <li><a href="#"> My Account </a></li>
              </ul>
           </div>
        </section>
        <!--Inner Header End--> 

      <!-- Activity Log Form Start -->
      <form id="activity-log-form">

      <!-- TRANSPORTATION METHOD -->

         <div id="car_owner_questions" class="form-group">
            <!-- Car owner questions -->
            <label>How many kilometers did you drive your car this week?</label>
            <input type="number" name="car_kilometers" min="0" step="1" class="form-control">
            <label>Were there any carpooling instances this week? If yes, how many times?</label>
            <input type="number" name="carpool_instances" min="0" step="1" class="form-control">
         </div>

         <div id="public_transportation_questions" class="form-group">
            <!-- Public transportation questions -->
            <label>How many times did you use public transportation this week?</label>
            <input type="number" name="public_transportation_times" min="0" step="1" class="form-control">
         </div>

         <div id="active_commuter_questions" class="form-group">
            <!-- Active commuter questions -->
            <label>How many days did you walk or cycle as your primary mode of transportation this week?</label>
            <input type="number" name="active_commuter_days" min="0" step="1" class="form-control">
         </div>

         <!-- DIETARY PREFERENCES -->

         <div id="meat_lover_questions" class="form-group">
            <!-- Meat lover questions -->
            <label>How many servings of red meat (beef, lamb, pork) did you consume this week?</label>
            <input type="number" name="red_meat_servings" min="0" step="1" class="form-control">
            <label>How many servings of poultry (chicken, turkey) did you consume this week?</label>
            <input type="number" name="poultry_servings" min="0" step="1" class="form-control">
            <label>How many servings of fish did you consume this week?</label>
            <input type="number" name="fish_servings" min="0" step="1" class="form-control">
         </div>

         <div id="vegetarian_questions" class="form-group">
            <!-- Vegetarian questions -->
            <label>How many plant-based meals did you have this week?</label>
            <input type="number" name="plant_based_meals" min="0" step="1" class="form-control">
            <label>How many servings of tofu or other plant-based protein did you consume?</label>
            <input type="number" name="plant_protein_servings" min="0" step="1" class="form-control">
         </div>

         <div id="mixed_diet_questions" class="form-group">
            <!-- Mixed diet questions -->
            <label>Specify the number of meat-based and plant-based meals you had this week.</label>
            <input type="text" name="mixed_diet_meals" class="form-control">
         </div>

         <!-- ENERGY CONSUMPTION -->

         <div id="heating_cooling_questions" class="form-group">
            <!-- Heating and Cooling questions -->
            <label>On average, how many hours per day did you use heating this week?</label>
            <input type="number" name="heating_hours" min="0" step="1" class="form-control">
            <label>On average, how many hours per day did you use air conditioning this week?</label>
            <input type="number" name="ac_hours" min="0" step="1" class="form-control">
         </div>

         <div id="appliances_questions" class="form-group">
            <!-- Energy-Intensive Appliances questions -->
            <label>How many loads of laundry did you do using a washing machine this week?</label>
            <input type="number" name="laundry_loads" min="0" step="1" class="form-control">
            <label>How many hours did you use a dryer this week?</label>
            <input type="number" name="dryer_hours" min="0" step="1" class="form-control">
            <label>How many loads did you run in the dishwasher this week?</label>
            <input type="number" name="dishwasher_loads" min="0" step="1" class="form-control">
         </div>

         <button type="submit" class="btn btn-primary">Submit</button>
      </form>


      <!-- JAVASCRIPT -->

      <script>
         // Function to show/hide questions based on user's transportation method
         function showHideQuestions() {
            var transportation = "<?php echo $user_transportation; ?>";
            var diet = "<?php echo $user_diet; ?>";

            // Hide all question sections first
            document.getElementById('car_owner_questions').style.display = 'none';
            document.getElementById('public_transportation_questions').style.display = 'none';
            document.getElementById('active_commuter_questions').style.display = 'none';

            document.getElementById('meat_lover_questions').style.display = 'none';
            document.getElementById('vegetarian_questions').style.display = 'none';
            document.getElementById('mixed_diet_questions').style.display = 'none';

            // Show relevant question section based on user's transportation method
            if (transportation === 'car_owner') {
                  document.getElementById('car_owner_questions').style.display = 'block';
            } else if (transportation === 'public_transportation') {
                  document.getElementById('public_transportation_questions').style.display = 'block';
            } else if (transportation === 'active_commuter') {
                  document.getElementById('active_commuter_questions').style.display = 'block';
            }

            // Show relevant question section based on user's diet
            if (diet === 'meat_lover') {
                  document.getElementById('meat_lover_questions').style.display = 'block';
            } else if (diet === 'vegetarian') {
                  document.getElementById('vegetarian_questions').style.display = 'block';
            } else if (diet === 'mixed_diet') {
                  document.getElementById('mixed_diet_questions').style.display = 'block';
            }
         }

         // Call the function initially to set the initial state of the form
         showHideQuestions();
      </script>




      <!-- Activity Log Form End -->


        
  </div>
  <!--   JS Files Start  --> 
  <script src="js/jquery-3.3.1.min.js"></script> 
  <script src="js/jquery-migrate-1.4.1.min.js"></script> 
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap.min.js"></script> 
  <script src="js/owl.carousel.min.js"></script> 
  <script src="js/jquery.prettyPhoto.js"></script> 
  <script src="js/isotope.min.js"></script> 
  <script src="js/custom.js"></script>
  <script src="js/signup.js"></script>
</body>
</html>