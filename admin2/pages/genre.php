<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "config.php";
include "../headerandfooter/headerandsidebar.php";


$select = "SELECT * FROM genres";

$select_run = mysqli_query($conn, $select);




if(isset($_POST["submit"])){
    $genre = $_POST["genre"];

    

    $insert = "INSERT INTO `genres`(`genre`) VALUES ('$genre')";

    $result = mysqli_query($conn, $insert);
if($result){
    echo "<script> location.href='genre.php'; </script>";
    exit;}


 
}


?>




<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Genres</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="songs.php">Songs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Genres</li>
        </ol>
        </nav>
    </div>

    <div style="display: flex; justify-content: center; align-items: center;">
      <a href="#">
        <button type="button" style="width: 250px;" class="btn bg-dark btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new Genre</button>
      </a>
    </div>

    <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Genre</th>
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
            
                      <td class="text-start">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row["genre"] ?></span>
                      </td>
                   
                      <td class="align-middle text-center">
                      <a href="updategenre.php?id=<?php echo $row["id"] ?>">
                          <li class="list-inline-item ">
                            <button class="btn btn-social-icon btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-border-color"></i></button>
                          </li>
                      </a>
                      
                        <a href="deletegenre.php?id=<?php echo $row["id"] ?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">Add a Genre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                <form method="POST">

                <div class="row">
                    <h3 class="mb-4">Genre Name</h3>
                    <div class="col">
                        <input style="border: 0.01px solid black;" type="text" class="form-control text-secondary" required name="genre">
                        <small id="emailHelp" class="form-text text-muted">Genre</small>
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

            







<?php
include "../headerandfooter/footer.php"
?>