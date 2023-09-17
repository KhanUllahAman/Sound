<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

  include "config.php";
  include "../headerandfooter/headerandsidebar.php";



  $select = "SELECT * FROM reviews";

$select_run = mysqli_query($conn, $select);

?>

<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Reviews</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reviews</li>
        </ol>
        </nav>
    </div>




    <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reviewer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Review</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Path</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i = 1;
                     while ($row = mysqli_fetch_assoc($select_run)) { ?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="adminimage/<?php echo $row["image"] ?>" class="me-3" style="width: 60px; height: 60px;" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $row["name"] ?></h6>
                          </div>
                        </div>
                      </td>
                     
                      <td class="align-middle text-center text-sm ">
                      <p class="text-xs font-weight-bold mb-0 d-inline-block text-truncate" style="max-width: 200px"><?php echo $row["review"] ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row["rating"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row["path"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                      
                        <a href="deletereview.php?id=<?php echo $row["id"] ?>">
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
            </div>




<?php
include "../headerandfooter/footer.php"
?>