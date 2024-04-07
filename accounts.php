<?php
require("connection.php");

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

//Email Sending Requirment 
require 'vendor/autoload.php'; // Include the Composer-generated autoloader
        
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Check if the form is submitted
if (isset($_POST['login-btn'])) {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to fetch the hashed password from the user table based on the provided username
    $user_sql = "SELECT userID, password, first_login FROM user WHERE username = ? LIMIT 1";
    $user_stmt = mysqli_prepare($con, $user_sql);
    mysqli_stmt_bind_param($user_stmt, "s", $username);
    mysqli_stmt_execute($user_stmt);
    mysqli_stmt_bind_result($user_stmt, $userID, $hashed_user_password, $first_login);
    mysqli_stmt_fetch($user_stmt);

    // Close the user statement before preparing the admin statement
    mysqli_stmt_close($user_stmt);

    // Query to fetch the password from the admin table based on the provided username
    $admin_sql = "SELECT adminID, password FROM admin WHERE username = ? LIMIT 1";
    $admin_stmt = mysqli_prepare($con, $admin_sql);
    mysqli_stmt_bind_param($admin_stmt, "s", $username);
    mysqli_stmt_execute($admin_stmt);
    mysqli_stmt_bind_result($admin_stmt, $adminID, $admin_password);
    mysqli_stmt_fetch($admin_stmt);

    // Verify the password for the user
    if ($hashed_user_password && password_verify($password, $hashed_user_password)) {
        // Password is correct, set user ID in session
        $_SESSION['userID'] = $userID;
        
        $user_info_sql = "SELECT username, user_bio, user_display_name FROM user WHERE userID = ?";
        $user_info_stmt = mysqli_prepare($con, $user_info_sql);
        mysqli_stmt_bind_param($user_info_stmt, "i", $userID);
        mysqli_stmt_execute($user_info_stmt);
        mysqli_stmt_bind_result($user_info_stmt, $fetched_username, $fetched_user_bio, $fetched_user_display_name);
        mysqli_stmt_fetch($user_info_stmt);
        mysqli_stmt_close($user_info_stmt);

        // Store fetched user information in the session
        $_SESSION['username'] = $fetched_username;
        $_SESSION['user_bio'] = $fetched_user_bio;
        $_SESSION['user_display_name'] = $fetched_user_display_name;

        

        if ($first_login == 1) {
            // It's the user's first login, set the first_login session variable
            $_SESSION['first_login'] = 1;
               // Registration successful
                // Retrieve the last inserted user ID
                $user_id = mysqli_insert_id($con);
                // Store user ID in session for future use
                $_SESSION['user_id'] = $user_id;

                $defaultQuery = "INSERT INTO user_badges (userID, certified_eco_warrior, certified_eco_hero, carbon_reduction_rookie) VALUES (?, 0, 0, 0)";
                $stmt = mysqli_prepare($con, $defaultQuery);
                mysqli_stmt_bind_param($stmt, "i", $userID);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

        }

        // User is a regular user, redirect to index.php
        header("Location:index.php");
        exit();
    } elseif ($admin_password && $password == $admin_password) {
        // Password is correct, set admin ID in session
        $_SESSION['adminID'] = $adminID;

        // User is an admin, redirect to index_admin.php
        header("Location:index_admin.php");
        exit();
    } else {
        // Password is incorrect, display error message
        //$error_message = "Invalid username or password.";

        header("location: login.php?alert=wrong_password");
      exit;
    }

    mysqli_stmt_close($admin_stmt);
}


