<?php
// Include necessary files and start session if needed
session_start();
require_once("../core/db_functions.php"); // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID from the session
    $userID = $_SESSION['userID'];
    
    // Get the post ID from the form
    $postID = $_POST['post_id'];
    echo "Post ID: " . $postID;

    // Get the comment from the form
    $content = $_POST['content'];

    // Get the current date and time
    $currentDateTime = date('Y-m-d H:i:s');

    // Insert the comment into the database
    $pdo = connect_to_db(); // Connect to your database
    $stmt = $pdo->prepare("INSERT INTO comments_table (userID, post_id, content, created_at) VALUES (?, ?, ?, ?)");
    $stmt->execute([$userID, $postID, $content, $currentDateTime]);

    // Redirect the user back to the post after submitting the comment
    header("Location:../public_html/index.php?post_id=$postID");
    exit();
}

?>
