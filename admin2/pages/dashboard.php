<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

  include "config.php";
  include "../headerandfooter/headerandsidebar.php";


  $select = "SELECT * FROM upcoming";

$select_run = mysqli_query($conn, $select);


$select_1 = "SELECT * FROM reviews ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 4";

$select_run_1 = mysqli_query($conn, $select_1);

?>


        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="page-header">
        <h3 class="page-title">Dashboard</h3>
   
    </div>


    
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <?php
                              $query = "SELECT id FROM songs ORDER BY id";  
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
                    <h6 class="text-muted font-weight-normal">Total Songs</h6>
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
                              $query = "SELECT id FROM artist ORDER BY id";  
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
                    <h6 class="text-muted font-weight-normal">Music Artist</h6>
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
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
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
              </div>
            </div>
          
            <div class="row" >
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Reviews</h4>
                      <a href="reviews.php"><button class="text-muted mb-1 small" style="background-color: transparent; border: none;">View all</button></a>
                      <!-- <p class="text-muted mb-1 small">View all</p> -->
                    </div>
                    <div class="preview-list">

                    
                      <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_1)) { ?>

                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                          <img src="adminimage/<?php echo $row["image"] ?>" alt="image" class="rounded-circle" />
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject"><?php echo $row["name"] ?></h6>
                              <p class="text-muted text-small"><?php echo $row["rating"] ?></p>
                            </div>
                            <p class="text-muted"><?php echo $row["review"] ?></p>
                          </div>
                        </div>
                      </div>

                      <?php $i++;
                        } ?> 
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Upcoming Songs</h4>
                    <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic" >
                    
                      <?php $i = 1;
                      while ($row = mysqli_fetch_assoc($select_run)) { ?>
                    
                      <div class="item">
                        <img src="../pages/upcomingsongs/<?php echo $row["image"] ?>" alt="" height="280px"><br>
                        <h5 class="card-title">Releasing On: <?php echo $row["date"] ?></h5>
                      </div>
                  

                      <?php $i++;
                      } ?>
                 

                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;">
                      <a href="upcoming.php">
                      <button type="button" class="btn bg-secondary btn-lg">View all</button>
                      </a>
                      </div>
            
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Add Song</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <?php
                              $query = "SELECT id FROM songs ORDER BY id";  
                              $query_run = mysqli_query($conn, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>
                          <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Songs</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-music text-warning ms-auto"></i>
                      </div>
                      <div style="display: flex; justify-content: center; align-items: center;">
                      <a href="addsong2.php">
                      <button type="button" class="btn bg-secondary btn-lg">Add Song</button>
                      </a>
                      </div>
                    </div>
                  </div>
                </div>
<br>
                <div class="card">
                  <div class="card-body">
                    <h5>Add Video</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <?php
                          $query = "SELECT id FROM video ORDER BY id";  
                          $query_run = mysqli_query($conn, $query);
                          $row = mysqli_num_rows($query_run);
                          echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>
                          <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Videos</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-video text-warning ms-auto"></i>
                      </div>
                      <div style="display: flex; justify-content: center; align-items: center;">
                      <a href="addvideo.php">
                      <button type="button" class="btn bg-secondary btn-lg">Add Video</button>
                      </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          
            </div>

            <div class="row">
              <div class="col-sm-3 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Videos</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <?php
                          $query = "SELECT id FROM video ORDER BY id";  
                          $query_run = mysqli_query($conn, $query);
                          $row = mysqli_num_rows($query_run);
                          echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>
                          <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Videos</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-video text-primary ms-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Albums</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <?php
                          $query = "SELECT id FROM album ORDER BY id";  
                          $query_run = mysqli_query($conn, $query);
                          $row = mysqli_num_rows($query_run);
                          echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>
                          <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                        <h6 class="text-muted font-weight-normal"> Total Albums</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-album text-danger ms-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Users</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <?php
                              $query = "SELECT id FROM `admin` WHERE `role`='user'";  
                              $query_run = mysqli_query($conn, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>                         
                           <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Users</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi mdi-account-multiple-outline text-info ms-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Review</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <?php
                              $query = "SELECT id FROM reviews ORDER BY id";  
                              $query_run = mysqli_query($conn, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h2 class="mb-0">'.$row.'</h2>';
                          ?>   
                          <h3 class="text-success ms-2 mb-0 font-weight-medium"><i class="mdi mdi-blur"></i></h3>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Reviews</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-comment text-success ms-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
     

<?php
include "../headerandfooter/footer.php"
?>