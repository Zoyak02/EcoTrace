<?php
require_once('../core/db_functions.php');
require_once('../core/utility_functions.php');

$conn = connect_to_db();
$userID = $_SESSION['userID'];
$_SESSION['user_display_name'] = $_SESSION['user_display_name'] ?? '';
$_SESSION['username'] = $_SESSION['username'] ?? '';
$_SESSION['user_bio'] = $_SESSION['user_bio'] ?? '';
$_SESSION['profilePicture'] = $_SESSION['profilePicture'] ?? '';
$user_post_count = get_user_post_count($conn, $userID);
$user_followers = get_user_followers($conn, $userID);
$user_followers_count = count($user_followers);
$user_following = get_followed_users_by_user($conn, $userID);
$user_following_count = count($user_following);

// Assume $userID contains the ID of the currently logged-in user
$sql = "SELECT profilePicture FROM user WHERE userID = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $userID);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $profilePicture);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

$active_page = get_active_page();

$profile_pic_compression_settings = "w_500/f_auto,q_auto:eco";
$profile_pic_transformed_url = add_transformation_parameters($profilePicture, $profile_pic_compression_settings);

$user_profile_link = 'user_profile.php?userID=' . $userID . '"';

$overallQuery = "SELECT SUM(totalCarbonFootprint) AS totalOverall FROM weeklylog WHERE userID = '$userID'";
                    $overallResult = mysqli_query($con, $overallQuery);
                    $totalOverall = 0;

                    if ($overallResult && mysqli_num_rows($overallResult) > 0) {
                        $totalOverallRow = mysqli_fetch_assoc($overallResult);
                        $totalOverall = $totalOverallRow['totalOverall'];
                    }
?>

<style>
    /* CARDS */
    .cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.card {
  margin: 20px;
  margin-left: 40px;
  margin-bottom: 30px;
  padding:6px;
  width: 300px;
  min-height: 100px; /* Adjusted height */
  display: grid;
  grid-template-rows: auto 1fr auto auto; /* Adjusted grid template rows */
  border-radius: 10px;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.2s;
}

.card:hover {
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
  transform: scale(1.01);
}

.card__link,
.card__exit,
.card__icon {
  position: relative;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.9);
}

.card__link::after {
  position: absolute;
  top: 25px;
  left: 0;
  content: "";
  width: 0%;
  height: 3px;
  background-color: rgba(255, 255, 255, 0.6);
  transition: all 0.5s;
}

.card__link:hover::after {
  width: 100%;
}

.card__exit {
  grid-row: 1/2;
  justify-self: end;
}

.card__icon {
  grid-row: 2/3;
  font-size: 30px;
  margin-left:25px;
}

.card__title {
  grid-row: 3/4;
  margin: 0; 
  padding-top:5px;
  margin-left:20px;
  font-weight: 700;
  color: #ffffff;
  font-size: 1rem; /* Adjusted font size */
}

.card__apply {
  grid-row: 4/5;
  align-self: center;
  font-weight: 800;
  color: #1b5e20;
  font-size: 1.5rem; 
}

.card {
  display: flex;
  flex-direction: column;
  /* Other styles for the card */
}

.card__content {
  display: flex;
  align-items: center;
  /* Other styles for the card content */
}


.card-4 {
    background: rgb(144,237,147);
 background: radial-gradient(circle, rgba(144,237,147,1) 0%, rgba(93,196,152,1) 100%); 
}


@media (max-width: 1600px) {
  .cards {
    justify-content: center;
  }
}
    </style>


<nav class="fixed-top sidebar navbar navbar-light bg-white h-100 p-0">
    <div class="d-flex flex-column position-sticky h-100 w-100">
        <div class="sidebar-container d-flex flex-column h-100 pt-3 pb-4">

            <!-- User Profile -->
            <div class="home-navbar-profile-container d-flex flex-column align-items-center text-center mb-3 pb-2">
                <a href="<?php echo $user_profile_link; ?>" class="text-decoration-none">
                    <img class="home-navbar-user-profile-picture mb-2" src="<?php echo $profile_pic_transformed_url; ?>"
                        alt="User profile picture">
                    <div class="home-navbar-user-profile-info-container d-flex flex-column justify-content-center">
                        <p class="user-profile-name fs-5 fw-bold p-0 m-0 text-nowrap text-body">
                            <?php echo $_SESSION['user_display_name']; ?>
                        </p>
                        <p class="user-profile-username text-secondary fs-6 p-0 m-0 text-nowrap">
                            <?php echo '@' . $_SESSION['username']; ?>
                        </p>
                    </div>
                </a>
            </div>
            
            <div class="card card-4">
            <div class="card__content">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <h2 class="card__title">Total Carbon Footprint</h2>
            </div>
            <p class="card__apply"><?php echo number_format($totalOverall,2) ?> </p>
            </div>


            <!-- Menu Links -->
            <ul class="navbar-menu-links-container d-flex flex-column navbar-nav w-100 ps-0 mb-5">
                <li
                    class="nav-item d-flex mb-2 align-items-center <?php echo ($active_page === 'feed') ? 'fw-semibold active' : ''; ?>">
                    <a class="nav-link d-flex px-2 ms-5 w-100" href="index.php">
                        <i
                            class="nav-link-icon bi <?php echo ($active_page === 'feed') ? 'bi-house-door-fill' : 'bi-house-door'; ?> me-4 d-flex align-items-center justify-content-center"></i>
                        Home
                    </a>
                </li>
                <li
                    class="nav-item d-flex mb-2 align-items-center <?php echo ($active_page === 'profile') ? 'fw-semibold active' : ''; ?>">
                    <a class="nav-link d-flex px-2 ms-5 w-100" href="user_profile.php?userID=<?php echo $userID; ?>">
                        <i
                            class="nav-link-icon bi <?php echo ($active_page === 'profile') ? 'bi-person-fill' : 'bi-person'; ?> me-4 d-flex align-items-center justify-content-center"></i>
                        Profile
                    </a>
                </li>
                <li
                    class="nav-item d-flex align-items-center <?php echo ($active_page === 'settings') ? 'fw-semibold active' : ''; ?>">
                    <a class="nav-link d-flex px-2 ms-5 w-100" href="edit_profile.php">
                        <i
                            class="nav-link-icon bi <?php echo ($active_page === 'settings') ? 'bi-gear-fill' : 'bi-gear'; ?> me-4 d-flex align-items-center justify-content-center"></i>
                        Settings
                    </a>
                </li>
            </ul>

            <!-- Logout Link -->
            <div class="w-100 navbar-nav mt-auto">
                <a class="nav-link d-flex px-2 ms-5 w-100" href="logout.php">
                    <i
                        class="nav-link-icon bi bi-box-arrow-right me-4 d-flex align-items-center justify-content-center"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>