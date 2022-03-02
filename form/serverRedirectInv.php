<?php
 session_start(); 
if (isset($_POST['sendInv'])) 
  {  
    $_SESSION['guest'] = $_POST['sendInv'];
    $_SESSION['guestFname'] = $_POST['guestFname'];
    header('location: ../sendInv.php');
  }
?>