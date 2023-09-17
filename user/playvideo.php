<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "header-footer/header.php";

include "../admin2/pages/config.php";


if(isset($_POST["submit"])){
    $name = $conn->real_escape_string($_POST['name']);
    $rating = $conn->real_escape_string($_POST['rating']);
    $review = $conn->real_escape_string($_POST['review']);
    $path = $conn->real_escape_string($_POST['path']);
    $image = $conn->real_escape_string($_POST['image']);


    // $name = $_POST["name"];
    // $rating = $_POST["rating"];
    // $review = $_POST["review"];
    // $path = $_POST["path"];

   // Check whether this username exists
   $existSql = "SELECT * FROM `reviews` WHERE `name`='$name' AND `path`='$path'";
   $result = mysqli_query($conn, $existSql);
   $numExistRows = mysqli_num_rows($result);
   if($numExistRows > 0){
    //    $exists = true;
       $showError = "You already post review!";
       echo '<script type="text/javascript">alert("'.$showError.'");</script>';

   }
   else{
       // $exists = false; 
       $insert = "INSERT INTO `reviews`(`name`, `rating`, `review`, `path`, `image`) VALUES ('$name','$rating','$review','$path','$image')";
       $resultt = $conn->query($insert);
       
   }
   
   
}
 


$select_3 = "SELECT * FROM album ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_3 = mysqli_query($conn, $select_3);



$select_4 = "SELECT * FROM songs ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_4 = mysqli_query($conn, $select_4);



$select_5 = "SELECT * FROM artist ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_5 = mysqli_query($conn, $select_5);


$select_6 = "SELECT * FROM video ORDER BY RAND(time_to_sec(current_time()) / 10) LIMIT 12";

$select_run_6 = mysqli_query($conn, $select_6);

$select_7 = "SELECT * FROM video ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_7 = mysqli_query($conn, $select_7);


$videoname = $_SESSION['user']['name'];










if (isset($_GET["id"])) { 
    $idget = $_GET["id"];
    $select = "SELECT * FROM `video` WHERE `id` = $idget";

    $select_run = mysqli_query($conn, $select);

    if ($select_run) { 
        while ($row = mysqli_fetch_assoc($select_run)){
            $title = $row["title"];
           
        }
    } else {
        echo "Error";
    }

    $select_8 = "SELECT * FROM reviews WHERE `path`='$title' AND `name`='$videoname' limit 1";

    $select_run_8 = mysqli_query($conn, $select_8);

    
    $select_9 = "SELECT * FROM reviews WHERE `path`='$title' AND `name`='$videoname'";

    $select_run_9 = mysqli_query($conn, $select_9);
    


} else {
echo "";
}

?>

<link rel="stylesheet" href="css/css/owl.carousel.min.css">
<link rel="stylesheet" href="css/css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/css/style.css">

<link rel="stylesheet" href="css/textanimation.css">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />


<link rel="stylesheet" href="css/video.css">
 
<div class="containeeer container" style="margin-top: 150px;">


<style>
    .containeer{
  max-width:1024px;
  padding:3rem 0;
}
.chair_card{
  background: #f7ead9;
  height:500px;
  border-radius: 2rem;
  text-align: center;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}
.lamp_card{
  background: black;
  height:420px;
  border-radius: 2rem;
  text-align: center;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}
.couch_card{
  background: #000000;
  height:500px;
  border-radius: 2rem;
  text-align: center;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}
.title{
    color: #fff;
  font-size: 1.1rem;
  font-weight: 600;
  margin:10px 0 0 0;
}
.description{
  color:#94908d;
  font-size: 0.9rem;
  font-weight: 550;
  margin:0;
}
.circle{
  width:50px;
  height:50px;
  background:#fff;
  border:2px solid;
  padding:1rem 0 0;
  margin:1.5rem 0 0;
}
.chair_bg,
.lamp_bg,
.couch_bg{
  border-color:#acb9c9;
}
@media (max-width:992px){
  .containeer{
    max-width: 720px;
  }
  .lamp_card,
  .chair_card,
  .couch_card{
    margin-bottom:2rem;
  }
}

</style>


<?php

