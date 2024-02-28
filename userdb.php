<?php
session_start(); // Start the session

require("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $contact_number = $_POST["contact_number"];
    $email = $_POST["email"];
    
    // Prepare and execute the SQL statement to insert user data into the database
    $stmt = $connection->prepare("INSERT INTO users (username, email, firstName, lastName) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $first_name, $last_name);

    if ($stmt->execute()) {
        // Registration successful
        // Retrieve the last inserted user ID
        $user_id = $connection->insert_id;
        // Store user ID in session for future use
        $_SESSION['user_id'] = $user_id;

        // Redirect to the page where the user fills in additional information (e.g., commutingMethod, energySource, dietPreferences)
        header("Location: fill_info.php");
        exit();
    } else {
        // Registration failed
        $error_message = "Error occurred while registering. Please try again.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$connection->close();
?>
