<?php 
  session_start(); 
  include 'fun/load_cookies.php';
  include 'users/serverBH.php';
  include 'fun/lang.php';
   $title = COMPLETE_TITLE2;
 ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
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
  <form method="post" action="becomeHost.php">
 
<?php 
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
    }else {
      echo "";
    }
?>               
  <?php include 'users/errors.php'; ?>
   <h2><?php echo COMPLETE_LABLE22; ?></h2>
  <div class="input-group">
      <label><?php echo COMPLETE_IM; ?> <font color="red" size="1">(required)</font></label>
      <div class="horg"><input type="radio" name="horg" value="b" required>
      <?php echo COMPLETE_SELECT; ?></div>
 </div>
    </div>
  <div class="width-label">
    <label><?php echo  REGISTER_FORM19; ?> <font color="red" size="1">(required)</font></label>
    <input type="text" name="address" placeholder="<?php echo  REGISTER_PLH_FORM19; ?>" required>
    </div>
 
    <div class="input-group">
      <button type="submit" class="reg_btn" name="reg_user"><?php echo COMPLETE_DONE; ?></button></div> </form>
<?php include 'include/footer.php'?> 
</body>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/js-custom-form.js"></script>
</html>