if (isset($_GET["id"])) { 
    $idget = $_GET["id"];
    $select = "SELECT * FROM `video` WHERE `id` = $idget";

    $select_run = mysqli_query($conn, $select);

    if ($select_run) { 
        while ($row = mysqli_fetch_assoc($select_run)){
            $id = $row["id"];
            $image = $row["image"];
            $video = $row["video"];
            $title = $row["title"];
            $artist = $row["artist"];
            $genre = $row["genre"];
            $language = $row["language"];
            $date = $row["date"];
            $description = $row["description"];

      
        }
    } else {
        echo "Error";
    }

?>


   <div class="main-video-container">
      <video src="../admin2/pages/videofile/<?php echo $video ?>" loop controls class="main-video"></video>
      <h3 class="main-vid-title"><?php echo $title ?></h3>
      <div style="display: flex;">
      <h6>BY: <?php echo $artist ?></h6>
      <h6 class="ml-5">Released on: <?php echo $date ?></h6>
      </div><br>
      <p>Description: <?php echo $description ?></p>

      <button class="button-13 mr-2" disabled role="button"><b>Genre: </b> <?php echo $genre ?></button>
        <button class="button-13 mr-2" disabled role="button"><b>Language: </b> <?php echo $language ?></button>
      
   </div>


<?php

} else {
echo "";
} ?>
   

   <div class="video-list-container">



<?php

if (isset($_GET["id"])) { 
    $idget = $_GET["id"];
    $select = "SELECT * FROM `video` WHERE `id` = $idget";

    $select_run = mysqli_query($conn, $select);

    if ($select_run) { 
        while ($row = mysqli_fetch_assoc($select_run)){
            $id = $row["id"];
            $image = $row["image"];
            $video = $row["video"];
            $title = $row["title"];
            $artist = $row["artist"];
            $genre = $row["genre"];
            $language = $row["language"];
            $date = $row["date"];
            $description = $row["description"];

      
        }
    } else {
        echo "Error";
    }

?>
   <div style="background-color: grey; border-radius: 8px; padding: 5px;">
      <p class="text-light mt-2 ml-2 mb-0">Playing Now:</p>
      <div class="list active">
         <video src="../admin2/pages/videofile/<?php echo $video ?>" class="list-video"></video>
         <h3 class="list-title"><?php echo $title ?></h3>
      </div>
   </div>
<br>

<?php

} else {
echo "";
} ?>

  <div style="background-color: grey; border-radius: 8px; padding: 5px;">
      <p class="text-light mt-2 ml-2 mb-0">Related Video:</p>
         <?php $i = 1;
            while ($row = mysqli_fetch_assoc($select_run_6)) { ?>


      <div class="list">
         <a href="playvideo.php?id=<?php echo $row["id"] ?>" class="list">
         <video src="../admin2/pages/videofile/<?php echo $row["video"] ?>" class="list-video"></video>
         <h3 class="list-title text-light"><?php echo $row["title"] ?></h3>
      </a>
      </div>
        


  
           <?php $i++;
           } ?>

 </div>

   </div>

</div>

