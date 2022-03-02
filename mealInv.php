<?php 
	session_start();
  if (!isset($_COOKIE['email'])) {
    $_SESSION['msg'] = "To create a meal invitation, first you need to create a profile for free.";
    header('location: createUser.php');
  }

$h = 'h';
$g = 'g';
$b = 'b';
  if ($_COOKIE['horg'] === $h) {
       echo "";
  }elseif ($_COOKIE['horg'] === $b) {
       echo "";
  }elseif ($_COOKIE['horg'] === $g) {
   header('location: becomeHost.php'); 
  }

  include 'form/serverInv.php';
  include 'fun/lang.php';
  include 'fun/logout.php';
  $title = INVITATION_TITLE;
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
  <link rel="stylesheet" type="text/css" href="css/style-home-form.css">
</head>
<body>
 <?php include 'include/header-form.php'?>

 <form method="post" action="mealInv.php"> 
    <?php include 'users/errors.php'; ?>


    <div class="width-label">
      <label><?php echo INVITATION_CITY; ?> <font color="red" size="1">(required)</font></label>
      <input type="text" name="city" required placeholder="<?php echo INVITATION_PLH_CITY; ?>"> 
    </div>
    <div class="input-bday">
      <label><?php echo INVITATION_DATE; ?><font color="red" size="1">(required)</font></label>
      <input type="date" name="datee" required>
    </div>

    <div class="input-group">
      <label><?php echo INVITATION_MEAL; ?> <font color="red" size="1">(required)</font></label>

      <div class="horg">
      	<input type="radio" name="meal" value="<?php echo INVITATION_MEAL1; ?>" required><?php echo INVITATION_MEAL1; ?></div>
      <div class="horg"><input type="radio" name="meal" value="<?php echo INVITATION_MEAL2; ?>" required><?php echo INVITATION_MEAL2; ?></div>
      <div class="horg"><input type="radio" name="meal" value="<?php echo INVITATION_MEAL3; ?>" required><?php echo INVITATION_MEAL3; ?></div>
      <div class="horg"><input type="radio" name="meal" value="<?php echo INVITATION_MEAL4; ?>" required><?php echo INVITATION_MEAL4; ?></div>
    </div>

        <div class="input-group">
      <label><?php echo INVITATION_JOIN; ?> <font color="red" size="1">(required)</font></label>
      <div class="horg"><input type="radio" name="joinn" value="<?php echo INVITATION_JOIN1; ?>" required><?php echo INVITATION_JOIN1; ?></div>
      <div class="horg"><input type="radio" name="joinn" value="<?php echo INVITATION_JOIN2; ?>" required><?php echo INVITATION_JOIN2; ?></div>
      <div class="horg"><input type="radio" name="joinn" value="<?php echo INVITATION_JOIN3; ?>" required><?php echo INVITATION_JOIN3; ?></div>
    </div>
        <div class="input-group">
      <label><?php echo INVITATION_TYPE; ?> <font color="red" size="1">(required)</font></label>

      <div class="horg"><input type="radio" name="typee" value="<?php echo INVITATION_TYPE1; ?>" required><?php echo INVITATION_TYPE1; ?></div>
      <div class="horg"><input type="radio" name="typee" value="<?php echo INVITATION_TYPE2; ?>" required><?php echo INVITATION_TYPE2; ?></div>
      <div class="horg"><input type="radio" name="typee" value="<?php echo INVITATION_TYPE3; ?>" required><?php echo INVITATION_TYPE3; ?></div>
      <div class="horg"><input type="radio" name="typee" value="INVITATION_TYPE4" required=""><?php echo INVITATION_TYPE4; ?><div id="meatm">
      <input type="text" class="hidden" name="meat"></div></div>
      <div class="horg"><input type="radio" name="typee" value="<?php echo INVITATION_TYPE5; ?>" required><?php echo INVITATION_TYPE5; ?></div>

     <div class="horg" ><input type="radio" name="typee" value="INVITATION_TYPE6" required><?php echo INVITATION_TYPE6; ?><div id="otherm">
      <input type="text" class="hidden" name="other"></div></div>   
    </div>

        <div class="input-group">
      <label><?php echo INVITATION_TIME; ?> <font color="red" size="1">(required)</font></label>
	       <div class="horg"><input type="radio" name="timee" value="<?php echo INVITATION_TIME1; ?>" required>
      <?php echo INVITATION_TIME1; ?></div><div class="horg" ><input type="radio" name="timee" value="INVITATION_TIME21" required><div id="between"><?php echo INVITATION_TIME21; ?><input type="text" name="bstart">
      	<?php echo INVITATION_TIME22; ?><input type="text" name="bend">
      	<?php echo INVITATION_TIME23; ?>
      </div></div>
     <div class="horg"><input type="radio" name="timee" value="INVITATION_TIME3" required>
      	<div id="at"><?php echo INVITATION_TIME3; ?><input type="text" name="at"></div>
	 </div> </div>



	    <div class="width-label2">
      <label><?php echo INVITATION_GUESTS; ?><select id="guestNum" name="guestsNum" required>
      	<option></option>
      	<option value="1">1</option>
      	<option value="2">2</option>
      	<option value="3">3</option>
      	<option value="4">4</option>
      	<option value="5">5</option>
      	<option value="6">6</option>
      	<option value="7">7</option>
      	<option value="8">8</option>
      	<option value="9">9</option>
      	<option value="10">10</option>
      </select> <font color="red" size="1">(required)</font></label>
    </div>
       <div class="input-group"> <div id="MSG">
      	<?php echo INVITATION_MSG; ?><input type="text" name="message" required placeholder="<?php echo INVITATION_PLH_MSG; ?>">
    </div>   </div>
   <div class="input-group">
      <button type="submit" class="reg_btn" name="reg_user"><?php echo INVITATION_DONE; ?></button>
    </div>
  </form>
  <div class="loginlink"><p><?php echo INVITATION_REDIRECT; ?></p></div>

