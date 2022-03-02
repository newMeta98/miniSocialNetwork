 <?php
 include 'db.php';
// initializing variables
    $username = $_SESSION['Email'];
    $table = 'images_me';
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
     if (isset($_FILES['me'])){
          $file_array = reArrayFiles($_FILES['me']);

          for ($i=0; $i < count($file_array) ; $i++) { 
          if ($file_array[$i]['error']) {
            ?> <div class="error-msg">
              <?php  echo $file_array[$i]['name']. '-' .$phpFileUploadError[$file_array[$i]['error']];
            ?> </div> <?php
          }else{
              $ext = array('jpg', 'jpeg', 'png', 'gif');
              $file_ext = explode('.',$file_array[$i]['name']);
              $img_name = $file_ext[0];
              $file_ext = end($file_ext);
              $name = $img_name."-".md5(rand()).".".$file_ext;
              if (!in_array($file_ext, $ext)){
              ?> <div class="error-msg">
              <?php  echo $file_array[$i]['name'] . ' - Invalid file extension!';
            ?> </div> <?php
              }else{

              $img_dir = 'images/'. $name;

                  move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);

              $sql = "INSERT IGNORE INTO $table (username, me, dir) VALUES 
              ('$username', '$name', '$img_dir')";
              $db->query($sql);
              
              ?> <div class="seccess-msg">
              <?php  echo $file_array[$i]['name'] . ' - Seccess! Image has uploaded!';
              ?> </div> <?php
              }
          }
        }
      }
  function reArrayFiles($file_post){
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
              for ($i=0; $i < $file_count; $i++) { 
                foreach ($file_keys as $key) {
                   $file_ary[$i] [$key] = $file_post[$key] [$i];
                 } 
              }
      return $file_ary;
      } 
 ?>