<?php
require("connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

function image_upload($img) {
  // Check if file size is within the limit (5MB)
  if ($img['size'] > 20971520) {
      header("location: index_admin.php?alert=file_too_large");
      exit;
  }

  // Check if the file format is allowed
  $allowed_formats = ['jpg', 'jpeg', 'png', 'webp','mp4'];
  $file_extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));

  if (!in_array($file_extension, $allowed_formats)) {
      header("location: index_admin.php?alert=img_upload");
      exit;
  }

  $tmp_loc = $img['tmp_name'];
  $new_name = random_int(11111, 99999) . $img['name'];
  $new_loc = UPLOAD_SRC . $new_name;

  if (!move_uploaded_file($tmp_loc, $new_loc)) {
      header("location: index_admin.php?alert=upload_failed");
      exit;
  } else {
      return $new_name;
  }
}

if (isset($_POST['addcontent'])) {
  foreach ($_POST as $key => $value) {
      $_POST[$key] = mysqli_real_escape_string($con, $value);
  }

  // Check if a file is selected
  if ($_FILES['image']['size'] > 0) {
      $imgpath = image_upload($_FILES['image']);
  } else {
      header("location: index_admin.php?alert=empty_file");
      exit;
  }

  $query = "INSERT INTO `content`(`type`, `category`, `title`, `description`, `image`) 
            VALUES ('$_POST[content]','$_POST[category]','$_POST[title]','$_POST[desc]','$imgpath')";

  if (mysqli_query($con, $query)) {
      header("location: index_admin.php?success=added");
  } else {
      header("location: index_admin.php?alert=added_fail");
  }
}





  function image_remove($img){
    if(!unlink(UPLOAD_SRC.$img)){
      header("location: index_admin?alert=img_rem_fail");
      exit;
    }
   
  }

  if (isset($_GET['rem']) && $_GET['rem'] > 0) {
    $remId = mysqli_real_escape_string($con, $_GET['rem']);

    $query = "SELECT * FROM `content` WHERE `id` = '$remId'";
    $result = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc($result);

    image_remove($fetch['image']);

    // Corrected table name in the deletion query
    $deleteQuery = "DELETE FROM `content` WHERE `id` = '$remId'";
    
    if (mysqli_query($con, $deleteQuery)) {
        header("location: index_admin.php?success=removed");
    } else {
        header("location: index_admin.php?alert=remove_failed");
    }
}


?>
