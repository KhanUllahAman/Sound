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
    $folder = "videoimage/" . $image;
    
    
    $file_name = $_FILES['video']['name'];
    $file_temp = $_FILES['video']['tmp_name'];
    $file_size = $_FILES['video']['size'];
    $folder = "videofile/" . $file_name;

    $title = $_POST["title"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $artist = $_POST["artist"];
    $genre = $_POST["genre"];
    $language = $_POST["language"];
 

    $insert = "INSERT INTO `video`(`image`, `video`, `title`, `description`, `date`, `artist`, `genre`, `language`) VALUES ('$image','$file_name','$title','$description','$date','$artist','$genre','$language')";

    $result = mysqli_query($conn, $insert);
    if($result){
    echo "<script>
    setTimeout(function(){
    window.location = 'video.php';
    }, 500);</script>";
    }
}


?>


<link rel="stylesheet" href="../css/addsong.css">


<div class="main-panel">
    <div class="content-wrapper">


    <div class="page-header">
        <h3 class="page-title">Add Video</h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="video.php">Video</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Video</li>
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
							<h5>Video</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="title">
								<label class="wizard-form-text-label">Video Title*</label>
								<div class="wizard-form-error"></div>
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
							<h5>Video Details</h5>
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
								<label>Video Description*</label>
                                <textarea role="10" cols="30" class="form-control text-secondary wizard-required" name="description"></textarea>
								<div class="wizard-form-error"></div>
							</div>
						
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Video Files</h5>
							<div class="form-group">
								<label >Upload Image*</label>
                                <input type="file" class="form-control text-secondary wizard-required" name="image" required>
								<div class="wizard-form-error"></div>
							</div>
                            <div class="form-group">
								<label >Upload Video*</label>
                                <input type="file" class="form-control text-secondary wizard-required" name="video" required>
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

$target_dir = "videoimage/";
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


 
 if(ISSET($_POST['submit'])){


    $target_dir = "videofile/";
    $target_files = $target_dir . basename($_FILES["video"]["name"]);
    $imageFiletype = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));

     if($file_size < 50000000){
         $file = explode('.', $file_name);
         $end = end($file);
         $allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');


         if(move_uploaded_file($_FILES['video']['tmp_name'], $target_files)) {

            echo "Video added";
             
         }else{
             echo "<script>alert('Wrong video format')</script>";
            //  echo "<script>window.location = 'addvideo.php'</script>";
         }
     }else{
         echo "<script>alert('File too large to upload')</script>";
        //  echo "<script>window.location = 'addvideo.php'</script>";
     }
 }

    
?>






    </div>


    



    <?php
include "../headerandfooter/footer.php"
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






