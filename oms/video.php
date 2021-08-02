<?php 
	include 'connection.php';
		$output='';
	
	if(isset($_POST["search"]))
	{
		$searchq =$_POST["search"];
		$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query="SELECT * FROM video WHERE videoName LIKE '%$searchq%' OR artistName LIKE '%$searchq%'";
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
            $videopath    = $row['videoPath'];
			$video      = $row['videoName'];
			$price     = $row['price'];
        }

    }
   }
?>

<!DOCTYPE html>
<html>
<head>

		<meta charset="utf-8" />	
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content=""/>
		

<link rel="stylesheet" type="text/css" href="css/index.css"/>
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
            <form action="videosearch.php" method="post">
                            <input type="text" name="search" placeholder="Search..." required>
							<button type="submit" value="GO" onclick="shows()" >Click</button>
							<?php print("$output");?>
            </form>	
		</div>
</center><br>
	

<div class="videolist" style="float:50px">
	<?php
	
		$s = "SELECT * FROM video";
		$result=$conn->query($s);
	?>
		<?php
		if(mysqli_num_rows($result))
		while($row=mysqli_fetch_assoc($result)){
	?>	
		<div style="float:left;padding:20px;margin-left:20px" width="20%" >
			
		<div class="d-flex align-content-stretch flex-wrap" >
			<center>
		<video  width="320" height="240" controls>
                <source src="<?php echo("videos/".$row["videoPath"])?>" type="video/MP4 ">
        </video><br><br>
			<font size="5" style="color:gold"><?php echo $row['videoName']."";?>
			<font size="5" style="color:gold"><?php echo $row['price']."";?><br>
			</center>
		</div>
		
			<br>
		</div>
		
		<?php 
			
	
	}?>
</div>
<script src="storage.js"></script>
</body>
</html>