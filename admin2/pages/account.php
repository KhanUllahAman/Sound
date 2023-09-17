<?php
  if (session_status() == PHP_SESSION_NONE) {
   session_start();
}//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}


  include "config.php";
  include "../headerandfooter/headerandsidebar.php";
  
  $id = $_SESSION['user']['id'];


  
  if(isset($_POST["contact"])){
  
   $phone = $_POST["phone"];
   $email = $_POST["email"];
   

   $insert = "UPDATE `admin` SET `id`='$id',`phone`='$phone',`email`='$email' WHERE `id` = $id";

   $result = mysqli_query($conn, $insert);

   if($result){
      // session_destroy();
      echo "<script>
      setTimeout(function(){
      window.location = 'account.php';
      }, 1000);</script>";

      }

      if(mysqli_query($conn,$insert))
     {
      $_SESSION['user']['phone']=$phone;
      $_SESSION['user']['email']=$email;



      ?>
      <script type="text/javascript">
      alert('Data Updated Successfully');
      window.location.href='account.php';
      </script>
      <?php
     }
}



  
  if(isset($_POST["update"])){
   $image = $_FILES["image"]["name"];
   $tempname = $_FILES["image"]["tmp_name"];
   $folder = "adminimage/" . $image;


   

   $insert = "UPDATE `admin` SET `id`='$id',`image`='$image' WHERE `id` = $id";

   $result = mysqli_query($conn, $insert);

   if($result){
      // session_destroy();
      echo "<script>
      setTimeout(function(){
      window.location = 'account.php';
      }, 1000);</script>";

      }

      if(mysqli_query($conn,$insert))
     {
      $_SESSION['user']['image']=$image;
   

      ?>
      <script type="text/javascript">
      alert('Data Updated Successfully');
      window.location.href='account.php';
      </script>
      <?php
     }
}


  // inserting data
if(isset($_POST["submit"])){
 
   
   $name = $_POST["name"];
   $country = $_POST["country"];
   $city = $_POST["city"];
   $birthday = $_POST["birthday"];
   $linkedin = $_POST["linkedin"];
   $twitter = $_POST["twitter"];
   $pinterest = $_POST["pinterest"];
   $facebook = $_POST["facebook"];


   

   $insert = "UPDATE `admin` SET `id`='$id',`name`='$name',`birthday`='$birthday',`country`='$country',`city`='$city',`linkedin`='$linkedin',`twitter`='$twitter',`pinterest`='$pinterest',`facebook`='$facebook' WHERE `id` = $id";

   $result = mysqli_query($conn, $insert);

   if($result){
      // session_destroy();
      echo "<script>
      setTimeout(function(){
      window.location = 'account.php';
      }, 1000);</script>";

      }

      if(mysqli_query($conn,$insert))
     {
      $_SESSION['user']['name']=$name;
      $_SESSION['user']['birthday']=$birthday;
      $_SESSION['user']['country']=$country;
      $_SESSION['user']['city']=$city;
      $_SESSION['user']['linkedin']=$linkedin;
      $_SESSION['user']['twitter']=$twitter;
      $_SESSION['user']['pinterest']=$pinterest;
      $_SESSION['user']['facebook']=$facebook;

      ?>
      <script type="text/javascript">
      alert('Data Updated Successfully');
      window.location.href='account.php';
      </script>
      <?php
     }
}


?>



 <!-- Bootstrap CSS -->
 <!-- <link rel="stylesheet" href="../css2/bootstrap.min.css"> -->
      <!-- Typography CSS -->
      <link rel="stylesheet" href="../css2/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="../css2/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="../css2/responsive.css">


