<?php
session_start(); 
  include '../fun/load_cookies.php';
$chek1 = "Cancel";$chek2 = "Approved";
// connect to the database
  include 'db.php';
  include 'fun/lang.php';
/////////////////////////////// FETCH 
if (isset($_POST['action'])) {


    if ($_POST['action'] == "fetchMEALREQ"){
/////////////////////////////// HOST     
             $recivereq = "SELECT * FROM sendmeal WHERE host = '$email'";
             $recivereq_result = mysqli_query($db, $recivereq);
        while($rows=mysqli_fetch_assoc($recivereq_result))
      { 
          $cm_chek = "cm";
          $amr_chek = "amr";
          $canceled_chek = "Cancel";
          $approved_chek = "Approved";
          $confirm_chek = explode('-',$rows['confirm']);
          $confirm_chek = $confirm_chek[0];
          
/////////////////////////////// host AMR 
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
 <?php 
/////////////////////////////// host view guest CM 
            }elseif ($cm_chek === $confirm_chek) {
  ?>
        <div class="li100-yelow">You accepted mael request, waitng for <?php echo $rows['guestFname']; ?> to confirm meal</div>
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
             <br /> Coming with: <?php echo $rows['guests']; ?><br />   
            <?php endif ?> 
           <?php 
            if ($rows['guestsNum'] == 1): ?><br />
             
      <?php endif ?> 
            Message: <?php echo $rows['message']; ?><br /> 
  <button type="button" name="req-cancel" class="btn-edit req-cancel" id="<?php echo $rows['confirm']; ?>">cancel</button>
           </div>
 <?php    
 /////////////////////////////// host view canceld 
  }elseif ($canceled_chek === $confirm_chek) {
  ?>
        <div class="li100-red">Declined meal request</div>
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
    <br />Message: <?php echo $rows['message']; ?><br />
          </div>
  <?php     }
 /////////////////////////////// host view Approved
    elseif ($approved_chek === $confirm_chek) {
  ?>
        <div class="li100-green"><?php echo $rows['guestFname']; ?> confirmed the meal on</div>
     <div class="inbox-text">
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
            <?php endif ?><br /><br />
             <button type="button" name="req-cancel" class="reg_btn chat" id="<?php echo $rows['confirm']; ?>">Chat with <?php echo $rows['guestFname']; ?> about more details</button>
           </div>
  <?php  }
    }
/////////////////////////////// GUEST     
             $recivereq = "SELECT * FROM sendmeal WHERE guest = '$email'";
             $recivereq_result = mysqli_query($db, $recivereq);
        while($rows=mysqli_fetch_assoc($recivereq_result))
      { 

          $cm_chek = "cm";
          $amr_chek = "amr";
          $canceled_chek = "Cancel";
          $approved_chek = "Approved";
          $confirm_chek = explode('-',$rows['confirm']);
          $confirm_chek = $confirm_chek[0];
/////////////////////////////// guest AMR 
            if ($amr_chek === $confirm_chek) {        
?>
        <div class="li100-yelow">You sent meal request to</div>
     <div class="inbox-text">

         <?php echo $rows['hostFname']; ?>,
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
             Coming with: <?php echo $rows['guests']; ?>
            <?php endif ?> 
           <?php 
            if ($rows['guestsNum'] == 1): ?>
             
      <?php endif ?> 
   <br />Message: <?php echo $rows['message']; ?><br />
<button type="button" name="req-cancel" class="btn-edit req-cancel" id="<?php echo $rows['confirm']; ?>">cancel</button>
           </div>
 <?php 
/////////////////////////////// guest view guest CM 
            }elseif ($cm_chek === $confirm_chek) {
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
 <?php    
 /////////////////////////////// guest view canceld 
  }elseif ($canceled_chek === $confirm_chek) {
  ?>
        <div class="li100-red">Declined meal request</div>
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
            if ($rows['guestsNum'] > 1): ?><br />
              Coming with: <?php echo $rows['guests']; ?>
            <?php endif ?> 
           <?php 
            if ($rows['guestsNum'] == 1): ?>
             
      <?php endif ?> 
    <br />Message: <?php echo $rows['message']; ?><br /> 
           </div>
  <?php     }
 /////////////////////////////// guest view Approved
    elseif ($approved_chek === $confirm_chek) {
  ?>
        <div class="li100-green">You confirmed the meal on</div>
     <div class="inbox-text">
         <?php
               $year = date('l jS F', strtotime($rows['datee']));
          echo $year; ?>,
          <?php echo $rows['meal']; ?>,
         Guests: <?php echo $rows['guestsNum']; ?>,
         <br />Guest can join for <?php echo $rows['joinn']; ?>,

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
            <?php endif ?><br /><br />
  <button type="button" name="req-cancel" class="reg_btn chat" id="<?php echo $rows['confirm']; ?>">Chat with <?php echo $rows['hostFname']; ?> about more details</button>
           </div>
  <?php  }
    }
}

 
if ($_POST['action'] == "req-cancel") 
    {          
              $confirm = $_POST["Cancel"];
              $Cancel = "Cancel-".md5(rand());
              $sql = "UPDATE sendmeal SET confirm = '$Cancel' WHERE confirm = '$confirm'";
              mysqli_query($db, $sql);
              
               echo 'Seccess! Request Declined!';
              
    }

    
if ($_POST['action'] == "req-confirm") 
    {          
              $Confirm = $_POST["confirm"];
              $confirm = "cm-".md5(rand());
              $sql = "UPDATE sendmeal SET confirm = '$confirm' WHERE confirm = '$Confirm'";
              mysqli_query($db, $sql);
              
               echo 'Seccess! Request Accepted!';    
    }


if ($_POST['action'] == "payment") 
    { 
        $pay_id = $_POST["pay_id"];
            $Recivereq = "SELECT * FROM sendmeal WHERE confirm = '$pay_id'";
            $Recivereq_result = mysqli_query($db, $Recivereq);
        while($rows=mysqli_fetch_assoc($Recivereq_result))
      { 
      require_once('../vendor/autoload.php');
  \Stripe\Stripe::setApiKey('sk_test_TUwh21vkGA3lxstLMrjhdB3n00BigVzoW1');
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
        $token = $POST['token'];

  // Create customer In Stripe
  $customer = \Stripe\Customer::create(array(
    "email" => $email,
    "name" => $fname . $lname,
    "source" => $token
  ));
    $amount = $rows["guestsNum"] * 100;
    $currency = $POST['currency'];
  // Charge Customer
  $charge = \Stripe\Charge::create(array(
    "amount" => $amount,
    "currency" => $currency,
    "description" => "Payed for ". $rows["guestsNum"] ."guest(s)",
    "customer" => $customer->id
  ));
      }
    $approved = "Approved-".md5(rand());
    $sql = "UPDATE sendmeal SET confirm = '$approved' WHERE confirm = '$pay_id'";
    mysqli_query($db, $sql);
        echo 'Seccess! Meal Payed!';
    }
  }
?>