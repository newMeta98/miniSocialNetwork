<?php 
	session_start();
  
 if (!isset($_COOKIE['email'])) {
    $_SESSION['msg'] = "To create a public request, first you need to create a profile for free.";
    header('location: createUser.php');
  }

$h = 'h';
$g = 'g';
$b = 'b';
  if ($_COOKIE['horg'] === $h) {
      header('location: becomeGuest.php');
  }elseif ($_COOKIE['horg'] === $b) {
       echo "";
  }elseif ($_COOKIE['horg'] === $g) {
       echo "";
  }
  include 'form/serverReq.php';
  include 'fun/lang.php';
  include 'fun/logout.php';
  $title = REQUEST_TITLE;
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

   <form method="post" action="mealReq.php">

    <?php include 'users/errors.php'; ?>


    <div class="width-label">
      <label><?php echo REQUEST_CITY; ?> <font color="red" size="1">(required)</font></label>
      <input type="text" name="city" required placeholder="<?php echo REQUEST_PLH_CITY; ?>"> 
    </div>
    <div class="input-bday">
      <label><?php echo REQUEST_DATE; ?><font color="red" size="1">(required)</font></label>
      <input type="date" name="datee" required>
    </div>

    <div class="input-group">
      <label><?php echo REQUEST_MEAL; ?> <font color="red" size="1">(required)</font></label>

      <div class="horg">
      	<input type="radio" name="meal" value="<?php echo REQUEST_MEAL1; ?>" required><?php echo REQUEST_MEAL1; ?></div>
      <div class="horg"><input type="radio" name="meal" value="<?php echo REQUEST_MEAL2; ?>" required><?php echo REQUEST_MEAL2; ?></div>
      <div class="horg"><input type="radio" name="meal" value="<?php echo REQUEST_MEAL3; ?>" required><?php echo REQUEST_MEAL3; ?></div>
      <div class="horg"><input type="radio" name="meal" value="<?php echo REQUEST_MEAL4; ?>" required><?php echo REQUEST_MEAL4; ?></div>
    </div>

        <div class="input-group">
      <label><?php echo REQUEST_JOIN; ?> <font color="red" size="1">(required)</font></label>
      <div class="horg"><input type="radio" name="joinn" value="<?php echo REQUEST_JOIN1; ?>" required><?php echo REQUEST_JOIN1; ?></div>
      <div class="horg"><input type="radio" name="joinn" value="<?php echo REQUEST_JOIN2; ?>" required><?php echo REQUEST_JOIN2; ?></div>
      <div class="horg"><input type="radio" name="joinn" value="<?php echo REQUEST_JOIN3; ?>" required><?php echo REQUEST_JOIN3; ?></div>
    </div>
              <div class="input-group">
      <label><?php echo REQUEST_TIME; ?> <font color="red" size="1">(required)</font></label>
         <div class="horg"> <input type="radio" name="timee" value="<?php echo REQUEST_TIME1; ?>" required> <?php echo  REQUEST_TIME1; ?> </div><div class="horg" ><input type="radio" name="timee" value="REQUEST_TIME21" required><div id="between"><?php echo REQUEST_TIME21; ?><input type="text" name="bstart"><?php echo REQUEST_TIME22; ?><input type="text" name="bend" ><?php echo REQUEST_TIME23; ?>
      </div></div>
       <div class="horg"><input type="radio" name="timee" value="REQUEST_TIME3" required>
        <div id="at"><?php echo REQUEST_TIME3; ?><input type="text" name="at"></div>
   </div> </div>
    

	    <div class="width-label">
      <label><?php echo REQUEST_GUESTS; ?><select id="guestNum" name="guestsNum" onchange="populate(this.id, 'message')" required>
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
     <div id="message">
      
    </div>
 
    </div>
       <div class="input-group"> <div id="MSG">
      	<?php echo REQUEST_MSG; ?><input type="text" name="message" required placeholder="<?php echo REQUEST_PLH_MSG; ?>">
    </div>   </div>
   <div class="input-group">
      <button type="submit" class="reg_btn" name="reg_user"><?php echo REQUEST_DONE; ?></button>
    </div>
  </form>
  <div class="loginlink"><p><?php echo REQUEST_REDIRECT; ?></p></div>

<?php include 'include/chat.php'?>
<?php include 'include/footer.php'?> 
</body>


<script type="text/javascript">
	function populate(s1, m) {
		var s1 = document.getElementById(s1);
		var m = document.getElementById(m);
		m.innerHTML = "";
		if (s1.value > 1) {
			m.innerHTML = '<?php echo REQUEST_WITH; ?><input type="text" name="guests" required placeholder="<?php echo REQUEST_WITH1; ?>">';
		}else {m.innerHTML = '<div class="hiddenMSG"><?php echo REQUEST_WITH; ?><input type="text" name="guests" placeholder="<?php echo REQUEST_WITH1; ?>"><div>';
}
	}
</script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
(function($) {
    'use strict';
  $(function() {
        $('input:radio[name="timee"]').change(function() {
      var between = document.getElementById("between");
    if ($(this).val() == 'REQUEST_TIME21') {
            between.innerHTML = '<?php echo REQUEST_TIME21; ?><input type="text" class="border-bot" name="bstart" required><?php echo REQUEST_TIME22; ?><input type="text" class="border-bot" name="bend" required><?php echo REQUEST_TIME23; ?>';
      } else if ($(this).val() != 'REQUEST_TIME21') {
            between.innerHTML = '<?php echo REQUEST_TIME21; ?><input type="text" name="bstart"><?php echo REQUEST_TIME22; ?><input type="text" name="bend" ><?php echo REQUEST_TIME23; ?>';
        }
    }); 
        $('input:radio[name="timee"]').change(function() {
      var at = document.getElementById("at");
    if ($(this).val() == 'REQUEST_TIME3') {
            at.innerHTML = '<?php echo REQUEST_TIME3; ?><input type="text" class="border-bot"  name="at" required>';
      } else if ($(this).val() != 'REQUEST_TIME3') {
            at.innerHTML = '<?php echo REQUEST_TIME3; ?><input type="text" name="at">';
        }
    });   
});
    })(jQuery);
</script>
<script type="text/javascript" src="js/js-custom-form.js"></script>
<script type="text/javascript" src="js/js-custom-chat.js"></script>
</html>