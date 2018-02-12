<?php
  session_start();
  include_once("dbconnect.php");

  if(isset($_POST['email'])){
  	$email = $_POST['email'];
  	$pass = $_POST['pass'];
  	$query = mysqli_query($conn, "select * from users where email = '$email'")or die(mysqli_error($conn));
  	$row = mysqli_fetch_array($query);
  	$num = mysqli_num_rows($query);
  	if($num != 1){
  		echo "Account Not Found!";
  		exit();
  	}elseif ($pass == $row['password']) {
  		$_SESSION['user'] = $email;
  		echo "true";
  		exit();
  	}else{
  		echo "Wrong email or password!";
  	}
  }elseif (isset($_POST['uname'])) {
  	$uname = $_POST['uname'];
  	$pass = $_POST['pass'];
  	$pass = md5($pass);
  	$query = mysqli_query($conn, "select * from users where uname = '$uname' ") or die(mysqli_error($conn));
  	$row = mysqli_fetch_array($query);
  	$num = mysqli_num_rows($query);
  	if($num != 1){
  		echo "account not found!";
  		exit();
  	}elseif($pass == $row['password']){
  			$_SESSION['user'] = $row['email'];
  			echo "true";
  			exit();
  	}else{
  		   echo "Wrong user name or password!";
  			exit();
  	}
  }

?>