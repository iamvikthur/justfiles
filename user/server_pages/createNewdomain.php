<?php
session_start();
include_once("dbconnect.php");
//check to see if the domain has already been created!
if (isset($_POST['val'])) {
	$domain = $_POST['val'];
	//var_dump($domain);
	$query = mysqli_query($conn, "select * from hub where hub_name = '$domain'")or die(mysqli_error($conn));
	$num =mysqli_num_rows($query);
	if ($num > 0) {
		echo "false";
	}else{
		echo "true";
	}
}



//Create the domain
if (isset($_POST['domain_name'])) {
	$domain = trim($_POST['domain_name']);
	$domain = mysqli_real_escape_string($conn, $domain);
    $time = time();
	$query = mysqli_query($conn, "select * from users where email = '".$_SESSION['user']."'")or die(mysqli_error($conn));
	$row = mysqli_fetch_array($query);
	$owner = $row['uname'];

	$insert = mysqli_query($conn, "insert into domains(hub_name, hub_owner, hub_created_date) values('$domain','$owner','$time')")or die(mysqli_error($conn));

	if($insert){ 
      // header("location: /justfiles/".$domain);
	   $loc = "../".$domain;
		mkdir($loc);
		$open_file = fopen($loc."/index.php", "w");
		fwrite($open_file, '<!DOCTYPE html>
<html>
<head>
	<title>JustFiles &bull;</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
  
  	     
		     <div class="modal modal-popup">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  			<span class="close">&times;</span>
  				<div class="modal-title">
  					[9jaloft.com]Omarion Ft Chris Brown Post To Be - Copy.mp4
  				</div>
  			</div>
  			<div class="modal-body">
  				
  					<div class="video_div">
           <video type="video/mp4" src="user/user_app/victus/video/mp4/[9jaloft.com]Omarion Ft Chris Brown Post To Be - Copy.mp4" controls>
                </video>
		      
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
		
 

		      
</body>
</html>');
	  }
	
}
?>