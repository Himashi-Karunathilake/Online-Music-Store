<?php

	$con=new mysqli( "localhost", "root", "", "music" );

	if( $con->connect_error )
	{
		die( "Connection Failed : " . $con->connect_error );
	}
?>