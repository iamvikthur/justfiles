<?php
session_start();
include_once("dbconnect.php");
header("content-type: application/json");

//$session = $_SESSION['user'];
$hub = $_SESSION['hub'];
$time = time();
 $uploaded = array();

if (isset($_FILES['file']['name'][0]) && !empty($_FILES['file']['name'][0])) {
	foreach ($_FILES['file']['name'] as $key => $value) {
		$name = $_FILES['file']['name'][$key];
		$tmp =  $_FILES['file']['tmp_name'][$key];
		$error = $_FILES['file']['error'][$key];
		$size = $_FILES['file']['size'][$key];
		$type = $_FILES['file']['type'][$key];
		/*var_dump($name);
		"<br>";
		var_dump($tmp);
		"<br>";
		var_dump($type);
		"<br>";
		var_dump($hub);*/

		if (is_dir("../$hub/$type/")) {
	     $mov = move_uploaded_file($tmp, "../$hub/$type/$name");
	     if ($mov) {
	     	$insert = mysqli_query($conn, "insert into hub_files(hub_file_name, hub_file_type, hub_file_size, hub_file_owner, hub_file_uploaded_date, hub_file_preference) values('$name','$type','$size','$hub','$time','local')")or die(mysqli_error($conn));
	     	if ($insert) {
	     		echo "true";
	     	}else{
	     		echo "false";
	     	}
	     	//end of $insert checkig
	     }
	     //end of $mov checking
		}elseif (!is_dir("../$hub/$type")) {
		  $mk = mkdir("../$hub/$type");
		  if ($mk) {
		  	$mov = move_uploaded_file($tmp, "../$hub/$type/$name");
		  	if ($mov) {
		  		$insert = mysqli_query($conn, "insert into hub_files(hub_file_name, hub_file_type, hub_file_size, hub_file_owner, hub_file_uploaded_date, hub_file_preference) values('$name','$type','$size','$hub','$time','local')")or die(mysqli_error($conn));

		  		  if ($insert) {
	     		echo "true";
	     	      }else{
	     		echo "false";
	     	   }
	     	   //end of $insert checking
		  	}
		  	//end of $mov checking
		  }
		  //end of $mk checking
		}
		//end of else checking
	}
	//end of foreach loop
}
//end if $_files
?>