<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
  include 'db.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);  
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $horg = mysqli_real_escape_string($db, $_POST['horg']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $region = mysqli_real_escape_string($db, $_POST['region']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $language = mysqli_real_escape_string($db, $_POST['language']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $occupation = mysqli_real_escape_string($db, $_POST['occupation']);
  $ieat = mysqli_real_escape_string($db, $_POST['ieat']);
  $allergic = mysqli_real_escape_string($db, $_POST['allergic']);
  $aboutme = mysqli_real_escape_string($db, $_POST['aboutme']);
  $hobbies = mysqli_real_escape_string($db, $_POST['hobbies']);
  $why = mysqli_real_escape_string($db, $_POST['why']);
  $whatieat = mysqli_real_escape_string($db, $_POST['whatieat']);
  $typical = mysqli_real_escape_string($db, $_POST['typical']);
  $countries = mysqli_real_escape_string($db, $_POST['countries']);
  $meetme = mysqli_real_escape_string($db, $_POST['meetme']);
 // BOTH $pic = mysqli_real_escape_string($db, $_POST['pic']);
 // GUEST $ccard = mysqli_real_escape_string($db, $_POST['ccard']);
 // HOST $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (username, email, password) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Korisnik uspesno registrovan";
    header('location: next.php');
  }
}


// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query_user = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results_user = mysqli_query($db, $query_user);
    $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results_user) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../index.php');
    }if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}



?>