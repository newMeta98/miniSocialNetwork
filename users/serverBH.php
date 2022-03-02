<?php
// initializing variables
$errors = array(); 
// connect to the database
  include 'db.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
 // receive all input values from the form
  
  $horg1 = mysqli_real_escape_string($db, $_POST['horg']);


  // Finally, register user if there are no errors in the form
 if (count($errors) == 0) {
    $query = "UPDATE users SET horg = '$horg1' WHERE email = '$email'";
    mysqli_query($db, $query);
  }


  $address = mysqli_real_escape_string($db, $_POST['address']);
  if (count($errors) == 0) {
    $QUERY = "INSERT INTO hosta (email, address) 
          VALUES('$email', '$address')";
    mysqli_query($db, $QUERY);
    $_SESSION['success'] = "";
     $horg_value = "b";
     $horg = "horg";
     setcookie($horg, $horg_value, time() + (86400 * 30), "/");
    header('location: home.php');
  }
}?>