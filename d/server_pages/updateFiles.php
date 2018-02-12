<?php
session_start();
include_once("dbconnect.php");
$session = $_SESSION['hub'];
$usession = $_SESSION['user'];
$Vquery = mysqli_query($conn, "select * from hub_files where hub_file_owner = '$session' and hub_file_type like '%video%'")or die(mysqli_error($conn));
$Vnum = mysqli_num_rows($Vquery);

$Aquery = mysqli_query($conn, "select * from hub_files where hub_file_owner = '$session' and hub_file_type like '%audio%'")or die(mysqli_error($conn));
$Anum = mysqli_num_rows($Aquery);

$Iquery = mysqli_query($conn, "select * from hub_files where hub_file_owner = '$session' and hub_file_type like '%image%'")or die(mysqli_error($conn));
$Inum = mysqli_num_rows($Iquery);

$APPquery = mysqli_query($conn, "select * from hub_files where hub_file_owner = '$session' and hub_file_type like '%application%'")or die(mysqli_error($conn));
$APPnum = mysqli_num_rows($APPquery);
$total  = $Vnum + $Anum + $Inum + $APPnum;
echo ' 

     <div class="leftSideBar">
	<ul class="listFiles">
		<li class="h4">
			All Files ['.$total.']
		</li>
		<ul id="nestedFileList">
			<li><a id="videoFiles" href="">videos['.$Vnum.']</a></li>
			<li><a href="">Audio['.$Anum.']</a> </li>
			<li><a href="">Photos['.$Inum.']</a></li>
			<li><a href="">&bull;Pdf<sub>s</sub>['.$APPnum.']</a></li>
			<li><a href="">&bull;exe[0]</a></li>
			<li><a href="">&bull;doc[0]</a></li>
			<li><a href="">&bull;txt[0]</a></li>
			<li><a href="">&bull;apk[0]</a></li>
			<li><a href="">&bull;otheres[0]</a></li>
		</ul>
	</ul>

	<ul class="listOthers">
		<li class="h4">
			Others
		</li>
		<ul id="nestedOthersList">
		    <li><a href="">Upload Files</a></li>
			<li><a href="">pay me!</a></li>
			<li><a href="">transaction archive</a></li>
			<li><a href="">promote my hub</a></li>
			<li><a href="">partners</a></li>
		</ul>
	</ul>
</div>


';


?>