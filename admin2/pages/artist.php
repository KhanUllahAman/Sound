<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "config.php";
include "../headerandfooter/headerandsidebar.php";


$select = "SELECT * FROM artist";

$select_run = mysqli_query($conn, $select);




if(isset($_POST["submit"])){

  $image = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "artistimage/" . $image;

  $artist = $_POST["artist"];

  $insert = "INSERT INTO `artist`(`image`, `name`) VALUES ('$image','$artist')";

    $result = mysqli_query($conn, $insert);
if($result){
    echo "<script> location.href='artist.php'; </script>";}


 
}


?>




<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Artists</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="songs.php">Songs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artists</li>
        </ol>
        </nav>
    </div>

    <div style="display: flex; justify-content: center; align-items: center;">
      <a href="#">
        <button type="button" style="width: 250px;" class="btn bg-dark btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new Artist</button>
      </a>
    </div>

    <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Artist</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                 
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i = 1;
                     while ($row = mysqli_fetch_assoc($select_run)) { ?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                        
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $i ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                      <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../pages/artistimage/<?php echo $row["image"] ?>" class="me-3" style="width: 60px; height: 60px;" alt="user1">
                          </div>
                        </div>
                      </td>
            
                      <td class="text-start">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row["name"] ?></span>
                      </td>
                   
                      <td class="align-middle text-center">
                      <a href="updateartist.php?id=<?php echo $row["id"] ?>">
                          <li class="list-inline-item ">
                            <button class="btn btn-social-icon btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-border-color"></i></button>
                          </li>
                      </a>
                      
                        <a href="deleteartist.php?id=<?php echo $row["id"] ?>">
                            <li class="list-inline-item">
                             <button class="btn btn-social-icon btn-youtube" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>
                            </li>
                        </a>
                      </td>
                    </tr>
                     
                    <?php $i++;
                     } ?>
                 
                
                  </tbody>
                </table>
              </div>


              
            <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new Artist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                <form method="POST" enctype="multipart/form-data">

                <div class="row">
                    <h3 class="mb-4">Artist</h3>

                    <div class="col-12">
                    <input type="file" class="form-control text-secondary" name="image" required>
                        <small id="emailHelp" class="form-text text-muted">Artist Image</small>
                    </div>

                    <div class="col-12">
                        <input style="border: 0.01px solid black;" type="text" class="form-control text-secondary" required name="artist">
                        <small id="emailHelp" class="form-text text-muted">Artist Name</small>
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

$target_dir = "artistimage/";
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