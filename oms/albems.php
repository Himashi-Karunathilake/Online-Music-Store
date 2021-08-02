<?php 
	include 'connection.php';
	$output='';
	
	if(isset($_POST["search"]))
	{
		$searchq =$_POST["search"];
		$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query="SELECT * FROM album WHERE albumName LIKE '%$searchq%' OR artistName LIKE '%$searchq%'";
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
            $albumpath    = $row['albumPath'];
			$imagepath  = $row['imagePath'];
			$albumname      = $row['albumName'];
			
        }

    }
   }
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/stylee.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/storStyle.css"/>

</head>
<body bgcolor="201E1E">

<div class="logo">
	<img src="images/343_InPost.jpg" height="400" width="100%">
</div>

<div class="navi2">
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
            <form action="searchalbum.php" method="post">
                            <input type="text" name="search" placeholder="Search..." required>
							<button type="submit" value="GO" onclick="shows()" >Click</button>
							<?php print("$output");?>
            </form>	
	</div>
	</center>
	<br>
	
		
	
	<?php
		$sql = "SELECT * FROM album";
		$result = mysqli_query($conn,$sql);
		$count1 = mysqli_num_rows($result);
		while( $row = mysqli_fetch_array($result)){
	?>
	
	<div class="table">

		<div style="float:left;padding:20px;color:gold" >
			
		<div class="d-flex align-content-stretch flex-wrap" >
		<center>
			<a href="<?php echo('albums/'.$row['albumPath'])?>"><img src="<?php echo("images/".$row["imagePath"])?>" width ="380px" height="380px"></a><br>
			<font size="5" style="color:gold"><?php echo $row['albumName']."";?><br>
		</center>
		</div>
		
			<br>
		</div>
		</div>
	
	<?php 
			
		}?>	
		 

	</div>	
	
		

	


	

	<div style="padding-top:110%">
	<center>
		<a href="http://www.tvguide.com/"target="_blank"><font size="2">Entertainment Tonight/TV Guide Network</a> | copyright &copy; 2018 CBS Interactive Inc. / All rights reserved.
	</center>
	</div>
</body>
</html>