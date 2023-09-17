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



// selecting artist data
$select_album = "SELECT * FROM album";

$select_run_album = mysqli_query($conn, $select_album);
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
    $album = $_POST["album"];

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
 

    $insert = "INSERT INTO `songs`(`album`, `image`, `title`, `artist`, `song`, `genre`, `language`, `date`, `description`) VALUES ('$album', '$image','$title','$artist','$song','$genre','$language','$date','$description')";

    $result = mysqli_query($conn, $insert);
    if($result){
    echo "<script>
    setTimeout(function(){
    window.location = 'songs.php';
    }, 1000);</script>";
    }
}


?>

<link rel="stylesheet" href="../css/addsong.css">








<div class="main-panel">
    <div class="content-wrapper">
        <div class="wrapper">

    <div class="page-header">
        <h3 class="page-title">Add Songs</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="songs.php" style="color: #0D6EFD;">songs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Song</li>
        </ol>
        </nav>
    </div>


    <section class="wizard-section">
		<div class="row" style="display: flex; justify-content: center; align-items: center;">
		
			<div class="col-lg-11 col-md-11" >
				<div class="form-wizard" style="background-color: #191C24;">
					<form action=""] method="post" role="form" enctype="multipart/form-data">
						<div class="form-wizard-header">
							<p>Fill all form field to go next step</p>
							<ul class="list-unstyled form-wizard-steps clearfix">
								<li class="active"><span><i class="mdi mdi-music-circle"></i></span></li>
								<li><span><i class="mdi mdi-pencil"></i></span></li>
								<li><span><i class="mdi mdi-file"></i></span></li>
								<li><span><i class="mdi mdi-check"></i></span></li>
							</ul>
						</div>
						<fieldset class="wizard-fieldset show">
							<h5>Song</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="title">
								<label class="wizard-form-text-label">Song Title*</label>
								<div class="wizard-form-error"></div>
							</div>
                            <div class="form-group">
                            <select class="form-control text-secondary" name="album">
                                <?php while ($row = mysqli_fetch_assoc($select_run_album)) { ?>

                                <option value="" hidden>Select Album</option>
                                <option class="text-secondary"><?php echo $row["title"] ?></option>
                    
                                <?php } ?>
                            </select>
								<!-- <div class="wizard-form-error"></div> -->
							</div>
							<div class="form-group">
                            <select class="form-control text-secondary wizard-required" name="artist">
                                <?php while ($row = mysqli_fetch_assoc($select_run_artist)) { ?>

                                <option value="" hidden>Select Artist</option>
                                <option class="text-secondary"><?php echo $row["name"] ?></option>
                    
                                <?php } ?>
                            </select>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
                            <select class="form-control text-secondary wizard-required" name="genre">
                                <?php while ($row = mysqli_fetch_assoc($select_run_genres)) { ?>

                                <option value="" hidden>Select Genre</option>
                                <option class="text-secondary"><?php echo $row["genre"] ?></option>
                    
                                <?php } ?>
                            </select>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Song Details</h5>
							<div class="form-group">
                            <select class="form-control text-secondary wizard-required" name="language">
                                <?php while ($row = mysqli_fetch_assoc($select_run_languages)) { ?>

                                <option value="" hidden>Select Language</option>
                                <option class="text-secondary"><?php echo $row["languages"] ?></option>
                    
                                <?php } ?>
                            </select>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
                                <label for="username" class="">Release Date*</label>
								<input type="date" class="form-control wizard-required txtDate" name="date" onkeydown="return false">
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
								<label>Song Description*</label>
                                <textarea role="10" cols="30" class="form-control text-secondary wizard-required" name="description"></textarea>
								<div class="wizard-form-error"></div>
							</div>
						
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Song Files</h5>
							<div class="form-group">
								<label >Upload Image*</label>
                                <input type="file" class="form-control text-secondary wizard-required" name="image" required>
								<div class="wizard-form-error"></div>
							</div>
                            <div class="form-group">
								<label >Upload Song*</label>
                                <input type="file" class="form-control text-secondary wizard-required" name="song" required>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;"><input name="submit" type="submit" value="submit" style="border: none;" class="form-wizard-next-btn float-right"></a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Uploaded</h5>
						
                            <div class="form-card">
                                 
                                    <br><br>
                                    <h2 class="text-success text-center"><strong>SUCCESS!</strong></h2>
                                    <br>
                                    <div class="row justify-content-center">
                                       <div class="col-3"> <img src="../images/giphy.png" width="300px" class="fit-image" alt="success-image"> </div>
                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                       <div class="col-7 text-center">
                                          <h5 class="purple-text text-center">Song Successfully uploaded</h5>
                                       </div>
                                    </div>
                                 </div>
						</fieldset>	
					</form>
				</div>
			</div>
		</div>
	</section>




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


<script>
    $(function () {
         var dtToday = new Date(); 
         var month = dtToday.getMonth() + 1;
         var day = dtToday.getDate();
         var year = dtToday.getFullYear(); 
    if(month < 0) 
        month = '0' + month.toString(); 

    if(day < 10)
        day = '0' + day.toString(); 

        var maxDate = year + '-' + month + '-' + day; 

        $('.txtDate').attr('max', maxDate);
})
</script>