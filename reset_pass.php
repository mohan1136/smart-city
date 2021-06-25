<?php
	require("connection.php");
	session_start();
	if($_SESSION['otp-verified']!=true){
		echo "Refresh the page and try again";
		die();
	}
	if(strlen($_SESSION['email'])<1){
		echo "invalid request";
	}
	else{
		$email = mysqli_real_escape_string($mysqli, $_SESSION["email"]);
		$newPass = md5($_POST["pass"]);
		$sql = "UPDATE ".$_SESSION['user_type']."s SET password='$newPass' where email='$email'";
		if ($mysqli->query($sql)) {
		  // output data of each row
		  	echo "success";
			$_SESSION['otp-verified']=false;
		} else {
		  	echo "Some error occured. Report admin";
		}
	}
?>