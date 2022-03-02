<?php

function LoginChek()
{
  if (!isset($_COOKIE['email'])) {
    $LogedIn = 'False';
  }elseif (isset($_COOKIE['email'])) {
    $LogedIn = 'True';
  }
}


function goIndex()
{
  if (!isset($_COOKIE['email'])) {
    $LogedIn = 'False';
  }elseif (isset($_COOKIE['email'])) {
    $LogedIn = 'True';
  }


  if ($LogedIn == 'False') {
     header('location: index.php');
  }
}


function goCreateAcc()
{
  if (!isset($_COOKIE['email'])) {
    $LogedIn = 'False';
  }elseif (isset($_COOKIE['email'])) {
    $LogedIn = 'True';
  }


  if ($LogedIn == 'False') {
     header('location: createUser.php');
  }
}


function goLogin()
{
  if (!isset($_COOKIE['email'])) {
    $LogedIn = 'False';
  }elseif (isset($_COOKIE['email'])) {
    $LogedIn = 'True';
  }


  if ($LogedIn == 'False') {
     header('location: login.php');
  }
}
function goHome()
{
  if (!isset($_COOKIE['email'])) {
    $LogedIn = 'False';
  }elseif (isset($_COOKIE['email'])) {
    $LogedIn = 'True';
  }


  if ($LogedIn == 'True') {
     header('location: Home.php');
  }
}
?>