<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "header-footer/header.php";

include "../admin2/pages/config.php";


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
    window.location.href='setting.php';
    </script>
    <?php
   }
}




if(isset($_POST["update"])){
 $image = $_FILES["image"]["name"];
 $tempname = $_FILES["image"]["tmp_name"];
 $folder = "../admin2/pages/adminimage/" . $image;


 

 $insert = "UPDATE `admin` SET `id`='$id',`image`='$image' WHERE `id` = $id";

 $result = mysqli_query($conn, $insert);

 if($result){
    // session_destroy();
    echo "<script>
    setTimeout(function(){
    window.location = 'setting.php';
    }, 1000);</script>";

    }

    if(mysqli_query($conn,$insert))
   {
    $_SESSION['user']['image']=$image;
 

    ?>
    <script type="text/javascript">
    alert('Data Updated Successfully');
    window.location.href='setting.php';
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
    window.location = 'setting.php';
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
    window.location.href='setting.php';
    </script>
    <?php
   }
}
?>


 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../admin2/css2/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="../admin2/css2/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="../admin2/css2/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="../admin2/css2/responsive.css">

    <link rel="stylesheet" href="css/textanimation.css">

<div class="container">


   
<div class="container-fluid" style="margin-top: 150px;">
                
                <link href="https://fonts.googleapis.com/css?family=Teko:700&display=swap" rel="stylesheet">
                
                <h1 class="h111"><span class='one'>s</span><span class='two'>e</span><span class='three'>tt</span><span class='four'>i</span><span class='five'>n</span><span class='six'>g</span></h1>
               </div>   
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
                                                <img class="profile-pic" src="../admin2/pages/adminimage/<?php echo $_SESSION['user']['image'];?>" alt="profile-pic">
                                                <button type="submit" style="margin-left: 20px; margin-top: 10px; background-color: #ff4545; border-radius: 15px; border: none; margin-bottom: 10px; height: 50px; font-size: 15px;" name="update" class="text-light mr-2">Update Image</button>

                                                <div class="p-image">
                                                   <i class="fas fa-pencil upload-button"></i>
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
                                       <button type="submit" name="submit" style="background-color: #ff4545; border-radius: 15px; border: none;" class="text-light mr-2">Submit</button>
                                       <button type="reset" class="text-dark" style="background-color: #fff; border-radius: 15px; border: none;">Cancel</button>
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
                                    <form method="post">
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
                                       <button type="submit" style="background-color: #ff4545; border-radius: 15px; border: none;" class="mr-2">Submit</button>
                                       <button type="reset" style="background-color: #fff; border-radius: 15px; border: none;" class="text-dark">Cancel</button>
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
                        <div class="tab-pane fade" id="emailandsms" role="tabpanel">
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
                                       <button type="submit" class=" mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                    </form>
                                </div>
                              </div>
                           </div>
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
                                       <button type="submit" name="contact" style="background-color: #ff4545; border-radius: 15px; border: none;" class="text-light mr-2">Submit</button>
                                       <button type="reset" style="background-color: #fff; border-radius: 15px; border: none;" class="text-dark">Cancel</button>
                                    </form>
                                </div>
                            </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </div>


<br><br><br>
            
            <div style="display: none;">

<?php

$target_dir = "../admin2/pages/adminimage/";
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
               include "header-footer/footer.php"
               ?>




    <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="../admin2/js/jquery.min.js"></script>
      <script src="../admin2/js/popper.min.js"></script>
      <script src="../admin2/js/bootstrap.min.js"></script>
      <!-- Appear J../avaScript -->
      <script src="../admin2/js/jquery.appear.js"></script>
      <!-- Countdow../n JavaScript -->
      <script src="../admin2/js/countdown.min.js"></script>
      <!-- Counteru../p JavaScript -->
      <script src="../admin2/js/waypoints.min.js"></script>
      <script src="../admin2/js/jquery.counterup.min.js"></script>
      <!-- Wow Java../Script -->
      <script src="../admin2/js/wow.min.js"></script>
      <!-- Apexchar../ts JavaScript -->
      <script src="../admin2/js/apexcharts.js"></script>
      <!-- Slick Ja../vaScript -->
      <script src="../admin2/js/slick.min.js"></script>
      <!-- Select2 ../JavaScript -->
      <script src="../admin2/js/select2.min.js"></script>
      <!-- Owl Caro../usel JavaScript -->
      <script src="../admin2/js/owl.carousel.min.js"></script>
      <!-- Magnific../ Popup JavaScript -->
      <script src="../admin2/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth S../crollbar JavaScript -->
      <script src="../admin2/js/smooth-scrollbar.js"></script>
      <!-- am core JavaScript -->
      <script src="../admin2/js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="../admin2/js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="../admin2/js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="../admin2/js/kelly.js"></script>
      <!-- am maps JavaScript -->
      <script src="../admin2/js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="../admin2/js/worldLow.js"></script>
      <!-- Style Customizer -->
      <script src="../admin2/js/style-customizer.js"></script>
      <script src="../admin2/js/chart-custom.js"></script>
      <!-- music js -->
      <script src="../admin2/js/music-player.js"></script>
      <!-- music-player js -->
      <script src="../admin2/js/music-player-dashboard.js"></script>
      <!-- Custom JavaScript -->
      <script src="../admin2/js/custom.js"></script>



   <script>

    function myFun() {
    
      var x = document.forms["upp"]["image"].value;
      
      if (x == "") {
         alert("Please Insert Image");
         return false;
      }
}
  
  </script>

