<?php  
  session_start(); 
include 'users/serverNext.php';
  include 'fun/lang.php';
  $_SESSION['next'] = "next";

if (!isset($_SESSION['cUser']))  {
        header('location: createUser.php');  
  }
if (isset($_SESSION['next2'])) {
    header('location: next2.php');
  }

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
  <?php if (!isset($_SESSION['username'])) {
          echo '<link rel="stylesheet" type="text/css" href="css/style-index-form.css">'; 
        }elseif (isset($_SESSION['username'])) {
          echo '<link rel="stylesheet" type="text/css" href="css/style-home-form.css">'; 
  }?>
</head>

<body>  
<?php include 'include/header-form.php'?>
  <form method="post" action="next.php">
    <?php include 'users/errors.php'; ?>
    <h2>
      <?php echo REGISTER_TITLE; ?>
    </h2>
    <div class="input-group">
      <label>
        Gender
      </label>
      <div class="horg">
        <input type="radio" name="gender" value="m" required>
        Male
      </div>
      <div class="horg">
        <input type="radio" name="gender" value="f" required>
        Female
      </div>
    </div>
    <div class="input-bday">
      <label>Date of birth</label>
      <input type="date" name="bday" required>
    </div>
    <div class="input-group">
      <label>City I live</label>
      <input type="text" name="city" placeholder="cite" required>
    </div>
    <div class="input-group">
      <label>Region</label>
      <input type="text" name="region" placeholder="region" required>
    </div>
    <div class="input-group">
      <label>Country</label>
      <input type="text" name="country" placeholder="country" required>
    </div>
    <div class="input-group">
      <label>Languages I speak</label>
      <input type="text" name="language" placeholder="language, ...." required>
    </div>
    <div class="input-group">
      <label>Phone number</label>
      <input type="tel" name="phone" required placeholder="0123456789">
    </div>
    <div class="input-group">
      <label>Occupation</label>
      <input type="text" name="occupation" placeholder="occupation">
    </div>
    <div class="input-group">
      <label>I am</label>
      <div class="horg">
        <input type="radio" name="ieat" value="Vegetarian" required>
        Vegetarian
      </div>
      <div class="horg">
        <input type="radio" name="ieat" value="Vegan" required>
        Vegan
      </div>
      <div class="horg">
        <input type="radio" name="ieat" value="Pescatarian" required>
        Pescatarian
      </div>
      <div class="horg">
        <input type="radio" name="ieat" value="Eat all kind of meat" required>
        Eat all kind of meat
      </div>
      <div class="horg">
        <input type="radio" name="ieat" value="Raw foodist" required>
        Raw foodist
      </div>
      <label>I don’t eat/drink</label>
      <input type="text" name="idonteat" placeholder="I don’t eat/drink">
    </div>
    <div class="">
      <label>I am allergic on</label>
      <input type="text" name="allergic" placeholder="allergic">
    </div>

<?php 
 $h = 'h';
 $g = 'g';
 $b = 'b';

  if ($_SESSION['horg'] === $h) {
    echo '<div class="width-label">
    <label>'. REGISTER_FORM19 .'</label>
    <input type="text" name="address" placeholder="'. REGISTER_PLH_FORM19 .'" required>
    </div>';
  }elseif ($_SESSION['horg'] === $b) {
     echo '<div class="width-label">
    <label>'. REGISTER_FORM19 .'</label>
    <input type="text" name="address" placeholder="'. REGISTER_PLH_FORM19 .'" required>
    </div>';
  }
?>
    <div class="input-group">
      <label>About me:</label>
      <input type="text" name="aboutme" placeholder="about me">
    </div>
    <div class="input-group">
      <label>Interests/hobbies:</label>
      <input type="text" name="hobbies" placeholder="Interests/hobbies:">
    </div>
    <div class="input-group">
      <label>Why I am on EAT FOR 1€:</label>
      <input type="text" name="why" placeholder="Why....">
    </div>
    <div class="input-group">
      <label>What do I usually cook/eat:</label>
      <input type="text" name="whatieat" placeholder="What....">
    </div>
    <div class="input-group">
      <label>Typical food from my region:</label>
      <input type="text" name="typical" placeholder="Typical....">
    </div>    
    <div class="input-group">
      <label>Countries I have visited:</label>
      <input type="text" name="countries" placeholder="Country, ....">
    </div>
    <div class="width-label">
      <label>You should meet me because:</label>
      <input type="text" name="meetme" placeholder="Meet me....">
    </div>
    <div class="button">
      <button type="submit" class="reg_btn" name="reg_user">
        Next
      </button>
    </div>
  </form>
  
  <?php include 'include/footer.php'?>
</body>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/js-custom-form.js"></script>
</html>