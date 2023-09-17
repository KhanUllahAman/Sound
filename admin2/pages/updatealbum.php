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


 // redirect with javascript
 $redirect = 
    '<script>
        setTimeout(function(){
        window.location = "album.php";
        }, 500);
    </script>';
 // redirect with javascript

// inserting data
if(isset($_POST["update"])){
    $id = $_POST["id"];

    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "songimage/" . $image;
    
    $title = $_POST["title"];
    $artist = $_POST["artist"];
    $tracks = $_POST["tracks"];
    $date = $_POST["date"];
 

    $update = "UPDATE `album` SET `id`='$id',`image`='$image',`title`='$title',`artist`='$artist',`tracks`='$tracks',`date`='$date' WHERE `id`=$id";


    $update_run = mysqli_query($conn, $update);
    if($update_run){
        echo "$redirect";
    }
}





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


<link rel="stylesheet" href="../css/addsong.css">







<div class="main-panel">
    <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title"> Update Album </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update album</li>
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
							<h5>Album</h5>
                            <div class="col-md-6">
                                <div class="form-group row">
                            <!-- <label class="col-sm-3 col-form-label">Upload Image</label> -->
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control text-secondary" name="id" value="<?php echo $id ?>" >
                                </div>
                                </div>
                            </div>

							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="title" value="<?php echo $title ?>">
								<label class="wizard-form-text-label">Album Title*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
                            <select class="form-control text-secondary wizard-required" name="artist">
                                <?php while ($row = mysqli_fetch_assoc($select_run_artist)) { ?>

                                <option value="" hidden><?php echo $artist ?></option>
                                <option class="text-secondary"><?php echo $row["name"] ?></option>
                    
                                <?php } ?>
                            </select>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Album Details</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="tracks" value="<?php echo $tracks ?>">
								<label class="wizard-form-text-label">Total Tracks*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
                                <label for="username" class="">Release Date*</label>
								<input type="date" class="form-control wizard-required txtDate" name="date" value="<?php echo $date ?>" onkeydown="return false">
								<div class="wizard-form-error"></div>
							</div>
						
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Image</h5>
							<div class="form-group">
								<label >Upload Image*</label>
                                <input type="file" class="form-control text-secondary wizard-required" name="image" required value="<?php echo $image ?>">
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;"><input name="update" type="submit" value="Update" style="border: none;" class="form-wizard-next-btn float-right"></a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Updated</h5>
						
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
                                          <h5 class="purple-text text-center">Song Successfully Updated</h5>
                                       </div>
                                    </div>
                                 </div>
						</fieldset>	
					</form>
				</div>
			</div>
		</div>
	</section>




    


            <?php
                } else {
                echo "";
            } ?>




                      

<div style="display: none;">

<?php

$target_dir = "albums/";
$target_files = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFiletype = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));

// Check if image file is a actual image file or not

if(isset($_POST["update"])){
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