<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Account</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="color: #0d6EFD;" href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account</li>
        </ol>
        </nav>
    </div>

  
               <div class="row" style="display: flex; justify-content: center; align-items: center;">
              <div class="col-md-6 col-xl-4 grid-margin stretch-card" style="height: 420px;">
                <div class="card" style="border-radius: 20px;">
                <div class="iq-card-body profile-page">
                           <div class="profile-header">
                              <div class="cover-container text-center">
                                 <img src="adminimage/<?php echo $_SESSION['user']['image'];?>" alt="profile-bg" class="img-fluid" width="125" style="border-radius: 12px;">
                                 <div class="profile-detail mt-3">
                                    <h3 class="text-light"><?php echo $_SESSION['user']['name'];?></h3>
                                    <p class="text-primary"><?php echo $_SESSION['user']['email'];?></p>
                                    <p class="text-light"></p>
                                 </div>
                                 <div class="iq-social d-inline-block align-items-center ">
                                    <ul class="list-inline d-flex p-0 mb-0 align-items-center" style="margin-top: 30px;">
                                       <li style="margin-right: 10px; margin-left: 20px;">
                                          <a href="<?php echo $_SESSION['user']['facebook'];?>" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="mdi mdi-facebook" aria-hidden="true"></i></a>
                                       </li>
                                       <li style="margin-right: 10px;">
                                          <a href="<?php echo $_SESSION['user']['twitter'];?>" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="mdi mdi-twitter" aria-hidden="true"></i></a>
                                       </li>
                                       <li style="margin-right: 10px;">
                                          <a href="<?php echo $_SESSION['user']['linkedin'];?>" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i class="mdi mdi-linkedin" aria-hidden="true"></i></a>
                                       </li>
                                       <li style="margin-right: 10px;">
                                          <a href="<?php echo $_SESSION['user']['pinterest'];?>" class="avatar-40 rounded-circle bg-primary pinterest"><i class="mdi mdi-pinterest" aria-hidden="true"></i></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-4 grid-margin stretch-card" style="height: 420px;">
                <div class="card" style="border-radius: 20px;">
                  <div class="card-body">
                        <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Personal Details</h4><br>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <ul class="list-inline p-0 mb-0">
                           <li>
                                 <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="text-light">Name</h6>
                                    <p class="mb-0 text-light" ><?php echo $_SESSION['user']['name'];?></p>
                                 </div>
                              </li>
                              <li>
                                 <div class="d-flex  align-items-center justify-content-between mb-3">
                                    <h6 class="text-light">Birthday</h6>
                                    <p class="mb-0 text-light"><?php echo $_SESSION['user']['birthday'];?></p>
                                 </div>
                              </li>
                              <li>
                                 <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="text-light">Country</h6>
                                    <p class="mb-0 text-light"><?php echo $_SESSION['user']['country'];?></p>
                                 </div>
                              </li>
                              <li>
                                 <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="text-light">City</h6>
                                    <p class="mb-0 text-light"><?php echo $_SESSION['user']['city'];?></p>
                                 </div>
                              </li>
                              <li>
                                 <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="text-light">Phone</h6>
                                    <p class="mb-0 text-light"><?php echo $_SESSION['user']['phone'];?></p>
                                 </div>
                              </li>
                              <li>
                                 <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="text-light">Email</h6>
                                    <p class="mb-0 text-light" ><?php echo $_SESSION['user']['email'];?></p>
                                 </div>
                              </li>
                           
                              
                           </ul>
                        </div>
                  </div>
                </div>
              </div>

          
            </div>

            <br><br>

             <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card" style="background-color: #191c24;">
                        <div class="iq-card-body p-0" >
                           <div class="iq-edit-list">
                              <ul class="iq-edit-profile d-flex nav nav-pills" style="border: none;">
                                 <li class="col-md-4 p-0">
                                    <a class="nav-link active text-light" data-toggle="pill" href="#personal-information">
                                    Personal Information
                                    </a>
                                 </li>
                                 <li class="col-md-4 p-0">
                                    <a class="nav-link text-light" data-toggle="pill" href="#chang-pwd">
                                    Change Password
                                    </a>
                                 </li>
                                 <!-- <li class="col-md-3 p-0">
                                    <a class="nav-link text-light" data-toggle="pill" href="#emailandsms">
                                    Email and SMS
                                    </a>
                                 </li> -->
                                 <li class="col-md-4 p-0">
                                    <a class="nav-link text-light" data-toggle="pill" href="#manage-contact">
                                    Manage Contact
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12" >
                     <div class="iq-edit-list-data">
                        <div class="tab-content" style="border: none;">
                           <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                              <div class="iq-card" style="background-color: #191c24;">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title text-light">Personal Information</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form method="POST" enctype="multipart/form-data" onsubmit="return myFun()" name="upp">
                                    <div class="form-group row align-items-center">
                                          <div class="col-md-2">
                                             <div class="profile-img-edit">
                                                <img class="profile-pic" src="adminimage/<?php echo $_SESSION['user']['image'];?>" alt="profile-pic">
                                                <button type="submit" style="margin-left: 20px; margin-top: 10px;" name="update" class="btn btn-primary mr-2">Update Image</button>

                                                <div class="p-image">
                                                   <i class="mdi mdi-pencil upload-button"></i>
                                                   <input class="file-upload" id="image" type="file" name="image" value="<?php echo $_SESSION['user']['image'];?>">

                                                </div>
                                                
                                             </div>
                                          </div>
                                       
                                       </div>

                                    </form>

                                    <form method="POST" enctype="multipart/form-data">
                                   
                                       <div class=" row align-items-center">
                                          <div class="form-group col-sm-6 ">
                                             <label class="text-light" for="fname">Name:</label>
                                             <input type="text" class="form-control" id="fname" required value="<?php echo $_SESSION['user']['name'];?>" name="name">
                                          </div>
                                          
                                          <div class="form-group col-sm-6">
                                             <label class="text-light" for="uname">Country:</label>
                                             <input type="text" class="form-control" id="uname" value="<?php echo $_SESSION['user']['country'];?>" name="country">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label class="text-light" for="cname">City:</label>
                                             <input type="text" class="form-control" id="cname" value="<?php echo $_SESSION['user']['city'];?>" name="city">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label class="text-light" for="dob">Date Of Birth:</label>
                                             <input  class="form-control" id="dob" value="<?php echo $_SESSION['user']['birthday'];?>" name="birthday">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label class="text-light" for="cname">Linkedin:</label>
                                             <input type="text" class="form-control" id="cname" value="<?php echo $_SESSION['user']['linkedin'];?>" name="linkedin">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label class="text-light" for="cname">Twitter:</label>
                                             <input type="text" class="form-control" id="cname" value="<?php echo $_SESSION['user']['twitter'];?>" name="twitter">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label class="text-light" for="cname">Pinterest:</label>
                                             <input type="text" class="form-control" id="cname" value="<?php echo $_SESSION['user']['pinterest'];?>" name="pinterest">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label class="text-light" for="cname">Facebook:</label>
                                             <input type="text" class="form-control" id="cname" value="<?php echo $_SESSION['user']['facebook'];?>" name="facebook">
                                          </div>
                                        
                                    
                                     
                                       </div>
                                       <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                              <div class="iq-card" style="background-color: #191c24;">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title text-light">Change Password</h4>
                                       <?php if (isset($_GET['error'])) { ?>
                                          <p class="error"><?php echo $_GET['error']; ?></p>
                                       <?php } ?>

                                       <?php if (isset($_GET['success'])) { ?>
                                             <p class="success"><?php echo $_GET['success']; ?></p>
                                       <?php } ?>

                                    </div>
                                 </div>
                                 
                                 <div class="iq-card-body">
                                    <form action="changepass.php" method="post">
                                    <?php
                                    if (isset($_SESSION['user']['id']) && isset($_SESSION['user']['name'])) {
                                    ?>
                                       <div class="form-group">
                                          <label class="text-light" for="cpass">Current Password:</label>
                                          <!-- <a href="javascripe:void();" class="float-right">Forgot Password</a> -->
                                          <input type="Password" class="form-control" id="cpass" value="" name="op">
                                       </div>
                                       <div class="form-group">
                                          <label class="text-light" for="npass">New Password:</label>
                                          <input type="Password" class="form-control" id="npass" value="" name="np">
                                       </div>
                                       <div class="form-group">
                                          <label class="text-light" for="vpass">Verify Password:</label>
                                          <input type="Password" class="form-control" id="vpass" value="" name="c_np">
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                       <?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <!-- <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                              <div class="iq-card" style="background-color: #191c24;">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title text-light">Email and SMS</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form>
                                       <div class="form-group row align-items-center">
                                          <label class="col-8 col-md-3 text-light" for="emailnotification">Email Notification:</label>
                                          <div class="col-4 col-md-9 custom-control custom-switch">
                                             <input type="checkbox" class="custom-control-input" id="emailnotification" checked="">
                                             <label class="custom-control-label" for="emailnotification"></label>
                                          </div>
                                       </div>
                                       <div class="form-group row align-items-center">
                                          <label class="col-8 col-md-3 text-light" for="smsnotification">SMS Notification:</label>
                                          <div class="col-4 col-md-9 custom-control custom-switch">
                                             <input type="checkbox" class="custom-control-input" id="smsnotification" checked="">
                                             <label class="custom-control-label" for="smsnotification"></label>
                                          </div>
                                       </div>
                                       <div class="form-group row align-items-center">
                                          <label class="col-md-3 text-light" for="npass">When To Email</label>
                                          <div class="col-md-9">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email01">
                                                <label class="custom-control-label text-light" for="email01">You have new notifications.</label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email02">
                                                <label class="custom-control-label text-light" for="email02">You're sent a direct message</label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                                <label class="custom-control-label text-light" for="email03">Someone adds you as a connection</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group row align-items-center">
                                          <label class="col-md-3 text-light" for="npass">When To Escalate Emails</label>
                                          <div class="col-md-9">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email04">
                                                <label class="custom-control-label text-light" for="email04"> Upon new order.</label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email05">
                                                <label class="custom-control-label text-light" for="email05"> New membership approval</label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email06" checked="">
                                                <label class="custom-control-label text-light" for="email06"> Member registration</label>
                                             </div>
                                          </div>
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                    </form>
                                 </div>
                              </div>
                           </div> -->
                           <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                              <div class="iq-card" style="background-color: #191c24;">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title text-light">Manage Contact</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form method="POST">
                                       <div class="form-group">
                                          <label class="text-light" for="cno">Contact Number:</label>
                                          <input type="text" class="form-control" id="cno" value="<?php echo $_SESSION['user']['phone'];?>" name="phone">
                                       </div>
                                       <div class="form-group">
                                          <label class="text-light" for="email">Email:</label>
                                          <input type="text" class="form-control" id="email" value="<?php echo $_SESSION['user']['email'];?>" name="email">
                                       </div>
                                       <button type="submit" name="contact" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

    
   

               <div style="display: none;">

<?php

$target_dir = "adminimage/";
$target_files = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFiletype = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));

