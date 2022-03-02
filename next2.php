<?php  
  session_start(); 

  $_SESSION['next2'] = "next2";

if (!isset($_SESSION['next'])) {
        header('location: next.php');
  }  
if (!isset($_SESSION['cUser']))  {
        header('location: createUser.php');  
  }
include 'fun/lang.php';
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
  <form method="post" action="" enctype="multipart/form-data">
    <h2>
      <?php echo REGISTER_IMG; ?>
    </h2>

    <div class="input-group">
      <label>Me:</label>
      <input type="file" name="me[]">
      <?php include 'users/upoladMe.php'; ?>
    </div>
   
    <div class="input-group">
      <label>My Food</label>
      <input type="file" name="food[]">
      <button type="submit" class="upload_btn" name="uploadFood">
        Upload
      </button>
      <?php include 'users/upoladFood.php'; ?> 
    </div>    
    <div class="img-next">
      <?php include 'users/serverNext2.php'; ?>
      <button type="submit" class="reg_btn" name="reg_user">
        Done
      </button>
    </div>
  </form>
  <?php include 'include/footer.php'?>
</body>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/js-custom-form.js"></script>
</html>