<?php 
	session_start();
	include 'connection.php';
	$output='';
	
	if(isset($_POST["search"]))
	{
		$searchq =$_POST["search"];
		$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query="SELECT * FROM song WHERE songName LIKE '%$searchq%' OR artistName LIKE '%$searchq%'";
		$result1=mysqli_query($conn,$query);
		$count=mysqli_num_rows($result1);
		if($count==0)
		{
			$output='There was no search results!';
		}
		 else
    {
        while($row=mysqli_fetch_array($result1))
		
        {
            $songpath    = $row['songPath'];
			$imagepath  = $row['imagePath'];
			$song       = $row['songName'];
			$price     = $row['prices'];
        }

    }
   }
   
   if( isset($_POST['song'])){
	   if( !empty($_POST['song'])){
		   $_SESSION['song'] = $_POST['song'];
		   header("Location:cart.php");
	   }
   }

?>
 
<?php
	$sql = "SELECT * FROM song WHERE category='pop'";
	$result = mysqli_query($conn,$sql);			
?>

<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" type="text/css" href="css/index.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/storStyle.css"/>
<link rel="stylesheet" type="text/css" href="css/stylee.css"/>


</head>
<body bgcolor="201E1E">

<div class="logo">
<h1 style="color:white">MUSIC LIFE</h1>
	<img src="images/343_InPost.jpg" alt="logo" height=500 width=1600>
	<br>
</div>
	<br>

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
	<br>
</div>

<center>
		<div class="sb" style="width:50%">
            <form action="search.php" method="post">
                            <input type="text" name="search" placeholder="Search..." required>
							<button type="submit" value="GO" id="btn" onclick="shows()" >Click</button>
							<?php print("$output");?>
            </form>	
	</div>
</center>
	<br>

<div class="romantic" style="float:left">
		
	<!--Pop song list-->
		<font size="6" style="color:gold">POP Songs<br>
	
		<?php
		if(mysqli_num_rows($result))
		while($row=mysqli_fetch_assoc($result)){
	?>	
		<div style="float:left;padding:20p;margin-left:20px" width="20%" >
			
		<div class="d-flex align-content-stretch flex-wrap" >
			<img src="<?php echo("images/".$row["imagePath"])?>" width ="380px" width="380px"><br>
			<center>
			<font size="5" style="color:gold"><?php echo $row['songName']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$row['prices']."";?><br>
			<audio controls>
				<source src="<?php echo("songs/".$row["songPath"])?>" type="audio/mpeg">
			</audio> <br>
			</center>
			<center>
			<form action="mp3Storage.php" method="POST">
				<button type="submit" value="<?php echo( $row['songName']) ?>" name="song">Add To Cart</button>
			</form>
			</center>
			<input type="hidden" name="hidden_name" value="<?php echo $row['songName']; ?>"/><br>
			<input type="hidden" name="hidden_price" value="<?php echo $row['prices']; ?>"/><br>
			
		</div>
		
			<br>
		</div>
	
	<?php 
			}
	?>
</div>
	

<div class="romantic" style="float:left">

	<font size="6">Romantic<br>

<div>
	
	<?php
	
		$s = "SELECT * FROM song WHERE category='romantic'";
		$result=$conn->query($s);
	?>
		<?php
		if(mysqli_num_rows($result))
		while($row=mysqli_fetch_assoc($result)){
	?>	
		<div style="float:left;padding:20p;margin-left:20px" width="20%" >
			
		<div class="d-flex align-content-stretch flex-wrap" >
			<img src="<?php echo("images/".$row["imagePath"])?>" width ="380px" width="380px"><br>
			<center>
			<font size="5" style="color:gold"><?php echo $row['songName']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$row['prices']."";?><br>
			
			
			
			
			<audio controls>
				<source src="<?php echo("songs/".$row["songPath"])?>" type="audio/mpeg">
			</audio> <br>
			</center>
		</div>
		
			<br>
		</div>
	
	<?php 
			
	
	}?>
	
	<div class="rock" style="float:left">
	
	<!--ROCK song list-->
		<font size="6">Rock Songs<br>
	<!-- 1st song-->
		
	
	<?php
	
		$s = "SELECT * FROM song WHERE category='rock'";
		$result=$conn->query($s);
	
		if(mysqli_num_rows($result))
		while($row=mysqli_fetch_assoc($result)){
	?>	
		<div style="float:left;padding:20p;margin-left:20px" width="20%" >
			
		<div class="d-flex align-content-stretch flex-wrap" >
			<img src="<?php echo("images/".$row["imagePath"])?>" width ="380px" width="380px">
			<center>
			<font size="5"style="color:gold"><?php echo $row['songName']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$row['prices']."";?><br>
			
			<audio controls>
				<source src="<?php echo("songs/".$row["songPath"])?>" type="audio/mpeg">
			</audio> <br>
			</center>
		</div>
		
			<br>
		</div>
	
	<?php 
			
		}?>		
		
		
		
	
</div>
<div style="padding-top:100%">
	<center>
		<a href="http://www.tvguide.com/"target="_blank"><font size="2">Entertainment Tonight/TV Guide Network</a> | copyright &copy; 2018 CBS Interactive Inc. / All rights reserved.
	</center>
</div>
<script src="storage.js"></script>
</body>
</html>