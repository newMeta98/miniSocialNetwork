<?php  
session_start();
include '../fun/load_cookies.php';
$dbhost = 'localhost';
$dbname = 'euromeal';
$dbuser = 'root';
$dbpass = '';
// connect to the database
  include 'db.php';
  include 'fun/lang.php';
  $dbPDO = new PDO("mysql:dbhost=$dbhost;dbname=$dbname;", "$dbuser", "$dbpass");
/////////////////////////////// FETCH 
if (isset($_POST['action'])) {
      
/////////////////////////////// Fetch Chat Tab button Content    
      if ($_POST['action'] == "fetchButton_content"){

  $Recivereq = "SELECT * FROM sendmeal WHERE host = '$email'";
          $Recivereq_result = mysqli_query($db, $Recivereq);
          while($rows=mysqli_fetch_assoc($Recivereq_result))
          {
              ?> <div class="chat_tab_name">
                <?php echo $rows['guestFname']; ?></div>
              <div class="chat_tab_x"><span class="closeTab" id="closeTab">&times;</span></div>

    <?php }
  $Recivereq = "SELECT * FROM sendmeal WHERE guest = '$email'";
          $Recivereq_result = mysqli_query($db, $Recivereq);
          while($rows=mysqli_fetch_assoc($Recivereq_result))
          {
             ?> <div class="chat_tab_name">
              <?php echo $rows['hostFname']; ?></div>
              <div class="chat_tab_x"><span class="closeTab" id="closeTab">&times;</span></div>

    <?php }

  }

/////////////////////////////// Fetch Chat button Content 
      if ($_POST['action'] == "fetchChat"){
/////////////////////////////// Fetch Chat button Content // HOST 
          $Recivereq = "SELECT * FROM sendmeal WHERE host = '$email'";
          $Recivereq_result = mysqli_query($db, $Recivereq);
          while($rows=mysqli_fetch_assoc($Recivereq_result))
          {
          $approved_chek = "Approved";
          $confirm_chek = explode('-',$rows['confirm']);
          $confirm_chek = $confirm_chek[0];
        
        if ($approved_chek === $confirm_chek) {
  ?>
  <button type="button" name="req-cancel" class="accordion chat" id="<?php echo $rows['confirm']; ?>">Chat with <?php echo $rows['guestFname']; ?></button>
           </div>
     <?php  }
          }
/////////////////////////////// Fetch Chat button Content // GUEST
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
      if ($approved_chek === $confirm_chek) {
  ?>  <button type="button" name="req-cancel" class="accordion chat" id="<?php echo $rows['confirm']; ?>">Chat with <?php echo $rows['hostFname']; ?></button>
           </div>
  <?php  }
    }

      }
      
/////////////////////////////// Fetch Chat Content 
      if ($_POST['action'] == "fetchChatButton"){?>

            Chat 

    <?php }
/////////////////////////////// Save message to DB
      if ($_POST['action'] == "sendMessage"){
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
         $confirm = $POST['chat_tab_id'];
         $message = $POST['message'];
         if (preg_match("/^[A-Z0-9-@:;() ]+$/i", $message)) {
       $query = $dbPDO->prepare("INSERT INTO chat SET user=?, confirm=?, message=?");
       $query->execute([$email, $POST['chat_tab_id'], $POST['message']]);
              }
     }

/////////////////////////////// Select messages From DB 
      if ($_POST['action'] == "fetchChat_tab"){
// Select Messages From DB // filtering POST METHOD
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
// Select Messages From DB // Filtering selected chat
        $confirm = $POST['chat_tab_id'];
      $query = $dbPDO->prepare("SELECT * FROM chat WHERE confirm =?");
       $query->execute([$confirm]);
       $rs = $query->fetchAll(PDO::FETCH_OBJ);
// Select Messages From DB // Displaing messages
        ?><div class="message_view" id="message_view"> <?php
        foreach( $rs as $message) { 
          ?>
          <div class="single_message <?php echo (($email==$message->user)?'msg_right':'msg_left'); ?>">

            <div class="message_holder" style="max-width: 155px; overflow-wrap: break-word;"><span><?php echo $message->message; ?></span></div>

            </div>
    <?php } ?></div> <?php
     }
    }
?>