<?php
// initializing variables
$errors = array(); 
include 'fun/load_cookies.php';
// connect to the database
  include 'db.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {  
 // receive all input values from the form
  $host = mysqli_real_escape_string($db, $_SESSION['host']);
  $hostFname = mysqli_real_escape_string($db, $_SESSION['hostFname']);
  $guest =  mysqli_real_escape_string($db, $email);
  $guestFname =  mysqli_real_escape_string($db, $fname);
  $confirm = mysqli_real_escape_string($db, "amr-".md5(rand()));
  $sentmeal = mysqli_real_escape_string($db, "req");
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $datee = mysqli_real_escape_string($db, $_POST['datee']);
  $meal = mysqli_real_escape_string($db, $_POST['meal']);
  $joinn = mysqli_real_escape_string($db, $_POST['joinn']);
  $typee = mysqli_real_escape_string($db, "");
  $meat = mysqli_real_escape_string($db, "");
  $other = mysqli_real_escape_string($db, "");
  $timee = mysqli_real_escape_string($db, $_POST['timee']);
  $bstart = mysqli_real_escape_string($db, $_POST['bstart']);
  $bend = mysqli_real_escape_string($db, $_POST['bend']);
  $at = mysqli_real_escape_string($db, $_POST['at']);
  $guestsNum = mysqli_real_escape_string($db, $_POST['guestsNum']);
  $guests = mysqli_real_escape_string($db, $_POST['guests']);
  $message = mysqli_real_escape_string($db, $_POST['message']);
 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $query = "INSERT INTO sendmeal (host, hostFname, guest, guestFname, confirm, sentmeal, city, datee, meal, joinn, typee, meat, other, timee, bstart, bend, at, guestsNum, guests, message)
          VALUES('$host', '$hostFname', '$guest', '$guestFname', '$confirm', '$sentmeal', '$city', '$datee', '$meal', '$joinn', '$typee', '$meat', '$other', '$timee', '$bstart', '$bend', '$at', '$guestsNum', '$guests', '$message')";
    mysqli_query($db, $query);
    unset($_SESSION['host']);
    unset($_SESSION['hostFname']);
    header("location: inbox.php");  
  }
}
?>