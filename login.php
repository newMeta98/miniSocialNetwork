<?php 
session_start(); 

include('fun/login.php'); 
  include 'fun/lang.php';
  include 'fun/logout.php';
  include 'fun/logedin.php';
  $title = LOGIN_TITLE;
  goHome();
 ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <?php if (!isset($_SESSION['username'])) {
  echo '<link rel="stylesheet" type="text/css" href="css/style-index-form.css">'; 
}elseif (isset($_SESSION['username'])) {
  echo '<link rel="stylesheet" type="text/css" href="css/style-home-form.css">'; 
}?>
</head>
<body>
 <?php include 'include/header-form.php'?>
  <main>
    <form method="post" action="login.php">
      <?php include('users/errors.php'); ?>

      <div class="input-group">
        <label><?php echo LOGIN_FORM1; ?></label>
        <input type="email" name="email" placeholder="Email">
      </div>

      <div class="input-group">
        <label><?php echo LOGIN_FORM2; ?></label>
        <input type="password" name="password" placeholder="password">
      </div>

      <div class="button">
        <button type="submit" class="reg_btn" name="login_user">
          <?php echo LOGIN_LOGIN; ?> 
        </button>
      </div>
    </form>

    <div class="loginlink">
      <p>
        <?php echo LOGIN_REDIRECT; ?>
      </p>
    </div>
  </main>
  <?php include 'include/footer.php'?>
</body>
</html>