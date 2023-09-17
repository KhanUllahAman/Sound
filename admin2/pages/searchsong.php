<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "config.php";
include "../headerandfooter/headerandsidebar.php";



?>



<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Songs</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Sound</a></li>
            <li class="breadcrumb-item active" aria-current="page">Songs</li>
        </ol>
        </nav>
    </div>

    <div style="display: flex; justify-content: center; align-items: center;">
      <a href="addsong.php">
        <button type="button" style="width: 250px;" class="btn bg-dark btn-lg">Add a new song</button>
      </a>
    </div>

    <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Song</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Genre</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Language</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Release Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                    if(isset($_GET['search']))
                    {
                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM songs WHERE CONCAT(id,image,title,artist,song,genre,language,date,description) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                        foreach($query_run as $items)
                        {
                        ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../pages/songimage/<?php echo $items["image"] ?>" class="me-3" style="width: 60px; height: 60px;" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $items["title"] ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $items["artist"] ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <!-- <p class="text-xs font-weight-bold mb-0">file</p> -->
                        <audio src="../pages/songfile/<?php echo $items["song"] ?>" controls></audio>
                      </td>
                      <td class="align-middle text-center text-sm ">
                      <p class="text-xs font-weight-bold mb-0 d-inline-block text-truncate" style="max-width: 200px"><?php echo $items["description"] ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $items["genre"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $items["language"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $items["date"] ?></span>
                      </td>
                      <td class="align-middle text-center">
                      <a href="updatesong.php?id=<?php echo $items["id"] ?>">
                          <li class="list-inline-item ">
                            <button class="btn btn-social-icon btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-border-color"></i></button>
                          </li>
                      </a>
                      
                        <a href="deletesong.php?id=<?php echo $items["id"] ?>">
                            <li class="list-inline-item">
                             <button class="btn btn-social-icon btn-youtube" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>
                            </li>
                        </a>
                      </td>
                    </tr>
                     
                    <?php
                        }
                        }
                        else
                        {
                            ?>
                            <div>
                                <h1 class="text-secondary">No record found!</h1>
                            </div>
                                              
                        <?php
                        }
                    }?>
                
                  </tbody>
                </table>
              </div>
            </div>





<?php
include "../headerandfooter/footer.php"
?>