<section style="background-color: #191c24; border-radius: 20px;" class="container">
                                    <div class="row text-center">
                                        <div class="col-md-12"><br><br>
                                          <h1 class="text-light">REVIEWS</h1><br><br>
                                        <!-- Carousel wrapper -->
                                        <div id="carouselBasicExample" class="carousel slide carousel-dark" data-mdb-ride="carousel">
                                            <!-- Inner -->
                                            <div class="carousel-inner">
                                            <!-- Single item -->
                                            <div class="carousel-item active">
                                                <p class="lead font-italic mx-4 mx-md-5 text-light">
                                                    its amazing 😍
                                                </p>
                                                <p class="lead font-italic mx-4 mx-md-5 text-light">
                                                Success is peace of mind, which is a direct result of self-satisfaction in knowing you made the effort to become the best of which you are capable.
                                                </p>
                                                <div class="mt-5 mb-4">
                                                <img src="../user/images/random.jpg"
                                                    class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100"
                                                    height="100" />
                                                </div>
                                                <p class="text-muted mb-0 text-light">- Jamal Khan</p>
                                            </div>


                                                 <?php $i = 1;
                                                    while ($row = mysqli_fetch_assoc($select_run_9)) { ?>


                                            <!-- Single item -->
                                            <div class="carousel-item">
                                            <p class="lead font-italic mx-4 mx-md-5 text-light">
                                            <?php echo $row["rating"] ?>
                                                </p>
                                                <p class="lead font-italic mx-4 mx-md-5 text-light">
                                                <?php echo $row["review"] ?>
                                                </p>
                                                <div class="mt-5 mb-4">
                                                <img src="../admin2/pages/adminimage/<?php echo $row["image"] ?>"
                                                    class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100"
                                                    height="100" />
                                                </div>
                                                <p class="text-muted mb-0 text-light">- <?php echo $row["name"] ?></p>
                                            </div>


                                                <?php $i++;
                                                        } ?>

                                                        
                                            <!-- Controls -->
                                            <button class="carousel-control-prev" style="background-color: transparent; border: none;" type="button" data-mdb-target="#carouselBasicExample"
                                            data-mdb-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" style="background-color: transparent; border: none;" type="button" data-mdb-target="#carouselBasicExample"
                                            data-mdb-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                            </button>
                                        </div><br><br>
                                        <!-- Carousel wrapper -->
                                        </div>
                                        </div>
                                        </section>

<br><br>

<div class="container" >
    	<div class="card" style="background-color: #191c24; border-radius: 20px;">
    		<div class="card-header text-light">Your Review</div>
    		<div class="card-body">
          <div style="display: flex; justify-content: center; align-items: center;">
        <div class="col-sm-4 text-center" >
    					<h3 class="mt-4 mb-3 text-light">Write Review Here</h3>
              <button type="button" style="background-color: #007bff; color: white; border: none; border-radius: 10px; width: 110px; height: 40px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Review</button>    				
          </div><br><br>
            </div><br><br>
    			<div class="row">
            
            <?php   while($row = $select_run_8->fetch_assoc()) { ?>
    				<div class="col-sm-12 text-center" >
    			     <div class="card" style="background-color: #000000; border-radius: 20px;">
                  <div class="card-body">
                                        
                      <h5 class="card-title text-light"><?php echo $row["name"] ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["rating"] ?></h6>
                      <p class="card-text text-light"><?php echo $row["review"] ?></p>
                      <a href="editreview.php?id=<?php echo $row["id"] ?>" class="card-link text-primary">Modify</a>


                  </div>
    				</div>
                  </div>
                                        <?php
                                             } ?>
            
    			
    			
    			</div>
    		</div>
    	</div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a Review</h5>
      </div>
      <div class="modal-body">
      <form method="POST">
                                        
                                        <div class=" row align-items-center">
 
 
                                         
                                             <?php
                                             if (isset($_GET["id"])) { 
                                                 $idget = $_GET["id"];
                                                 $select = "SELECT * FROM `video` WHERE `id` = $idget";
 
                                                 $select_run = mysqli_query($conn, $select);
 
                                                 if ($select_run) { 
                                                     while ($row = mysqli_fetch_assoc($select_run)){
                                                         $title = $row["title"];
                                                        
                                                     }
                                                 } else {
                                                     echo "Error";
                                                 }
                                             ?>
                                         
 
                                            <div class="form-group col-sm-12">
                                            <!-- <label class="text-light" for="uname">Video:</label> -->
                                            <input hidden name="path"  class="form-control" type="text" value="<?php echo $title ?>"  id="">
                                            </div>
 
 
                                        
 
                                             <?php
 
                                             } else {
                                             echo "";
                                             } ?>
 
 
 
 
 
                                             <div class="form-group col-sm-12">
                                             <!-- <label class="text-light" for="uname">Name:</label> -->
                                             <input hidden class="form-control" name="name" type="text" value="<?php echo $_SESSION['user']['name'];?>" name="" id="">
                                             </div>
 
                                            <div class="form-group col-sm-12 ">
                                                <label class="text-dark" for="fname">Rating:</label>
                                                <select class="form-control" name="rating" id="">
                                                <option hidden value="">please Select </option>
                                                 <option value="I just Love it 😍">I just Love it 😍</option>
                                                 <option value="I just Like it 😎">I just Like it 😎</option>
                                                 <option value="It is Awesome 😄">It is Awesome 😄</option>
                                                 <option value="I don't Like it 😒">I don't Like it 😒</option>
                                                 <option value="I just Hate it 😡">I just Hate it 😡</option>
 
                                                </select>
                                             </div>
                                             
                                             <div class="form-group col-sm-12">
                                              <label class="text-dark" for="uname">Review:</label>
                                              <textarea class="form-control" name="review" id="" placeholder="please give a Review" cols="30" rows="10"></textarea>
                                              
                                             </div>
                                         
                                             <div class="form-group col-sm-12">
                                              <!-- <label class="text-dark" for="uname">Image:</label> -->
                                              <input hidden class="form-control" name="image" type="text" value="<?php echo $_SESSION['user']['image'];?>" name="" id="">                                              
                                             </div>
                                       
                                             
                                             
                                             
                                         </div>
                                        <button type="submit" name="submit" class="text-center " style="background-color: #007bff; color: white; border: none; border-radius: 10px; width: 110px; height: 40px;" class="text-light mr-2">Submit</button>
 
                                 
                                     </form>
      </div>
      <div class="modal-footer">
        <button type="button" style="background-color: grey; color: white; border: none; border-radius: 10px; width: 110px; height: 40px;" data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<br><br><br><br>



