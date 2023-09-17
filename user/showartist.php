<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "header-footer/header.php";

include "../admin2/pages/config.php";


$select_1 = "SELECT * FROM songs ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_1 = mysqli_query($conn, $select_1);


$select_2 = "SELECT * FROM album ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_2 = mysqli_query($conn, $select_2);


$select_3 = "SELECT * FROM artist ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_3 = mysqli_query($conn, $select_3);

$select_4 = "SELECT * FROM video ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_4 = mysqli_query($conn, $select_4);



if (isset($_GET["id"])) { 
    $idget = $_GET["id"];
    $select = "SELECT * FROM `artist` WHERE `id` = $idget";

    $select_run = mysqli_query($conn, $select);

    if ($select_run) { 
        while ($row = mysqli_fetch_assoc($select_run)){
            $id = $row["id"];
            $image = $row["image"];
            $name = $row["name"];
            $age = $row["age"];
            $country = $row["country"];


    
        }
    } else {
        echo "Error";
    }


    $aname = "$name";



$select_5 = "SELECT * FROM songs WHERE `artist`='$name' ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 5";

$select_run_5 = mysqli_query($conn, $select_5);



$select_6 = "SELECT * FROM video WHERE `artist`='$name' ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 5";

$select_run_6 = mysqli_query($conn, $select_6);



} else {
    echo "";
    } 


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


    <?php

        if (isset($_GET["id"])) { 
            $idget = $_GET["id"];
            $select = "SELECT * FROM `artist` WHERE `id` = $idget";

            $select_run = mysqli_query($conn, $select);

            if ($select_run) { 
                while ($row = mysqli_fetch_assoc($select_run)){
                    $id = $row["id"];
                    $image = $row["image"];
                    $name = $row["name"];
                    $age = $row["age"];
                    $country = $row["country"];

            
                }
            } else {
                echo "Error";
            }

        ?>

<div class="container">
<div class="containerrrrr" style="margin-top: 100px;">

<div class="card mb-3 col-12" style="background-color: #1f1f1f;">
  <div class="row g-0">
    <div class="col-md-4" style="padding: 20px;">
      <img
        src="../admin2/pages/artistimage/<?php echo $image ?>"
        alt="Trendy Pants and Shoes"
        class="img-fluid rounded-start"
        width="300px"
        style="border-radius: 200px;"
      />
    </div>
    <div class="col-md-8">
      <div class="card-body mt-5">
        <h1 class="card-title text-light"><?php echo $name ?></h1>
        <p class="card-text mb-0 text-secondary">age: <?php echo $age ?></p>
        <p class="card-text mt-0 mb-0 text-secondary">Country: <?php echo $country ?></p>
        
            <?php
            $query = mysqli_query($conn, "SELECT Count(*) as num FROM songs where artist = '$name'");
            while ($row = mysqli_fetch_array($query)) {
            echo '
            <p class="card-text mt-0 text-secondary ">Total Songs: '.$row['num'].'</p>
            ';
           

        
    }
    ?>
        <div style="display: flex;">
        <div class="circle rounded-circle chair_bg ms-auto" style="border: 1px solid grey; width: 50px; height: 50px;">
            <i style="margin: 9px 9px 9px 9px; font-size: 25px; margin-top: -10px;" class="fas fa-heart text-danger"></i>
        </div>
        <div class="dropdown mr-5 ml-2">
        
        
        <a
          class=" d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        <div class="circle rounded-circle chair_bg ms-auto" style="border: 1px solid grey; width: 50px; height: 50px;">
       <i style="margin: -4px 12px 12px 12px; font-size: 25px;" class="fas fa-bars text-dark"></i>
       </div>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="artistsongs.php?id=<?php echo $id ?>">Show all Songs</a>
          </li>
          <li>
            <a class="dropdown-item" href="artistalbums.php?id=<?php echo $id ?>">Show All Videos</a>
          </li> 
        </ul>
      </div>
      </div>    


      </div>
    </div>
  </div>
</div>

</div>
</div>




    <?php
    } else {
    echo "";
    } ?>
<br>
<section class="ftco-section">
			<div class="container" style="background-color: #1f1f1f; padding: 40px; border-radius: 20px;">

                    <div id="wrapper" >
                  <div id="container" style="display: flex; justify-content: center; align-items: center;">

                      <h1 class="title-textt">Artist TOP SONGS & VIDEOS</h1>
                  
                  </div>
              </div>



