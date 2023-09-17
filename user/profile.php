<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "header-footer/header.php";

include "../admin2/pages/config.php";


$id = $_SESSION['user']['id'];




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



 
    <div class="container-fluid" style="margin-top: 150px; margin-bottom: -50px;">
                
                <link href="https://fonts.googleapis.com/css?family=Teko:700&display=swap" rel="stylesheet">
                
                <h1 class="h111"><span class='one'>p</span><span class='two'>r</span><span class='three'>o</span><span class='four'>f</span><span class='five'>i</span><span class='six'>le</span></h1>
               </div>  
    <div class="container-fluid" >

    <div class="row" style="display: flex; justify-content: center; align-items: center;">

        <div class="col-md-6 col-xl-4 grid-margin stretch-card" style="height: 420px;">
            <div class="card" style="border-radius: 20px;">
                <div class="iq-card-body profile-page" style="border-radius: 18px; background-color: #0d0f0f;">
                    <div class="profile-header">
                        <div class="cover-container text-center">
                            <img src="../admin2/pages/adminimage/<?php echo $_SESSION['user']['image'];?>" alt="profile-bg" class="img-fluid" width="125" style="border-radius: 12px;">
                            <div class="profile-detail mt-3">
                                <h3 class="text-light"><?php echo $_SESSION['user']['name'];?></h3>
                                <p class="text-light"><?php echo $_SESSION['user']['email'];?></p>
                                <p class="text-light"></p>
                            </div>
                                <!-- <div class="iq-social d-inline-block align-items-center ">
                                    <ul class="list-inline d-flex p-0 mb-0 align-items-center" style="margin-top: 30px;">
                                        <li style="margin-right: 10px; margin-left: 20px;">
                                            <a href="<?php echo $_SESSION['user']['facebook'];?>" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="mdi mdi-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li style="margin-right: 10px;">
                                        <a href="<?php echo $_SESSION['user']['twitter'];?>" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fas fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li style="margin-right: 10px;">
                                        <a href="<?php echo $_SESSION['user']['linkedin'];?>" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i class="fas fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                    <li style="margin-right: 10px;">
                                        <a href="<?php echo $_SESSION['user']['pinterest'];?>" class="avatar-40 rounded-circle bg-primary pinterest"><i class="fas fa-pinterest" aria-hidden="true"></i></a>
                                    </li>
                                    </ul>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
        <div class="row" style="display: flex; justify-content: center; align-items: center; margin-top: -100px;">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 grid-margin stretch-card" style="height: 420px; width: 100%;" >
                <div class="card" style="border-radius: 20px;" >
                  <div class="card-body"  style="border-radius: 18px; background-color: #0d0f0f;">
                        <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                            <div class="iq-header-title">
                              <h4 class="card-title text-light mb-0">Personal Details</h4><br>
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
                                <!-- <li>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="text-light">Email</h6>
                                        <p class="mb-0 text-light" ><?php echo $_SESSION['user']['email'];?></p>
                                    </div>
                                </li>
                           
                                <li>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="text-light">Pinterest</h6>
                                        <a href="<?php echo $_SESSION['user']['linkedin'];?>"><p class="mb-0 text-light" ><?php echo $_SESSION['user']['pinterest'];?></p></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="text-light">Linkedin</h6>
                                       <a href="<?php echo $_SESSION['user']['linkedin'];?>"><p class="mb-0 text-light" ><?php echo $_SESSION['user']['linkedin'];?></p></a> 
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="text-light">Twitter</h6>
                                       <a href="<?php echo $_SESSION['user']['twitter'];?>"><p class="mb-0 text-light" ><?php echo $_SESSION['user']['twitter'];?></p></a> 
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="text-light">Facebook</h6>
                                       <a href="<?php echo $_SESSION['user']['facebook'];?>"><p class="mb-0 text-light" ><?php echo $_SESSION['user']['facebook'];?></p></a> 
                                    </div>
                                </li> -->

                            </ul>
                        </div>
                  </div>
                </div>
            </div>
            
            
        </div>
    </div>

    <br><br><br><br>


    <?php
    include "header-footer/footer.php";
    ?>