<?php include 'include/chat.php'?> 
<?php include 'include/footer.php'?>
</body>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
(function($) {
    'use strict';
	$(function() {
    $('input:radio[name="typee"]').change(function() {
    	var meatm = document.getElementById("meatm");
        if ($(this).val() == 'INVITATION_TYPE4') {
            meatm.innerHTML = '<input type="text" class="show" name="meat" required>';
        } else if ($(this).val() != 'INVITATION_TYPE4') {
            meatm.innerHTML = '<input type="text" class="hidden" name="meat">';
        }
    });
    $('input:radio[name="typee"]').change(function() {
    	var otherm = document.getElementById("otherm");
		if ($(this).val() == 'INVITATION_TYPE6') {
            otherm.innerHTML = '<input type="text" class="show" name="other" required>';
        } else if ($(this).val() != 'INVITATION_TYPE6') {
            otherm.innerHTML = '<input type="text" class="hidden" name="other">';
        }
    });
        $('input:radio[name="timee"]').change(function() {
    	var between = document.getElementById("between");
		if ($(this).val() == 'INVITATION_TIME21') {
            between.innerHTML = '<?php echo INVITATION_TIME21; ?><input type="text" class="border-bot" name="bstart" required><?php echo INVITATION_TIME22; ?><input type="text" class="border-bot" name="bend" required><?php echo INVITATION_TIME23; ?>';
      } else if ($(this).val() != 'INVITATION_TIME21') {
            between.innerHTML = '<?php echo INVITATION_TIME21; ?><input type="text" name="bstart"><?php echo INVITATION_TIME22; ?><input type="text" name="bend" ><?php echo INVITATION_TIME23; ?>';
        }
    }); 
        $('input:radio[name="timee"]').change(function() {
    	var at = document.getElementById("at");
		if ($(this).val() == 'INVITATION_TIME3') {
            at.innerHTML = '<?php echo INVITATION_TIME3; ?><input type="text" class="border-bot"  name="at" required>';
      } else if ($(this).val() != 'INVITATION_TIME3') {
            at.innerHTML = '<?php echo INVITATION_TIME3; ?><input type="text" name="at">';
        }
    });   
});
    })(jQuery);
</script>
<script type="text/javascript" src="js/js-custom-form.js"></script>
<script type="text/javascript" src="js/js-custom-chat.js"></script>
</html>