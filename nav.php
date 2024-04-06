<?php 

if (isLoggedIn()) {
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
    
    $profilePicture = $user['profilePicture'];
    }
    

function checkCarbonFootprints($con) {
    // Check if user is logged in
    if (isLoggedIn()) {
        // Query to retrieve total carbon footprint for the logged-in user
        $carbonFootprintQuery = "SELECT SUM(totalCarbonFootprint) AS totalCarbonFootprint FROM weeklylog WHERE userID = '{$_SESSION['userID']}'";
        $carbonFootprintResult = mysqli_query($con, $carbonFootprintQuery);

        // Check if query was successful
        if (!$carbonFootprintResult) {
            // Handle query error
            echo "Error: " . mysqli_error($con);
            return false;
        }

        // Check if data is available
        if (mysqli_num_rows($carbonFootprintResult) > 0) {
            $carbonFootprintRow = mysqli_fetch_assoc($carbonFootprintResult);
            $totalCarbonFootprint = $carbonFootprintRow['totalCarbonFootprint'];

            // Check if total carbon footprint exceeds 1000
            if ($totalCarbonFootprint > 1000) {
                return true;
            } else {
                return false;
            }
        } else {
            // Handle no data found
            return false;
        }
    } else {
        // Handle not logged in
        return false;
    }
}
?>

<nav class="navbar navbar-expand-lg">
               <a class="logo" href="index.html"><img src="images/EcoTrace Logo.png" alt="" style="height: 100px; margin-left:30px;"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav mr-auto">
                       <li class="nav-item">
                           <a class="nav-link active" href="index.php">Home</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="index.php#about">About</a>
                       </li>
                       <?php if (isLoggedIn()): ?>
                       <li class="nav-item">
                           <a class="nav-link" href="activity_log.php">Activity Log</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="history.php">History</a>
                       </li>
                       <?php endif; ?>
                       <li class="nav-item">
                           <a class="nav-link" href="carbon_dash.php">Dashboard</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="display4.php">Learn</a>
                       </li>
                       <?php if (isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="recommend2.php">Recommendations</a>
                        </li>
                    <?php endif; ?>
                   </ul>
                   <?php if (isLoggedIn()): ?>
                    <li class="nav-item" style="list-style: none;">
                        <a class="login-btn" href="public_html/index.php" role="button">EcoHub</a>
                   </li>
                     <!-- If user is logged in, show profile circle -->
                     <li class="nav-item" style="list-style: none;">
                     <!-- If user is not logged in, show login button -->
                     <div class="notification" >
                        <div class="notBtn" href="#">
                           <?php if (weeklyLogUpToDate($con) && !checkCarbonFootprints($con))  : ?>
                              <div class="number"></div>
                           <?php else : ?>
                              <div class="number">1</div>
                           <?php endif; ?>
                              <i class="fas fa-bell" id="bell"></i>
                              <div class="box">
                                 <div class="display">
                                 <?php if(checkCarbonFootprints($con)) : ?>
                                        <div class="container" style= "padding-top:25px;">
                                          <div class="row">
                                             <div class="col-3">
                                             <img class="icon" style="width:60px; margin-left:8px;" src="https://cdn-icons-png.flaticon.com/128/10308/10308693.png" alt="Update Weekly Log Icon">
                                             </div>
                                             <div class="col-8">
                                             <div class="cent">Your carbon footprint has exceeded 1000. <a href="recommend2.php">visit the recommended page</a>.</div>
                                          </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (weeklyLogUpToDate($con)) : ?>
                                       <div class="container" style= "padding-top:25px;">
                                          <div class="row">
                                             <div class="col-3">
                                             <img class="icon" style="width:60px; margin-left:8px;" src="https://cdn-icons-png.flaticon.com/128/8832/8832119.png" alt="Update Weekly Log Icon">
                                             </div>
                                             <div class="col-8">
                                             <div class="cent">You're all caught up!</div>
                                          </div>
                                        </div>
                                    <?php else : ?>
                                       <div class="container" style= "padding-top:22px;">
                                          <div class="row">
                                             <div class="col-3">
                                                   <img class="icon" style="width:50px;" src="https://cdn-icons-png.flaticon.com/128/10308/10308693.png" alt="Update Weekly Log Icon">
                                             </div>
                                             <div class="col-8">
                                                   <div class="cent">Please update your weekly log for this week</div>
                                             </div>
                                          </div>
                                       </div>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              </div>
                        </div>
                     </li>
                     <li class="nav-item profile-dropdown">
                     <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="profile" style= "height:60px;"/>
                        <ul class="profile-menu">
                           <li class="sub-item">
                               <a href="profile.php" style="display: flex; align-items: center; text-decoration: none;">
                                  <span class="material-icons-outlined"> manage_accounts </span>
                                  <p>Update Profile</p>
                               </a>
                           </li>
                           <!-- Other profile-related items -->
                           <li class="sub-item">
                                 <a href="index.php?logout=true" style="display: flex; align-items: center; text-decoration: none;"> <!-- Log out link -->
                                    <span class="material-icons-outlined"> logout </span>
                                    <p>Logout</p>
                                 </a>
                           </li>
                           <li class="sub-item">
                                <a href="recommend2.php" style="display: flex; align-items: center; text-decoration: none;">
                                    <span class="material-icons-outlined">thumb_up</span>
                                    <p>Recommendations</p>
                                </a>
                            </li>
                           
                            <li class="sub-item">
                                <a href="history.php" style="display: flex; align-items: center; text-decoration: none;">
                                    <span class="material-icons-outlined">history</span>
                                    <p>History</p>
                                </a>
                            </li>

                        </ul>
                     </li>

               <?php else: ?>
                     <li class="nav-item" style="list-style: none;">
                        <a class="login-btn" href="login.php" role="button"> Login </a>
                     </li>
               <?php endif; ?>
               
            </div>
         
            </nav>