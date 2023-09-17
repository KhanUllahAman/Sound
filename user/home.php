<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "header-footer/header.php";

include "../admin2/pages/config.php";


$select = "SELECT * FROM bannerimages";

$select_run = mysqli_query($conn, $select);


$select_1 = "SELECT * FROM artistquotes";

$select_run_1 = mysqli_query($conn, $select_1);


$select_2 = "SELECT * FROM songs ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_2 = mysqli_query($conn, $select_2);


$select_3 = "SELECT * FROM album ORDER BY RAND() LIMIT 12";

$select_run_3 = mysqli_query($conn, $select_3);


$select_4 = "SELECT * FROM artist ORDER BY RAND() LIMIT 12";

$select_run_4 = mysqli_query($conn, $select_4);


$select_5 = "SELECT * FROM video ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_5 = mysqli_query($conn, $select_5);


$select_6 = "SELECT * FROM songs LIMIT 6";

$select_run_6 = mysqli_query($conn, $select_6);


$select_7 = "SELECT * FROM video LIMIT 6";

$select_run_7 = mysqli_query($conn, $select_7);

$select_8 = "SELECT * FROM upcoming LIMIT 6";

$select_run_8 = mysqli_query($conn, $select_8);


$select_9 = "SELECT * FROM upcoming LIMIT 6";

$select_run_9 = mysqli_query($conn, $select_9);



?>


<link rel="stylesheet" href="css/style3.css">

<link rel="stylesheet" href="css/textanimation.css">

<link rel="stylesheet" href="css/cssupcomig/owl.carousel.min.css">
<link rel="stylesheet" href="css/cssupcomig/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="css/cssupcomig/animate.css">
<link rel="stylesheet" href="css/cssupcomig/style.css">


   <!-- <?php
   $artistname = '<?php echo $row["title"] ?>';
   ?>

    <?php
       $select_artist_namee = "SELECT * FROM artist where `name`='$art' LIMIT 1";

       $select_run_artist_namee = mysqli_query($conn, $select_artist_name);
    ?> -->

    
<div class="home-slider owl-carousel js-fullheight" style="margin-top: +95px;">

<?php $i = 1;
              while ($row = mysqli_fetch_assoc($select_run)) { ?>


<div class="slider-item js-fullheight"  style="background-image:url(images/<?php echo $row["image"] ?>);">
   <div class="overlay"></div>
 <div class="container">
   <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
       <div class="col-md-12 ftco-animate">
           <div class="text w-100 text-center">
               <h2><?php echo $row["text"] ?></h2>
             <h1 class="mb-3" style="font-size: 80px;"><?php echo $row["title"] ?></h1>
         <a href="artist.php"><button class="button-89" role="button">See More</button></a>
         
       </div>
       </div>
     </div>
 </div>
</div>

<?php $i++;
} ?>
          


</div>
<br><br><br>

<div class="container" style="display: flex; justify-content: center; align-items: center;">

   <h4 class="wordCarousel">
      <span>Wanna LIsten </span>
      <div>
         <!-- Use classes 2,3,4, or 5 to match the number of words -->
         <ul class="flip5">
         <li>YES YOU ARE AT THE RIGHT PLACE</li>
            <li>COOL SONGS?</li>
            <li>AMAZING SONGS?</li>
            <li>SQUIRELL SONGS?</li>
            <li>ENTERTAINING SONGS?</li>
            <li>SAD SONGS?</li>
         </ul>
      </div>
   </h4>


   
</div>
<br>
<div class="container" style="display: flex; justify-content: center; align-items: center;">
<div class="deconstructed">
  ENJOY!
  <div>ENJOY!</div>
  <div>ENJOY!</div>
  <div>ENJOY!</div>
  <div>ENJOY!</div>
</div>
</div>


<br><br><br>

<div class="container" style=" background-color: #0d0f0f;">

<div class="col-lg-12">
 <div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
         <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">LATEST SONGS</h4> -->
        
         <div id="wrapper">
    <div id="container">

        <h1 class="title-textt">LATEST SONGS</h1>
     
    </div>
