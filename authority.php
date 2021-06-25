<?php
	error_reporting(0);
	session_start();
	if(!$_SESSION['name']){
		header("Location:home.php");
	}
	if($_SESSION['user_type']=="user"){
		header("Location:citizen.php");
	}
?>
<!DOCTYPE html>
<head>
	<title><?php echo $_SESSION['name']?> page</title>
	<link rel="stylesheet" type="text/css" href="main.css"/>
	<link rel="stylesheet" type="text/css" href="homes.css"/>
</head>
<body>
		<div class="menu-icon">
			<img src="icons/menu-before.jpg" id="menu-icon1" class="menu"/>
			<img src="icons/menu-after.png" id="menu-icon2" class="menu"/>
		</div>
	<div class="side-menu" id="side-menu" align="center">
		<p class="button" onclick="showSection(0)">View problems</p>
		<p class="button" onclick="showSection(1)">My profile</p>
		<a href="home.php"><p class="button">Beck to home</p></a>
		<a href="logout.php"><p class="button">Logout</p></a>
	</div>
	<p class="main">Welcome <?php echo $_SESSION['name']?></p>
	<div class="frame flex-container" name="a">
		<section id="reports" class="home-view">
			<div align="center">
				<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Problems reported</p>
				<p id="updateStatus">-</p><br>
			</div>
			<div class="flex-container">
			<?php
				require("connection.php");
				$sql="SELECT * FROM reports WHERE category='".$_SESSION['category']."'";
				$result = $mysqli->query($sql);
				if ($result && $result->num_rows > 0) {
				  	echo "<table>
								<tr>
									<th>Problem ID</th>
									<th>Date reported on</th>
									<th>Problem statement</th>
									<th>Status</th>
									<th>Action</th>
									<th>Citizen contact</th>
									<th>Citizen email</th>
								<tr>";
				  	while($row = $result->fetch_assoc()) {
					  	echo "<tr>
				  				<td>".$row['report_id']."</td>
								<td>".$row['reportedDate']."</td>
								<td>".$row['problem']."</td>
								<td>
									<textarea id='".$row['report_id']."'>".$row['status']."</textarea></td>
								<td><button onclick='update_status(".$row['report_id'].")'>Update status</button>";
					  	$sql2="SELECT email,contact FROM users WHERE user_id=".$row['user_id'];
					  	$result2=$mysqli->query($sql2);
					  	if($result2 && $result2->num_rows==1){
					  		$row2=$result2->fetch_assoc();
					  		echo "
				  				<td>".$row2['contact']."</td>
								<td>".$row2['email']."</td>";
					  	}
					  	echo "</tr>";
				  	}
				  	echo "</table>";
				} else {
				  echo "No reports for your department";
				}
			?>
			</div>
		</section>
		<section id="profile" class="home-view">
			<div align="center">
				<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">My profile</p>
				<p id="delStatus" style="display: none">
			</div>
			<?php
				$sql="SELECT * FROM ".$_SESSION['user_type']."s WHERE ".$_SESSION['user_type']."_id=".$_SESSION['id'];
				$result = $mysqli->query($sql);
				if ($result && $result->num_rows > 0) {
				  // output data of each row
				  $row = $result->fetch_assoc();
				  foreach($row as $field => $value){
				  	if($field=="password"){
				  		continue;
				  	}
				  	if($value){
				  		echo "<p>".$field." : ".$value."</p>";
				  	}
				  }
				} else {
				  echo "Something error occured while accessing your profile".$mysqli->error;
				}
			?>
		</section>
	</div>
	<script type="text/javascript">
		function update_status(rId){
			var update=document.getElementById(""+rId).value;
			if(update==""){
				document.getElementById("updateStatus").innerHTML="Enter something to update.";
				return false;	
			}
			document.getElementById("updateStatus").innerHTML="Updating status";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("updateStatus").innerHTML=this.responseText;
				}
			};
			xhttp.open("POST", "update_report_status.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("rid")+"="+encodeURIComponent(rId)+"&"+encodeURIComponent("update")+"="+encodeURIComponent(update));
		}
		var active=0;
		<?php
			$nav=$_GET['nav'];
			$index=array_search($nav,['reports', 'profile']);
			if($index==null){
				echo "document.getElementById('reports').style.display='block';active=0;";
			}
			else{
				echo "document.getElementById('".$nav."').style.display='block';active=".$index.";";
			}
		?>
		var images=document.getElementsByClassName('slide')
		document.getElementById("menu-icon1").addEventListener("click",function(){
			document.getElementById("menu-icon1").style.visibility="hidden";
			document.getElementById("menu-icon2").style.visibility="visible";
			document.getElementById("side-menu").style.visibility="visible";
		});
		document.getElementById("menu-icon2").addEventListener("click",function(){
			document.getElementById("menu-icon2").style.visibility="hidden";
			document.getElementById("menu-icon1").style.visibility="visible";
			document.getElementById("side-menu").style.visibility="hidden";
		});
		function showSection(secNum){
			document.getElementsByClassName("home-view")[active].style.display="none";
			document.getElementsByClassName("home-view")[secNum].style.display="block";
			active=secNum;
		}
	</script>
	</div>
</body>