// Check if form is submitted
if (isset($_POST['signup-btn'])) {
    // Retrieve and sanitize form data
    $firstName = sanitizeInput($_POST["firstName"]);
    $lastName = sanitizeInput($_POST["lastName"]);
    $username = sanitizeInput($_POST["username"]);
    $contactNumber = sanitizeInput($_POST["contactNumber"]);
    $email = sanitizeInput($_POST["email"]); 
    $profilePicture = "images/profile.jpg";
    $first_login = 1;

    // Validate form data
    if (!isValidName($firstName) || !isValidName($lastName)) {
        handleError("Invalid first name or last name.");
    }
    if (!isValidUsername($username)) {
        handleError("Invalid username. Username must contain only letters, numbers, and underscores.");
    }
    if (!isValidEmail($email)) {
        handleError("Invalid email address.");
    }
    if (!isValidContactNumber($contactNumber)) {
        handleError("Invalid contact number.");
    }

    // Generate a default password and hash it
    $default_password = generateRandomPassword();
    $hashed_password = password_hash($default_password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert user data into the database
    $sql = "INSERT INTO user (username, password, first_login, email, contactNumber, firstName, lastName, user_bio, user_display_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ssissssss", $username, $hashed_password, $first_login, $email, $contactNumber, $firstName, $lastName, $user_bio, $user_display_name);
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        // send the default password to the user's email
        $subject = "Welcome to EcoTrace - Login Information";
        $message = "Hello $firstName $lastName,<br><br>Your account has been successfully created.<br>
        <br>Your default password is: $default_password<br><br>Please log in and change your password as soon as possible.";

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to 0 for no debugging
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587; // Use 465 for SSL or 587 for TLS
            $mail->SMTPSecure = 'tls'; // Use 'ssl' for SSL, 'tls' for TLS
            $mail->SMTPAuth = true;
            $mail->Username = 'zoyak1220@gmail.com'; // Your Gmail email address
            $mail->Password = 'xqfe pwvi dsys tito'; // Use the app password you generated
    
            // Recipients
            $mail->SetFrom('zoyak1220@gmail.com', 'EcoTrace');
            $mail->AddAddress($email);
    
            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
    
            $mail->send();
    
            // Password sent successfully
            echo '<script type="text/javascript">
            alert("Account created successfully. Please check your email for login instructions.");
            window.location.href = "login.php"; // Redirect to the desired page
            </script>';
         } catch (Exception $e) {
            // Failed to send the email
            echo '<script type="text/javascript">
            alert("Failed to send login instructions. Please try again later.");
            window.location.href = "#"; // Close the modal or redirect to the desired page
            </script>';
        }
    } else {
       // User registration failed
       echo '<script type="text/javascript">
       alert("Failed to register. Please try again later.");
       window.location.href = "login.php"; // Close the modal or redirect to the desired page
       </script>';
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

// Function to validate first name and last name
function isValidName($name) {
    // Implement your validation rules here
    // For example, check if the name contains only letters and spaces
    return preg_match('/^[a-zA-Z\s]+$/', $name);
}

// Function to validate username
function isValidUsername($username) {
    // Implement your validation rules here
    // For example, check if the username contains only letters, numbers, and underscores
    return preg_match('/^[a-zA-Z0-9_]+$/', $username);
}

// Function to validate email address
function isValidEmail($email) {
    // Implement your validation rules here
    // You can use PHP's built-in filter_var function for email validation
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate contact number
function isValidContactNumber($contactNumber) {
    // Implement your validation rules here
    // For example, check if the contact number contains only digits and optional symbols like +, -, etc.
    return preg_match('/^\+?\d{1,}$/',$contactNumber);
}

// Function to handle errors
function handleError($errorMessage) {
    echo '<script type="text/javascript">
        alert("' . $errorMessage . '");
        window.location.href = "login.php"; // Redirect to the desired page
        </script>';
    exit;
}


// Function to generate a random password
function generateRandomPassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

function isLoggedIn()
{
        if (isset($_SESSION['userID'])) {
                return true;
        }else{
                return false;
        }
}

if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['userID']);
        header("location:index.php");
        exit();
}


if (isset($_POST['newPass'])) {
    $userID = $_SESSION['userID'];
    $password_1 = ($_POST['password_1']);
    $password_2 = ($_POST['password_2']);

    // Reset errors array
    $errors = array();

    if (empty($password_1)) {
        $errors[] = "Password is required";
    }
    if ($password_1 != $password_2) {
        $errors[] = "The two passwords do not match"; //Not used
        header("location: index.php?alert=not_match");


    }

    if (empty($errors)) {
        // No errors, proceed with the password update
        $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT);
        $update_pass = "UPDATE user SET password = ?, first_login = 0 WHERE userID = ?";

        $stmt = mysqli_prepare($con, $update_pass);
        mysqli_stmt_bind_param($stmt, 'si', $password, $userID);

        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            $_SESSION['first_login'] = 0;
            $success_message = "Password updated successfully!";
            header("location:index.php");
            exit;
        } else {
            // statement execution fails
            $errors[] = "Failed to update the password.";
        }
        
        // Set the success message or errors in the session
        $_SESSION['success_message'] = $success_message ?? null;
        $_SESSION['errors'] = $errors ?? null;
       
        // Close the statement
        mysqli_stmt_close($stmt);
    }
}

