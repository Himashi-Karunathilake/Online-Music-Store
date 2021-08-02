<?php include 'connection1.php' ;
	$email = "";
	$subject = "";
	$message = "";
	
	
		if(isset($_POST["submit"]))
		{
			if( !empty( $_POST['email']) && !empty( $_POST['subject']) && !empty( $_POST['message']))
			{
	
				$email = $_POST['email'];
				$subject = $_POST['subject'];
				$message = $_POST['message'];
	
		
					$sql= "INSERT INTO contact 
							( email, subject, message) 
							VALUES 
							('$email', '$subject', '$message')";
					
			}
		}

		mysqli_close($con);

?>

<!DOCTYPE html>

<html>

<link rel="stylesheet" type="text/css" href="css/stylee.css"/>

<head>
	<title>CONTACT US</title>
	<link rel="stylesheet" type="text/css" href="css/stylecontact.css">
</head>

<body bgcolor="201E1E">

<div class="logo">
<h1 style="color:white">MUSIC LIFE</h1>
	<img src="images/343_InPost.jpg" alt="logo" height=600 width=100%>
	<br>
</div>

	<div class="navi2">
		<ul>
			<li><a href="about.php">About</a></li>
		<li><a href="index.php">Home</a></li>
		<li><a href="video.php">Videos</a></li>
		<li><a href="albems.php">Albums</a></li>
		<li><a href="mp3Storage.php">Songs</a></li>
		<li><a href="contact.php">Contact</a></li>

	</ul>
	<br>
	</div>

	<div class="contactus-box">
		<img src="images/mail.png" class="mail">
		<h1>CONTACT US</h1>
		<form>
			<p>Email</p>
			<input type="text" name="email" placeholder="Enter Email">
			<p>Subject</p>
			<input type="text" name="subject" placeholder="Enter Subject">
			<p>Message</p>
			<textarea id="message" name="message" placeholder="Type Your Message"></textarea>
			<input type="submit" name="submit" value="SEND MESSAGE">
		</form>
	</div>
</body>

<center><p class="copyright"><a href="http://www.tvguide.com/" target="_blank">Entertainment Tonight/TV Guide Network</a> | Copyright &copy; 2018 CBS Interactive Inc. / All rights reserved.</p></center>

</html>