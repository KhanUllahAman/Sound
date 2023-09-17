<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}
include "config.php";
include "../headerandfooter/headerandsidebar.php";

 // redirect with javascript
 $redirect = 
    '<script>
        setTimeout(function(){
        window.location = "employee.php";
        }, 500);
    </script>';
 // redirect with javascript



if(isset($_POST["update"])) {
    $id = $_POST["id"];

    $name = $_POST["name"];
    $employee = $_POST["employee"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $birthday = $_POST["birthday"];
    $country = $_POST["country"];
    $city = $_POST["city"];

    
    $update = "UPDATE `admin` SET `id`='$id', `name`='$name', `email`='$email', `phone`='$phone', `birthday`='$birthday', `country`='$country', `city`='$city' WHERE `id`=$id";

    $update_run = mysqli_query($conn, $update);
    if($update_run){
        echo "$redirect";
    }
}




if (isset($_GET["id"])) { 
    $idget = $_GET["id"];
    $select = "SELECT * FROM `admin` WHERE `id` = $idget";

    $select_run = mysqli_query($conn, $select);

    if ($select_run) { 
        while ($row = mysqli_fetch_assoc($select_run)){
            $id = $row["id"];
            $employee = $row["employee"];
            $name = $row["name"];
            $email = $row["email"];
            $phone = $row["phone"];
            $birthday = $row["birthday"];
            $country = $row["country"];
            $city = $row["city"];


      
        }
    } else {
        echo "Error";
    }

?>

<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Update Employee</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Employee</li>
        </ol>
        </nav>
    </div>





    <div class="col-12 grid-margin">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title">Update Banner</h4>
    <form class="form-sample" method="POST" enctype="multipart/form-data">
            
    <div class="row" style="display: flex; justify-content: center; align-items: center;">
    <div class="col-md-6" >
      <div class="form-group row">
    <!-- <label class="col-sm-3 col-form-label">ID</label> -->
      <div class="col-sm-12">
          <input type="hidden" class="form-control text-secondary" name="id" value="<?php echo $id ?>" >
      </div>
    </div>
    </div>
    </div>


    <div class="row" style="display: flex; justify-content: center; align-items: center;">       

        <div class="col-md-6">
            <div class="form-group row">
                <!-- <label class="col-sm-3 col-form-label">type Yes in first field</label> -->
                <div class="col-sm-12">
                  <input hidden type="text" class="form-control text-secondary" placeholder="Employee" value="yes" name="employee" />
                </div>
            </div>
        </div>      
    </div>

    <div class="row" style="display: flex; justify-content: center; align-items: center;">       
        
    <div class="col-md-6">
            <div class="form-group row">
                <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                <div class="col-sm-12">
                <input type="text" class="form-control text-secondary" placeholder="Name" value="<?php echo $name ?>" name="name" />
                </div>
            </div>
        </div>      
    </div>

    
    <div class="row" style="display: flex; justify-content: center; align-items: center;">       

        <div class="col-md-6">
            <div class="form-group row">
                <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                <div class="col-sm-12">
                  <input type="text" class="form-control text-secondary" placeholder="Email" value="<?php echo $email ?>" name="email" />
                </div>
            </div>
        </div>      
    </div>

    
    <div class="row" style="display: flex; justify-content: center; align-items: center;">       

        <div class="col-md-6">
            <div class="form-group row">
                <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                <div class="col-sm-12">
                  <input type="text" class="form-control text-secondary" placeholder="Phone" value="<?php echo $phone ?>" name="phone" />
                </div>
            </div>
        </div>      
    </div>

    
    <div class="row" style="display: flex; justify-content: center; align-items: center;">       

        <div class="col-md-6">
            <div class="form-group row">
                <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                <div class="col-sm-12">
                  <input type="text" class="form-control text-secondary" placeholder="Birthday" value="<?php echo $birthday ?>" name="birthday" />
                </div>
            </div>
        </div>      
    </div>

    <div class="row" style="display: flex; justify-content: center; align-items: center;">       

        <div class="col-md-6">
            <div class="form-group row">
                <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                <div class="col-sm-12">
                  <input type="text" class="form-control text-secondary" placeholder="Country" value="<?php echo $country ?>" name="country" />
                </div>
            </div>
        </div>      
    </div>

    <div class="row" style="display: flex; justify-content: center; align-items: center;">       

        <div class="col-md-6">
            <div class="form-group row">
                <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                <div class="col-sm-12">
                  <input type="text" class="form-control text-secondary" placeholder="City" value="<?php echo $city ?>" name="city" />
                </div>
            </div>
        </div>      
    </div>






  
    <div class="text-center mt-3">
        <input class="btn btn-inverse-primary btn-lg" type="submit" value="Update" name="update">
    </div>
    </form>
    </div>
    </div>
    </div>











<?php
} else {
    echo "";
 } ?>




<?php
include "../headerandfooter/footer.php"
?>