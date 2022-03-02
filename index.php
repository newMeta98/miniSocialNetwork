<?php 
  session_start(); 
  include 'users/db.php';
  include 'fun/logout.php';
  include 'fun/lang.php';
  $Title = 'Home';

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo META_TITLE; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/style-index.css">

		<link rel="stylesheet" href="css/style.css" />
	</head>
<body>
<?php include 'include/header.php'?>
<a name="howitworks"></a><main class="main">
<?php 
 	  echo  HOWITWORKS ; 

if (!isset($_SESSION['username']))  {
       echo '<p class="btn-link"><a href="createUser.php">'. CR_PROFILE .'</a></p>';  
}else {
	   echo '';
}
?>
</main>

<?php include 'include/footer.php'?>

</body>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/js-custom.js"></script>
</html>