</div>

         <br>
       </div>
       <div class="d-flex align-items-center iq-view">
          <b class="mb-0 text-primary"><a href="newsong.php">View More <i class="las la-angle-right"></i></a></b>
       </div>
    </div>
    <div class="iq-card-body">
       <ul class="list-unstyled row iq-box-hover mb-0">




     <?php $i = 1;
         while ($row = mysqli_fetch_assoc($select_run_6)) { ?>

        <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
             <div class="iq-card" style="border: none;">
             <img src="images/newicon.png" height="30px" width="90px" alt="">
                <div class="iq-card-body p-0">
                   <div class="iq-thumb">
                      <div class="iq-music-overlay"></div>
                      <a href ="playsong.php?id=<?php echo $row["id"] ?>"> 
                         <img src="../admin2/pages/songimage/<?php echo $row["image"] ?>" style="height: 150px;" class="img-border-radius img-fluid w-100" alt="">
                      </a>
                      <div class="overlay-music-icon">
                         <a href ="playsong.php?id=<?php echo $row["id"] ?>">
                            <i class="fa fa-play-circle text-dark"></i>
                         </a>
                      </div>
                   </div>
                   <div class="feature-list text-center">
                      <h6 class="font-weight-600 text-light mb-0"><?php echo $row["title"] ?></h6>
                      <p class="mb-0 "><?php echo $row["artist"] ?></p>
                   </div>
                </div>
             </div>
          </li>


     <?php $i++;
     } ?>
              

          
       </ul>
    </div>
 </div>
</div>
</div>

<br><br>


<div class="container" style=" background-color: #0d0f0f;">

<div class="col-lg-12">
 <div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
         <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">LATEST VIDEOS</h4> -->
         
         <div id="wrapper">
    <div id="container">

        <h1 class="title-textt">LATEST VIDEOS</h1>
     
    </div>
</div>
         
         <br>
       </div>
       <div class="d-flex align-items-center iq-view">
          <b class="mb-0 text-primary"><a href="newvideo.php">View More <i class="las la-angle-right"></i></a></b>
       </div>
    </div>
    <div class="iq-card-body">
       <ul class="list-unstyled row iq-box-hover mb-0">




     <?php $i = 1;
         while ($row = mysqli_fetch_assoc($select_run_7)) { ?>

        <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
             <div class="iq-card" style="border: none;">
             <img src="images/newicon.png" height="30px" width="90px" alt="">
                <div class="iq-card-body p-0">
                   <div class="iq-thumb">
                      <div class="iq-music-overlay"></div>
                      <a href ="playsong.php?id=<?php echo $row["id"] ?>"> 
                         <img src="../admin2/pages/videoimage/<?php echo $row["image"] ?>" style="height: 150px;" class="img-border-radius img-fluid w-100" alt="">
                      </a>
                      <div class="overlay-music-icon">
                         <a href ="playvideo.php?id=<?php echo $row["id"] ?>">
                            <i class="fa fa-play-circle text-dark"></i>
                         </a>
                      </div>
                   </div>
                   <div class="feature-list text-center">
                      <h6 class="font-weight-600 text-light mb-0"><?php echo $row["title"] ?></h6>
                      <p class="mb-0"><?php echo $row["artist"] ?></p>
                   </div>
                </div>
             </div>
          </li>


     <?php $i++;
     } ?>
              

          
       </ul>
    </div>
 </div>
</div>
</div>

<br><br>



<div class="container" style=" background-color: #0d0f0f;">

<div class="col-lg-12">
 <div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
         <br>
         <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TRENDING SONGS</h4> -->
         
         <div id="wrapper">
    <div id="container">

        <h1 class="title-textt">TRENDING SONGS</h1>
     
    </div>
</div>
         <br>
       </div>
       <div class="d-flex align-items-center iq-view">
          <b class="mb-0 text-primary"><a href="songs.php">View More <i class="las la-angle-right"></i></a></b>
       </div>
    </div>
    <div class="iq-card-body">
       <ul class="list-unstyled row iq-box-hover mb-0">




     <?php $i = 1;
         while ($row = mysqli_fetch_assoc($select_run_2)) { ?>

        <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
             <div class="iq-card" style="border: none;">
                <div class="iq-card-body p-0">
                   <div class="iq-thumb">
                      <div class="iq-music-overlay"></div>
                      <a href ="playsong.php?id=<?php echo $row["id"] ?>">
                         <img src="../admin2/pages/songimage/<?php echo $row["image"] ?>" style="height: 150px;" class="img-border-radius img-fluid w-100" alt="">
                      </a>
                      <div class="overlay-music-icon">
                         <a href ="playsong.php?id=<?php echo $row["id"] ?>">
                            <i class="fa fa-play-circle text-dark"></i>
                         </a>
                      </div>
                   </div>
                   <div class="feature-list text-center">
                      <h6 class="font-weight-600 text-light mb-0"><?php echo $row["title"] ?></h6>
                      <p class="mb-0"><?php echo $row["artist"] ?></p>
                   </div>
                </div>
             </div>
          </li>


     <?php $i++;
     } ?>
              

          
       </ul>
    </div>
 </div>
