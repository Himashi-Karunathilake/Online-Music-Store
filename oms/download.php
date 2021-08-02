<?php 
include 'connection.php'
?>

<html>
<head>
</head>
<body>

<?php
		$s = "SELECT * FROM song WHERE songID = 6";
		$result=$conn->query($s);
		if(mysqli_num_rows($result))
		while($row=mysqli_fetch_assoc($result)){
	?>
	<a href="<?php echo("songs/".$row['songPath'])?>"><img src="images/believer.jpg" width="20%" height="20%"></a>
<?php }?>
</body>
</html>