<section class="ftco-section">
			<div class="container" style="background-color: #1f1f1f; padding: 40px; border-radius: 20px;">
            <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TRENDING VIDEOS</h4> -->

                <div id="wrapper">
                  <div id="container">

                      <h1 class="title-textt">TRENDING VIDEOS</h1>
                  
                  </div>
              </div>

                <br>
            </div>
            <div class="d-flex align-items-center iq-view">
                <b><a href="videos.php" class="mb-0 text-danger">View More</a></b>
            </div>
            </div>
				<div class="row">

					<div class="col-md-12">
						<div class="featured-carousel owl-carousel" >

             
                  <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_7)) { ?>
                        

                        <div class="iq-card" style="border: none;">
                            <div class="iq-card-body p-0">
                            <div class="iq-thumb">
                                <div class="iq-music-overlay"></div>
                                <a href ="playvideo.php?id=<?php echo $row["id"] ?>">
                                    <img style="border-radius: 15px; height: 300px;" src="../admin2/pages/videoimage/<?php echo $row["image"] ?>" class="img-border-radius img-fluid w-100" alt="">
                                </a>
                            
                            </div>
                            <div class="feature-list text-center">
                            <a href ="playvideo.php?id=<?php echo $row["id"] ?>">

                                <h4 class="font-weight-600 mb-0 text-light mt-2"><?php echo $row["title"] ?></h4>
                                </a>

                                <p class="mb-0 text-secondary">BY: <?php echo $row["artist"] ?></p>
                            </div>
                            </div>
                        </div>
                    
                  

                        
   <?php $i++;
                     } ?>


                
						</div>
					</div>
				</div>
			</div>
		</section>

<br><br><br><br>



<section class="ftco-section">
			<div class="container" style="background-color: #1f1f1f; padding: 40px; border-radius: 20px;">
            <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TRENDING SONGS</h4> -->

                <div id="wrapper">
                  <div id="container">

                      <h1 class="title-textt">TRENDING SONGS</h1>
                  
                  </div>
              </div>

                <br>
            </div>
            <div class="d-flex align-items-center iq-view">
                <b><a href="songs.php" class="mb-0 text-danger">View More</a></b>
            </div>
            </div>
				<div class="row">
		
					<div class="col-md-12">
						<div class="featured-carousel owl-carousel">

                     <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_4)) { ?>

							<div class="container" style="height: 530px; background-color: black; border-radius: 40px;">
                            <div class="lamp_card">
                               <a href="playsong.php?id=<?php echo $row["id"] ?>"><img src="../admin2/pages/songimage/<?php echo $row["image"] ?>" style="border-radius: 20px; margin-top: 10px; height: 300px;" alt="sm-chair"></a>
                                <h1 class="title text-center"><?php echo $row["title"] ?></h1>
                                <p class="description text-center">
                                <?php echo $row["artist"] ?>
                                </p>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <div class="circle text-center rounded-circle chair_bg mx-auto">
                                        <a href="playsong.php?id=<?php echo $row["id"] ?>"><i style="font-size: 22px;" class="fas fa-play text-danger"></i></a> 
                                    </div>
                                    <div class="circle text-center rounded-circle chair_bg mx-auto">
                                        <a href="playsong.php?id=<?php echo $row["id"] ?>"><i style="font-size: 22px;" class="fas fa-bars text-danger"></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>


                    
                     <?php $i++;
                     } ?>

						</div>
					</div>
				</div>
			</div>
		</section>

