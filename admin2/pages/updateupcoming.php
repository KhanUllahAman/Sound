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
        window.location = "upcoming.php";
        }, 500);
    </script>';
 // redirect with javascript



if(isset($_POST["update"])) {
    $id = $_POST["id"];
    $image = $_POST["image"];
    $date = $_POST["date"];

    
    $update = "UPDATE `upcoming` SET `id`='$id',`image`='$image',`date`='$date' WHERE `id`=$id";

    $update_run = mysqli_query($conn, $update);
    if($update_run){
        echo "$redirect";
    }
}




if (isset($_GET["id"])) { 
    $idget = $_GET["id"];
    $select = "SELECT * FROM `upcoming` WHERE `id` = $idget";

    $select_run = mysqli_query($conn, $select);

    if ($select_run) { 
        while ($row = mysqli_fetch_assoc($select_run)){
            $id = $row["id"];
            $image = $row["image"];
            $date = $row["date"];
      
        }
    } else {
        echo "Error";
    }

?>


<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Update Upcoming Songs</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Upcoming Songs</li>
        </ol>
        </nav>
    </div>

    
    <div class="col-12 grid-margin">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title">Update Artist</h4>
    <form class="form-sample" method="POST">
            
    <div class="row" style="display: flex; justify-content: center; align-items: center;">
    <div class="col-md-6" >
      <div class="form-group row">
    <!-- <label class="col-sm-3 col-form-label">ID</label> -->
      <div class="col-sm-12">
          <input type="hidden" class="form-control text-secondary" name="id" value="<?php echo $id ?>">
      </div>
    </div>
    </div>
    </div>

    <div class="row" style="display: flex; justify-content: center; align-items: center;">       
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-12">
                <input type="file" class="form-control text-secondary" name="image" required  value="<?php echo $image ?>">
            </div>
            </div>        

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Releasing Date</label>
                <div class="col-sm-12">
                <input type="date" class="form-control text-light" id="date_picker" name="date" onkeydown="return false" value="<?php echo $date ?>">
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




<div style="display: none;">


<?php

$target_dir = "upcomingsongs/";
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

<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);
</script>