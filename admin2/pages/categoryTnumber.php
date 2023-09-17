<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "config.php";
include "../headerandfooter/headerandsidebar.php";


?>

<div class="main-panel">
    <div class="content-wrapper">

    

<div>
<?php 

    echo "1st Method <br><br>";

    $query = mysqli_query($conn, "SELECT Count(*) as num FROM songs where genre = 'jazz'");
    while ($row = mysqli_fetch_array($query)) {
    echo 'jazz = '.$row['num'].'<br>';
    }

    $query = mysqli_query($conn, "SELECT Count(*) as tot FROM songs where genre = 'pop music'");
    while ($row = mysqli_fetch_array($query)) {
    echo 'pop music = '.$row['tot'].'<br>';
    }   

    $query = mysqli_query($conn, "SELECT Count(*) as det FROM songs where genre = 'rock'");
    while ($row = mysqli_fetch_array($query)) {
    echo 'rock = '.$row['det'].'<br><br><br>';
    }
    

    echo "2nd Method <br><br>";

    $query = mysqli_query($conn, "SELECT genre, COUNT(*) as num FROM songs where genre in ( 'rock', 'pop music', 'jazz') group by genre");
    while ($row = mysqli_fetch_array($query)) {
   echo $row['genre'] . ' = '.$row['num'].'<br>';
 }
?>

</div>



<div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2 ">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/images/faces/face15.jpg" alt="profile_image" style="border-radius: 10px;">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?php echo $_SESSION['user']['name'];?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
              <?php echo $_SESSION['user']['email'];?>
              </p>
            </div>
          </div>
     
        </div>
        <div class="row">
          <div class="row">
           
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <hr class="gray-light">
                  <ul class="list-group">
                    <li style="background-color: #191C24;" class="list-group-item border-0 ps-0 pt-0 text-sm text-light">Full Name: &nbsp; <?php echo $_SESSION['user']['name'];?></li>
                    <li style="background-color: #191C24;" class="list-group-item border-0 ps-0 text-sm text-light">Mobile: &nbsp; (44) 123 1234 123</li>
                    <li style="background-color: #191C24;" class="list-group-item border-0 ps-0 text-sm text-light">Email: &nbsp; <?php echo $_SESSION['user']['email'];?></li>
                    <li style="background-color: #191C24;" class="list-group-item border-0 ps-0 text-sm text-light">Location: &nbsp; USA</li>
                    <li style="background-color: #191C24;" class="list-group-item border-0 ps-0 pb-0 text-light">
                      Social: &nbsp;
                      <a style="color: #3b5998;" class=" btn-social-icon btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="https://www.facebook.com/">
                        <i class="mdi mdi-facebook fa-lg"></i>
                      </a>
                      <a class="btn-social-icon btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="https://www.twitter.com/">
                        <i class="mdi mdi-twitter fa-lg"></i>
                      </a>
                      <a class="btn-social-icon btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="https://www.linkedin.com/">
                        <i class="mdi mdi-linkedin fa-lg"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-12 col-xl-4">
               
            </div>

        
          </div>
        </div>
      </div>
    </div>





<?php
include "../headerandfooter/footer.php";
?>