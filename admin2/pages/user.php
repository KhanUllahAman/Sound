<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

  include "../../admin2/pages/config.php";
  include "../headerandfooter/headerandsidebar.php";


  $select = "SELECT * FROM upcoming";

$select_run = mysqli_query($conn, $select);


$select_1 = "SELECT * FROM bannerimages";

$select_run1 = mysqli_query($conn, $select_1);


$select_2 = "SELECT * FROM artistquotes";

$select_run2 = mysqli_query($conn, $select_2);


if(isset($_POST["submitbanner"])){
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../../user/images/" . $image;

    $text = $_POST["text"];
    $title = $_POST["title"];
    $link = $_POST["link"];


    $insert = "INSERT INTO `bannerimages`(`image`, `text`, `title`, `link`) VALUES ('$image','$text','$title','$link')";

    $result = mysqli_query($conn, $insert);
if($result){
    echo "<script> location.href='user.php'; </script>";}

}

if(isset($_POST["submitquote"])){
  $image = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "../../user/images/" . $image;

  $quote = $_POST["quote"];
  $position = $_POST["position"];



  $insert = "INSERT INTO `artistquotes`(`image`, `quote`, `position`) VALUES ('$image','$quote','$position')";

  $result = mysqli_query($conn, $insert);
if($result){
  echo "<script> location.href='user.php'; </script>";}



}

