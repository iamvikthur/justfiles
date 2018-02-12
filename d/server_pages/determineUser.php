<?php 
session_start();
include_once("dbconnect.php");

if (isset($_POST['hub']) && $_POST['hub'] != "") {
	$hub = $_POST['hub'];
	$session = $_SESSION['user'];
	//go into thre database and check if the hub owner is the person logged or not
   $query = mysqli_query($conn, "select * from users where email = '".$session."' ")or die(mysqli_error($conn));
   $row  = mysqli_fetch_array($query);
   $uname = $row['uname'];
   //var_dump($_SESSION['user']);
   $queri = mysqli_query($conn, "select * from hub where hub_name = '".$hub."' ")or die(mysqli_error($conn));
   $result = mysqli_fetch_array($queri);
   $hub_owner = $result['hub_owner'];

   if ($hub_owner == $uname) {
   	//logged in user is the owner of the domain therefore.. hex the admin
   echo "true";
   $_SESSION['hub'] = $hub;
   }else{
   	echo "false";
      $_SESSION['hub'] = $hub;
   }
}
?>