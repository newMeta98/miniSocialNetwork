<?php 
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "To create a public request / meal invitation, first you need to create a profile for free.";
    header('location: createUser.php');
  }
?>