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

	$insert = mysqli_query($conn, "insert into hub(hub_name, hub_owner, hub_created_date) values('$domain','$owner','$time')")or die(mysqli_error($conn));

	if($insert){ 

// header("location: /justfiles/".$domain);
	    $loc = "../d/".$domain;
		$make_dir = mkdir($loc);
		if ($make_dir) {
			mkdir($loc."/image");
			mkdir($loc."/audio");
			mkdir($loc."/video");
			mkdir($loc."/application");
		}
		$open_file = fopen($loc."/index.php", "w");
		$write = fwrite($open_file, '<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>JustFiles &bull;'.$domain.'</title>
  <link rel="stylesheet" type="text/css" href="/justfiles/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/justfiles/d/styles/styles.css">
  <script type="text/javascript" src="/justfiles/js/jquery.js"></script>
  <script type="text/javascript" src="/justfiles/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="/justfiles/d/js/script.js"></script>
  <script type="text/javascript" src="/justfiles/d/js/main.js"></script>
</head>
<body data-id = "'.$domain.'">
 <div class="container">
 <div class="row" id="row1">
   <div class="col-md-14 col-sm-12 col-xs-12" id="upWindow">
   <div >
     <?php //include_once("../theme/upWindow.php"); ?>
   </div>
     
   </div>
 </div>
   <div class="row">
     <div class=" col-md-3 col-sm-2 col-xs-2" id="leftSideBar">
        
     </div>
     <div class=" col-md-6 col-sm-6 col-xs-6" id="centerWindow">
      
     </div>
    <div class=" col-md-3 col-sm-2 col-xs-2" id="rightSideBar">
       
     </div>
   </div>
 </div>
</body>
</html>');
		if ($write) {
			echo "true";
		}

         }
      
	  }
	

?>