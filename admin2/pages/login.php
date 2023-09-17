<?php
session_start();
include "config.php";

//Getting Input value
if(isset($_POST['login'])){
    $name = $conn->real_escape_string($_POST['name']);
    $password = $conn->real_escape_string(md5($_POST['password']));


  if(empty($name) && empty($password)){
  $error= 'Fileds are Mandatory';
  }else{

 //Checking Login Detail

 $result=mysqli_query($conn,"SELECT*FROM `admin` WHERE name='$name' AND password='$password'");

 $row=mysqli_fetch_assoc($result);

 $count=mysqli_num_rows($result);

 if($count==1){
       $_SESSION['user']=array(
   'id'=>$row['id'],
   'name'=>$row['name'],
   'email'=>$row['email'],
   'password'=>$row['password'],
   'role'=>$row['role'],
   'birthday'=>$row['birthday'],
   'phone'=>$row['phone'],
   'image'=>$row['image'],
   'country'=>$row['country'],
   'city'=>$row['city'],
   'linkedin'=>$row['linkedin'],
   'twitter'=>$row['twitter'],
   'facebook'=>$row['facebook'],
   'pinterest'=>$row['pinterest'],


   );
   $role=$_SESSION['user']['role'];
   //Redirecting User Based on Role
    switch($role){
  case "admin":
  header('location:dashboard.php');
  break;
 }
   //Redirecting User Based on Role
 
 }else{
 $error='<p class="mt-4 text-sm text-center text-danger">Your PassWord or Name is not Found</p>';
 }
}
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth" style="background-image: url(../images/signinbanner2.jpg); background-size: cover;">
            
          <div class="card col-lg-4 mx-auto" style="border-radius: 10px;">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form method="POST">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control p_input text-white" name="name">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input text-white" name="password">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>

                  <?php if (isset($errorMsg)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <?php echo $errorMsg; ?>
                    </div>
                  <?php } ?>

                  <?php if(isset($error)){ echo $error; }?>


              
                  <p class="sign-up">Don't have an Account?<a href="register.php"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>