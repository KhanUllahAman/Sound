<?php
include "../admin2/pages/config.php";




if (isset($_POST['submit'])){
  $name     = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string(md5($_POST['password']));
  $role = $conn->real_escape_string($_POST['role']);

   // $exists=false;

   // Check whether this username exists
   $existSql = "SELECT * FROM `admin` WHERE `name` = '$name'";
   $result = mysqli_query($conn, $existSql);
   $numExistRows = mysqli_num_rows($result);
   if($numExistRows > 0){
      //  $exists = true;
       $showError = "Username Already Exists";
   }
   else{
       // $exists = false; 
       $query  = "INSERT INTO `admin`(`name`, `email`, `password`, `role`) VALUES ('$name','$email','$password','$role')";
       $result = $conn->query($query);
       if ($result==true) {
         header("Location:login.php");
         die();
       }else{
         $errorMsg  = "You are not Registred..Please Try again";
       }  
   }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/typography.css"> 
   <!-- Style CSS -->
   <link rel="stylesheet" href="css/style3.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
    <section class="sign-in-page" style="background-image: url(images/login.jpg);">
             <div class="container">
                <div class="row justify-content-center align-items-center height-self-center">
                   <div class="col-md-6 col-sm-12 col-12 align-self-center">
                      <div class="sign-user_card ">
                         <div class="d-flex justify-content-center">
                            <div class="sign-user_logo">
                               <img src="images/demouser.jpg" class=" img-fluid" alt="Logo">
                            </div>
                         </div>
                         <div class="sign-in-page-data">
                            <div class="sign-in-from w-100 m-auto pt-5">
                               <h1 class="mb-3 text-center text-light">Sign Up</h1>
                               <form class="mt-4" method="POST">
                                 
                                 <div class="form-group">
                                     <!-- <label for="exampleInputEmail2" class="text-light">User Role</label> -->
                                     <input type="hidden" class="form-control mb-0 text-light" value="user" name="role">
                                  </div>

                                  <div class="form-group">
                                     <label for="exampleInputEmail2" class="text-light">Your Full Name</label>
                                     <input type="name" class="form-control mb-0 text-light" id="exampleInputEmail2" placeholder="Your Full Name" name="name">
                                  </div>
                                  <div class="form-group">
                                     <label for="exampleInputEmail3" class="text-light">Email address</label>
                                     <input type="email" class="form-control mb-0 text-light" id="exampleInputEmail3" placeholder="Enter email" name="email">
                                  </div>
                                  <div class="form-group">
                                     <label for="exampleInputPassword2" class="text-light">Password</label>
                                     <input type="password" class="form-control mb-0 text-light" id="exampleInputPassword2" placeholder="Password" name="password">
                                  </div>
                               
                                  <div class="sign-info mt-3">
                                     <button type="submit" name="submit" class="btn btn-danger mb-2">Sign Up</button>
                                     <?php
                                       if(isset($showError)){
                                       echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <strong>Error!</strong> '. $showError.'
                                          
                                       </div> ';
                                       }
                                    ?>
                                     <span class="d-block line-height-2 text-light"><br> Already Have Account ? <a class="text-danger" href="login.php">Log In</a></span>
                                  </div>
                               </form>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>
    
</body>
</html>

