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

    $query = "INSERT INTO users (fname, lname, username, email, password, horg, gender, bday, city, region, country, language, phone, occupation, ieat, allergic, aboutme, hobbies, why, whatieat, typical, countries, meetme) 
          VALUES('$fname', '$lname', '$username', '$email', '$password', '$horg', '$gender', '$bday', '$city', '$region', '$country', '$language', '$phone', '$occupation', '$ieat', '$allergic', '$aboutme', '$hobbies', '$why', '$whatieat', '$typical', '$countries', '$meetme')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Korisnik uspesno registrovan";
    $_SESSION['username'] = $username;
    header('location: next.php');
  }
}



?>

<?php 
 $h = 'h';
 $g = 'g';
 $b = 'b';
 $username =  $_SESSION['username'];
  $host_check_query = "SELECT horg FROM users WHERE username='$username'";
  $Result = mysqli_query($db, $host_check_query);
  $host = mysqli_fetch_assoc($Result);
  
  if ($host) { // if Host exists
    if ($host['horg'] === $h) {
      echo '<div class="input-group">
      <label>Address (it will never be visible)</label>
      <input type="text" name="address">
    </div>';
    $_SESSION['h'] = $host;
    print_r ($host);
    }
  elseif ($host['horg'] === $g) {
     $_SESSION['g'] = $g; 
    print_r ($host);

    }elseif ($host['horg'] === $b) {
      '<div class="input-group">
      <label>Address (it will never be visible)</label>
      <input type="text" name="address">
    </div>';
    $_SESSION['g'] = $g; 
    $_SESSION['h'] = $h;
     print_r ($host);
   } }
  

  if (isset($_POST[''])){
    if ($_SESSION['horg'] === $h) {
    header('location: index.php');
  }elseif ($_SESSION['horg'] === $b) {
   header('location: ccard.php');
  }elseif ($_SESSION['horg'] === $g) {
   header('location: ccard.php');
  }
  }
  ?>