<?php
session_start();
include 'connection.php';

	$song = $_SESSION['song']
	$query = "SELECT artist,price FROM songs WHERE songName = '$song'";
	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);
	
	$cart_songs = array();
	$cart_artist = array();
	
	array_push( $cart_songs, $song );
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
</head>
<body>
	
</body>
</html>