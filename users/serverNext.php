<?php 
// initializing variables
$errors = array(); 

// connect to the database
  include 'db.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
 // receive all input values from the form
  $email =  $_SESSION['Email'];
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $region = mysqli_real_escape_string($db, $_POST['region']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $language = mysqli_real_escape_string($db, $_POST['language']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $occupation = mysqli_real_escape_string($db, $_POST['occupation']);
  $ieat = mysqli_real_escape_string($db, $_POST['ieat']);
  $idonteat = mysqli_real_escape_string($db, $_POST['idonteat']);
  $allergic = mysqli_real_escape_string($db, $_POST['allergic']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  $user_check_query = "SELECT * FROM personalinfo WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Username already exists");
    }
  // Finally, register user if there are no errors in the form
 } if (count($errors) == 0) {
    $query = "INSERT INTO personalinfo (email, gender, bday, city, region, country, language, phone, occupation, ieat, idonteat, allergic) 
          VALUES('$email', '$gender', '$bday', '$city', '$region', '$country', '$language', '$phone', '$occupation', '$ieat', '$idonteat', '$allergic')";
    mysqli_query($db, $query);
  }
  
$h = 'h';
$g = 'g';
$b = 'b';

  if ($_SESSION['horg'] === $h or $b) {
    $address = mysqli_real_escape_string($db, $_POST['address']);
  if (count($errors) == 0) {
    $QUERY = "INSERT INTO hosta (email, address) 
          VALUES('$email', '$address')";
    mysqli_query($db, $QUERY);
  }
  }


  $aboutme = mysqli_real_escape_string($db, $_POST['aboutme']);
  $hobbies = mysqli_real_escape_string($db, $_POST['hobbies']);
  $why = mysqli_real_escape_string($db, $_POST['why']);
  $whatieat = mysqli_real_escape_string($db, $_POST['whatieat']);
  $typical = mysqli_real_escape_string($db, $_POST['typical']);
  $countries = mysqli_real_escape_string($db, $_POST['countries']);
  $meetme = mysqli_real_escape_string($db, $_POST['meetme']);


   if (count($errors) == 0) {
    $Query = "INSERT INTO aboutme (email, aboutme, hobbies, why, whatieat, typical, countries, meetme) 
          VALUES('$email', '$aboutme', '$hobbies', '$why', '$whatieat', '$typical', '$countries', '$meetme')";
    mysqli_query($db, $Query);
    header('location: next2.php');
  }

}
?>