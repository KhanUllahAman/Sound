<?php
include "config.php";

if (isset($_POST['submit'])) {
  $role = $conn->real_escape_string($_POST['role']);
  $name     = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string(md5($_POST['password']));

  $query  = "INSERT INTO `admin`(`role`,`name`, `email`, `password`) VALUES ('$role','$name','$email','$password')";
  $result = $conn->query($query);

  if ($result==true) {
    header("Location:login.php");
    die();
  }else{
    $errorMsg  = "You are not Registred..Please Try again";
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
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
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
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="POST">
                <div class="form-group">
                    <!-- <label>role</label> -->
                    <input type="hidden" class="form-control p_input text-white" value="admin" name="role">
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control p_input text-white" name="name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input text-white" name="email">
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
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">create Account</button>
                    <!-- <input class="btn btn-primary btn-lg btn-block enter-btn" type="submit" name="submit" value="create Account"> -->

                  </div>

                  <?php if (isset($errorMsg)) { ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $errorMsg; ?>
                  </div>
                  <?php } ?>

                  <p class="sign-up text-center">Already have an Account?<a href="login.php"> Sign In</a></p>
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