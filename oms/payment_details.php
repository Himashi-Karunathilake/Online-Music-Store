<?php
// Session starts here.
session_start();
?>
<!DOCTYPE HTML>

<html>

<head>
<meta charset ="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<meta name="description"content=""/>
<meta name="keywords" content=""/>

<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="new.css">
<link rel="stylesheet" type="text/css" href="css/styleindex.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css"/>



</head>


<body class="body" bgcolor="201E1E">

<div class="logo">
<h1 style="color:white">MUSIC LIFE</h1>
	<img src="images/343_InPost.jpg" alt="logo" height=600 width=100%>
	<br>
</div>

<div class="navi">
	<ul>
		<l<li><a href="about.php">About</a></li>
		<li><a href="index.php">Home</a></li>
		<li><a href="video.php">Videos</a></li>
		<li><a href="albems.php">Albums</a></li>
		<li><a href="mp3Storage.php">Songs</a></li>
		<li><a href="contact.php">Contact</a></li>

		<li style="float:right"><a href="login.php">Login</a></li>
	</ul>
</div>
	<br>

    <?php //Linking the configuration file
require 'payment_config.php';
?>
    

    
    </div><br><br><br>

<div class="row">
  <div class="col-50">
    <div class="container" style="margin-left:30%;margin-right:30%;background-color:#D5DBDB;  border-radius: 50px;">
        <div class="row">

          <div class="center">
              <h1><span style="color:black">
			  <center><B>Payment Details</center></span></h1>
             <span>
             <!---- Initializing Session for errors --->
            <?php
            if (!empty($_SESSION['error'])) {
            echo $_SESSION['error'];
 
            }
            ?>
              </span>  
              
              <form action="payment_validation.php" method="post">
			<label for="email"><i class="fa fa-envelope"></i>Email</label>
            <input type="text" id="email" name="email" placeholder="       @mail.com" required><br><br>
            <label for="cname">Pay with</label><br>
			
             <input type="radio" name="type" value="credit"  > <span style="color:black;">Credit Card</span><br>
              <input type="radio" name="type" value="debit"><span style="color:black"> Debit Card</span><br>
			  <input type="radio" name="type" value="pay"><span style="color:black"> PayPal</span><br>
			
<br>
            <label for="ccnum">Card Number</label>
            <input type="text" id="ccnum" name="cardnumber" pattern="[0-9]{16}" placeholder="  Valid Card Number" required><br><br>
            <label for="expmonth">Expiration Month</label>
                  <select name="month_id" style="  width:100%;margin-bottom: 20px;padding:12px;border: 1px solid #ccc;border-radius: 3px;">
		      <option value="pick" disabled selected>MM</option>
		    <?php
		    $sql1 = mysqli_query($conn, "SELECT month From Month");
		    $row = mysqli_num_rows($sql1);
		    while ($row = mysqli_fetch_array($sql1))
		    {
			 echo "<option value='". $row['month'] ."'>" .$row['month'] ."</option>" ;
		    }
		    ?>
		      </select>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Expiration Year</label>
                <select name="year_id" style="  width:100%;margin-bottom: 20px;padding:12px;border: 1px solid #ccc;border-radius: 3px;">
		          <option value="pick" width: 100%  disabled selected>YY</option>
		      <?php
		      $sql2 = mysqli_query($conn, "SELECT year From Year");
		      $row = mysqli_num_rows($sql2);
		      while ($row = mysqli_fetch_array($sql2))
		      {
			     echo "<option value='". $row['year'] ."'>" .$row['year'] ."</option>" ;
		      }
		      ?>
		</select>
                  
                  
              </div>
              <div class="col-50">
                <label for="cvv">CVV/CVC</label>
                <input type="text" id="cvv" name="cvv"  pattern="[0-9]{3}" placeholder="    CVV/CVC" required><br><br>
              </div>
                 <input type="submit" style="background-color:#229954;width:300px;margin-left: 25%;" value="Start Subscription" class="button " name="btnSubmit">
            </div>
              </form>
          </div>
            

            <?php
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
            
        </div>
    </div>
  </div>
      
  


<!--Footer-->
<br><br>
	<center><p class="copyright"><a href="http://www.tvguide.com/" target="_blank">Entertainment Tonight/TV Guide Network</a> | Copyright &copy; 2018 CBS Interactive Inc. / All rights reserved.</p></center>


	</div>


 
</body>

</html>