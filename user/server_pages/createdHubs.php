<?php
session_start();
include_once("dbconnect.php");
$session = $_SESSION['user'];
$query = mysqli_query($conn, "select * from users where email = '".$_SESSION['user']."'")or die(mysqli_error($conn));
	$row = mysqli_fetch_array($query);
	$owner = $row['uname'];

$queri = mysqli_query($conn, "select * from hub where hub_owner = '$owner'")or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($queri)) {
	$hub = $row['hub_name'];

	echo "<a target='blank' href='../d/$hub'>$hub</a><hr>";
}
?>