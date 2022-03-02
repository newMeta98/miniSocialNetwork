<?php
 session_start(); 
if (isset($_POST['sendReq'])) 
  {  
    $_SESSION['host'] = $_POST['sendReq'];
    $_SESSION['hostFname'] = $_POST['hostFname'];
    header('location: ../sendReq.php');
  }
?>