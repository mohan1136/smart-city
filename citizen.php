<?php
	error_reporting(0);
	session_start();
	if(!$_SESSION['name']){
		header("Location:home.php");
	}
	if($_SESSION['user_type']!="user"){
		header("Location:authority.php");
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
		<p class="button" onclick="showSection(0)">Reported problems</p>
		<p class="button" onclick="showSection(1)">Report a problem</p>
		<p class="button" onclick="showSection(2)">My profile</p>
		<a class="button" href="home.php">Back to home</a>
		<a href="logout.php"><p class="button">Logout</p></a>
	</div>
	<p class="main">Welcome <?php echo $_SESSION['name']?></p>
	<?php
		if($_SESSION['msg']){
			echo "<script>alert('".$_SESSION['msg']."');</script>";
			$_SESSION['msg']="";
		}
	?>
	<div class="frame flex-container" name="a">
		<section id="reported-problems" class="home-view">
			<div align="center">
				<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Reported problems</p>
			</div>
			<div class='flex-container'>
				<?php
					require("connection.php");
					$sql="SELECT * FROM reports WHERE user_id=".$_SESSION['id'];
					$result = $mysqli->query($sql);
					if ($result && $result->num_rows > 0) {
						echo "<table>
								<tr>
									<th>Problem ID</th>
									<th>Date reported on</th>
									<th>Problem statement</th>
									<th>Status</th>
								<tr>";
					  	while($row = $result->fetch_assoc()) {
					  		echo "<tr>
					  				<td>".$row['report_id']."</td>
									<td>".$row['reportedDate']."</td>
									<td>".$row['problem']."</td>
									<td>".$row['status']."</td>
								 </tr>";
					 	}
						echo "</table>";
					} else {
					  echo "No problems reported yet...:)";
					}
				?>
			</div>
		</section>
		<section id="new-problem" class="home-view">
			<div align="center">
				<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Reporting new Problem</p>
			</div>
			<div class="flex-container">
				<form method="post" action="report_problem.php">
					<br>
					<?php
						require("connection.php");
						$sql="SELECT * FROM categories";
						$result = $mysqli->query($sql);
						if ($result && $result->num_rows > 0) {
						  // output data of each row
							echo "<select name='category'>
									<option value='-1'>--SELECT--</option>";
						  	while($row = $result->fetch_assoc()) {
						  		echo "<option value='".$row['name']."'>".$row['name']."</option> ";
						 	}
							echo "</select>";
						} else {
						  echo "Something error occured";
						}
					?>
					<br><br><textarea style="padding:5px" required type="text" name="problem" placeholder="Problem statement in 256 charecters" maxlength="256"></textarea><br><br>
					<input type="submit" name="submit" value="Submit problem">
				</form>
			</div>
		</section>
		<section id="profile" class="home-view">
			<div align="center">
				<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">My profile</p>
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
				  echo "Something error occured while accessing your profile";
				}
			?>
		</section>
	</div>
	<script type="text/javascript">
		var active=0;
		<?php
			$nav=$_GET['nav'];
			$index=array_search($nav,['reported-problems', 'new-problem', 'profile']);
			if($index==null){
				echo "document.getElementById('reported-problems').style.display='block';active=0;";
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