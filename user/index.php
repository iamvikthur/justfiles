<?php
session_start();
if(!isset($_SESSION['user'])){
	header("location: ../index.php");
}else{

}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Justfiles &bull; <?php echo $_SESSION['user']; ?></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/uploadScript.js"></script>
   <script type="text/javascript" src="js/createNewdomain.js"></script>
   

</head>
<body>
<div class="container">
	<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">
   	<div><?php include_once("theme/header.php"); ?></div>
   </div>
     </div>
   <div class="row">
   	<div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">
   		<div><?php include_once("theme/nav.php"); ?></div>
   	</div>
   </div>
   <div class="row">
   	<div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">
   		<div><?php include_once("theme/content.php"); ?></div>
   	</div>
   </div>
</div>
<?php echo $_SESSION['user']; ?>
<br>
<button class="btn btn-primary" id="uploadButton" style="padding: 10px">upload Now</button>
<div class="overlay"></div>
<div class="load_contents"></div>
</body>
</html>
