<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

require_once("db_functions.php");
require_once("../accounts.php");

// Check if userID is set in the session
if (!isset($_SESSION['userID'])) {
    // Handle the case where userID is not set
    echo "Error: userID is not set in the session.";
    exit;
}

$pdo = connect_to_db();
$errors = [];

// Check for file upload errors
if ($_FILES['post_modal_image_picker']['error'] !== UPLOAD_ERR_OK) {
    $errors[] = "File upload error: " . $_FILES['post_modal_image_picker']['error'];
} else {
    // Validate file extension
    $allowed_extensions = ["jpg", "jpeg", "png", "bmp"];
    $post_modal_image_picker_file_ext = strtolower(pathinfo($_FILES['post_modal_image_picker']['name'], PATHINFO_EXTENSION));

    if (!in_array($post_modal_image_picker_file_ext, $allowed_extensions)) {
        $errors[] = "Invalid file extension. Only JPG, JPEG, PNG, and BMP files are allowed.";
    }
}

// Validate caption
if (isset($_POST['post_caption'])) {
    $caption = trim($_POST['post_caption']);
    if (strlen($caption) > 2200) {
        $errors[] = "Caption must not exceed 2,200 characters.";
    }
} else {
    $errors[] = "Caption is required.";
}

// Check for any validation errors
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    exit;
}

// Add post
$userID = $_SESSION['userID'];
$result = add_post($pdo, $userID, $caption);

if ($result) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    echo "Error adding post.";
    exit;
}
?>