<div class="row" style="display: flex; justify-content: center; align-items: center;">


                <?php $i = 1;
                    while ($row = mysqli_fetch_assoc($select_run_5)) { ?>



    <div class="card mb-3 col-xl-5 col-lg-11" style="background-color: grey; margin: 20px; border-radius: 15px;">
        <div class="row g-0">
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 text-center" style="padding: 20px;">
                <a href="playsong.php?id=<?php echo $row["id"] ?>">
                    <img
                    src="../admin2/pages/songimage/<?php echo $row["image"] ?>"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start"
                    width="140px"
                    style="border-radius: 8px;"
                    />
                </a>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6">
                <div class="card-body">
                    <a href="playsong.php?id=<?php echo $row["id"] ?>">
                        <h5 class="card-title text-dark mb-0 text-center"><?php echo $row["title"] ?></h5>
                    </a>
                    <p class="mt-0 text-dark text-center">BY: <?php echo $row["artist"] ?></p>
                    <div class="circle rounded-circle chair_bg m-auto" style="border: 2px solid black; width: 50px; height: 50px;">
                        <a href="playsong.php?id=<?php echo $row["id"] ?>"><i style="margin: 10px 13px 13px 13px; font-size: 26px;" class="fas fa-play mt-0 text-dark"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


                    <?php $i++;
                     } ?>

</div>


<div class="row" style="display: flex; justify-content: center; align-items: center;">


                <?php $i = 1;
                    while ($row = mysqli_fetch_assoc($select_run_6)) { ?>



    <div class="card mb-3 col-xl-5 col-lg-11" style="background-color: grey; margin: 20px; border-radius: 15px;">
        <div class="row g-0">
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 text-center" style="padding: 20px;">
                <a href="playvideo.php?id=<?php echo $row["id"] ?>">
                    <img
                    src="../admin2/pages/videoimage/<?php echo $row["image"] ?>"
                    alt="artist song"
                    class="img-fluid rounded-start"
                    width="140px"
                    style="border-radius: 8px;"
                    />
                </a>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6">
                <div class="card-body">
                    <a href="playvideo.php?id=<?php echo $row["id"] ?>">
                        <h5 class="card-title text-dark mb-0 text-center"><?php echo $row["title"] ?></h5>
                    </a>
                    <p class="mt-0 text-dark text-center">BY: <?php echo $row["artist"] ?></p>
                    <div class="circle rounded-circle chair_bg m-auto" style="border: 2px solid black; width: 50px; height: 50px;">
                        <a href="playvideo.php?id=<?php echo $row["id"] ?>"><i style="margin: 10px 13px 13px 13px; font-size: 26px;" class="fas fa-play mt-0 text-dark"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


                    <?php $i++;
                     } ?>

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

                <div id="wrapper" >
                  <div id="container" >

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
                        while ($row = mysqli_fetch_assoc($select_run_1)) { ?>

							<div class="container" style="height: 530px; background-color: black; border-radius: 40px;">
                            <div class="lamp_card">
                               <a href="playsong.php?id=<?php echo $row["id"] ?>"><img src="../admin2/pages/songimage/<?php echo $row["image"] ?>" style="border-radius: 20px; margin-top: 10px; height: 300px;" alt="sm-chair"></a>
                                <h1 class="title text-center"><?php echo $row["title"] ?></h1>
                                <p class="description text-center">
                                <?php echo $row["artist"] ?>
                                </p>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <div class="circle text-center rounded-circle chair_bg mx-auto">
                                        <a href="playsong.php?id=<?php echo $row["id"] ?>"><i style="font-size: 26px;" class="fas fa-play text-danger"></i></a> 
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

                <div id="wrapper" >
                  <div id="container" >

                      <h1 class="title-textt">TRENIDNG ALBUMS</h1>
                  
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
                        while ($row = mysqli_fetch_assoc($select_run_2)) { ?>
                        
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
                <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TRENDING VIDEOS</h4> -->

                <div id="wrapper" >
                  <div id="container" >

                      <h1 class="title-textt">TRENIDNG VIDEOS</h1>
                  
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
                        while ($row = mysqli_fetch_assoc($select_run_4)) { ?>
                        
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

<br><br><br>



<section class="ftco-section">
			<div class="container" style="background-color: #1f1f1f; padding: 40px; border-radius: 20px;">
            <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TOP ARTIST</h4> -->

                <div id="wrapper" >
                  <div id="container" >

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
                        while ($row = mysqli_fetch_assoc($select_run_3)) { ?>


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