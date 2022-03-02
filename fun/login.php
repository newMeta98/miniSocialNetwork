<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
  include 'db.php';
// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    $queryUSER = "SELECT * FROM users WHERE email='$email'";
    $resultsUSER = mysqli_query($db, $queryUSER);
    while($rows=mysqli_fetch_array($resultsUSER)){
      $horg_value = $rows['horg'];
      $horg = "horg";
      setcookie($horg, $horg_value, time() + (86400 * 30), "/");

      $fname_value = $rows['fname'];
      $fname = "fname";
      setcookie($fname, $fname_value, time() + (86400 * 30), "/");

      $lname_value = $rows['lname'];
      $lname = "lname";
      setcookie($lname, $lname_value, time() + (86400 * 30), "/");
    }
    $queryPINFO = "SELECT * FROM personalinfo WHERE email='$email'";
    $resultsPINFO = mysqli_query($db, $queryPINFO);
    while($rows=mysqli_fetch_array($resultsPINFO)){
      $city_value = $rows['city'];
      $city = "city";
      setcookie($city, $city_value, time() + (86400 * 30), "/");
    }


    if (empty($email)) {
      array_push($errors, "Email is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
      $password = md5($password);
      $query_user = "SELECT * FROM users WHERE email='$email' AND password='$password'";
      $results_user = mysqli_query($db, $query_user);
      if (mysqli_num_rows($results_user) == 1) {
        $email_name = "email";
        setcookie($email_name, $email, time() + (86400 * 30), "/");
        header('location: home.php');
      }else {
        array_push($errors, "Wrong email/password combination");
      }
    }
  }
?>