</div>
</div>

<br><br>





<div class="container" style=" background-color: #0d0f0f;">

<div class="col-lg-12">
<div class="iq-card">
<div class="iq-card-header d-flex justify-content-between">
 <div class="iq-header-title">
   <br>
   <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TRENDING VIDEOS</h4> -->

   <div id="wrapper">
    <div id="container">

        <h1 class="title-textt">TRENDING VIDEOS</h1>
     
    </div>
</div>

   <br>
 </div>
 <div class="d-flex align-items-center iq-view">
    <b class="mb-0 text-primary"><a href="videos.php">View More <i class="las la-angle-right"></i></a></b>
 </div>
</div>
<div class="iq-card-body">
 <ul class="list-unstyled row iq-box-hover mb-0">




<?php $i = 1;
   while ($row = mysqli_fetch_assoc($select_run_5)) { ?>

  <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
       <div class="iq-card" style="border: none;">
          <div class="iq-card-body p-0">
             <div class="iq-thumb">
                <div class="iq-music-overlay"></div>
                <a href ="playvideo.php?id=<?php echo $row["id"] ?>">
                   <img src="../admin2/pages/videoimage/<?php echo $row["image"] ?>" style="height: 150px;" class="img-border-radius img-fluid w-100" alt="">
                </a>
                <div class="overlay-music-icon">
                   <a href ="playvideo.php?id=<?php echo $row["id"] ?>">
                      <i class="fa fa-play-circle text-dark"></i>
                   </a>
                </div>
             </div>
             <div class="feature-list text-center">
                <h6 class="font-weight-600 text-light mb-0"><?php echo $row["title"] ?></h6>
                <p class="mb-0"><?php echo $row["artist"] ?></p>
             </div>
          </div>
       </div>
    </li>


<?php $i++;
} ?>
        


    
 </ul>
</div>
</div>
</div>
</div>

<br><br>




<div class="container" style=" background-color: #0d0f0f;">
<div class="col-lg-12">
<div class="iq-card">
  <div class="iq-card-header d-flex justify-content-between align-items-center">
     <div class="iq-header-title">
       <br>
        <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">FEATURED ALBUM</h4> -->

        <div id="wrapper">
    <div id="container">

        <h1 class="title-textt">FEATURED ALBUM</h1>
     
    </div>
</div>

       <br>
       </div>
       <div class="d-flex align-items-center iq-view">
    <b class="mb-0 text-primary"><a href="album.php">View More <i class="las la-angle-right"></i></a></b>
 </div>
     <!-- <div id="feature-album-slick-arrow" class="slick-aerrow-block"></div> -->
  </div>
  <div class="iq-card-body">
     <ul class="list-unstyled row  feature-album iq-box-hover mb-0">


     <?php $i = 1;
         while ($row = mysqli_fetch_assoc($select_run_3)) { ?>


        <li class="col-lg-2  iq-music-box">
           <div class="iq-card mb-0" style="border: none;">
              <div class="iq-card-body p-0">
                 <div class="iq-thumb">
                    <div class="iq-music-overlay"></div>
                    <a href ="playalbum.php?id=<?php echo $row["id"] ?>">
                       <img src="../admin2/pages/albums/<?php echo $row["image"] ?>" style="height: 150px;" class="img-border-radius img-fluid w-100" alt="">
                    </a>
                    <div class="overlay-music-icon">
                       <a href ="playalbum.php?id=<?php echo $row["id"] ?>">
                          <i class="fa fa-play-circle text-dark"></i>
                       </a>
                    </div>
                 </div>
                 <div class="feature-list text-center">
                    <h6 class="font-weight-600 text-light mb-0"><?php echo $row["title"] ?></h6>
                    <p class="mb-0"><?php echo $row["artist"] ?></p>
                 </div>
              </div>
           </div>
        </li>

     <?php $i++;
        } ?>
                       







     </ul>
  </div>
</div>
</div>
</div>

<br><br>

<div class="container" style=" background-color: #0d0f0f;">
<div class="col-lg-12">
<div class="iq-card">
<div class="iq-card-header d-flex justify-content-between align-items-center">
 <div class="iq-header-title">
   <br>
    <!-- <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">FEATURED ARTISTS</h4> -->

    <div id="wrapper">
    <div id="container">

        <h1 class="title-textt">FREATURED ARTIST</h1>
     
    </div>
