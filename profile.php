<?php
session_start();
require("connection.php");

// Check if the database connection is established
if (!$con) {
    // Handle error if database connection fails
    echo "Failed to connect to the database.";
    exit();
}

// Retrieve user ID from the session after successful login
if (!isset($_SESSION['userID'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['userID'];

// Fetch user data from the database
$sql = "SELECT * FROM user WHERE userID = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $userID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if execute() was successful
if (!$result) {
    // Handle error if execute() fails
    echo "Failed to execute the SQL statement.";
    exit();
}

// Fetch user data as an associative array
$user = mysqli_fetch_assoc($result);

// Check if user data was found
if (!$user) {
    // Handle error if user data is not found
    echo "User data not found!";
    exit();
}

// Extract user data
$username = $user['username'];
$firstName = $user['firstName'];
$lastName = $user['lastName'];
$email = $user['email'];
$contactNumber = $user['contactNumber'];
$commutingMethod = $user['commutingMethod'];
$dietPreferences = $user['dietPreferences'];
$energySource = $user['energySource'];

// Free the result set
mysqli_free_result($result);
// Close the prepared statement
mysqli_stmt_close($stmt);

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
  <link href="css/custom3.css" rel="stylesheet">
  <link href="css/color.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/slick.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
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

      /* Edit Profile Modal */
      .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }
        .me-2 {
            margin-right: .5rem!important;
        }

   </style>

</head>
<body>
   <div class="wrapper">
      <!--Header Start-->
      <header class="header-style-2">
         <nav class="navbar navbar-expand-lg">
            <a class="logo" href="index.html"><img src="images/EcoTrace Logo.png" alt="" style="height: 100px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
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
      <!-- Header End -->
      <!--Inner Header Start-->
      <section class="wf100 inner-header">
         <div class="container">
            <h1>My Account </h1>
         </div>
      </section>
      <!--Inner Header End--> 


      <!-- Profile Section Start -->
      <div class="container">
         <div class="main-body">
               <div class="row gutters-sm">
                  <div class="col-md-4 mb-3">
                     <div class="card">
                        <div class="card-body">
                           <div class="d-flex flex-column align-items-center text-center">
                              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile Picture" class="rounded-circle" width="150">
                              <div class="mt-3 font-weight-bold">
                                 <h5 class="mb-5 mt-2"><?php echo $firstName." ".$lastName; ?></h5>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                                    Edit Profile
                                 </button> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-7">
                  <div class="card mb-1">
                     <div class="card-body">
                     <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $username; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $firstName; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $lastName; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $email; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Contact</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $contactNumber; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Commuting Method</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $commutingMethod; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Dietary Preferences</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $dietPreferences; ?>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Energy Source</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $energySource; ?>
                        </div>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>

            </div>
         </div>
      </div>

      <!-- Profile Section End -->

      <!-- Edit Profile Modal -->
      <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                  <!-- Form for editing profile -->
                  <form id="editProfileForm" action="accounts.php" method="POST">
                     <div class="container">
                           <div class="main-body">
                              <div class="row">
                                 <!-- Edit Profile Picture Start -->
                                 <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="card">
                                          <div class="card-body">
                                             <div class="d-flex flex-column align-items-center text-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="170">
                                                <div class="mt-3">
                                                      <button class="btn btn-outline-primary">Edit Picture</button>
                                                </div>
                                             </div>
                                          </div>
                                    </div>
                                 </div>
                                 <!-- Edit Profile Picture End -->

                                 <!-- Edit Profile Details Section -->

                                 <div class=row>
                                    <div class="col-lg-12">
                                    <div class="card">
                                          <div class="card-body">
                                             <!-- Edit Profile Details Start -->
                                             <div class="row mb-3">
                                                   <div class="col-sm-4">
                                                      <h6 class="mb-0">Username</h6>
                                                   </div>
                                                   <div class="col-sm-8 text-secondary">
                                                      <input type="text" class="form-control" value="<?php echo $username; ?>">
                                                   </div>
                                             </div>
                                             <div class="row mb-3">
                                                   <div class="col-sm-4">
                                                      <h6 class="mb-0">First Name</h6>
                                                   </div>
                                                   <div class="col-sm-8 text-secondary">
                                                      <input type="text" class="form-control" value="<?php echo $firstName; ?>">
                                                   </div>
                                             </div>
                                             <div class="row mb-3">
                                                   <div class="col-sm-4">
                                                      <h6 class="mb-0">Last Name</h6>
                                                   </div>
                                                   <div class="col-sm-8 text-secondary">
                                                      <input type="text" class="form-control" value="<?php echo $lastName; ?>">
                                                   </div>
                                             </div>
                                             <div class="row mb-3">
                                                   <div class="col-sm-4">
                                                      <h6 class="mb-0">Email</h6>
                                                   </div>
                                                   <div class="col-sm-8 text-secondary">
                                                      <input type="text" class="form-control" value="<?php echo $email; ?>">
                                                   </div>
                                             </div>
                                             <div class="row mb-3">
                                                   <div class="col-sm-4">
                                                      <h6 class="mb-0">Contact Number</h6>
                                                   </div>
                                                   <div class="col-sm-8 text-secondary">
                                                      <input type="text" class="form-control" value="<?php echo $contactNumber; ?>">
                                                   </div>
                                             </div>
                                             <div class="row mb-3">
                                                   <div class="col-sm-4">
                                                      <h6 class="mb-0">Commuting Method</h6>
                                                   </div>
                                                   <div class="col-sm-8 text-secondary">
                                                      <select id="commutingMethodModal" name="commutingMethodModal" class="form-control">
                                                         <option value="" <?php if($commutingMethod === null) echo "selected"; ?>>Select</option>
                                                         <option value="car_owner" <?php if($commutingMethod == "car_owner") echo "selected"; ?>>Car owner</option>
                                                         <option value="public_transportation" <?php if($commutingMethod == "public_transportation") echo "selected"; ?>>Public transportation user</option>
                                                         <option value="active_commuter" <?php if($commutingMethod == "active_commuter") echo "selected"; ?>>Active commuter (walk, cycle)</option>
                                                         <option value="other_transport" <?php if($commutingMethod == "other_transport") echo "selected"; ?>>Other</option>
                                                      </select>
                                                   </div>
                                             </div>
                                             <div class="row mb-3">
                                                   <div class="col-sm-4">
                                                      <h6 class="mb-0">Dietary Preferences</h6>
                                                   </div>
                                                   <div class="col-sm-8 text-secondary">
                                                      <select id="dietPreferenceModal" name="dietPreferenceModal" class="form-control">
                                                         <option value="" <?php if($dietPreferences === null) echo "selected"; ?>>Select</option>
                                                         <option value="meat_lover" <?php if($dietPreferences == "meat_lover") echo "selected"; ?>>Meat lover</option>
                                                         <option value="vegetarian" <?php if($dietPreferences == "vegetarian") echo "selected"; ?>>Vegetarian</option>
                                                         <option value="vegan" <?php if($dietPreferences == "vegan") echo "selected"; ?>>Vegan</option>
                                                         <option value="mixed_diet" <?php if($dietPreferences == "mixed_diet") echo "selected"; ?>>Mixed diet</option>
                                                         <option value="other_diet" <?php if($dietPreferences == "other_diet") echo "selected"; ?>>Other</option>
                                                      </select>
                                                      <input type="text" id="other_dietPreference_textModal" name="other_dietPreferenceModal" style="display: none;" placeholder="Please specify">
                                                   </div>                                
                                             </div>
                                             <div class="row mb-3">
                                                   <div class="col-sm-4">
                                                      <h6 class="mb-0">Energy Source</h6>
                                                   </div>
                                                   <div class="col-sm-8 text-secondary">
                                                      <select id="energySourceModal" name="energySourceModal" class="form-control">
                                                         <option value="" <?php if($energySource === null) echo "selected"; ?>>Select</option>
                                                         <option value="electricity_grid" <?php if($energySource == "electricity_grid") echo "selected"; ?>>Electricity Grid</option>
                                                         <option value="solar_power" <?php if($energySource == "solar_power") echo "selected"; ?>>Solar Power</option>
                                                         <option value="wind_power" <?php if($energySource == "wind_power") echo "selected"; ?>>Wind Power</option>
                                                         <option value="natural_gas" <?php if($energySource == "natural_gas") echo "selected"; ?>>Natural gas</option>
                                                         <option value="biomass" <?php if($energySource == "biomass") echo "selected"; ?>>Biomass</option>
                                                         <option value="geothermal_energy" <?php if($energySource == "geothermal_energy") echo "selected"; ?>>Geothermal Energy</option>
                                                         <option value="other" <?php if($energySource == "other") echo "selected"; ?>>Other</option>
                                                      </select>
                                                      <input type="text" id="other_energySource_textModal" name="other_energySourceModal" style="display: none;" placeholder="Please specify">
                                                   </div>
                                             </div>

                                             <!-- Add a hidden input field to indicate profile update -->
                                             <!-- <input type="hidden" name="update-profile" value="1"> -->

                                             <div class="row">
                                                   <div class="col-sm-4"></div>
                                                   <div class="col-sm-8 text-secondary">
                                                      <button type="submit" name="save-btn" class="btn btn-primary px-4">Save Changes</button>
                                                   </div>
                                             </div>
                                             <!-- Edit Profile Details End -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Edit Profile Details Section End -->
                              </div>
                           </div>
                     </div>
                  </form>

                     
                  </div>
               </div>
         </div>
      </div>

      <script>
         // JavaScript to toggle the visibility of the text input fields based on the selected options
         document.getElementById('commutingMethodModal').addEventListener('change', function() {
               var otherCommutingMethodInput = document.getElementById('other_commutingMethod_textModal');
               otherCommutingMethodInput.style.display = this.value === 'other_transport' ? 'block' : 'none';
         });

         document.getElementById('dietPreferenceModal').addEventListener('change', function() {
               var otherDietPreferenceInput = document.getElementById('other_dietPreference_textModal');
               otherDietPreferenceInput.style.display = this.value === 'other_diet' ? 'block' : 'none';
         });

         document.getElementById('energySourceModal').addEventListener('change', function() {
               var otherEnergySourceInput = document.getElementById('other_energySource_textModal');
               otherEnergySourceInput.style.display = this.value === 'other' ? 'block' : 'none';
         });
      </script>

      <!-- First-Time Login Modal -->
      <div id="first-login-modal" class="modal">
         <h1>Let us know you better!</h1>
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

      <!-- First-Time Login Modal End -->

      <script>
         // Function to open the first-login form modal
         function openFirstLoginForm() {
            console.log("Opening first-login-modal...");
            var firstLoginModal = document.getElementById("first-login-modal");
            console.log(firstLoginModal); // Check if the modal element is found
            if (firstLoginModal) {
               firstLoginModal.style.display = "block";
            } else {
               console.error("Could not find first-login-modal element.");
            }
         }

         // Get the modal
         var firstLoginModal = document.getElementById("first-login-modal");

         // Get the <span> element that closes the modal
         var span = document.getElementsByClassName("close")[0];

         // When the user clicks on <span> (x), close the modal
         span.onclick = function() {
            firstLoginModal.style.display = "none";
         }

         // When the user clicks anywhere outside of the modal, close it
         window.onclick = function(event) {
            if (event.target == firstLoginModal) {
               firstLoginModal.style.display = "none";
            }
         }
      </script>

   </div>
   <!--   JS Files Start  --> 
   <script src="js/jquery-3.3.1.min.js"></script> 
   <script src="js/jquery-migrate-1.4.1.min.js"></script> 
   <script src="js/popper.min.js"></script> 
   <script src="js/bootstrap.min.js"></script> 
   <script src="js/owl.carousel.min.js"></script> 
   <script src="js/jquery.prettyPhoto.js"></script> 
   <script src="js/isotope.min.js"></script> 
   <script src="js/main.js"></script>
</body>
</html>


