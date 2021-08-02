    <?php //Linking the configuration file
require 'payment_config.php';
?>
<?php
session_start();
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (empty($_POST['email'])|| empty($_POST['cardnumber']) || empty($_POST['cvv'])){ 
 // Setting error message
$_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 header("location:payment_details.php"); // Redirecting to first page 
	} else {
    if (preg_match("/^[0-9]{16}$/", $_POST['cardnumber'])){ 
        $contact= $_POST['cardnumber'];
    }else{	
	$_SESSION['error'] = "Invalid Credit/Debit card number.";
	header("location:payment_details.php");
    }
    
    if (preg_match("/^[0-9]{3}$/", $_POST['cvv'])){ 
    $contact= $_POST['cvv'];
    }else{	
	$_SESSION['error'] = "Invalid cvv number.";
	header("location:payment_details.php");
    }
	}
            if(isset($_POST["btnSubmit"]))
            {
	           $email = $_POST['email'];
	           $cardno = $_POST['cardnumber'];
	           $month_id = $_POST['month_id'];
	           $year_id = $_POST['year_id'];
	           $cvv = $_POST['cvv'];
	           
	           $sql3= "INSERT INTO purchase_details
		      VALUES('','','$email','$cardno','$month_id','$year_id','$cvv')";
		
  	         if($conn->query($sql3))
		      {
			     echo "Inserted successfully";
		      }
		      else
		      {
			     echo "Error In Inserting". $conn->error;
		      }
  
            }



 mysqli_close($conn);


?>
<!DOCTYPE HTML>
<html>
<head>
	<title>PHP Multi Page Form</title>
	<link rel="stylesheet" href="styles/stylesheet.css" />
</head>
<body>
	<div class="container">
		<div class="main">
			<h2>PHP Multi Page Form</h2><hr/>
			<h3>Well come </h3>
			<span id="error">
			
			</span>
			
		</div>
	</div>
	
</body>
</html>
