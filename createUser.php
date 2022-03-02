<?php  
  session_start(); 
 
  include 'users/serverCreate.php';
  include 'fun/lang.php';
  $_SESSION['cUser'] = "cUser";
if (isset($_SESSION['next2'])) {
    header('location: next2.php');
  }
if (isset($_SESSION['next'])) {
    header('location: next.php');
  }
    $title = REGISTER_TITLE;
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
  <form method="post" action="createUser.php">
    <?php 
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }else {
        echo "";
      }
    ?>
    <?php include 'users/errors.php'; ?>
    <div class="input-group">
      <label class="fullname"><?php echo REGISTER_NAME; ?>
        <font color="red" size="1">
          (required)
        </font>
      </label>

      <input type="text" name="fname" class="fulln" value="<?php echo $fname; ?>" placeholder="<?php echo REGISTER_FORM1; ?>" required>

      <input type="text" name="lname" class="fulln" value="<?php echo $lname; ?>" placeholder="<?php echo REGISTER_FORM2; ?>" required>
    </div>
    <div class="input-group">
      <label><?php echo REGISTER_FORM3; ?> 
        <font color="red" size="1">
          (required)
        </font>
      </label>
      
      <input type="email" name="email" value="<?php echo $email; ?>" required placeholder="exaple@emali.com">
    </div>
    <div class="input-group">
      <label><?php echo REGISTER_FORM4; ?> 
        <font color="red" size="1">
          (required)
        </font>
      </label>

      <input type="password" name="password_1" required placeholder="<?php echo REGISTER_FORM4; ?>">
    </div>
    <div class="input-group">
      <label><?php echo REGISTER_FORM5; ?> 
        <font color="red" size="1">
          (required)
        </font>
      </label>
      
      <input type="password" name="password_2" required required placeholder="<?php echo REGISTER_FORM5; ?>">
    </div>

    <div class="input-group">
      <label><?php echo REGISTER_FORM6; ?> 
        <font color="red" size="1">
          (required)
        </font>
      </label>

      <div class="horg">
        <input type="radio" name="horg" value="h" required>
        <?php echo REGISTER_FORM7; ?>
      </div>

      <div class="horg">
        <input type="radio" name="horg" value="g" required>
        <?php echo REGISTER_FORM8; ?>
      </div>

      <div class="horg">
        <input type="radio" name="horg" value="b" required><?php echo REGISTER_FORM9; ?>
      </div>
    </div>

    <div id="ccard"></div>

    <div class="input-group">
      <button type="submit" class="reg_btn" name="reg_user">
        <?php echo REGISTER_NEXT; ?>
      </button>
    </div>
  </form>

  <div class="loginlink">
    <p>
      <?php echo REGISTER_REDIRECT; ?>
    </p>
  </div>

  <?php include 'include/footer.php'?> 
</body>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/js-customform.js"></script>
<script type="text/javascript">
(function($) {
    'use strict';
  $(function() {
        $('input:radio[name="horg"]').change(function() {
      var between = document.getElementById("ccard");
    if ($(this).val() == 'g') {
            between.innerHTML = '<div class="width-label"><label>You cant be guest unles you have valid credit card redi to use.</label><input type="checkbox" name="ccard" value="True" required> I have a valid credit card.</div>';
      } else if ($(this).val() != 'g') {
        if ($(this).val() == 'b') {
            between.innerHTML = '<div class="width-label"><label>You cant be guest unles you have valid credit card redi to use.</label><input type="checkbox" name="ccard" value="True" required> I have a valid credit card.</div>';
        }else {
            between.innerHTML = '<div class="hiddenMSG"><input type="text" name="ccard"><div>';
        }}

    }); });
})(jQuery);
</script>
</html>