<?php
	error_reporting(0);
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Our smart market</title>
	<link rel="stylesheet" type="text/css" href="main.css"/>
	<meta charset="utf-8">
</head>
<body>
	<div>
		<section id="main">
			<header class="flex-container">
				<section class="flex-container">
					<img src="images/logo.png" alt="logo" height="60px" style="object-fit: contain;background-repeat: no-repeat;">
					<section>
						<p class="text-center" style="font-size: 20px;">Our smart city</p>
						<em class="text-right" style="font-size:13px;">- Technology to its full potential</em>
					</section>
				</section>
				<p onclick="showPopup(0)" class="nav-link">About us</p>
				<p onclick="showPopup(1)" class="nav-link">Success stories</p>
				<div align="center" id="topDev">
					<div id="iconDiv" onclick="showMenu()" align="center" id="overFlowMenu">
						<img src="images/menu.svg" >
					</div>
				</div>
				<?php
					if($_SESSION['name']){
						echo "<div class='flex-container'>
								<img id='profile-img' src='icons/defaultProfile.svg' style='width:50px'>
							  	<span>&nbsp;&nbsp;</span>
								  <div style='position:relative' class='profile'>
							  		<img src='icons/triangle-bottom-arrow.png' style='width:10px'>
							  		<div class='profile-options'>
							  			<p>".$_SESSION['name']."</p>";
							  			if($_SESSION['user_type']=="user"){
								  		 	echo "
								  		 	<a style='padding:5px;' href='citizen.php?nav=reported-problems'>Reported Problems</a>
								  			<a style='padding:5px;' href='citizen.php?nav=new-problem'>Report a problem</a>
								  			<a style='padding:5px;' href='citizen.php?nav=profile'>My profile</a>";
							  			}
							  			else{
							  				echo "
							  				<a style='padding:5px;' href='authority.php?nav=view-reports'>View reports</a>
							  				<a style='padding:5px;' href='authority.php?nav=profile'>My profile</a>";
							  			}
							  		echo   "<a style='padding:5px;' href='logout.php'>Logout</a>
							  		</div>
								  </div>
							  </div>";
					}
					else{
						echo "<section class='text-right child'>
							<a href='#' class='btn-link' onclick='showHideForms_popupNum(0,2)'>Log in</a>
							<a href='#' class='btn-link' onclick='showHideForms_popupNum(1,2)'>Sign up</a>
						</section>";
					}
				?>
			</header>
			<!--main content-->
			<section class="slider-flex" style="background-image: url('images/default_back.jpg');background-size: cover;background-repeat: no-repeat;height: 90vh;">
					<img src="images/banner_0.png" class="slide">
					<img src="images/banner_1.png" class="slide">
					<img src="images/banner_2.jpeg" class="slide">
					<img src="images/banner_3.jpeg" class="slide">
					<img src="images/banner_4.jpeg" class="slide">
					<img src="images/banner_5.jpeg" class="slide">
					<img src="icons/line-angle-left.svg" class="nav-btn" id="nav-btn-left" onclick="slideLeft()">
					<img src="icons/line-angle-left.svg" class="nav-btn" id="nav-btn-right" onclick="slideRight()">
			</section>
			<section class="body-item"  style="background-color: rgb(82, 172, 255);overflow: auto;">
				<div align="center">
					<p class="popupHeader" align="center">Our Team Members</p>
				</div>
				<div id="team">
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Reddypavan S</p>
						<p class="profileDetail">R161735</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Yaseer Hussain S</p>
						<p class="profileDetail">R161637</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Ganesh Kumar B</p>
						<p class="profileDetail">R161399</p>
					</div>
					<div class="teammate">
						<img src="icons/women_icon.png" class="profileImg">
						<p class="profileDetail">Charitha K</p>
						<p class="profileDetail">R161216</p>
					</div>
					<div class="teammate">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<p class="profileDetail">Mohan Kumar R</p>
						<p class="profileDetail">R161040</p>
					</div>
				</div>
			</article>
			</section>
			<footer class="flex-container">
				<ul type="none">
					<li>: : Contact us : :</li>
					<li>Block no.</li>
					<li>Building</li>
					<li>Place and pic code</li>
					<li>No. <span style="cursor: pointer;font-family: initial;font-weight: 500;">9848022338</span></li>
				</ul>
				<p onclick="showPopup(0)" class="nav-link">About us</p>
				<p onclick="showPopup(1)" class="nav-link">Success stories</p>
				<p class="text-center">Copyright @our-smart-city</p>
			</footer>
		</section>
		<section class="popup-container">
			<article id="popup-body" style="width: 70vw;margin:5vh 15vw;background-color: rgba(47, 50, 56,0.8);">
				<img src="icons/close-svgrepo-com.svg" class="closePopup" onclick="hidePopup(0);" style="right: 15vw" />
				<div align="center">
					<p class="popupHeader" align="center" style="color: rgb(57, 255, 227);">Our Story</p>
				</div><br>
				<p style="color: white;line-height: 45px;font-size: 20px; padding: 20px;">Hi there we the team of our-smart-city which is focused on values, morals and based on trust. <br>We here do many things that are favourable towards the socuiety needs and we here creating a technological revoution in reporting problems through any internet accessible device. <br>We are here to say that we are there for you to protect you from unheiginic places, from being facing many problems that you feel shy or not allowed to report by coming to office/ police statio n in person. <br>One report of your problem up here will be one stop solution for all your problems and we are here proudly to say that we take responsibility of solving your problems and making this place so called Earth a better place to live on. <br>Our-smart-city here signing off...:)</p>
			</article>
		</section>
		<section class="popup-container">
			<article id="popup-body" style="width: 70vw;margin:5vh 15vw;background-color: rgb(82, 172, 255);">
				<img src="icons/close-svgrepo-com.svg" class="closePopup" onclick="hidePopup(1);" style="right: 15vw" />
				<div align="center">
					<p class="popupHeader" align="center">Our users success stories</p>
				</div>
				<div>
					<div class="opinion">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<div>
							<p class="profileDetail">Yaseer Kumar</p>
							<p class="profileDetail">This helped me a lot to solve my home problems and as well as public problems</p>
						</div>
					</div>
					<div class="opinion">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<div>
							<p class="profileDetail">Mohan Hussain</p>
							<p class="profileDetail">This helped me to save many lifes from being shattered I reported a problem that two women facing as they don't have shelter.</p>
						</div>
					</div>
					<div class="opinion">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<div>
							<p class="profileDetail">Ganesh Pavan</p>
							<p class="profileDetail">This enabled a very healthy environment to my family and my fellow mates for a clean resposible and healthy environment</p>
						</div>
					</div>
					<div class="opinion">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<div>
							<p class="profileDetail">Reddypavan Kumar</p>
							<p class="profileDetail">This portal enabled me to access srvices straight from my phone without reounding around officies for days and even avoided bribary</p>
						</div>
					</div>
					<div class="opinion">
						<img src="icons/defaultProfile.svg" class="profileImg">
						<div>
							<p class="profileDetail">Charitha</p>
							<p class="profileDetail">This portal helped me to solve my relatives home voilence problem</p>
						</div>

					</div>
				</div>
			</article>
		</section>
		<section class="popup-container">
			<img src="icons/close-svgrepo-com.svg" class="closePopup" onclick="hidePopup(2);" style="right: 20vw;top: 10vh" />
			<article id="popup-body" class="flex-container" style="width: auto;margin: 5vw 20vw;height: 80%;flex-wrap: nowrap;overflow:hidden;">
				<img src="images/go_vegan.jpeg" style="background-color: black;width: 26vw" id="go_vegan" />
		 		<form id="login" method="POST" onsubmit="return false" name="login">
						<div align="center">
							<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Login</p>
							<!-- <span id="reset-status" style="color: red"></span> -->
						</div>
						<span id="reset-status" style="justify-content: center;display: none;"></span>
						<input required type="email" name="email" placeholder="Enter emial">
						<input required type="password" name="password" placeholder="Enter Password"><br>
						<div class="flex-container" style="justify-content: center;">
							<div class="flex-container" style="margin-right:5px;">
								<input required type="radio" name="user_type" value="user" />
								<label >Citizen</label>
							</div>
							<div class="flex-container" style="margin-left:5px;">
								<label for="seller">Authority</label>
								<input required type="radio" name="user_type" value="employee"/>
							</div>
						</div>
						<input type="submit" name="login" value="Login" onclick="check_login()"><br>
						<div class="flex-container" style="justify-content: center;padding: 30px;">
							<p onclick="showHideForms_popupNum(2,-1)" class="form-link">Forgot Password</p>
							<p onclick="showHideForms_popupNum(1,-1)" class="form-link">Sign up</p>
						</div>
				</form>
				<form id="signup" method="POST" name="signup" style="overflow: auto;max-height: 494px;width: 57%;" onsubmit="return false">
						<div align="center">
							<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Register</p>
						</div>
						<span id="register-status" style="justify-content: center;display: none;"></span>
						<input type="text" placeholder="Name" name="name" required><br>\
						<input type="email" placeholder="Email address" name="email" required><br>
						<input type="text" placeholder="Contact no.(10 digits)" name="contact" required><br>
						<input type="password" name="pass" placeholder="Password" required><br>
						<input type="password" placeholder="Confirm Password" name="confirm-pass" required><br>
						<input required type="submit" name="submit" value="signup" onclick="register()">
						<div class="flex-container" style="justify-content: center;padding: 30px;">
							<p class="form-link" onclick="showHideForms_popupNum(2,-1)">Forgot Password</p><br>
							<p class="form-link" onclick="showHideForms_popupNum(0,-1)">Login</p>
						</div>
					</form>
					<form id="reset-password" onsubmit="return false" name="reset" style="overflow: auto;max-height: 494px;width: 60%;" onkeydown="return event.key != 'Enter';">
						<div align="center">
							<p class="popupHeader" style="border-bottom-color: black;margin-bottom: 10px;">Reset password</p>
						</div>
						<input required type="email" name="mail" placeholder="Enter registered mail ID">
						<div class="flex-container" style="justify-content: center;" id="reset-pass-user">
							<div class="flex-container" id="reset-user-type" style="margin-right:5px;">
								<input required type="radio" name="user_type" value="user" />
								<label >Citizen</label>
							</div>
							<div class="flex-container" style="margin-right:5px;">
								<label for="seller">Authority</label>
								<input required type="radio" name="user_type" value="employee"/>
							</div>
						</div>
						<span id="mail-status" style="justify-content: center;display: none;"></span>
						<input id="otp-div" style="display: none" required type="password" name="otp" placeholder="Enter OTP">
						<input id="pass-div" style="display: none" required type="password" name="pass" placeholder="Password">
						<input id="confirm-pass-div" style="display: none" required type="password" name="confirm-pass" placeholder="Confirm password">
						<div style="display: inline-flex;">
							<input id="otp-btn" type="submit" name="submit" value="Send OTP" onclick="send_mail()"><br>
							<input id="reset-btn" type="submit" name="submit" value="Validate otp" onclick="validate_otp()" style="display: none;"><br>
						</div>
					</form>
				</div>
			</article>
		</section>
	</div>
	<script type="text/javascript">
		var images=document.getElementsByClassName('slide'),active=0,move=-window.innerWidth;
		//move for how much the items to be moved. images is Collection of items
		var n=images.length;//no. of images
		var slideInterval;
		document.body.onresize=()=>{
			clearInterval(slideInterval);
			active=n-1;
			slide();
			slideInterval=setInterval(slide,5000);
		}
		function slide(scrollTo)
		{
			images[active].animate(//zoom out animation
				[
					{width:"calc(100vw - 10vh)",height:"80vh",margin:"5vh"}
				],
				{
					duration:500,
					easing:"cubic-bezier(0, 0, 0, 1)",
					fill:"forwards"
				}
			);
			if(scrollTo==-1){
				active=(active-1+n)%n;
				if(active==n-1){
					move-=window.innerWidth*(n-2);//move to n-1 slide i.e move n-2 times
				}
				else{
					move+=window.innerWidth*2;
				}
			}
			else if(active==n-1)
			{//moving to initial when all items are over
				move=0;
				active=0;
			}
			else
			{
				active++;
			}
			for(var i=0;i<n;i++)
			{
				images[i].animate(//moving animation
					[
						{ transform:"translateX("+move+"px)"}
					],
					{
						duration:1000,
						easing:"cubic-bezier(0, 0, 0, 1)",
						fill:"forwards",
						delay:500
					}
				);
			}
			images[active].animate(//zooming animation
					[
						{width:"100vw",height:"90vh",margin:0}
					],
					{
						duration:1000,
						easing:"cubic-bezier(0, 0, 0, 1)",
						fill:"forwards",
						delay:1500
					}
				);
			move-=window.innerWidth;//for moving one item left
		}
		slideInterval=setInterval(slide,5000);
		function slideLeft(){
			clearInterval(slideInterval);
			slide(-1);
			slideInterval=setInterval(slide,5000);
		}
		function slideRight(){
			clearInterval(slideInterval);
			slide();
			slideInterval=setInterval(slide,5000);
		}
		function check_login(){
			var email=document.forms[0]["email"].value;
			var password=document.forms[0]["password"].value;
			var user_type=document.forms[0]["user_type"].value;
			if(email=="" || password=="" || user_type==""){
				document.getElementById("reset-status").innerHTML="Enter non-empty values";
				document.getElementById("reset-status").style.display="block";
				return false;
			}
			document.getElementById("reset-status").innerHTML="Checking credentials...";
			document.getElementById("reset-status").style.display="block";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("reset-status").innerHTML=this.responseText;
					if(this.responseText=="success"){
						if(user_type=="user"){
							location.assign("citizen.php");
						}
						else{
							location.assign("authority.php");
						}
					}
				}
			};
			xhttp.open("POST", "check-login.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("email")+"="+encodeURIComponent(email)+"&"+encodeURIComponent("password")+"="+encodeURIComponent(password)+"&"+encodeURIComponent("user_type")+"="+encodeURIComponent(user_type));
		}
		function register()
		{
			var name = document.forms[1]['name'].value, email = document.forms[1]['email'].value,contact=document.forms[1]["contact"].value, pass = document.forms[1]['pass'].value, confirm_pass = document.forms[1]['confirm-pass'].value;
			if(name=="" || email=="" || contact=="" || pass=="" || confirm_pass==""){
				document.getElementById("register-status").innerHTML="Enter non-empty values";
				document.getElementById("register-status").style.display="block";
				return false;
			}
			else if(pass!=confirm_pass){
				document.getElementById("register-status").innerHTML="Passwords aren't same...";
				document.getElementById("register-status").style.display="block";
				return false;	
			}
			document.getElementById("register-status").innerHTML="Registering user...";
			document.getElementById("register-status").style.display="block";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if(this.responseText=="success"){
						document.getElementById("reset-status").innerHTML="Registration successful. Please login!";
						document.getElementById("reset-status").style.display="block";
						showHideForms_popupNum(0,-1);
					}
					else{
						document.getElementById("register-status").innerHTML=this.responseText;
					}
				}
			};
			xhttp.open("POST", "register.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("name")+"="+encodeURIComponent(name)+"&"+encodeURIComponent("email")+"="+encodeURIComponent(email)+"&"+encodeURIComponent("contact")+"="+encodeURIComponent(contact)+"&"+encodeURIComponent("pass")+"="+encodeURIComponent(pass));
		}
		function showPopup(popupNum)
		{
			document.getElementsByClassName("popup-container")[popupNum].animate(
				[{
					opacity:1,top:0
				}],
				{
					duration:500,
					fill:"forwards"
				}
			);
			
			document.getElementById('main').animate(
				[{
					filter:"blur(5px)"
				}],
				{
					duration:500,
					fill:"forwards"
				}
			)
			clearInterval(slideInterval);
			document.body.style.overflowY="hidden";
		}
		function hidePopup(popupNum)
		{
				document.getElementsByClassName("popup-container")[popupNum].animate(
					[{
						opacity:0,top:"-120vh"
					}],
					{
						duration:500,
						fill:"forwards"
					}
				);
				document.getElementById('main').animate(
					[{
						filter:"blur(0)"
					}],
					{
						duration:500,
						fill:"forwards"
					}
				);
				document.body.style.overflowY="auto";
				slideInterval=setInterval(slide,5000);
		}
		function showHideForms_popupNum(formNum,popupNum){
			var forms=document.forms
			for (var i = forms.length - 1; i >= 0; i--) {
				forms[i].style.display="none";
			}
			document.forms[formNum].style.display="block";
			if(popupNum!=-1){
				showPopup(popupNum);
			}
		}
		var visible=0;
		var headChild=document.getElementsByClassName("child");
		var x=window.matchMedia("(min-width:560px)");
		function showMenu()
		{
			for(var i=0;i<headChild.length;i++)
			{
				if(visible)
					headChild[i].style.display="none";
				else
					headChild[i].style.display="block";
			}
			visible=visible ^ 1;
		}
		function show_or_hide_menu(x)
		{
			if(x.matches)
			{
				for(var i=0;i<headChild.length;i++)
				{
					headChild[i].style.display="block";
				}
			}
		}
		x.addListener(show_or_hide_menu);
		function send_mail(){
			document.getElementById("otp-div").style.display="none";
			document.getElementById("mail-status").style.display="none";
			document.getElementById("otp-btn").value="Send OTP";
			document.getElementById("otp-btn").style.display="block";
			let email=document.forms[2]["mail"].value;
			let user_type=document.forms[2]["user_type"].value;
			if(email.length==0 || user_type.length==0){
				document.getElementById("mail-status").innerHTML="Enter valid email and user_type";
				return false;
			}
			document.getElementById("otp-btn").style.display="none";
			document.getElementById("mail-status").innerHTML="Sending mail...";
			document.getElementById("otp-div").value="";
			document.getElementById("mail-status").style.display="block";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if(this.responseText=="success"){
						document.getElementById("otp-btn").value="Resend OTP";
						document.getElementById("otp-btn").style.display="block";
						document.getElementById("mail-status").innerHTML="Mail sent. Enter OTP";
						document.getElementById("otp-div").style.display="inline";
						document.getElementById("reset-btn").style.display="block";
					}
					else{
						document.getElementById("mail-status").innerHTML=this.responseText;
						document.getElementById("otp-btn").style.display="block";
						document.getElementById("mail-status").style.display="block";
					}
				}
			};
			xhttp.open("POST", "send_email.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("email")+"="+encodeURIComponent(email)+"&"+encodeURIComponent("user_type")+"="+encodeURIComponent(user_type));
		}
		function validate_otp(){
			let otp=document.forms[2]["otp"].value;
			if(otp.length==0){
				document.getElementById("mail-status").innerHTML="Please enter OTP.";
				return false;
			}
			document.getElementById("mail-status").innerHTML="Validating otp...";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if(this.responseText=="success"){
					document.getElementById("mail-status").innerHTML="";
					document.getElementById("otp-btn").value="Reset password";
					document.getElementById("otp-btn").style.display="block";
					document.getElementById("otp-div").style.display="none";
					document.getElementById("reset-pass-user").style.display="none";
					document.getElementById("reset-btn").style.display="none";
					document.forms[2]["mail"].style.display="none";
					document.getElementById("pass-div").style.display="inline";
					document.getElementById("confirm-pass-div").style.display="inline";
					document.getElementById("otp-btn").onclick=reset_password;
					//document.getElementById("reset-btn").style.display="block";
				}
				else{
					document.getElementById("mail-status").innerHTML=this.responseText;
				}
			}
			};
			xhttp.open("POST", "validate_otp.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("otp")+'='+encodeURIComponent(otp));
		}
		function reset_password(){
			let pass=document.forms[2]['pass'].value;
			let cpass=document.forms[2]['confirm-pass'].value;
			if(pass != cpass){
				document.getElementById("mail-status").innerHTML="Passwords aren't equal.";
				return;
			}
			document.getElementById("mail-status").innerHTML="Updating password...";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if(this.responseText=="success"){
					document.getElementById("reset-status").innerHTML="Password reset successful";
					document.getElementById("mail-status").innerHTML="Password reset successful";
					document.getElementById("reset-status").style.display="inline";
					showHideForms_popupNum(0,-1)
				}
				else{
					document.getElementById("mail-status").innerHTML=this.responseText;
				}
			}
			};
			xhttp.open("POST", "reset_pass.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(encodeURIComponent("pass")+'='+encodeURIComponent(pass));
		}
	</script>
</body>
</html>