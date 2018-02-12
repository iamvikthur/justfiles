<?php
session_start();
include_once("dbconnect.php");
if(isset($_POST['uname_check_value'])){
    if (strlen($_POST['uname_check_value']) < 3) {
        echo "User cannot be lessthan 3 characters!";
    }
    $query = mysqli_query($conn, "select * from users where uname = '".$_POST['uname_check_value']."' ")or die(mysqli_error($conn));
    $num = mysqli_num_rows($query);
    if ($num > 0) {
        echo "Sorry User Name Is already Registered try another!";
    }else{
        echo "true";
    }
}
if(isset($_POST['check_value']) && $_POST['check_value'] != ""){
   $email = $_POST['check_value'];

   $query = mysqli_query($conn, "select * from users where email = '$email' ")or die(mysqli_error($conn));
   $num = mysqli_num_rows($query);

   if($num > 0){
    echo "false";
    exit();
   }else{
    echo "true";
   }
}


if (isset($_POST['email']) && $_POST['email'] != "") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $pass = md5($pass1);
    $time = time();
    $ip = getenv("REMOTE_ADDR");
    $query =mysqli_query($conn, "select * from users where uname = '$uname'");
    $uname_check = mysqli_num_rows($query);
    $query = mysqli_query($conn, "select * from users where email = '$email'");
    $email_check = mysqli_num_rows($query);

    if($email=="" || $uname=="" || $pass1=="" || $pass2=="" || $country=="" || $gender==""){
        echo "Please Fill In All Fields!";
        exit();
    }elseif($email_check > 0){
        echo "Email Already Registered!";
        exit();
    }elseif($uname_check > 0) {
        echo "User Name Already Registered!";
        exit();
    }elseif($pass1 != $pass2) {
        echo "Passwords did Not match!";
        exit();
    }elseif ($ip=="") {
        echo "Failed To Get User Environment!";
        exit();
    }elseif (strlen($uname)< 3 || strlen($uname)> 25) {
        echo "User name should be between 3 to 25 characters";
        exit();
    }else{
    	$query = mysqli_query($conn, "insert into users(email, uname, password, country, gender, reg_date, last_seen, activated, acc_plan) values('$email','$uname','$pass','$country','$gender','".$time."','".$time."','0','basic')")or die(mysqli_error($conn));
        if($query){
            if (!file_exists("../user/user_app/$uname")) {
                mkdir("../user/user_app/$uname");
            }
            
            if (!file_exists("../user/user_app/$uname/video")) {
                mkdir("../user/user_app/$uname/video ");
                }
           
            
            if (!file_exists("../user/user_app/$uname/audio")) {
                 mkdir("../user/user_app/$uname/audio ");
                }
           
            
            if (!file_exists("../user/user_app/$uname/image")) {
                 mkdir("../user/user_app/$uname/image ");
                }
           
             if (!file_exists("../user/user_app/$uname/application")) {
                 mkdir("../user/user_app/$uname/application");
                }
            
                echo "<span style='color: green;'>Registeration Successful</span>";
            
            
        }
    }

}

?>