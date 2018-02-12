<?php
include_once("dbconnect.php");
if (isset($_POST['file'])) {
	$file = $_POST['file'];
	$owner = $_POST['owner'];

	$query = mysqli_query($conn, "select * from files where file_name = '$file' and file_owner = '$owner' ")or die(mysqli_error($conn));
	$num = mysqli_num_rows($query);
	if($num == 0){
		echo "false";
	}else{
		$row = mysqli_fetch_array($query);
		$file_id =  $row['file_id'];
		$file_type = $row['file_type'];
		$upload_date = $row['upload_date'];
		
		echo '
		    <div class="modal-header">
  			<span class="close">&times;</span>
  				<div class="modal-title">
  					'.$file.'
  				</div>
  			</div>
  			<div class="modal-body">
  					<div class="video_div">
           <video type="'.$file_type.'" src="user/user_app/'.$owner.'/'.$file_type.'/'.$file.'" controls>
                </video>
  				</div>
		      
		';
	}
}

?>