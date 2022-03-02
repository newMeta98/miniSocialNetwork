<?php 
  session_start(); 
  include 'fun/logedin.php';
  include 'users/db.php';
  include 'fun/logout.php';
  include 'fun/load_cookies.php';
  include 'fun/lang.php';
  $Title = 'Home';
  goIndex();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo META_TITLE; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/style-home.css"/>
	</head>
<body>
<?php include 'include/header-home.php'?>
<main class="main">
  <p><img src="css/img/create_pmr.jpg" width="40px" height="30px"><a href="mealReq.php"><?php echo CONTENT_MENU4; ?></a></p>
  <p><img src="css/img/create_pmi.jpg" width="40px" height="30px"><a href="mealInv.php"><?php echo CONTENT_MENU8; ?></a></p>
leave_r
  <p><img src="css/img/pmi_city.jpg" width="40px" height="30px"> Public meal request in your city:</p>
<div class="hight280">
<?php 
  $REQquery = "SELECT * FROM request WHERE city = '$city'";
  $REQresult = mysqli_query($db, $REQquery);
 while($rows=mysqli_fetch_assoc($REQresult))
{ 
  if ($rows['email'] == $email) {
    
  }else{

  ?> 
  
<div class="li100-blue">Meal Request</div>
<div class="inbox-text">
  <?php echo $rows['fname']; ?>,
  <?php echo $rows['city']; ?>,
  <?php echo $rows['datee']; ?>,
  <?php echo $rows['meal']; ?>,<br />
  Guest can join for <?php echo $rows['joinn']; ?>,

   Guest: <?php echo $rows['guestsNum']; ?>
<?php 
      $betw = "REQUEST_TIME21";
    if ($rows['timee'] == $betw): ?>
      <br />Starting time: Between <?php echo $rows['bstart']; ?>h and <?php echo $rows['bstart']; ?>h
    <?php endif ?>
     <?php if ($rows['timee'] !== $betw): ?>
    <?php 
      $at = "REQUEST_TIME3";
    if ($rows['timee'] == $at): ?>
      <br />Starting time: At <?php echo $rows['at']; ?> 
    <?php endif ?>
     <?php if ($rows['timee'] !== $at): ?>
    <br />Starting time: <?php echo $rows['timee']; ?> 
    <?php endif ?>
    <?php endif ?>
   <?php 
    if ($rows['guestsNum'] > 1): ?>
     <br /> Coming with: <?php echo $rows['guests']; ?>
    <?php endif ?> 
   <?php 
    if ($rows['guestsNum'] == 1): ?>
     
    <?php endif ?> 

   <br />Message: <?php echo $rows['message']; ?>

   <div class="list-message">   
    <form  method="post" action="form/serverRedirectInv.php" id="no-margin-form">
      <input type="hidden" name="guestFname" value="<?php echo $rows['fname']; ?>">
     <button class="btn-sm" type="submit" name="sendInv" value="<?php echo $rows['email']; ?>">Send invitation to <?php echo $rows['fname']; ?></button>
   </form>
  </div></div>
<?php }} ?>
</div>




  <p><img src="css/img/pmr_city.jpg" width="40px" height="30px"> Public meal invitations in your city:</p>
