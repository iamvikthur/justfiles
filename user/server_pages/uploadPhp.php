<?php
session_start();
include_once("dbconnect.php");


$name = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
$tmp = $_FILES['file']['tmp_name'];
$time = time();
if ($size > 1073741824) {
  echo "File Size is too large";
}
$query = mysqli_query($conn, "select * from users where email = '".$_SESSION['user']."' ")or die(mysqli_error($conn));
$row = mysqli_fetch_array($query);
$uname = $row['uname'];
$name = eregi_replace("'", " ", $name);
var_dump($name);
//insert file straight if the file location has been priviously created
if(is_dir("../user_app/$uname/$type")){
   $mov = move_uploaded_file($tmp, "../user_app/$uname/$type/$name");
  if ($mov) {
    $query = mysqli_query($conn, "insert into files(file_name, file_type, file_size, file_owner, upload_date, preference)
      values( '$name','$type','$size','$uname','$time','normal')")or die(mysqli_error($conn));
    if ($query) {
      echo "true";
    }else{
      echo "false";
    }
  }
}elseif (!is_dir("../user/$uname/$type")) {
    //create the file location and insert file if file location has not been created
    mkdir("../user_app/$uname/$type") or die(user_error()." failed to make directory");
    $mov = move_uploaded_file($tmp, "../user_app/$uname/$type/$name");
  if ($mov) {
    $query = mysqli_query($conn, "insert into files(file_name, file_type, file_size, file_owner, upload_date, preference)
      values( '$name','$type','$size','$uname','$time','normal')")or die(mysqli_error($conn));
    if ($query) {
      echo "true";
    }else{
      echo "false";
    }
}
  
}
 

?>