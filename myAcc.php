<?php
session_start();  
  if (!isset($_COOKIE['email'])) {
    $_SESSION['msg'] = "";
    header('location: login.php');
  } 
  include 'fun/lang.php';
  include 'fun/load_cookies.php';
  include_once('fun/db.php');
  include 'fun/logout.php';
  $personalinfo = "SELECT * FROM personalinfo WHERE email = '$email'" ;
  $personalinfo_result = mysqli_query($db, $personalinfo);
  $title = MYACC_TITLE;
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
      <div class="profile">
    <div class="user" id="profile_image">

        </div><button type="button" name="update" class="reg_btn update" id="UPI">Update profile image</button>
        <div class="user" id="">
            <img src="css/img/location.jpg" style="width:100%;max-width:80px;max-height:80px;border-radius: 3px">
            <div class="profile-left">
                <?php  while($rows=mysqli_fetch_assoc($personalinfo_result))
                  { ?>
                <div class="li100"><?php echo $rows['city']; ?>, <?php echo $rows['country']; ?></div>
            </div>
        </div> 

        <div class="user">
        <img src="css/img/gender.jpg" style="width:100%;max-width:80px;max-height:80px;border-radius: 3px">
        <div class="profile-left">
          <div class="li100"><?php
                $year = date('Y', strtotime($rows['bday']));
                $age = date('Y') - $year;
           echo $age; ?>,
     <?php 
          $m = "m";
          $male = "Male";
        if ($rows['gender'] == $m): ?>
           <?php echo $male; ?>  
        <?php endif ?>
         <?php 
          $f = "f";
          $female = "Female";
        if ($rows['gender'] == $f): ?>
           <?php echo $female; ?>
        <?php endif ?>

          </div></div></div>


          <div class="user">
        <img src="css/img/chat.jpg" style="width:100%;max-width:80px;max-height:80px;border-radius: 3px">
        <div class="profile-left">
      <div class="li100"> <?php echo $rows['language']; ?></div>
                </div>
            </div> 
                  <div class="user">
        <img src="css/img/fork.jpg" style="width:100%;max-width:80px;max-height:80px;border-radius: 3px">
        <div class="profile-left">
      <div class="li100"><?php echo $rows['ieat']; ?>, I don't eat: <?php echo $rows['idonteat']; ?></div>
      <div class="li100">I'm alegic on: <?php echo $rows['allergic']; ?></div>
      </div></div>
            <div class="user">
        <img src="css/img/ocupation.jpg" style="width:100%;max-width:80px;max-height:80px;border-radius: 3px">
        <div class="profile-left">
      <div class="li50"> <?php echo $rows['occupation']; ?></div>
                </div>

<?php } ?>  
        </div>
        </div>
         <div class="black"><div class="profile-about"><main>
        <h2>About</h2>
          <div class="about" id="fetchABOUT">
 
     </div>
    </div></main></div></div>
    <div class="profile-about"><main><h2>Galery</h2>
       <div class="profile-galery">
            
 <div class=""><h2>Images of me</h2><div class="about" id="add_Me">


</div>
<button type="button" name="add" class="reg_btn" id="addme">Add image</button>
 </div><div class=""><h2>Images of my food</h2><div class="about" id="add_Food">


</div>
<button type="button" name="add" class="reg_btn" id="addfood">Add image</button>
  
 </div>
      </div>
</main>
 </div></div>

<?php include 'include/chat.php'?> 
<?php include 'include/footer.php'?> 


<div id="myModalUPI" class="modal">
  <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
    <form id="image_form" method="post" enctype="multipart/form-data">
     <p><label>Select Image</label>
     <input type="file" name="image[]" id="image" /></p><br/>
     <input type="hidden" name="action" id="action" value="insert" />
     <input type="hidden" name="image_id" id="image_id" />
     <input type="submit" class="upload_btn" name="insert" id="insert" value="Insert" class="btn btn-info" />
    </form>
    </div>
</div>
<div id="myModall" class="modal">
  <!-- Modal content -->
    <div class="modal-content">
      <span class="close close2">&times;</span> 
    <form id="edit_form" method="post">
     <p><label>Edit</label>
     <input type="text" name="text" id="text" /></p><br />
     <input type="hidden" name="action" id="action2" value="insert" />
     <input type="hidden" name="image_id" id="image_id" />
     <input type="submit" class="upload_btn" name="insert" id="insert2" value="Edit" class="btn btn-info" />
    </form>
    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/js-custom-button.js"></script>
