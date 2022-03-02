<?php

// initializing variables
$fname    = "";
$lname    = "";
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
  include 'db.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $img = "images/profile-def.jpg";
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']); 
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $horg = mysqli_real_escape_string($db, $_POST['horg']);
  
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { 
    array_push($errors, "Email is required"); 
  }
  if (empty($password_1)) { 
    array_push($errors, "Password is required"); 
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user['email'] === $email) {
    array_push($errors, "email already exists");
  }
  

  $ccard = mysqli_real_escape_string($db, $_POST['ccard']);
  if (count($errors) == 0) {
    $QUERY = "INSERT INTO guestc (email, ccard) 
          VALUES('$email', '$ccard')";
    mysqli_query($db, $QUERY);
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (fname, lname, email, password, horg, profile) 
          VALUES('$fname', '$lname', '$email', '$password', '$horg', '$img')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Korisnik uspesno registrovan";
    $_SESSION['Email'] = $email;
    $_SESSION['horg'] = $horg;
    header('location: next.php');
  }
}
?>