?>


        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="page-header">
        <h3 class="page-title">Manage Website</h3>
   
    </div>

    
    <div class="row" style="display: flex; justify-content: center; align-items: center;">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <?php
                              $query = "SELECT id FROM bannerimages ORDER BY id";  
                              $query_run = mysqli_query($conn, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>
                          <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-music icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Banner</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                        <?php
                              $query = "SELECT id FROM artistquotes ORDER BY id";  
                              $query_run = mysqli_query($conn, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>
                          <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                        <span class="mdi mdi-account icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Artist Quotes</h6>
                  </div>
                </div>
              </div>
              <!-- <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                        <?php
                              $query = "SELECT id FROM genres ORDER BY id";  
                              $query_run = mysqli_query($conn, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>
                          <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-apps icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Music Genres</h6>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                        <?php
                              $query = "SELECT id FROM languages ORDER BY id";  
                              $query_run = mysqli_query($conn, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>
                          <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-web icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Languages</h6>
                  </div>
                </div>
              </div> -->
            </div>


            
    <div class="card-body px-0 pb-2 row" style="display: flex; justify-content: center; align-items: center;">
              <div class="table-responsive p-0 col-12 col-sm-12 col-md-12 col-lg-112 col-xl-10" style="background-color: #191c24;;">
              <h2 class="text-center mt-4 mb-5">Banner Images</h2>

              
                <!-- <div class="mt-4 mb-3" style="display: flex; justify-content: center; align-items: center;">
                <a href="#">
                    <button type="button" style="width: 250px;" class="btn bg-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Add a new banner</button>
                </a>
                </div> -->

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Artist</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">text</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i = 1;
                     while ($row = mysqli_fetch_assoc($select_run1)) { ?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../../user/images/<?php echo $row["image"] ?>" class="me-3" style="width: 100px; height: 100px;" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $row["title"] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm ">
                      <p class="text-xs font-weight-bold mb-0 d-inline-block text-truncate" style="max-width: 200px"><?php echo $row["text"] ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row["link"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                      <a href="updatebanner.php?id=<?php echo $row["id"] ?>">
                          <li class="list-inline-item ">
                            <button class="btn btn-social-icon btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-border-color"></i></button>
                          </li>
                      </a>
                      
                        <!-- <a href="deletebanner.php?id=<?php echo $row["id"] ?>">
                            <li class="list-inline-item">
                             <button class="btn btn-social-icon btn-youtube" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>
                            </li>
                        </a> -->
                      </td>
                    </tr>
                     
                    <?php $i++;
                     } ?>
                 
                  </tbody>
                </table>
              </div>













                   
            <!-- Banner Image Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                <form method="POST" enctype="multipart/form-data">

                <div class="row">
                    <h3 class="mb-4">Add Banner Details</h3>
                    <div class="col-12 mb-3 ">
                        <input style="border: 0.01px solid black;" type="file" class="form-control text-secondary" required name="image">
                        <small id="emailHelp" class="form-text text-muted">Image</small>
                    </div>
                    <div class="col-12 mb-3">
                        <input style="border: 0.01px solid black;" type="text" class="form-control text-secondary" required name="text">
                        <small id="emailHelp" class="form-text text-muted">Text</small>
                    </div>
                    <div class="col-12 mb-3">
                        <input style="border: 0.01px solid black;" type="text" class="form-control text-secondary" required name="title">
                        <small id="emailHelp" class="form-text text-muted">Artist Name</small>
                    </div>
                    <div class="col-12 mb-3">
                        <input style="border: 0.01px solid black;" type="text" class="form-control text-secondary" required name="link">
                        <small id="emailHelp" class="form-text text-muted">Link</small>
                    </div>

                <div class="text-center mt-3">
                    <input class="btn btn-md btn-primary" type="submit" value="Submit" name="submitbanner">
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



            
            
    <div class="card-body px-0 pb-2 row" style="display: flex; justify-content: center; align-items: center;">
              <div class="table-responsive p-0 col-12 col-sm-12 col-md-12 col-lg-112 col-xl-10" style="background-color: #191c24;;">
              <h2 class="text-center mt-4 mb-5">Artist Quotes</h2>

              
                <!-- <div class="mt-4 mb-3" style="display: flex; justify-content: center; align-items: center;">
                <a href="#">
                    <button type="button" style="width: 250px;" class="btn bg-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal1">Add a new Quote</button>
                </a>
                </div> -->

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Artist</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">text</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position (note <span class="text-danger">use active on just 1* row</span>)</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i = 1;
                     while ($row = mysqli_fetch_assoc($select_run2)) { ?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../../user/images/<?php echo $row["image"] ?>" class="me-3" style="width: 100px; height: 100px;" alt="user1">
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm ">
                      <p class="text-xs font-weight-bold mb-0 d-inline-block text-truncate" style="max-width: 200px"><?php echo $row["quote"] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm ">
                      <p class="text-xs font-weight-bold mb-0 d-inline-block text-truncate" style="max-width: 200px"><?php echo $row["position"] ?></p>
                      </td>
                      <td class="align-middle text-center">
                      <a href="updatequote.php?id=<?php echo $row["id"] ?>">
                          <li class="list-inline-item ">
                            <button class="btn btn-social-icon btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-border-color"></i></button>
                          </li>
                      </a>
                      
                        <!-- <a href="deletequote.php?id=<?php echo $row["id"] ?>">
                            <li class="list-inline-item">
                             <button class="btn btn-social-icon btn-youtube" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>
                            </li>
                        </a> -->
                      </td>
                    </tr>
                     
                    <?php $i++;
                     } ?>
                 
                  </tbody>
                </table>
              </div>













                   
            <!-- Banner Image Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Artist Quote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                <form method="POST" enctype="multipart/form-data">

                <div class="row">
                    <h3 class="mb-4">Add Quote With Details</h3>
                    <div class="col-12 mb-3 ">
                        <input style="border: 0.01px solid black;" type="file" class="form-control text-secondary" required name="image">
                        <small id="emailHelp" class="form-text text-muted">Image</small>
                    </div>
                    <div class="col-12 mb-3">
                        <input style="border: 0.01px solid black;" type="text" class="form-control text-secondary" required name="quote">
                        <small id="emailHelp" class="form-text text-muted">Quote</small>
                    </div>
                    <div class="col-12 mb-3">
                        <input style="border: 0.01px solid black;" type="text" class="form-control text-secondary" name="position">
                        <small id="emailHelp" class="form-text text-muted">Position</small>
                    </div>
                 

                <div class="text-center mt-3">
                    <input class="btn btn-md btn-primary" type="submit" value="Submit" name="submitquote">
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

$target_dir = "../../user/images/";
$target_files = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFiletype = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));

// Check if image file is a actual image file or not

if(isset($_POST["submitbanner"])){
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

<?php

$target_dir = "../../user/images/";
$target_files = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFiletype = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));

// Check if image file is a actual image file or not

if(isset($_POST["submitquote"])){
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