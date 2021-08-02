
<?php
include 'connection.php';

if(isset($_post["cart"]))
{
	if(isset($_SESSION(["shoping_cart"]))
	{
		$item_array_name=array_column($_SESSION["shoping_cart"],"item_name");
		if(!in_array($_GET["name"],$item_array_name))
		{
			$count = count($_SESSION["shoping_cart"]);
			$item_array = array(
			
			'item_name' => $_GET['songName'],
			'item_price' => $GET['prices']
			
			);
			$_SESSION["shoping_cart"][$count] = $item_array;
			else(
				
			echo'<script>alert("Item Already Added")</script>';
			echo'<script>window.location="mp3Storage.php"</script>';
			)
		}
	}
	else
	{
		$item_array=array(
		
		'item_name' => $_GET['songName'],
		'item_price' => $GET['prices']
		);
		$_SESSION["shoping_cart"][0] = $item_array;
	}
		
	
}
?> 

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<h3> Order details</h3>
<div class= "table-responsive">
<table calss={"table table-bordered">
<tr>
	<th width="40%">Song Name</th>
	<th width="20%">price</th>
</tr>
<?php
if(!empty($_SESSION["shoping_cart"}))
{
	$total =
}

?>	





</body>
</html>