// Check if image file is a actual image file or not

if(isset($_POST["submit"])){
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false){
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image";
    $uploadOk =0;
}
}
if($uploadOk == 0){
echo "Sorry, your file was not uploaded";
} else {
if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_files))
{
    echo "The file" . htmlspecialchars( basename($_FILES["image"]["name"])). "has been uploaded";
}
else{
    echo "Sorry, your file was not uploaded";
}
}


?>

            </div>



<?php
include "../headerandfooter/footer.php"
?>



    <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <!-- Appear J../avaScript -->
      <script src="../js/jquery.appear.js"></script>
      <!-- Countdow../n JavaScript -->
      <script src="../js/countdown.min.js"></script>
      <!-- Counteru../p JavaScript -->
      <script src="../js/waypoints.min.js"></script>
      <script src="../js/jquery.counterup.min.js"></script>
      <!-- Wow Java../Script -->
      <script src="../js/wow.min.js"></script>
      <!-- Apexchar../ts JavaScript -->
      <script src="../js/apexcharts.js"></script>
      <!-- Slick Ja../vaScript -->
      <script src="../js/slick.min.js"></script>
      <!-- Select2 ../JavaScript -->
      <script src="../js/select2.min.js"></script>
      <!-- Owl Caro../usel JavaScript -->
      <script src="../js/owl.carousel.min.js"></script>
      <!-- Magnific../ Popup JavaScript -->
      <script src="../js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth S../crollbar JavaScript -->
      <script src="../js/smooth-scrollbar.js"></script>
     ../
      <!-- am core JavaScript -->
      <script src="../js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="../js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="../js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="../js/kelly.js"></script>
      <!-- am maps JavaScript -->
      <script src="../js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="../js/worldLow.js"></script>
      <!-- Style Customizer -->
      <script src="../js/style-customizer.js"></script>
      <script src="../js/chart-custom.js"></script>
      <!-- music js -->
      <script src="../js/music-player.js"></script>
      <!-- music-player js -->
      <script src="../js/music-player-dashboard.js"></script>
      <!-- Custom JavaScript -->
      <script src="../js/custom.js"></script>



   <script>

    function myFun() {
    
      var x = document.forms["upp"]["image"].value;
      
      if (x == "") {
         alert("Please Insert Image");
         return false;
      }
}
  
  </script>


  