</div>

   <br>
   </div>
   <div class="d-flex align-items-center iq-view">
    <b class="mb-0 text-primary"><a href="artist.php">View More <i class="las la-angle-right"></i></a></b>
 </div>
   <!-- <div id="feature-album-artist-slick-arrow" class="slick-aerrow-block"></div> -->
</div>
<div class="iq-card-body">
   <ul class="list-unstyled row feature-album-artist mb-0">



  <?php $i = 1;
        while ($row = mysqli_fetch_assoc($select_run_4)) { ?>

           
      <li class="col-lg-2  iq-music-box mb-5">
         <div class="iq-thumb-artist">
            <div class="iq-music-overlay"></div>
            <a href ="showartist.php?id=<?php echo $row["id"] ?>">
               <img src="../admin2/pages/artistimage/<?php echo $row["image"] ?>" style="height: 180px;" class="w-100 img-fluid" alt="">
            </a>
            <div class="overlay-music-icon">
               <a href ="showartist.php?id=<?php echo $row["id"] ?>">
                  <i class="fa fa-user text-dark"></i>
               </a>
            </div>
         </div>
         <div class="feature-list text-center">
            <h6 class="font-weight-600 text-light mb-0"><?php echo $row["name"] ?></h6>
         </div>
      </li>


  <?php $i++;
        } ?>
                       




   </ul>
</div>
</div>
</div>
</div>
<br><br>


<div class="container-fluid" style="margin-top: -20px; margin-bottom: -150px;">
                
                <link href="https://fonts.googleapis.com/css?family=Teko:700&display=swap" rel="stylesheet">
                
                <h1 class="h111"><span class='one'>up</span><span class='two'>co</span><span class='three'>mi</span><span class='four'>ng </span><span class='five'>son</span><span class='six'>gs</span></h1>
               </div>

<section class="ftco-section">
			<div class="container">
				<div class="row">
					

<img src="../admin2/pages/upcomingsongs/" alt="">
					<div class="col-md-12">
						<div class="slider-hero">
							<div class="featured-carousel owl-carousel">

                     <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_8)) { ?>


								<div class="item">
									<div class="work">
										<div class="img d-flex align-items-center justify-content-center" style="background-size: 100% 100%; background-image: url('../admin2/pages/upcomingsongs/<?php echo $row["image"] ?>');">
											<div class="text text-center">
												<h2><small>Releasing on:</small>  <?php echo $row["date"] ?></h2>
											</div>
										</div>
									</div>
								</div>

                           <?php $i++;
                              } ?>
     
                  

							</div>

							<div class="my-5 text-center">
			          <ul class="thumbnail">
                     <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_9)) { ?>

                   
			            <li class="active img"><a href="#"><img src="../admin2/pages/upcomingsongs/<?php echo $row["image"] ?>" alt="Image" class="img-fluid"></a></li>
                        <?php $i++;
                           } ?>
   
			          </ul>
			        </div>
						</div>
					</div>
				</div>
			</div>
		</section>
<br><br><br>


<br><br>

<div class="container-fluid" style="margin-top: -20px; margin-bottom: -110px;">
                
                <link href="https://fonts.googleapis.com/css?family=Teko:700&display=swap" rel="stylesheet">
                
                <h1 class="h111"><span class='one'>q</span><span class='two'>u</span><span class='three'>o</span><span class='four'>t</span><span class='five'>e</span><span class='six'>s</span></h1>
               </div>

<div class="container">
<div class="containerrrr">



<?php $i = 1;
 while ($row = mysqli_fetch_assoc($select_run_1)) { ?>


<div
class="panel <?php echo $row["position"] ?>"
style="background-position: left;
background-image: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 7%, rgba(255, 255, 255, 0) 50%),
  url('images/<?php echo $row["image"] ?>');;
"
>
<div class="details">
<h3 class="text-light"></h3>
<p> <b></b>
<?php echo $row["quote"] ?>
</p>
</div>
</div>

  <?php $i++;
     } ?>
     

</div>
</div>

<br><br><br><br>



<?php
include "header-footer/footer.php";

?>


   <script src="js/jsupcoming/jquery.min.js"></script>
   <script src="js/jsupcoming/popper.js"></script>
   <script src="js/jsupcoming/bootstrap.min.js"></script>
   <script src="js/jsupcoming/owl.carousel.min.js"></script>
   <script src="js/jsupcoming/main.js"></script>