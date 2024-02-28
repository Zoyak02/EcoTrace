<?php
session_start(); // Start the session

require("connection.php");

// CREATE AN ACCOUNT

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];
    
    // Generate a default password and hash it
    $default_password = generateRandomPassword();
    $hashed_password = password_hash($default_password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert user data into the database
    $sql = "INSERT INTO user (username, password, email, contactNumber, firstName, lastName) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $hashed_password, $email, $contactNumber, $firstName, $lastName);
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        // Registration successful
        // Retrieve the last inserted user ID
        $user_id = mysqli_insert_id($con);
        // Store user ID in session for future use
        $_SESSION['user_id'] = $user_id;

        // Redirect to the login page
        header("Location: login.php");
        exit();
    } else {
        // Registration failed
        $error_message = "Error occurred while registering. Please try again.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($con);

// Function to generate a random password
function generateRandomPassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}
?>
