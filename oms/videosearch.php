<?php 
	include 'connection.php';
	$output='';
	
	
?>
<!DOCTYPE html>
<html>
<head>
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
		<li><a href="index.html">Home</a></li>
		<li><a href="lyrics - indika.html">Lyrics</a></li>
		<li><a href="video - praveen.html">Videos</a></li>
		<li><a href="albums - albems.php">Albums</a></li>
		<li><a href="contact us - udesh.html">Contact</a></li>
		<li><a href="blank.html">About</a></li>
		<li style="float:right"><a href="login - himashi.html">Login</a></li>
		
	</ul>
	<br>
</div>

<div id = "show" >
	
		<center>
		<?php
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
		?>
						
					
		<div class="d-flex align-content-stretch flex-wrap">
			<center>
			     <video controls >
				    <source src="<?php echo("videos/".$row['videoPath'])?>" type="video/mp4">
				</video><br><br>
				<font size="5" style="color:gold"><?php echo("".$row['videoName']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['price']."")?>
			</center>
		</div>
			<?php }} } ?><br>
			
		

</div>
</body>
</html>