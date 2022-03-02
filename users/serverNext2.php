<?php

// initializing variables
if (isset($_POST['reg_user'])){
  unset($_SESSION['Email']);
  unset($_SESSION['cUser']);
  unset($_SESSION['next']);
  unset($_SESSION['next2']);
   header('location: login.php');
  }
 ?>