// Update Profile Details

// Check if the form is submitted for profile update
if (isset($_POST['save-btn'])) {

    // Sanitize and retrieve form data
    $userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;
    $username = isset($_POST["usernameModal"]) ? mysqli_real_escape_string($con, $_POST["usernameModal"]) : null;
    $firstName = isset($_POST["firstNameModal"]) ? mysqli_real_escape_string($con, $_POST["firstNameModal"]) : null;
    $lastName = isset($_POST["lastNameModal"]) ? mysqli_real_escape_string($con, $_POST["lastNameModal"]) : null;
    $email = isset($_POST["emailModal"]) ? mysqli_real_escape_string($con, $_POST["emailModal"]) : null;
    $contactNumber = isset($_POST["contactNumberModal"]) ? mysqli_real_escape_string($con, $_POST["contactNumberModal"]) : null;
    $commutingMethod = isset($_POST["commutingMethodModal"]) ? mysqli_real_escape_string($con, $_POST["commutingMethodModal"]) : null;
    $dietPreferences = isset($_POST["dietPreferenceModal"]) ? mysqli_real_escape_string($con, $_POST["dietPreferenceModal"]) : null;
    $energySource = isset($_POST["energySourceModal"]) ? mysqli_real_escape_string($con, $_POST["energySourceModal"]) : null;

    // Validate form data
    $errors = [];
    if (!$userID || !$username || !$firstName || !$lastName || !$email || !$contactNumber || !$commutingMethod || !$dietPreferences || !$energySource) {
        $errors[] = "All fields are required.";
    }    

    // If there are no errors, proceed with the update
    if (empty($errors)) {
        // Construct the update query
        $sql = "UPDATE user SET username=?, firstName=?, lastName=?, email=?, contactNumber=?, commutingMethod=?, dietPreferences=?, energySource=? WHERE userID=?";
        $stmt = mysqli_prepare($con, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssssssssi", $username, $firstName, $lastName, $email, $contactNumber, $commutingMethod, $dietPreferences, $energySource, $userID);

        // Execute the update query
        $result = mysqli_stmt_execute($stmt);

        // Close the prepared statement
        mysqli_stmt_close($stmt);

        // Check if the update was successful
        if ($result) {
            // Redirect to the profile page after successful update
            echo '<script type="text/javascript">
            alert("Your profile has been updated successfully.");
            window.location.href = "profile.php"; // Redirect to the desired page
            </script>';
            mysqli_close($con);
            //header("Location: profile.php");
            exit();
        } else {
            // Handle database error
            $errors[] = "Failed to update profile. Please try again later.";
        }
    }

    // Set errors in session for displaying to the user
    $_SESSION['profile_update_errors'] = $errors;

    // Redirect back to the profile page to display errors
    //header("Location: index.php");
    header("location: profile.php?alert=profile_incomplete");
    exit();
}

// Update Profile Picture

// Check if the form is submitted for profile picture update
if (isset($_POST['editPicture-btn'])) {
    // Check if a file is uploaded
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
        // Upload profile picture to Cloudinary
        $target_dir = 'EcoTrace/profile-pictures/';
        $upload_result = upload_image_to_cloudinary($_FILES['profilePicture'], $target_dir);
        
        if ($upload_result) {
            // Profile picture upload successful, get the secure URL
            $profilePicture = $upload_result['secure_url']; // Update this with the actual file path or identifier
            $_SESSION['profilePicture'] = $profilePicture;

            // Update the user's profile picture in the database
            $sql = "UPDATE user SET profilePicture = ? WHERE userID = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "si", $profilePicture, $userID);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            

            if ($result) {
                // Profile picture update successful, redirect back to the Profile Page
                mysqli_close($con);
                header("Location: profile.php"); // Adjust the URL accordingly
                exit();
            } else {
                // Handle database error
                $errors[] = "Failed to update profile picture. Please try again later.";
            }
        } else {
            // Handle Cloudinary upload error
            $errors[] = "Failed to upload profile picture to Cloudinary.";
        }
    } else {
        // No file uploaded or error occurred during upload
        $errors[] = "No profile picture uploaded or an error occurred.";
    }

    // Set errors in session for displaying to the user
    $_SESSION['profile_picture_update_errors'] = $errors;

    // Redirect back to the Profile Page to display errors
    header("Location: profile.php");
    exit();
}



?>