<script type="text/javascript" src="js/js-custom-chat.js"></script>
<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
var modal = document.getElementById("myModalUPI");
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
var modalAbout = document.getElementById("myModall");
window.onclick = function(event) {
  if (event.target == modalAbout) {
    modalAbout.style.display = "none";
  }
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}
var span2 = document.getElementsByClassName("close2")[0];
span2.onclick = function() {
  modalAbout.style.display = "none";
}
    fetch_dataUPI();
    fetch_dataME();
    fetch_dataFOOD();
    fetch_dataABOUT();
      function fetch_dataUPI()
        {
            var action = "fetch";
            $.ajax({
                url:"users/serverMyAcc.php",
                method: "POST",
                data:{action:action},
                success:function(data)
                {
                    $('#profile_image').html(data)
                }
          });
        }
      function fetch_dataME()
        {
            var action = "fetchME";
            $.ajax({
                url:"users/serverMyAcc.php",
                method: "POST",
                data:{action:action},
                success:function(data)
                {
                    $('#add_Me').html(data)
                }
          });
        }
      function fetch_dataFOOD()
        {
            var action = "fetchFOOD";
            $.ajax({
                url:"users/serverMyAcc.php",
                method: "POST",
                data:{action:action},
                success:function(data)
                {
                    $('#add_Food').html(data)
                }
          });
        }
      function fetch_dataABOUT()
        {
            var action = "fetchAbout";
            $.ajax({
                url:"users/serverMyAcc.php",
                method: "POST",
                data:{action:action},
                success:function(data)
                {
                    $('#fetchABOUT').html(data)
                }
          });
        }
$('#addme').click(function(){
  modal.style.display = "block";
  $('#image_form')[0].reset();
  $('.modal-title').text("Add Image");
  $('#image_id').val('');
  $('#action').val('addme');
  $('#insert').val("Insert");
 });
$('#addfood').click(function(){
  modal.style.display = "block";
  $('#image_form')[0].reset();
  $('.modal-title').text("Add Image");
  $('#image_id').val('');
  $('#action').val('addfood');
  $('#insert').val("Insert");
 });
$('#image_form').submit(function(event){
  event.preventDefault();
  var image_name = $('#image').val();
  if(image_name == '')
  {
   alert("Please Select Image");
   return false;
  }
  else
  {
   var extension = $('#image').val().split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#image').val('');
    return false;
   }
   else
   {
    $.ajax({
     url:"users/serverMyAcc.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {
      alert(data);
    fetch_dataUPI();
    fetch_dataME();
    fetch_dataFOOD();
      $('#image_form')[0].reset();
        modal.style.display = "none";
     }
    });
   }
  }
 });
 $(document).on('click', '#UPI', function(){
  $('#image_id').val($(this).attr("id"));
  $('#action').val("update");
  $('.modal-title').text("Update Image");
  $('#insert').val("Update");
  var modal = document.getElementById("myModalUPI");
  modal.style.display = "block";
 });
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var action = "delete";
  if(confirm("Are you sure you want to remove this image from database?"))
  {
   $.ajax({
    url:"users/serverMyAcc.php",
    method:"POST",
    data:{image_id:image_id, action:action},
    success:function(data)
    {
     alert(data);
    fetch_dataUPI();
    fetch_dataME();
    fetch_dataFOOD();
    }
   })
  }
  else
  {
   return false;
  }
 });
$(document).on('click', '.edit_aboutme', function(){
  modalAbout.style.display = "block";
  $('#edit_form')[0].reset();
  $('.modal-title').text("Edit");
  $('#image_id').val('');
  $('#action2').val('aboutme');
  $('#insert2').val("Save About me");
 });
$(document).on('click', '.edit_hobbies', function(){
  modalAbout.style.display = "block";
  $('#edit_form')[0].reset();
  $('.modal-title').text("Edit");
  $('#image_id').val('');
  $('#action2').val('hobbies');
  $('#insert2').val("Save hobbies");
 });
$(document).on('click', '.edit_why', function(){
  modalAbout.style.display = "block";
  $('#edit_form')[0].reset();
  $('.modal-title').text("Edit");
  $('#image_id').val('');
  $('#action2').val('why');
  $('#insert2').val("Save why You are on Eat for 1e");
 });
$(document).on('click', '.edit_whatieat', function(){
  modalAbout.style.display = "block";
  $('#edit_form')[0].reset();
  $('.modal-title').text("Edit");
  $('#image_id').val('');
  $('#action2').val('whatieat');
  $('#insert2').val("Save what you eat");
 });
$(document).on('click', '.edit_typical', function(){
  modalAbout.style.display = "block";
  $('#edit_form')[0].reset();
  $('.modal-title').text("Edit");
  $('#image_id').val('');
  $('#action2').val('typical');
  $('#insert2').val("Save Typical food from your region");
 });
$(document).on('click', '.edit_countries', function(){
  modalAbout.style.display = "block";
  $('#edit_form')[0].reset();
  $('.modal-title').text("Edit");
  $('#image_id').val('');
  $('#action2').val('countries');
  $('#insert2').val("Save Countries you have visited");
 });
$(document).on('click', '.edit_meetme', function(){
  modalAbout.style.display = "block";
  $('#edit_form')[0].reset();
  $('.modal-title').text("Edit");
  $('#image_id').val('');
  $('#action2').val('meetme');
  $('#insert2').val("Save Why to meet you");
 });

$('#edit_form').submit(function(event){
  event.preventDefault();
  var input_name = $('#text').val();
  var action2 = $('#action2').val();
  if(input_name == '')
  {
   alert("Please Edit feeld");
   return false;
  }
  else
  {
    $.ajax({
     url:"users/serverMyAcc.php",
     method:"POST",
     data:{text:input_name, action:action2},
     success:function(data)
     {
      alert(data);
      fetch_dataABOUT();
      $('#edit_form')[0].reset();
        modalAbout.style.display = "none";
     }
    });
  }
 });
});
</script>
</html>