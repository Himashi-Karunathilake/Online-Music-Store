<?php
$conn = new mysqli("localhost","root","","music");
	
	if($conn->connect_error){
		die("Connection failed:".$conn->connect_error);
	}
	
	
?>