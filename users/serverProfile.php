<?php
if (isset($_POST['sub'])) {
   $_SESSION['name'] = $_POST['sub'];
   $url = "viewAcc.php";
   echo "<script type='text/javascript'>window.top.location='viewAcc.php';</script>"; exit;
  }?>