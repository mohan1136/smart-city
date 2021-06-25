<?php
	require("connection.php");
	$email = $mysqli -> real_escape_string($_POST['email']);
	$password = $mysqli -> real_escape_string($_POST['password']);
	$user_type= $mysqli -> real_escape_string($_POST['user_type']);
	if(!$email && !$password){
		echo "Enter non-empty fields.";
	}	
	else if ($mysqli -> connect_errno) {
	  echo "Error code L; Contact admin or support team or try after sometime...";
	  exit();
	}
	else{
		$password=md5($password);
		$sql="SELECT ".$user_type."_id,name,password FROM users WHERE email='".$email."'";
		if($user_type!="user"){
			$sql="SELECT ".$user_type."_id,name,password,category FROM employees WHERE email='".$email."'";
		}
		$result = $mysqli->query($sql);
		if ($result && $result->num_rows > 0) {
		  // output data of each row
		  //while($row = $result->fetch_assoc()) {
		  	$row = $result->fetch_assoc();
		  	if($row['password']==$password)
		  	{
			  	session_start();
			  	$_SESSION['name']=$row['name'];
			  	$_SESSION['user_type']=$user_type;
			  	if($user_type!="user"){
			  		$_SESSION['category']=$row['category'];
			  	}
			  	$_SESSION['id']=$row[$user_type."_id"];
			  	$mysqli->close();
			    echo "success";
			}
			else{
				echo "Wrong name or password";
			}
		  //}
		} else {
		  echo "Wrong name or password.";
		}
	}
?>