<br><br><br>




<section class="ftco-section">
			<div class="container" style="background-color: #1f1f1f; padding: 40px; border-radius: 20px;">
            <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TRENDING ALBUMS</h4> -->

                <div id="wrapper">
                  <div id="container">

                      <h1 class="title-textt">TRENDING ALBUMS</h1>
                  
                  </div>
              </div>

                <br>
            </div>
            <div class="d-flex align-items-center iq-view">
                <b><a href="album.php" class="mb-0 text-danger">View More</a></b>
            </div>
            </div>
				<div class="row" >
		
					<div class="col-md-12">
						<div class="featured-carousel owl-carousel" >

                        <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_3)) { ?>



                <div class="iq-card" style="border: none;">
                    <div class="iq-card-body p-0">
                    <div class="iq-thumb">
                        <div class="iq-music-overlay"></div>
                        <a href ="playalbum.php?id=<?php echo $row["id"] ?>">
                            <img style="border-radius: 15px; height: 300px;" src="../admin2/pages/albums/<?php echo $row["image"] ?>" class="img-border-radius img-fluid w-100" alt="">
                        </a>
                    
                    </div>
                    <div class="feature-list text-center">
                        <h4 class="font-weight-600 mb-0 text-light mt-2"><?php echo $row["title"] ?></h4>
                        <p class="mb-0 text-secondary">BY: <?php echo $row["artist"] ?></p>
                    </div>
                    </div>
                </div>

 
                     <?php $i++;
                     } ?>
                
						</div>
					</div>
				</div>
			</div>
		</section>

<br><br><br>


<section class="ftco-section">
			<div class="container" style="background-color: #1f1f1f; padding: 40px; border-radius: 20px;">
            <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TOP ARTIST</h4> -->

                <div id="wrapper">
                  <div id="container">

                      <h1 class="title-textt">TOP ARTIST</h1>
                  
                  </div>
              </div>

                <br><br><br>
            </div>
            <div class="d-flex align-items-center iq-view">
                <b><a href="artist.php" class="mb-0 text-danger">View More</a></b>
            </div>
            </div>
				<div class="row">

					<div class="col-md-12">
						<div class="featured-carousel owl-carousel" >

                        <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_5)) { ?>


                <div class="iq-card" style="border: none;">
                    <div class="iq-card-body p-0" style="width: 280px;">
                    <div class="iq-thumb">
                        <div class="iq-music-overlay"></div>
                        <a href ="showartist.php?id=<?php echo $row["id"] ?>">
                            <img style="border-radius: 250px; height: 300px;" src="../admin2/pages/artistimage/<?php echo $row["image"] ?>" class="img-border-radius img-fluid w-100" alt="">
                        </a>
                    
                    </div>
                    <div class="feature-list text-center">
                        <h5 class="font-weight-600 mb-0 text-light mt-2"><?php echo $row["name"] ?></h5>
                        <!-- <p class="mb-0 text-secondary">BY: Atif Aslam</p> -->
                    </div>
                    </div>
                </div>

                   <?php $i++;
                     } ?>

                
						</div>
					</div>
				</div>
			</div>
		</section>

<br><br><br><br>


    <!-- <script src="js/video.js"></script> -->

<?php
include "header-footer/footer.php";
?>

<script src="js/js/jquery.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/main.js"></script>
