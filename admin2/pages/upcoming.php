<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "config.php";

include "../headerandfooter/headerandsidebar.php";



if(isset($_POST["submit"])){
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "upcomingsongs/" . $image;

    $date = $_POST["date"];


    

    $insert = "INSERT INTO `upcoming`(`image`, `date`) VALUES ('$image','$date')";

    $result = mysqli_query($conn, $insert);
    if($result){
        echo "<script>
        setTimeout(function(){
        window.location = 'upcoming.php';
        }, 1000);</script>";
        }

}

$select = "SELECT * FROM upcoming";

$select_run = mysqli_query($conn, $select);



?>


<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Upcoming Songs</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">upcoming Songs</li>
        </ol>
        </nav>
    </div>

    <div style="display: flex; justify-content: center; align-items: center;">
      <a href="#">
        <button type="button" style="width: 250px;" class="btn bg-dark btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Upcoming Song</button>
      </a>
    </div>



    <div class="row">
            <?php $i = 1;
             while ($row = mysqli_fetch_assoc($select_run)) { ?>

        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-orient:vertical; overflow: hidden;">
        <div class="card mt-5" >
            <img src="../pages/upcomingsongs/<?php echo $row["image"] ?>" class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h5 class="card-title">Releasing On: <?php echo $row["date"] ?></h5>
                
                <a href="updateupcoming.php?id=<?php echo $row["id"] ?>" class="btn btn-primary"><i class="mdi mdi-border-color"></i>Update</a>
                <a href="deleteupcoming.php?id=<?php echo $row["id"] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>Delete</a>

            </div>
        </div>
        </div>

        <?php $i++;
        } ?>
                 




                    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Upcoming Song</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                <form method="POST" enctype="multipart/form-data">

                <div class="row">
                    <h3 class="mb-4">Upcoming Song</h3>
                    <div class="col-12">
                    <input type="file" class="form-control text-secondary" name="image" required>
                        <small id="emailHelp" class="form-text text-muted">Image</small>
                    </div>
                    <div class="col-12">
                        <br>
                    <input type="date" class="form-control text-light" id="date_picker" name="date" onkeydown="return false">
                        <small id="emailHelp" class="form-text text-muted">Release Date</small>
                    </div>

                <div class="text-center mt-3">
                    <input class="btn btn-md btn-primary" type="submit" value="Submit" name="submit">
                    <div style="visibility: hidden;">
                    <p>_</p>
                    </div>
                </div>

                </form>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            

    </div>

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
include "../headerandfooter/footer.php";
?>


<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);
</script>