<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}
include "config.php";



if(isset($_GET["id"])){
    $del_id = $_GET["id"];
    
    $delete = "DELETE FROM `admin` WHERE `id` = $del_id";

    $delete_run = mysqli_query($conn, $delete);


}

?>

<script>
    setTimeout(function(){
  window.location = "employee.php";
}, 5);

</script>

<?php 
?>