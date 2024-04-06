<?php
session_start();

function execute()
{
  $userId = $_SESSION['userID'];

  if (!$userId) {
    return null;
  }

  return $userId;
}
?>