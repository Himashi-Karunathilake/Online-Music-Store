<?php 
	include 'connection.php';
		$output='';
	
	if(isset($_POST["search"]))
	{
		$searchq =$_POST["search"];
		$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query="SELECT * FROM video WHERE videoName LIKE '%$searchq%' OR artistName LIKE '%$searchq%'";
		$query="SELECT * FROM song WHERE songName LIKE '%$searchq%' OR artistName LIKE '%$searchq%'";
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
            $videopath    = $row['videoPath'];
			$video      = $row['videoName'];
			$songpath    = $row['songPath'];
			$imagepath  = $row['imagePath'];
			$song       = $row['songName'];
			$price     = $row['price'];
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

<link rel="stylesheet" type="text/css" href="css/styleindex.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<title>HOME</title>

</head>
<body bgcolor="201E1E">

<div class="logo">
<h1 style="color:white">MUSIC LIFE</h1>
	<img src="images/343_InPost.jpg" alt="logo" height=600 width=100%>
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

	
	<?php if (isset ($_SESSION["email"])){ ?>
				<li style="float:right"><a href="logout.php">Logout</a></li>
			<?php } else { ?>
				<li style="float:right"><a href="login.php">Login</a></li>
			<?php } ?>
		
	</ul>
</div><br>
	
<div class="slideshow-container">
  <div class="mySlides fade">
    <img src="images/eminem_elliott-smith_H_0315.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/jeniffer.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/images.jpeg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/Wallpapers-Of-Justin-Bieber-Gallery-86-Plus-PIC-WPW309843.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/lead_720_405.jpg" style="width:100%">
  </div>
  
  <div class="mySlides fade">
    <img src="images/hp1_edited.jpg" style="width:100%">
  </div>
  
  

</div><br>
    <script>
var index = 0;
show();

function show() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    index++;
    if (index > slides.length) {index = 1}
    slides[index-1].style.display = "block";
    setTimeout(show, 2000);
}
</script>
	<br>
     <center>
		<div class="sb" style="width:50%">
            <form action="allsearch.php" method="post">
                            <input type="text" name="search" placeholder="Search..." required>
							<button type="submit" value="GO" onclick="shows()" >Click</button>
							<?php print("$output");?>
            </form>	
		</div>
</center><br>

	<br>
	<center>
	<button type="library" style="background-color:black;color:white;width:300px"><a href="storage - manusha.html">Music Library</a></button>
	</center>
	<br>

		<br>

	<div class="box1"> 
		<p><h1>Unlock more with Music Life</h1><br>
		Million of songs and weekly new<br>
		releases with exclusive prime price
	</div>

	<div class="box2">
		<h1>Two millon songs & so much more  </h1>
	</div>


	<div class="box3">
	    <p><h1>Curated playlist and personalized stations</h1><br>
		Just start listening choose from<br>
		playlist curated by music<br>
		expert,or personalized stations to<br>
		fit every moment.</p>
	</div>

	<div id="social">
		<center>
			<i class="fa fa-instagram" style="font-size:2.0em;"></i>
			<i class="fa fa-facebook" style="font-size: 2em;" ></i>
			<i class="fa fa-twitter" style="font-size: 2em;"></i>
			<i class="fa fa-whatsapp" style="font-size: 2em;"></i>
			<i class="fa fa-youtube" style="font-size: 2em;"></i>
		</center>
	</div>

	<center><p class="copyright"><a href="http://www.tvguide.com/" target="_blank">Entertainment Tonight/TV Guide Network</a> | Copyright &copy; 2018 CBS Interactive Inc. / All rights reserved.</p></center>



</body>
</html>
