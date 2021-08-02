<?php include 'connection1.php' ;
	$fname = "";
	$lname = "";
	$email = "";
	
	
		if(isset($_POST["submit"]))
		{
			if( !empty( $_POST['fname']) && !empty( $_POST['lname']) && !empty( $_POST['email']) && !empty( $_POST['password1']) && !empty( $_POST['password2']))
			{
	
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$email = $_POST['email'];
				$password1 = hash( 'SHA512', $_POST['password1'] );
				$password2 = hash( 'SHA512', $_POST['password2'] );
				$id = '';
				$role = 'user';
	
				if($password1 == $password2)
				{
		
					$sql= "INSERT INTO customer 
							( fname, lname, email, password, role) 
							VALUES 
							('$fname', '$lname', '$email', '$password1', '$role')";
					
					if( !mysqli_query( $con, $sql ) )
					{
						?>
						<script>
						alert("Error");</script>
						<?php
						
						
					}
					else{
						header( 'Location: thankyou.php' );
					}
				}else{
					?>
						<script>alert("Password Error");</script>
						<?php
						header ('Location: register.php');
					
				}
			}
		}

		mysqli_close($con);

?>	

<!DOCTYPE html>

<html>

<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>SIGN UP</title>
		<link rel="stylesheet" type="text/css" href="css/stylesignup.css">
		<script src="js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="css/stylee.css"/>
</head>

<body  bgcolor="201E1E"">

<div>
<img src="images/343_InPost.jpg" alt="logo" height=600 width=100%>
</div>

<div class="navi">
	<ul>
		<li><a href="about.php">About</a></li>
		<li><a href="index.php">Home</a></li>
		<li><a href="video.php">Videos</a></li>
		<li><a href="albems.php">Albums</a></li>
		<li><a href="mp3Storage.php">Songs</a></li>
		<li><a href="contact.php">Contact</a></li>

		<li style="float:right"><a href="login.php">Login</a></li>
	</ul>
</div><br>
	

	<div class="signup-box" style="padding-bott:10%;">
		<img src="images/avatar.png" class="avatar" >
		<h1>SIGN UP</h1>
		<form action="register.php" method="POST" name="myForm">
			<p>First Name</p>
			<input type="text" name="fname" placeholder="Enter First Name" id="fname">
			<p id="p1"></p>
			
			<p>Last Name</p>
			<input type="text" name="lname" placeholder="Enter Last Name" id="lname">
			<p id="p2"></p>
			
			<p>Email</p>
			<input type="email" name="email" placeholder="Enter Email" id="email">
			<p id="p4"></p>
			
			<p>Password</p>
			<input type="password" name="password1" placeholder="Enter Password" id="pass">
			
			<p>Confirm Password</p>
			<input type="password" name="password2" placeholder="Re-enter Password" id="conpass">
			
			<button type="submit" name="submit" value="SIGN UP!" onclick="return validate()" >SIGN UP!</button>
			<p id="error"></p>
			Already have an account?<a href="login.php"> Log In!</a>

		</form>
	</div>
	
	
	
	<div class="foot">
<center><p><a href="http://www.tvguide.com/" target="_blank">Entertainment Tonight/TV Guide Network</a> | Copyright &copy; 2018 CBS Interactive Inc. / All rights reserved.</p></center>
	</div>
</body>
</html>