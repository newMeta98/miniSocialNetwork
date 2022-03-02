<?php
session_start(); 
include '../fun/load_cookies.php';
// connect to the database
  include 'db.php';
  include 'fun/lang.php';
// REGISTER USER
if (isset($_POST['action'])) {
    if ($_POST['action'] == "fetch") 
    {
  $user = "SELECT * FROM users WHERE email = '$email'" ;
  $user_result = mysqli_query($db, $user);
while($rows=mysqli_fetch_assoc($user_result))
          { 
      $output = '<a href="'.$rows['profile'] .'" data-lightbox="galery"><img src="'.$rows['profile'].'        "id="myImg" style="width:100%;max-width:80px;max-height:80px"></a>
                <div class="profile-left">
                <div class="name">'. $rows['email'].'</div>
                <div class="li100">'. $rows['fname'].'</div>
                </div>';
         }
            echo $output;
        }

    if ($_POST['action'] == "fetchAbout") 
    {
             $aboutme = "SELECT * FROM aboutme WHERE email = '$email'" ;
             $aboutme_result = mysqli_query($db, $aboutme);
        while($rows=mysqli_fetch_assoc($aboutme_result))
      {
               echo '<div class="li100">'. REGISTER_FORM28.' 
     <div class="profile-text">'.$rows['aboutme'].'
<button type="button" name="edit_aboutme" class="btn-edit edit_aboutme">Change</button>
     </div>
       
     </div>
    <div class="li100">'. REGISTER_FORM29.' 
     <div class="profile-text">'. $rows['hobbies'].'<button type="button" name="edit_hobbies" class="btn-edit edit_hobbies">Change</button></div>
       
     </div>
    <div class="li100">'. REGISTER_FORM30.'
     <div class="profile-text">'.$rows['why'].'<button type="button" name="edit_why" class="btn-edit edit_why">Change</button></div>
       
     </div>
    <div class="li100">'. REGISTER_FORM31.'
     <div class="profile-text">'.$rows['whatieat'].'<button type="button" name="edit_whatieat" class="btn-edit edit_whatieat">Change</button></div>
       
     </div>
    <div class="li100">'. REGISTER_FORM32.' 
     <div class="profile-text">'.$rows['typical'].'<button type="button" name="edit_typical" class="btn-edit edit_typical">Change</button></div>
       
     </div>
    <div class="li100">'. REGISTER_FORM33.' 
     <div class="profile-text">'.$rows['countries'].'<button type="button" name="edit_countries" class="btn-edit edit_countries">Change</button></div>
       
     </div>
    <div class="li100">'. REGISTER_FORM34.' 
     <div class="profile-text">'.$rows['meetme'].'<button type="button" name="edit_meetme" class="btn-edit edit_meetme">Change</button></div>';
          } 
        }
    if ($_POST['action'] == "fetchME") 
    {
        $images_me = "SELECT * FROM images_me WHERE email = '$email'" ;
        $images_me_result = mysqli_query($db, $images_me);
        while($rows=mysqli_fetch_assoc($images_me_result))
          {  
              echo '<button type="button" name="delete" class="btn-del delete" id="'.$rows["dir"].'">Remove</button><a href="'.$rows['dir'].'" data-lightbox="galery"><img src="'.$rows['dir'].'" style="width:100%;max-width:190px"></a>';
          }
        }
    if ($_POST['action'] == "fetchFOOD") 
    {
        $images_food = "SELECT * FROM images_food WHERE email = '$email'" ;
        $images_food_result = mysqli_query($db, $images_food);
        while($rows=mysqli_fetch_assoc($images_food_result))
          {
               echo '<button type="button" name="delete" class="btn-del delete" id="'.$rows["dir"].'">Remove</button><a href="'.$rows['dir'].'" data-lightbox="galery"><img src="'.$rows['dir'].'"style="width:100%;max-width:190px"></a>';
          } 
        }


if($_POST["action"] == "update")
            {       
              $ext = array('jpg', 'jpeg', 'png', 'gif');
              $file_ext = explode('.',$_FILES["image"]['name'][0]);
              $img_name = $file_ext[0];
              $file_ext = end($file_ext);
              $Name = $img_name."-".md5(rand()).".".$file_ext;
              if (!in_array($file_ext, $ext)){
              ?> <div class="error-msg">
              <?php  echo $_FILES["image"]['name'] . ' - Invalid file extension!';
            ?> </div> <?php
              }else
              {
              $img_dir = '../images/'.$Name;
              $Img_dir = 'images/'.$Name;
                  move_uploaded_file($_FILES["image"]['tmp_name'][0], $img_dir);

              $sql = "UPDATE users SET profile = '$Img_dir' WHERE email = '$email'";
              mysqli_query($db, $sql);
              
               echo $_FILES["image"]['name'][0] . ' - Seccess! Image has uploaded!';
              }
            }

if($_POST["action"] == "addme")
            {  
              $table = 'images_me';     
              $ext = array('jpg', 'jpeg', 'png', 'gif');
              $file_ext = explode('.',$_FILES["image"]['name'][0]);
              $img_name = $file_ext[0];
              $file_ext = end($file_ext);
              $Name = $img_name."-".md5(rand()).".".$file_ext;
              if (!in_array($file_ext, $ext)){
              ?> <div class="error-msg">
              <?php  echo $_FILES["image"]['name'] . ' - Invalid file extension!';
            ?> </div> <?php
              }else
              {
              $img_dir = '../images/'.$Name;
              $Img_dir = 'images/'.$Name;
                  move_uploaded_file($_FILES["image"]['tmp_name'][0], $img_dir);

              $sql = "INSERT IGNORE INTO $table (email, me, dir) VALUES 
              ('$email', '$Name', '$Img_dir')";
              $db->query($sql);
              
               echo $_FILES["image"]['name'][0] . ' - Seccess! Image has uploaded!';
              }
            }
if($_POST["action"] == "addfood")
            {  
              $Table = 'images_food';     
              $ext = array('jpg', 'jpeg', 'png', 'gif');
              $file_ext = explode('.',$_FILES["image"]['name'][0]);
              $img_name = $file_ext[0];
              $file_ext = end($file_ext);
              $Name = $img_name."-".md5(rand()).".".$file_ext;
              if (!in_array($file_ext, $ext)){
              ?> <div class="error-msg">
              <?php  echo $_FILES["image"]['name'] . ' - Invalid file extension!';
            ?> </div> <?php
              }else
              {
              $img_dir = '../images/'.$Name;
              $Img_dir = 'images/'.$Name;
                  move_uploaded_file($_FILES["image"]['tmp_name'][0], $img_dir);

              $sql = "INSERT IGNORE INTO $Table (email, food, dir) VALUES 
              ('$email', '$Name', '$Img_dir')";
              $db->query($sql);
              
               echo $_FILES["image"]['name'][0] . ' - Seccess! Image has uploaded!';
              }
            }
if($_POST["action"] == "delete")
             {  
                $images_me = "SELECT * FROM images_me WHERE email = '$email'" ;
                $images_me_result = mysqli_query($db, $images_me);
                while($rows=mysqli_fetch_assoc($images_me_result)){

                  if ($rows['dir'] == $_POST["image_id"])
                    {
                      $query = "DELETE FROM images_me WHERE dir = '".$_POST["image_id"]."'";
                      mysqli_query($db, $query);
                      echo 'Image Deleted from Database';
                   }
                 } 
                $images_food = "SELECT * FROM images_food WHERE email = '$email'" ;
                $images_food_result = mysqli_query($db, $images_food);
                while($Rows=mysqli_fetch_assoc($images_food_result)){
                  if ($Rows['dir'] == $_POST["image_id"])
                   {
                      $Query = "DELETE FROM images_food WHERE dir = '".$_POST["image_id"]."'";
                      mysqli_query($db, $Query);
                      echo 'Image Deleted from Database';
                    }
                 }
            }
if($_POST["action"] == "aboutme")
            {  
              $text = $_POST["text"];
              $sql = "UPDATE aboutme SET aboutme = '$text' WHERE email = '$email'";
              mysqli_query($db, $sql);
              
               echo 'Seccess! Field has edided!';
              
            }
if($_POST["action"] == "hobbies")
            {  
              $text = $_POST["text"];
              $sql = "UPDATE aboutme SET hobbies = '$text' WHERE email = '$email'";
              mysqli_query($db, $sql);
              
               echo 'Seccess! Field has edided!';
              
            }
if($_POST["action"] == "why")
            {  
              $text = $_POST["text"];
              $sql = "UPDATE aboutme SET why = '$text' WHERE email = '$email'";
              mysqli_query($db, $sql);
              
               echo 'Seccess! Field has edided!';
              
            }
if($_POST["action"] == "whatieat")
            {  
              $text = $_POST["text"];
              $sql = "UPDATE aboutme SET whatieat = '$text' WHERE email = '$email'";
              mysqli_query($db, $sql);
              
               echo 'Seccess! Field has edided!';
              
            }
if($_POST["action"] == "typical")
            {  
              $text = $_POST["text"];
              $sql = "UPDATE aboutme SET typical = '$text' WHERE email = '$email'";
              mysqli_query($db, $sql);
              
               echo 'Seccess! Field has edided!';
              
            }
if($_POST["action"] == "countries")
            {  
              $text = $_POST["text"];
              $sql = "UPDATE aboutme SET countries = '$text' WHERE email = '$email'";
              mysqli_query($db, $sql);
              
               echo 'Seccess! Field has edided!';
              
            }
if($_POST["action"] == "meetme")
            {  
              $text = $_POST["text"];
              $sql = "UPDATE aboutme SET meetme = '$text' WHERE email = '$email'";
              mysqli_query($db, $sql);
              
               echo 'Seccess! Field has edided!';
              
            }
}
?>