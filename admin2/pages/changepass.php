<?php 
session_start();


if (isset($_SESSION['user']['id']) && isset($_SESSION['user']['name'])) {

    include "config.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
        echo "<script type='text/javascript'>
        alert('Old Password is required');
        window.location.href='account.php';
        </script>";
    //   header("Location: account.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
        echo "<script type='text/javascript'>
        alert('New Password is required');
        window.location.href='account.php';
        </script>";
    //   header("Location: account.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
        echo "<script type='text/javascript'>
        alert('The confirmation password does not match');
        window.location.href='account.php';
        </script>";
    //   header("Location: account.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $id = $_SESSION['user']['id'];

        $sql = "SELECT password
                FROM `admin` WHERE 
                id='$id' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE `admin`
        	          SET password='$np'
        	          WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
        	// header("Location: account.php?success=Your password has been changed successfully");
            echo "<script type='text/javascript'>
            alert('Your password has been changed successfully');
            window.location.href='account.php';
            </script>";
	        exit();

        }else {
            echo "<script type='text/javascript'>
            alert('Incorrect password');
            window.location.href='account.php';
            </script>";
        	// header("Location: account.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: account.php");
	exit();
}

}