<?php
session_start();
//Checking User Logged or Not
if (empty($_SESSION['user'])) {
    header('location:login.php');
}

include "config.php";
include "../headerandfooter/headerandsidebar.php";




if (isset($_POST["update"])) {

    $id = $_POST["id"];

    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../../user/images/" . $image;

    $quote = $_POST["quote"];
    $position = $_POST["position"];


    $update = "UPDATE `artistquotes` SET `image`='$image',`quote`='$quote',`position`='$position' WHERE `id`=$id";

    $update_run = mysqli_query($conn, $update);
    if ($update_run) {
        echo "<script> location.href='user.php'; </script>";
    } else {
        echo "error";
    }
} else {
    echo "error";
}




if (isset($_GET["id"])) {
    $idget = $_GET["id"];
    $select = "SELECT * FROM `artistquotes` WHERE `id` = $idget";
    $select_run = mysqli_query($conn, $select);

    if ($select_run) {
        while ($row = mysqli_fetch_assoc($select_run)) {
            $id = $row["id"];
            $image = $row["image"];
            $quote = $row["quote"];
            $position = $row["position"];
        }
    } else {
        echo "Error";
    }

?>


    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Update Quote</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="user.php">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Quote</li>
                    </ol>
                </nav>
            </div>


            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Quote</h4>
                        <form class="form-sample" method="POST" enctype="multipart/form-data">

                            <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <!-- <label class="col-sm-3 col-form-label">ID</label> -->
                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control text-secondary" value="<?php echo $id ?>" name="id">
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row" style="display: flex; justify-content: center; align-items: center;">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control text-secondary" value="<?php echo $image ?>" name="image" />
                                            <p><?php echo $image ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row" style="display: flex; justify-content: center; align-items: center;">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                                        <div class="col-sm-12">
                                            <!-- <input type="text" class="form-control text-secondary" placeholder="Quote" value="<?php echo $quote ?>" name="quote" /> -->
                                            <textarea name="quote" class="form-control text-secondary" placeholder="<?php echo $quote ?>" cols="30" rows="10"><?php echo $quote ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="display: flex; justify-content: center; align-items: center;">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <!-- <label class="col-sm-3 col-form-label">Song Title</label> -->
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control text-secondary" placeholder="Position" value="<?php echo $position ?>" name="position" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-center mt-3">
                                <input class="btn btn-inverse-primary btn-lg" type="submit" value="Update" name="update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>






        <?php
    } else {
        echo "";
    } ?>







        <div style="display: none;">

            <?php

            $target_dir = "../../user/images/";
            $target_files = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFiletype = strtolower(pathinfo($target_files, PATHINFO_EXTENSION));

            // Check if image file is a actual image file or not

            if (isset($_POST["update"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image";
                    $uploadOk = 0;
                }
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_files)) {
                    echo "The file" . htmlspecialchars(basename($_FILES["image"]["name"])) . "has been uploaded";
                } else {
                    echo "Sorry, your file was not uploaded";
                }
            }


            ?>

        </div>




        <?php
        include "../headerandfooter/footer.php"
        ?>