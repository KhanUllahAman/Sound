<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "header-footer/header.php";

include "../admin2/pages/config.php";


$select_1 = "SELECT * FROM songs ORDER BY RAND(time_to_sec(current_time()) / 300)";

$select_run_1 = mysqli_query($conn, $select_1);


// selecting artist data
$select_artist = "SELECT * FROM artist";

$select_run_artist = mysqli_query($conn, $select_artist);
// selecting artist data

// selecting artist data
$select_genre = "SELECT * FROM genres";

$select_run_genre = mysqli_query($conn, $select_genre);
// selecting artist data


// selecting artist data
$select_album = "SELECT * FROM album";

$select_run_album = mysqli_query($conn, $select_album);
// selecting artist data


$select_2 = "SELECT * FROM album ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_2 = mysqli_query($conn, $select_2);


$select_3 = "SELECT * FROM artist ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_3 = mysqli_query($conn, $select_3);

$select_4 = "SELECT * FROM video ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_4 = mysqli_query($conn, $select_4);



?>

<link rel="stylesheet" href="css/style3.css">

<link rel="stylesheet" href="css/textanimation.css">


<style>
/* CSS */
.button-13 {
    background-color: #fff;
    border: 1px solid #d5d9d9;
    border-radius: 8px;
    /* box-shadow: rgba(213, 217, 217, .5) 0 2px 5px 0; */
    box-sizing: border-box;
    color: #0f1111;
    cursor: pointer;
    display: inline-block;
    font-family: "Amazon Ember",sans-serif;
    font-size: 13px;
    line-height: 29px;
    padding: 0 10px 0 11px;
    position: relative;
    text-align: center;
    text-decoration: none;
    user-select: none;
    -webkit-user-select: none;
    /* touch-action: manipulation; */
    vertical-align: middle;
    width: 100px;
  }

  
  
  .button-13:hover {
    background-color: #f7fafa;
  }
  
  .button-13:focus {
    border-color: #008296;
    box-shadow: rgba(213, 217, 217, .5) 0 2px 5px 0;
    outline: 0;
  }


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




<div style=" background-color: #0d0f0f; margin-top: 110px;">

<div class="container-fluid">

    <div class="container-fluid">
        
        <div class="col-lg-12">
 <!-- <div class="iq-card">

    
 
 <div class="container pb-3" style="background-color: grey; border-radius: 10px;">
        <div class="pt-3 pl-4">
            <h1 class="text-dark" style="font-weight: 450;">SEARCH SONGS</h1>
        </div>
        <form action="searchsong.php" method="GET">
            <div class="row iq-card-header d-flex justify-content-center">
                
                
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 mt-2 mb-2 text-center" >
                    <select class="button-13" style="width: 150px; height: 50px;" name="search" id="" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                        <?php while ($row = mysqli_fetch_assoc($select_run_artist)) { ?>

                        <option value="" hidden>Select artist</option>
                        <option value="<?php echo $row["name"] ?>"><?php echo $row["name"] ?></option>
                 
                        <?php } ?>

                    </select>
                    
                </div>
                
                
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 mt-2 mb-2 text-center" >
                    <select class="button-13" style="width: 150px; height: 50px;" name="search" id="" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                    <?php while ($row = mysqli_fetch_assoc($select_run_genre)) { ?>

                    <option value="" hidden>Select Genre</option>
                    <option value="<?php echo $row["genre"] ?>"><?php echo $row["genre"] ?></option>

                    <?php } ?>
                </select>
                
            </div>
            
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 mt-2 mb-2 text-center">
                <select class="button-13" style="width: 150px; height: 50px;" name="search" id="" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                <?php while ($row = mysqli_fetch_assoc($select_run_album)) { ?>

                <option value="" hidden>Select Genre</option>
                <option value="<?php echo $row["title"] ?>"><?php echo $row["title"] ?></option>

                <?php } ?>
                </select>
                
            </div>
            
        </div>
            <div class="d-flex justify-content-center">

                <div class="col-xl-5 col-lg-2 col-md-3 col-sm-6 mt-2 mb-2 ">
                    
                    <input type="text" placeholder="Type Here..." class="button-13" style="width: 300px; height: 50px;" name="search" id="" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                    <input type="submit" class="button-13" style="height: 50px;" value="Search Song" name="" id="">
                    
                </div>
            </div>
</form>
</div>




</div> -->

<div class="iq-card-header">
    <div class="iq-header-title">
         <br><br>
         
         <div class="container-fluid">
                
             <link href="https://fonts.googleapis.com/css?family=Teko:700&display=swap" rel="stylesheet">
             
             <h1 class="h111"><span class='one'>a</span><span class='two'>l</span><span class='three'>b</span><span class='four'>u</span><span class='five'>m</span><span class='six'>s</span></h1>
            </div>


<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

<div class="content">
  <div class="content__container">
    <p class="content__container__text">
      Every
    </p>
    
    <ul class="content__container__list">
        <li class="content__container__list__item">ALBUM!</li>
        <li class="content__container__list__item">SONG!</li>
        <li class="content__container__list__item">VIDEO!</li>
        <li class="content__container__list__item">ARTIST!</li>
      
    </ul>
  </div>
</div>
<br>
       </div>
       
    </div>
    
    <div class="iq-card-body">
    <div class="row">
		
        
        <?php $i = 1;
            while ($row = mysqli_fetch_assoc($select_run_2)) { ?>
            
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="iq-card" style="border: none;">
                <div class="iq-card-body p-0">
                <div class="iq-thumb">
                    <div class="iq-music-overlay"></div>
                    <a href ="playalbum.php?id=<?php echo $row["id"] ?>">
                        <img style="border-radius: 15px; height: 250px;" src="../admin2/pages/albums/<?php echo $row["image"] ?>" class="img-border-radius img-fluid w-100" alt="">
                    </a>
                
                </div>
                <div class="feature-list text-center">
                    <h4 class="font-weight-600 mb-0 text-light mt-2"><?php echo $row["title"] ?></h4>
                    <p class="mb-0 text-secondary">BY: <?php echo $row["artist"] ?></p>
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
</div>





</div>


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
                                        <a href="playsong.php?id=<?php echo $row["id"] ?>"><i style="font-size: 26px;" class="fas fa-play text-secondary"></i></a> 
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


 

<?php
include "header-footer/footer.php"
?>


<script src="js/js/jquery.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/main.js"></script>