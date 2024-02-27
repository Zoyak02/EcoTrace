<?php 

  $con = mysqli_connect("localhost", "root", "", "EcoTrace");

  if(mysqli_connect_errno()){
    die("Cannot Connect to the database".mysqli_connect_error());
  }

  define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/bit216/uploads/");

  define("FETCH_SRC","http://127.0.0.1/bit216/uploads/");
?>