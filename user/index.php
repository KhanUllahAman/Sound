<?php

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


?>







<!doctype html>
<html lang="en">
  <head>
  	<title>SOUND</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">

   <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="new/new/css/bootstrap.min.css"> -->
   <!-- Typography CSS -->
   <link rel="stylesheet" href="css/typography.css"> 
   <!-- Style CSS -->
   <link rel="stylesheet" href="css/style3.css">
   <!-- Responsive CSS -->
   <!-- <link rel="stylesheet" href="new/new/css/responsive.css"> -->

   <link rel="stylesheet" href="css/textanimation.css">

   <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts -->

<!-- MDB -->



   <style>
    




  


   </style>
  </head>


  <body style="background-color: #000000;">

   


    <!-- <section class="ftco-section "> -->


      <!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #252525;">
   <!-- Container wrapper -->
   <div class="container-fluid">
     <!-- Navbar brand -->
     <a class="navbar-brand mt-0 mb-0 text-light" style="margin-left: 50px; width: 150px;" href="index.php"><img src="images/rhythm.png" width="100%" alt=""></a>

 
     <!-- Toggle button -->
     <button
       class="navbar-toggler"
       type="button"
       data-mdb-toggle="collapse"
       data-mdb-target="#navbarButtonsExample"
       aria-controls="navbarButtonsExample"
       aria-expanded="false"
       aria-label="Toggle navigation"
     >
       <i class="fas fa-bars"></i>
     </button>
 
     <!-- Collapsible wrapper -->
     <div class="collapse navbar-collapse" id="navbarButtonsExample">
       <!-- Left links -->
       <ul class="navbar-nav m-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <!-- <a class="nav-link text-light" href="#">Home</a> -->
         </li>
       </ul>
       <!-- Left links -->

       <!-- <form action="#" class="searchform order-sm-start ">
         <div class="form-group d-flex">
           <input type="text" class="form-control pl-3" placeholder="Search">
           <a href="login.php"><button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button></a>
         </div>
       </form> -->
      
 
       <div class="d-flex align-items-center" style="margin-left: 50px;">
         <ul class="navbar-nav mr-5">

         <li class="nav-item me-3 mr-3 me-lg-0">
              <a href="#" class="nav-link" style="font-size: 25px;">
                <!-- <i class="fa fa-heart text-light"></i> -->

              </a>
            </li>

            <li class="nav-item me-3 me-lg-0 dropdown">
              <a
                class="nav-link dropdown-toggle h-25 w-25 text-light"
                href="#"
                id="navbarDropdown"
                style="font-size: 25px;"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa fa-user text-light"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="login.php">Login</a>
                </li>
                <li>
                  <a class="dropdown-item" href="register.php">Sign Up</a>
                </li>
              </ul>
            </li>

           
          </ul>
     
       </div>
     </div>
     <!-- Collapsible wrapper -->
   </div>
   <!-- Container wrapper -->
 </nav>
 <!-- Navbar -->



      <!-- END nav -->
  
    <!-- </section> -->
  

		<div class="home-slider owl-carousel js-fullheight" style="margin-top: 90px;">

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
           <b class="mb-0 text-primary"><a href="albums.php">View More <i class="las la-angle-right"></i></a></b>
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

                        <h1 class="title-textt">FEATURED ARTIST</h1>
                    
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
         url('images/<?php echo $row["image"] ?>');
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

<br><br>

<section class="">
   <!-- Footer -->
   <footer class="text-center text-white" style="background-color: #252525;">
     <!-- Grid container -->
     <div class="container p-4 pb-0">
       <!-- Section: CTA -->
       <section class="">
         <p class="d-flex justify-content-center align-items-center">
           <span class="me-3">Login to see more</span>
          <a href="login.php"><button type="button" style="border: 1px solid white; padding: 8px 15px 8px 15px; margin: 8px; border-radius: 4px; background-color: transparent; color: white; margin-left: 10px;" style="margin-left: 10px;">Login!</button></a> 
         </p>
         
      <!-- Facebook -->
      <a style="border: 1px solid white; padding: 8px 15px 8px 15px; border-radius: 4px; color: white;" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a style="border: 1px solid white; padding: 8px 15px 8px 15px; border-radius: 4px; color: white;" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a style="border: 1px solid white; padding: 8px 15px 8px 15px; border-radius: 4px; color: white;" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a style="border: 1px solid white; padding: 8px 15px 8px 15px; border-radius: 4px; color: white;" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a style="border: 1px solid white; padding: 8px 15px 8px 15px; border-radius: 4px; color: white;" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a style="border: 1px solid white; padding: 8px 15px 8px 15px; border-radius: 4px; color: white;" href="" role="button"
        ><i class="fab fa-github"></i
      ></a>
 
       </section>
       <!-- Section: CTA -->
     </div>
     <!-- Grid container -->
 
     <!-- Copyright -->
     <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
       © 2022 Copyright:
       <a class="text-white" href="index.php">RHYTHM RANG</a>
     </div>
     <!-- Copyright -->
   </footer>
   <!-- Footer -->
 </section>


 
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>

  </body>
</html>

<script>
   const panels = document.querySelectorAll(".panel");

panels.forEach((panel) => {
  panel.addEventListener("click", () => {
    removeActiveClasses(); // Add fuctions to remove active class first
    panel.classList.add("active");
  });
});

function removeActiveClasses() {
  panels.forEach((panel) => {
    panel.classList.remove("active");
  });
}
</script>