<div class="hight280">
<?php 
$INVquery = "SELECT * FROM invitation WHERE city = '$city'";
 $INVresult = mysqli_query($db, $INVquery);
 while($rows=mysqli_fetch_assoc($INVresult))
{ 
  if ($rows['email'] == $email) {
    
  }else{

  ?> 

<div class="li100-blue">Meal Invitation</div>
<div class="inbox-text">
   <?php echo $rows['fname']; ?>,
   <?php echo $rows['city']; ?>,
        <?php $year = date('l jS F', strtotime($rows['datee'])); echo $year; ?>,
        <?php echo $rows['meal']; ?>,
  Guests: <?php echo $rows['guestsNum']; ?>,<br />
  Guest can join for <?php echo $rows['joinn']; ?>,
    <?php 
      $meat = "INVITATION_TYPE4";
    if ($rows['typee'] == $meat): ?>
      Type of meal: Meat, <?php echo $rows['meat']; ?>  
    <?php endif ?>
    <?php if ($rows['typee'] !== $meat): ?>
    <?php 
      $other = "INVITATION_TYPE6";
    if ($rows['typee'] == $other): ?>
      Type of meal: <?php echo $rows['other']; ?>  
    <?php endif ?>
    <?php if ($rows['typee'] !== $other): ?>
    Type of meal: <?php echo $rows['typee']; ?> 
    <?php endif ?>
<?php endif ?>

<?php 
      $betw = "INVITATION_TIME21";
    if ($rows['timee'] == $betw): ?>
      <br />Starting time: Between <?php echo $rows['bstart']; ?>h and <?php echo $rows['bstart']; ?>h
    <?php endif ?>
     <?php if ($rows['timee'] !== $betw): ?>
    <?php 
      $at = "INVITATION_TIME3";
    if ($rows['timee'] == $at): ?>
      <br />Starting time: At <?php echo $rows['at']; ?> 
    <?php endif ?>
     <?php if ($rows['timee'] !== $at): ?>
      <br />Starting time: <?php echo $rows['timee']; ?>
    <?php endif ?>
    <?php endif ?>

   <br />Message: <?php echo $rows['message']; ?>
   <div class="list-message">
   <form  method="post" action="form/serverRedirectReq.php" id="no-margin-form">
    <input type="hidden" name="hostFname" value="<?php echo $rows['fname']; ?>">
     <button class="btn-sm" type="submit" name="sendReq" value="<?php echo $rows['email']; ?>">Send request to <?php echo $rows['fname']; ?></button>
   </form>
 </div></div>
<?php }} ?> 
</div>

 
<p><img src="css/img/confirm_meals.jpg" width="40px" height="30px"> Confirm meals:</p>
<div class="hight280"  id="home-cm">
<?php  $recivereq = "SELECT * FROM sendmeal WHERE host = '$email'";
             $recivereq_result = mysqli_query($db, $recivereq);

        while($rows=mysqli_fetch_assoc($recivereq_result))
      { 
          $amr_chek = "amr";
          $confirm_chek = explode('-',$rows['confirm']);
          $confirm_chek = $confirm_chek[0];
  if ($amr_chek === $confirm_chek) {        
?>

        <div class="li100-blue">Meal request</div>
     <div class="inbox-text">

         <?php echo $rows['guestFname']; ?>,
   City: <?php echo $rows['city']; ?>,
         <?php $year = date('l jS F', strtotime($rows['datee'])); echo $year; ?>,
         <?php echo $rows['meal']; ?>,
   Guests: <?php echo $rows['guestsNum']; ?>,<br />
   Guest can join for <?php echo $rows['joinn']; ?>,
 <?php 
              $betw = "REQUEST_TIME21";
            if ($rows['timee'] == $betw): ?>
              Starting time: Between <?php echo $rows['bstart']; ?>h and <?php echo $rows['bstart']; ?>h,
            <?php endif ?>
             <?php if ($rows['timee'] !== $betw): ?>
            <?php 
              $at = "REQUEST_TIME3";
            if ($rows['timee'] == $at): ?>
             Starting time: At <?php echo $rows['at']; ?>, 
            <?php endif ?>
             <?php if ($rows['timee'] !== $at): ?>
              <?php echo $rows['timee']; ?>,  
            <?php endif ?>
            <?php endif ?>
           <?php 
            if ($rows['guestsNum'] > 1): ?>
              Coming with: <?php echo $rows['guests']; ?><br />  
            <?php endif ?> 
           <?php 
            if ($rows['guestsNum'] == 1): ?><br />
             
      <?php endif ?> 
    Message: <?php echo $rows['message']; ?><br />
<button type="button" name="req-cancel" class="btn-edit req-cancel" id="<?php echo $rows['confirm']; ?>">decline</button><button type="button" name="req-confirm" class="btn-edit req-confirm" id="<?php echo $rows['confirm']; ?>">accept</button>
           </div>
<?php }} 
 $recivereq = "SELECT * FROM sendmeal WHERE guest = '$email'";
             $recivereq_result = mysqli_query($db, $recivereq);
        while($rows=mysqli_fetch_assoc($recivereq_result))
      { 
          $cm_chek = "cm";
          $confirm_chek = explode('-',$rows['confirm']);
          $confirm_chek = $confirm_chek[0];
if ($cm_chek === $confirm_chek) {
  ?>
        <div class="li100-blue"><?php echo $rows['hostFname']; ?> accepted your meal request. Please confirm it in order to get informations and contact of the host. By confirming, you agree to pay 1€ per guest. (2 guests- 2€-) 
</div>
     <div class="inbox-text">

         <?php echo $rows['guestFname']; ?>,
         City: <?php echo $rows['city']; ?>,
         <?php
               $year = date('l jS F', strtotime($rows['datee']));
          echo $year; ?>,
          <?php echo $rows['meal']; ?>,
         Guests: <?php echo $rows['guestsNum']; ?>,<br />
       Guest can join for <?php echo $rows['joinn']; ?>,
      <?php 
              $betw = "REQUEST_TIME21";
            if ($rows['timee'] == $betw): ?>
              Starting time: Between <?php echo $rows['bstart']; ?>h and <?php echo $rows['bstart']; ?>h,
            <?php endif ?>
             <?php if ($rows['timee'] !== $betw): ?>
            <?php 
              $at = "REQUEST_TIME3";
            if ($rows['timee'] == $at): ?>
             Starting time: At <?php echo $rows['at']; ?>, 
            <?php endif ?>
             <?php if ($rows['timee'] !== $at): ?>
              <?php echo $rows['timee']; ?>,  
            <?php endif ?>
            <?php endif ?>
           <?php 
            if ($rows['guestsNum'] > 1): ?>
              <br />Coming with: <?php echo $rows['guests']; ?> 
            <?php endif ?> 
           <?php 
            if ($rows['guestsNum'] == 1): ?>
             
      <?php endif ?> 
    <br /> Message: <?php echo $rows['message']; ?><br />
           
    <button type="button" name="req-cancel" class="btn-edit req-cancel" id="<?php echo $rows['confirm']; ?>">decline</button><button type="button" name="req-confirm" class="btn-edit req-pay" id="<?php echo $rows['confirm']; ?>">Pay</button>
      </div>
<?php }} ?>

</div>
</main>
<?php include 'include/chat.php'?>
<?php include 'include/footer.php'?>

<div id="myModall" class="modal">
  <!-- Modal content -->
    <div class="modal-content">
      <span class="close close2">&times;</span> 

    <form action="" method="post" id="payment-form">
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <label for="card-element">
    <p>Select currency <select id="currency" name="currency" required>
        <option value="eur">eur</option>
        <option value="usd">usd</option>
    </select></p></label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>
    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>
  <button>Submit Payment</button>
</form>
  <p>Plaase wait for confirm msg</p>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/js-custom-form.js"></script>
<script type="text/javascript" src="js/js-custom-chat.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="js/stripe-v3.js"></script>
</body>
</html>