<?php
	require("connection.php");
	session_start();
	$rid = mysqli_real_escape_string($mysqli, $_POST["rid"]);
	$update = mysqli_real_escape_string($mysqli, $_POST["update"]);
	$sql = "UPDATE reports SET status='$update' where report_id='$rid'";
	if ($mysqli->query($sql)) {
	  // output data of each row
	  echo "Report status updated";
	} else {
	  	echo "Some error occured. Report admin".$mysqli->error;
	}
?>