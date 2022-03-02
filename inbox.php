<?php
session_start();  
  include 'fun/logedin.php';
  include 'fun/lang.php';
  include 'fun/logout.php';
  include 'fun/load_cookies.php';
  include_once('fun/db.php');
  goLogin();
  $personalinfo = "SELECT * FROM personalinfo WHERE email = '$email'" ;
  $personalinfo_result = mysqli_query($db, $personalinfo);
  $title = INBOX_TITLE;
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
  <link rel="stylesheet" type="text/css" href="css/style-home-acc.css">
<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">

</head>
<body>
 <?php include 'include/header-acc.php'?>
<div class="profile-main" id="profile-main">
<div class="profile-user">

        <div class="index-wrap"><main>
        <h2>Inbox</h2>
          <div class="about" id="fetchMEALREQ">
              Inbox is empty.
     </div>
</main></div></div></div>
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
<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="js/stripe-v3.js"></script>
<script type="text/javascript" src="js/js-custom.js"></script>
<script type="text/javascript" src="js/js-custom-chat.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
var modal = document.getElementById("myModall");
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
var span2 = document.getElementsByClassName("close2")[0];
span2.onclick = function() {
  modal.style.display = "none";
}
    fetch_dataMEALREQ();


      setInterval(function(){
        fetch_dataMEALREQ();
      }, 1000);

      function fetch_dataMEALREQ()
        {
            var action = "fetchMEALREQ";
            $.ajax({
                url:"users/serverInbox.php",
                method: "POST",
                data:{action:action},
                success:function(data)
                {
                    $('#fetchMEALREQ').html(data)
                } 
          });
        }
$('#payment-form').submit(function(event){
  event.preventDefault();
  var pay_id = $('.req-pay').attr("id");
  var currency = $('#currency').val();
  var action = "payment";
// Handle form submission.
var form = document.getElementById('payment-form');
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
    $.ajax({
     url:"users/serverInbox.php",
     method:"POST",
     data:{token:token.id, pay_id:pay_id, currency:currency, action:action},
     success:function(data)
     {
        alert(data);
        document.getElementById("payment-form").reset();
        modal.style.display = "none";
        fetch_dataMEALREQ();
     }
    });
  }
 });
 $(document).on('click', '.req-pay', function(){
  modal.style.display = "block";
 });


 $(document).on('click', '.req-cancel', function(){
  var image_id = $(this).attr("id");
  var action = "req-cancel";
  if(confirm("Are you sure you want to cancel this meal request?"))
  {
   $.ajax({
    url:"users/serverInbox.php",
    method:"POST",
    data:{Cancel:image_id, action:action},
    success:function(data)
    {
     alert(data);
    fetch_dataMEALREQ();
    }
   })
  }
  else
  {
   return false;
  }
 });


 $(document).on('click', '.req-confirm', function(){
  var image_id = $(this).attr("id");
  var action = "req-confirm";
  if(confirm("Are you sure you want to Accept this meal request?"))
  {
   $.ajax({
    url:"users/serverInbox.php",
    method:"POST",
    data:{confirm:image_id, action:action},
    success:function(data)
    {
     alert(data);
    fetch_dataMEALREQ();
    }
   })
  }
  else
  {
   return false;
  }
 });
});
</script>
</body>
</html>