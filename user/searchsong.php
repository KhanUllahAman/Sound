<?php
session_start();
//Checking User Logged or Not
if (empty($_SESSION['user'])) {
    header('location:login.php');
}

include "header-footer/header.php";

include "../admin2/pages/config.php";


$select_2 = "SELECT * FROM album ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_2 = mysqli_query($conn, $select_2);


$select_3 = "SELECT * FROM artist ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_3 = mysqli_query($conn, $select_3);

$select_4 = "SELECT * FROM video ORDER BY RAND(time_to_sec(current_time()) / 600) LIMIT 12";

$select_run_4 = mysqli_query($conn, $select_4);




?>





<style>
    .containeer {
        max-width: 1024px;
        padding: 3rem 0;
    }

    .chair_card {
        background: #f7ead9;
        height: 500px;
        border-radius: 2rem;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .lamp_card {
        background: black;
        height: 420px;
        border-radius: 2rem;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .couch_card {
        background: #000000;
        height: 500px;
        border-radius: 2rem;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .title {
        color: #fff;
        font-size: 1.1rem;
        font-weight: 600;
        margin: 10px 0 0 0;
    }

    .description {
        color: #94908d;
        font-size: 0.9rem;
        font-weight: 550;
        margin: 0;
    }

    .circle {
        width: 50px;
        height: 50px;
        background: #fff;
        border: 2px solid;
        padding: 1rem 0 0;
        margin: 1.5rem 0 0;
    }

    .chair_bg,
    .lamp_bg,
    .couch_bg {
        border-color: #acb9c9;
    }

    @media (max-width:992px) {
        .containeer {
            max-width: 720px;
        }

        .lamp_card,
        .chair_card,
        .couch_card {
            margin-bottom: 2rem;
        }
    }
</style>



<div class="container-fluid" style=" background-color: #0d0f0f; margin-top: 110px;">

    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header">
                <div class="iq-header-title">
                    <br><br><br>
                    <h4 class="card-title text-center" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">SEARCH RESULT</h4>
                    <br>
                </div>

            </div>





            <br><br><br>
            <div class="iq-card-body">
                <div class="row">

                    <?php
                    if (isset($_GET['search'])) {
                        $filtervalues = $_GET['search'];

                        $query = "SELECT * FROM songs WHERE CONCAT(id,image,title,artist,song,genre,language,date,description) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($conn, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $items) {
                    ?>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="container" style="height: 480px; background-color: black; border-radius: 40px;">
                                        <div class="lamp_card">
                                            <a href="playsong.php?id=<?php echo $items["id"] ?>"><img src="../admin2/pages/songimage/<?php echo $items["image"] ?>" style="border-radius: 20px; margin-top: 10px; width: 100%; height: 260px;" alt="sm-chair"></a>
                                            <h1 class="title text-center"><?php echo $items["title"] ?></h1>
                                            <p class="description text-center">
                                                <?php echo $items["artist"] ?>
                                            </p>
                                            <div style="display: flex; justify-content: center; align-items: center;">
                                                <div class="circle text-center rounded-circle chair_bg mx-auto">
                                                    <a href="playsong.php?id=<?php echo $items["id"] ?>"><i style="font-size: 26px;" class="fas fa-play text-secondary"></i></a>
                                                </div>
                                                <div class="circle text-center rounded-circle chair_bg mx-auto">
                                                    <a href=""><i style="font-size: 26px;" class="fas fa-heart text-danger"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            <?php
                            }
                        } else {
                            ?>
                            <div>
                                <h1 class="text-secondary">No record found!</h1>
                            </div>

                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>





<section class="ftco-section mt-3">
    <div class="container" style="background-color: #1f1f1f; padding: 40px; border-radius: 20px;">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <br>
                    <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TRENDING ALBUMS</h4>
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
                                        <a href="playalbum.php?id=<?php echo $row["id"] ?>">
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
                    <br>
                    <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TRENDING VIDEOS</h4>
                    <br>
                </div>
                <div class="d-flex align-items-center iq-view">
                    <b><a href="videos.php" class="mb-0 text-danger">View More</a></b>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="featured-carousel owl-carousel">


                        <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_4)) { ?>

                            <div class="iq-card" style="border: none;">
                                <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                        <div class="iq-music-overlay"></div>
                                        <a href="playvideo.php?id=<?php echo $row["id"] ?>">
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
                    <br>
                    <h4 class="card-title" style="color: #ffffff; font-size: 40px; font-family:  havana sunset sans filled;">TOP ARTIST</h4>
                    <br>
                </div>
                <div class="d-flex align-items-center iq-view">
                    <b><a href="artist.php" class="mb-0 text-danger">View More</a></b>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="featured-carousel owl-carousel">

                        <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($select_run_3)) { ?>


                            <div class="iq-card" style="border: none;">
                                <div class="iq-card-body p-0" style="width: 280px;">
                                    <div class="iq-thumb">
                                        <div class="iq-music-overlay"></div>
                                        <a href="showartist.php?id=<?php echo $row["id"] ?>">
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
include "header-footer/footer.php"
?>


<script src="js/js/jquery.min.js"></script>
<script src="js/js/popper.js"></script>
<script src="js/js/bootstrap.min.js"></script>
<script src="js/js/owl.carousel.min.js"></script>
<script src="js/js/main.js"></script>