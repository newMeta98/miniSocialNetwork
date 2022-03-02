 <?php
 include 'db.php';
// initializing variables
    $username = $_SESSION['Email'];
    $Table = 'images_food';
    $phpFileUploadError = array(
        0 => 'There is no error, the file upload with success.', 
        1 => 'File too big.', 
        2 => 'File too big.', 
        3 => 'File only partially uploaded.', 
        4 => 'No file was uploaded.', 
        6 => 'Missing tmp file.', 
        7 => 'Failed to write file to disc.', 
        8 => 'A PHP ext stopped the file upload.', 
      );
     if (isset($_FILES['food'])){
          $file_array = reArrayFiles($_FILES['food']);

          for ($i=0; $i < count($file_array) ; $i++) { 
          if ($file_array[$i]['error']) {
            ?> <div class="error-msg">
              <?php  echo $file_array[$i]['name']. '-' .$phpFileUploadError[$file_array[$i]['error']];
            ?> </div> <?php
          }else{
              $ext = array('jpg', 'jpeg', 'png', 'gif');
              $file_ext = explode('.',$file_array[$i]['name']);
              $Img_name = $file_ext[0];
              $file_ext = end($file_ext);
              $Name = $Img_name."-".md5(rand()).".".$file_ext;
      
              if (!in_array($file_ext, $ext)){
              ?> <div class="error-msg">
              <?php  echo $file_array[$i]['name'] . ' - Invalid file extension!';
            ?> </div> <?php
              }else{

              $Img_dir = 'images/'.$Name;

                  move_uploaded_file($file_array[$i]['tmp_name'], $Img_dir);

              $Sql = "INSERT IGNORE INTO $Table (username, food, dir) VALUES 
              ('$username', '$Name', '$Img_dir')" ;
              $db->query($Sql);
              
              ?> <div class="seccess-msg">
              <?php  echo $file_array[$i]['name'] . ' - Seccess! Image has uploaded!';
              ?> </div> <?php
              }
          }
        }
      } 
 ?>