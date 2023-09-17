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
        window.location = "genre.php";
        }, 500);
    </script>';
 // redirect with javascript



if(isset($_POST["update"])) {
    $id = $_POST["id"];
    $genre = $_POST["genre"];

    
    $update = "UPDATE `genres` SET `id`='$id',`genre`='$genre' WHERE `id`=$id";

    $update_run = mysqli_query($conn, $update);
    if($update_run){
        echo "$redirect";
    }
}




if (isset($_GET["id"])) { 
    $idget = $_GET["id"];
    $select = "SELECT * FROM `genres` WHERE `id` = $idget";

    $select_run = mysqli_query($conn, $select);

    if ($select_run) { 
        while ($row = mysqli_fetch_assoc($select_run)){
            $id = $row["id"];
            $genre = $row["genre"];
      
        }
    } else {
        echo "Error";
    }

?>


<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Update Genre</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="genre.php">Genres</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Genre</li>
        </ol>
        </nav>
    </div>

    
    <div class="col-12 grid-margin">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title">Update Genre</h4>
    <form class="form-sample" method="POST">
            
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
                <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                <div class="col-sm-12">
                  <input type="text" class="form-control text-secondary" placeholder="Genre Name" value="<?php echo $genre ?>" name="genre" />
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