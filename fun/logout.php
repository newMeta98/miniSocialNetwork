<?php 
  if (isset($_GET['logout'])) {
    session_destroy();
  	 $horg = "horg";
     setcookie($horg, "", time() - 3600);

     $fname = "fname";
     setcookie($fname, "", time() - 3600);

     $lname = "lname";
     setcookie($lname, "", time() - 3600);

     $city = "city";
     setcookie($city, "", time() - 3600);

     $email_name = "email";
     setcookie($email_name, "", time() - (89700 * 30), "/");

    header("location: index.php");
  }
?>