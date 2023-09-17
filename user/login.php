<?php
session_start();
include "../admin2/pages/config.php";

//Getting Input value
if(isset($_POST['login'])){
   $name = $conn->real_escape_string($_POST['name']);
   $password = $conn->real_escape_string(md5($_POST['password']));



  if(empty($name) && empty($password)){
  $error= 'Fileds are Mandatory <br>';
  }else{

 //Checking Login Detail

 $result=mysqli_query($conn, "SELECT*FROM `admin` WHERE `name`='$name' AND `password`='$password'");

 $row=mysqli_fetch_assoc($result);

 $count=mysqli_num_rows($result);

 if($count==1){
       $_SESSION['user']=array(
   'id'=>$row['id'],
   'name'=>$row['name'],
   'email'=>$row['email'],
   'role'=>$row['role'],
   'password'=>$row['password'],
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
   $rolee=$_SESSION['user']['role'];
   //Redirecting User Based on Role
    switch($rolee){
  case "user":
  header('location:home.php');
  break;
 }
   //Redirecting User Based on Role
 
 }else{
 $errorMSG='<p class="mt-4 text-sm text-center text-danger">Your PassWord or Name is not Found<br></p>';
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
                        <div class="sign-in-from w-100 pt-5 m-auto">
                           <h1 class="mb-3 text-center text-light">Sign in</h1>
                           <form class="mt-4" method="POST">
                              <div class="form-group">
                                 <label for="exampleInputEmail2" class="text-light">Name</label>
                                 <input type="text" class="form-control mb-0 text-light" id="exampleInputEmail2" placeholder="Enter Name" name="name">
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputPassword2" class="text-light">Password</label>
                                 <input type="password" class="form-control mb-0 text-light" id="exampleInputPassword2" placeholder="Password" name="password">
                              </div>
                              <div class="sign-info">
                                 <button type="submit" name="login" class="btn btn-danger mb-2">Sign in</button>
                                 <div class="d-flex justify-content-center links">
                                    <a href="#" class="text-danger">Forgot your password?</a>
                                 </div><br>
                                 <?php if (isset($error)) { ?>
                                 <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?php echo $error; ?>
                                 </div>
                                 <?php } ?>

                                 <?php if(isset($errorMSG)){ echo $errorMSG; }?>

                                 <span class="dark-color d-block line-height- text-light">Don't have an account? <a class="text-danger" href="register.php">Sign up</a></span>
                              </div>
                           
                           </form>
                        </div>
                     </div>
                     <div class="mt-2">
                        <div class="d-flex justify-content-center links">
                           <!-- Don't have an account? <a href="sign-up.html" class="ml-2">Sign Up</a> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Sign in END -->
            <!-- color-customizer -->
         </div>
      </section>
    
</body>
</html>

