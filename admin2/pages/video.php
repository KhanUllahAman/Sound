<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "config.php";

include "../headerandfooter/headerandsidebar.php";

$select = "SELECT * FROM video";

$select_run = mysqli_query($conn, $select);



?>



<div class="main-panel">
    <div class="content-wrapper">


    <div class="page-header">
        <h3 class="page-title">Videos</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Videos</li>
        </ol>
        </nav>
    </div>

    <div style="display: flex; justify-content: center; align-items: center;">
      <a href="addvideo.php">
        <button type="button" style="width: 250px;" class="btn bg-dark btn-lg">Add a new Video</button>
      </a>
    </div>


    <div class="row">
    <?php $i = 1;
                     while ($row = mysqli_fetch_assoc($select_run)) { ?>

    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-orient:vertical; overflow: hidden;">

    
              
        <div class="card mt-5" >
            <video src="videofile/<?php echo $row["video"] ?>" width="330" height="180" loop controls></video>
            <div class="card-body">
                <h3 class="text-center"><?php echo $row["title"] ?></h3>
                <p class="text-xs font-weight-bold mb-0 d-inline-block text-truncate" style="max-width: 200px"><br> <?php echo $row["description"] ?></p>

                
                <p class="card-title"><br> Releasing On: <?php echo $row["date"] ?> </p>
                <p class="card-title">Artist: <?php echo $row["artist"] ?> </p>
                <p class="card-title">Genre: <?php echo $row["genre"] ?> </p>
                <p class="card-title">Language: <?php echo $row["language"] ?> </p>

                <a href="updatevideo.php?id=<?php echo $row["id"] ?>" class="btn btn-primary"><i class="mdi mdi-border-color"></i>Update</a>
                <a href="deletevideo.php?id=<?php echo $row["id"] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i>Delete</a>

            </div>
        </div>

    </div>
    
<?php $i++;
  } ?>
       
    </div>



<?php
include "../headerandfooter/footer.php"
?>
