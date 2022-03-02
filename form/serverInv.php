<?php
// initializing variables
$errors = array(); 
  include 'fun/load_cookies.php';
// connect to the database
  include 'fun/db.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
 // receive all input values from the form
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $datee = mysqli_real_escape_string($db, $_POST['datee']);
  $meal = mysqli_real_escape_string($db, $_POST['meal']);
  $joinn = mysqli_real_escape_string($db, $_POST['joinn']);
  $typee = mysqli_real_escape_string($db, $_POST['typee']);
  $meat = mysqli_real_escape_string($db, $_POST['meat']);
  $other = mysqli_real_escape_string($db, $_POST['other']);
  $timee = mysqli_real_escape_string($db, $_POST['timee']);
  $bstart = mysqli_real_escape_string($db, $_POST['bstart']);
  $bend = mysqli_real_escape_string($db, $_POST['bend']);
  $at = mysqli_real_escape_string($db, $_POST['at']);
  $guestsNum = mysqli_real_escape_string($db, $_POST['guestsNum']);
  $message = mysqli_real_escape_string($db, $_POST['message']);
 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array  
 
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $query = "INSERT INTO invitation (email, fname, city, datee, meal, joinn, typee, meat, other, timee, bstart, bend, at, guestsNum, message) 
          VALUES('$email', '$fname', '$city', '$datee', '$meal', '$joinn', '$typee', '$meat', '$other', '$timee', '$bstart', '$bend', '$at', '$guestsNum', '$message')";
    mysqli_query($db, $query);
  }}
?>