<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "header-footer/header.php";

include "../admin2/pages/config.php";

if (isset($_GET["id"])) { 
    $idget = $_GET["id"];
    $select = "SELECT * FROM `album` WHERE `id` = $idget";

    $select_run = mysqli_query($conn, $select);

    if ($select_run) { 
        while ($row = mysqli_fetch_assoc($select_run)){
            $id = $row["id"];
            $image = $row["image"];
            $title = $row["title"];
            $artist = $row["artist"];
            $tracks = $row["tracks"];
            $date = $row["date"];
          

    
        }
    } else {
        echo "Error";
    }


    $ctitle = "$title";



$select_1 = "SELECT * FROM songs WHERE `album`='$title'";

$select_run_1 = mysqli_query($conn, $select_1);


} else {
    echo "";
    } 
    
    
$select_2 = "SELECT * FROM songs WHERE `album`='$ctitle' LIMIT 1";

$select_run_2 = mysqli_query($conn, $select_2);



$select_3 = "SELECT * FROM album ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_3 = mysqli_query($conn, $select_3);



$select_4 = "SELECT * FROM songs ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_4 = mysqli_query($conn, $select_4);



$select_5 = "SELECT * FROM artist ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_5 = mysqli_query($conn, $select_5);


$select_6 = "SELECT * FROM video ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_6 = mysqli_query($conn, $select_6);



?>

<link rel="stylesheet" href="css/css/owl.carousel.min.css">
<link rel="stylesheet" href="css/css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/css/style.css">

<link rel="stylesheet" href="css/textanimation.css">



<link rel="stylesheet" href="check.css">

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





    <br><br><br>
<div class="container">
<div class="containerrrrr" style="margin-top: 100px;">
      <div class="player">
        <audio id="audio-player"></audio>

        <?php

        if (isset($_GET["id"])) { 
            $idget = $_GET["id"];
            $select = "SELECT * FROM `album` WHERE `id` = $idget";

            $select_run = mysqli_query($conn, $select);

            if ($select_run) { 
                while ($row = mysqli_fetch_assoc($select_run)){
                    $id = $row["id"];
                    $image = $row["image"];
                    $title = $row["title"];
                    $artist = $row["artist"];
                    $tracks = $row["tracks"];
                    $date = $row["date"];
                  

            
                }
            } else {
                echo "Error";
            }

        ?>





        <div style="display: flex; justify-content: center; align-items: center;">
        
        <img src="../admin2/pages/albums/<?php echo $image ?>" width="300px" style="border-radius: 10px;" alt="">
        

        </div><br>
        <h2 class="song-name text-dark"><?php echo $title ?></h2>

        <p class="song-author text-dark" style="font-size: 18px; margin-top: -10px;"><?php echo $artist ?></p>

        <?php

} else {
echo "";
} ?>


                    <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_1)) { ?>


            <div style="display: flex; justify-content: center; align-items: center;" class="mt-4">
        <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img
                src="../admin2/pages/songimage/<?php echo $row["image"] ?>"
                alt="Trendy Pants and Shoes"
                style="border-radius: 15px; margin: 10px;"
                class="img-fluid rounded-start"
            />
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["title"] ?></h5>
                <p class="card-text">
                <?php echo $row["artist"] ?>
                </p>
                <p class="card-text" style="background-color: black; width: 40px; height: 40px; border-radius: 20px;">
                <a href="playsong.php?id=<?php echo $row["id"] ?>"><i class="fas fa-play text-light" style="margin: 15px 15px 15px 15px;"></i></a> 
                </p>
            </div>
            </div>
        </div>
        </div>
        </div>

                <?php $i++;
                     } ?>




        <br><br><br>
<?php
        while ($row1 = mysqli_fetch_array($select_run_2)) {
?>


        <button class="button-13 mr-2 mb-4" style="width: 100%;" disabled role="button"><b>Description: </b><?php echo $row1["description"] ?></button>

        
        <div style="display: flex; justify-content: center; align-items: center;">
        <button class="button-13 mr-2" disabled role="button"><b><?php echo $row1["genre"] ?></b></button>
        <button class="button-13 mr-2" disabled role="button"><b><?php echo $row1["language"] ?></b></button>
        <button class="button-13" disabled role="button"><b><?php echo $row1["date"] ?></b></button>
        </div>

        
        <?php
}

?>
   

    
    
      



        
        
      </div>
    </div>
    </div>


    <br><br><br>


<section class="ftco-section">
			<div class="container" style="background-color: #1f1f1f; padding: 40px; border-radius: 20px;">
            <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">RELATED ALBUMS</h4> -->

                <div id="wrapper">
                  <div id="container">

                      <h1 class="title-textt">RELATED ALBUMS</h1>
                  
                  </div>
              </div>

                <br>
            </div>
            <div class="d-flex align-items-center iq-view">
                <b><a href="album.php" class="mb-0 text-danger">View More</a></b>
            </div>
            </div>
				<div class="row">
		
					<div class="col-md-12">
						<div class="featured-carousel owl-carousel">

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
                               <a href="playsong.php?id=<?php echo $row["id"] ?>"><img src="../admin2/pages/songimage/<?php echo $row["image"] ?>" style="height: 300px; border-radius: 20px; margin-top: 10px;" alt="sm-chair"></a>
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
                        while ($row = mysqli_fetch_assoc($select_run_6)) { ?>
                        
                        <div class="iq-card" style="border: none;">
                            <div class="iq-card-body p-0">
                            <div class="iq-thumb">
                                <div class="iq-music-overlay"></div>
                                <a href ="playvideo.php?id=<?php echo $row["id"] ?>">
                                    <img style="border-radius: 15px; height: 300px;" src="../admin2/pages/videoimage/<?php echo $row["image"] ?>" class="img-border-radius img-fluid w-100" alt="">
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

<br><br><br><br>



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





<?php
include "header-footer/footer.php";

?>

    <script src="js/js/jquery.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/main.js"></script>
