<div class="topnavbg"><div class="top-navigation">
			<?php     if (!isset($_COOKIE['email']))  {
 			echo '<div class="Log-in">
						
 			<div class="li"> <a href="createUser.php">'. CONTENT_JOIN .'</a></div> 
			<div class="li"> <a href="login.php" class="margin-l-r">'. CONTENT_LOGIN .'</a></div> 	
					';
}elseif (isset($_COOKIE['email'])) {
	$LogOut="?logout='1'";
			echo '<div class="Log-in"> 
						
			<div class="li"> <a href="myAcc.php">My Profile</a></div>
			<div class="li"><a href="'. $LogOut .'" class="margin-l-r">Logout</a></div> 
						
					';	

}?>
	
<div class="Lang-hover"><div class="lang-img"><img src="css/img/black-planet-ico.jpg"></div>
							<div class="Lang">
								<div class="li"><a href="?lan=d">ENG</a></div>
								<div class="li"><a href="?lan=esp" calss="mid">ESP</a></div>
								<div class="li"><a href="?lan=fr">FR</a></div>
						</div>	 
						</div>
</div></div></div>

<header>
	<div class="container"> 
		<!-- Nav -->
 <?php 
$h = 'h';
$g = 'g';
$b = 'b';
	if ($_COOKIE['horg'] === $h) {
      $li_horg = '<div class="li"> <a href="becomeGuest.php">'. CONTENT_MENUGUEST .' </a></div>';
  }elseif ($_COOKIE['horg'] === $b) {
       $li_horg = ''; 
  }elseif ($_COOKIE['horg'] === $g) {
       $li_horg = '<div class="li"> <a href="becomeHost.php">'. CONTENT_MENUHOST .' </a></div>'; 
  }
 echo '<nav class="navbar" id="scroll">
  				<span class="navbar-toggle" id="js-navbar-toggle">
            <i class="fa fa-bars"></i>
        </span>
        <a href="home.php" class="logo">'. CONTENT_TITLE .'</a>
						<div class="main-nav" id="js-menu"><div class="nav-pad"><div class="nav-toggle">
					 <div class="li"> <a href="home.php">'. CONTENT_HOME .'</a></div>
					 <div class="li"> <a href="inbox.php">'. CONTENT_MENU10 .'</a></div>
					 '. $li_horg .'
					  <div class="dropdown">
					    <button class="dropbtn">'. CONTENT_MENU11 .' 
					      <i class="fa fa-caret-down"></i>
					    </button>
					    <div class="drop-pad"><div class="first"><div class="dropdown-content">
					     <div class="li"> <a href="searchhost.php">'. CONTENT_MENU12 .' </a></div>
					     <div class="li"> <a href="searchpmi.php">'. CONTENT_MENU13 .' </a></div>
					     <div class="li"> <a href="searchpmr.php">'. CONTENT_MENU14 .' </a></div>
					    </div>
					    </div>
					    </div>
					   </div> 
					    <div class="dropdown">
					    <button class="dropbtn">'. CONTENT_MENU16 .' 
					      <i class="fa fa-caret-down"></i>
					    </button>
					    <div class="drop-pad"><div class="dropdown-content">
							<div class="li"><a href="mealInv.php">'. CONTENT_MENU17 .' </a></div>
							<div class="li"><a href="searchpmr.php">'. CONTENT_MENU18 .' </a></div>
							<div class="li"><a href="searchpmr.php">'. CONTENT_MENU19 .' </a></div>
							<div class="li"><a href="searchpmr.php">'. CONTENT_MENU20 .' </a></div>
							<div class="li"><a href="searchpmr.php">'. CONTENT_MENU21 .' </a></div>
							<div class="li"><a href="searchpmr.php">'. CONTENT_MENU22 .' </a></div>
							<div class="li"><a href="searchpmr.php">'. CONTENT_MENU23 .' </a></div>
							<div class="li"><a href="searchpmr.php">'. CONTENT_MENU24 .' </a></div>
							<div class="li"><a href="searchpmr.php">'. CONTENT_MENU25 .' </a></div>
					    </div>
					    </div>
					   </div> 
					   </div> 
					   </div>
					   </div>
					</nav>';?>
				
<div class="all">

	<div class="marker">
		<h2><?php echo ABOUT_US1; ?></h2>
		<?php echo ABOUT_US2; ?>

	</div>

</div>			

</header>