<?php 
session_start();

include 'connection1.php' ; 
	//$email = "";
	
	
	if ( isset( $_POST['submit']) )
		{
			if( !empty($_POST['email']) && !empty($_POST['password1']) )
			{
				$email = $_POST['email'];
				$password = hash( "SHA512", $_POST['password1'] );
				$query = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
				$result = mysqli_query( $con, $query );
				$count = mysqli_num_rows( $result );
				$data = mysqli_fetch_array( $result );
				
				if( $count == 1 )
				{
					$_SESSION['email'] = $email;
					header( 'Location:index.php');
				}
			
				else
				{
					?>
					<script>alert("Password or email is Incorect");
					location.href = 'login.php';</script>
					<?php
				}
			}
		}
	
?>

<!DOCTYPE html>

<html>

<link rel="stylesheet" type="text/css" href="css/stylee.css"/>

<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/stylelog.css">

</head>

<body  bgcolor="201E1E">
<img src="images/343_InPost.jpg" alt="logo" height=600 width=100%>
	
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
	
			
	</ul>
	<br>
	</div>
	
	<div class="login-box">
		<img src="images/avatarlog.png" class="avatar">
		<h1>LOGIN</h1>
		<form method="post" action="login.php">
			<p>Email</p>
			<input type="email" name="email" placeholder="Enter Email" id="email">
			<p>Password</p>
			<input type="password" name="password1" placeholder="Enter Password" id="pass">
			
			
			<button type="submit" name="submit" value="SIGN UP!" onclick="return validation()">LOGIN!</button>
			<a href="reset.php">Forgot Password?</a><br/>
			Don't have an account?<a href="register.php"> Sign Up!</a>
		</form>
	</div>
	

			
</body>

</html>