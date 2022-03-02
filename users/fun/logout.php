<?php 
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['horg']);
    header("location: index.php");
  }
?>