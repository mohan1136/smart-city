<?php
	require("connection.php");
	session_start();
	$problem = mysqli_real_escape_string($mysqli, $_POST["problem"]);
	if($_POST["category"]==-1){
		$_SESSION["msg"]="Some some category to proceed";
	  	header("Location:citizen.php?nav=new-problem");
	}
	else{
		$categoty = mysqli_real_escape_string($mysqli, $_POST["category"]);
		$sql = "INSERT INTO reports(problem,category,user_id,reportedDate) VALUES('$problem','$categoty','".$_SESSION['id']."','".date("Y/m/d")."')";
		if ($mysqli->query($sql)) {
		 	$_SESSION["msg"]="Problem reported successfully";
		  	header("Location:citizen.php?nav=reported-problems");
		} else {
		  	$_SESSION["msg"]="Some error occured. Report admin";
		  	header("Location:citizen.php?nav=new-problem");
		}
	}
?>