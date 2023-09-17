<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}

include "config.php";
include "../headerandfooter/headerandsidebar.php";

// selecting artist data
$select_artist = "SELECT * FROM artist";

$select_run_artist = mysqli_query($conn, $select_artist);
// selecting artist data


// selecting Genres data
$select_genres = "SELECT * FROM genres";

$select_run_genres = mysqli_query($conn, $select_genres);
// selecting Genres data


// selecting Language data
$select_languages = "SELECT * FROM languages";

$select_run_languages = mysqli_query($conn, $select_languages);
// selecting Language data


// inserting data
if(isset($_POST["submit"])){
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "songimage/" . $image;
    
    $title = $_POST["title"];
    $artist = $_POST["artist"];

    $song = $_FILES['song']['name'];
    $tmp_name = $_FILES['song']['tmp_name'];
    $error = $_FILES['song']['error'];
    $folder = "songfile/" . $song;

    $genre = $_POST["genre"];
    $language = $_POST["language"];
    $date = $_POST["date"];
    $description = $_POST["description"];
 

    $insert = "INSERT INTO `songs`(`image`, `title`, `artist`, `song`, `genre`, `language`, `date`, `description`) VALUES ('$image','$title','$artist','$song','$genre','$language','$date','$description')";

    $result = mysqli_query($conn, $insert);
    if($result){
    echo "<script>
    setTimeout(function(){
    window.location = 'songs.php';
    }, 500);</script>";
    }
}


?>





<div class="main-panel">
    <div class="content-wrapper">


    <div class="page-header">
        <h3 class="page-title"> Add a new Song </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="songs.php">Songs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Song</li>
        </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Song</h4>
                    <form class="form-sample" method="POST" enctype="multipart/form-data">
                      <p class="card-description"> Deatils </p>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Upload Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control text-secondary" name="image">
                        </div>
                        </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Song Title</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control text-secondary" placeholder="Song Title" name="title" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Artist Name</label>
                            <div class="col-sm-9">
                            <select class="form-control text-secondary" name="artist">
                                <?php while ($row = mysqli_fetch_assoc($select_run_artist)) { ?>

                                <option value="artist" hidden>Select Artist</option>
                                <option class="text-secondary"><?php echo $row["name"] ?></option>
                    
                                <?php } ?>
                            </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Upload Song</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control text-secondary" name="song">
                        </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Genre</label>
                            <div class="col-sm-9">
                            <select class="form-control text-secondary" name="genre">
                                <?php while ($row = mysqli_fetch_assoc($select_run_genres)) { ?>

                                <option value="artist" hidden>Select Genre</option>
                                <option class="text-secondary"><?php echo $row["genre"] ?></option>
                    
                                <?php } ?>
                            </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Language</label>
                            <div class="col-sm-9">
                            <select class="form-control text-secondary" name="language">
                                <?php while ($row = mysqli_fetch_assoc($select_run_languages)) { ?>

                                <option value="artist" hidden>Select Language</option>
                                <option class="text-secondary"><?php echo $row["languages"] ?></option>
                    
                                <?php } ?>
                            </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Release Date</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control text-secondary" name="date" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Song Description</label>
                            <div class="col-sm-9">
                            <textarea class="form-control text-secondary" placeholder="Song Description" name="description"></textarea>
                            </div>
                          </div>
                        </div>
                    
                        </div>
                   
                        <div class="text-center mt-3">
                        <input class="btn btn-inverse-primary btn-lg" type="submit" value="Submit" name="submit">
                        </div>
                    </form>
                  </div>
                </div>
              </div>




                            

            <div style="display: none;">

                <?php

                $target_dir = "songimage/";
                $target_files = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFiletype = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));

                // Check if image file is a actual image file or not

                if(isset($_POST["submit"])){
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false){
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image";
                    $uploadOk =0;
                }
                }
                if($uploadOk == 0){
                echo "Sorry, your file was not uploaded";
                } else {
                if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_files))
                {
                    echo "The file" . htmlspecialchars( basename($_FILES["image"]["name"])). "has been uploaded";
                }
                else{
                    echo "Sorry, your file was not uploaded";
                }
                }


                ?>



                <?php

                if($_FILES['song']['type']=='audio/mpeg' || $_FILES['song']['type']=='audio/mpeg3' || $_FILES['song']['type']=='audio/x-mpeg3' || $_FILES['song']['type']=='audio/mp3' || $_FILES['song']['type']=='audio/x-wav' || $_FILES['song']['type']=='audio/wav')
                { 

                // Where the file is going to be placed
                $target_dir = "songfile/";
                $target_files = $target_dir . basename($_FILES["song"]["name"]);
                $imageFiletype = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));


                //target path where u want to store file.

                //following function will move uploaded file to audios folder. 
                if(move_uploaded_file($_FILES['song']['tmp_name'], $target_files)) {
                echo "file Uploaded";
                }else{
                echo " file not uploaded!";
                }}
                ?>

            </div>




<?php
include "../headerandfooter/footer.php";

?>