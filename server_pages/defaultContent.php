<?php
 include_once("dbconnect.php");
 include_once("../functions/functions.php");

 if (isset($_GET['mode'])) {
 	$mode = $_GET['mode'];

 	switch ($mode) {
 		case 'all':
 			//$ip = getenv("REMOTE_ADDR");
 			//$loc = userLocation;
 		$query = mysqli_query($conn, "select * from files where file_type like '%video%' order by rand() limit 4") or die(mysqli_error($conn));
           ?>
            <br><div class="bestForYou h4">Best For You - Video &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><button class="btn btn-info btn-sm">More Videos...</button></a></div>
           <?php

 		while ($row = mysqli_fetch_array($query)) {
 			    $file_name = $row['file_name'];
				$file_owner = $row['file_owner'];
				$file_type = $row['file_type'];
				$file_id = $row['file_id'];
				$upload_date = $row['upload_date'];


				echo "
                      <ul>
                        <li class='genLi'>
                           <a href='#' data-id='$file_owner' title='$file_name' class=''>
                          <span class='file_owner'>by $file_owner</span>
                           <canvas class='thumbnail' id='videoCanvas' style='width: 265px; height: '></canvas>
                           <video id='video' style='display: none;' src='./user/user_app/$file_owner/$file_type/$file_name' type='$file_type'>
                           </video>
                           <div class='file_details'>
                           <p id='file_name'>
                           <span class='file_name'>".stringCutter($file_name)."</span><br>
                           <span class='other_info'>2k downloads &bull; 2weeks ago</span>
                           </p></div>
                           </a>
                        </li>
                  </ul>
				";
 		}

 		?>
            <hr style="margin-bottom: -12px; margin-top: -20px;">
 		<?php

 		$query = mysqli_query($conn, "select * from files where file_type like '%audio%' order by rand() limit 4") or die(mysqli_error($conn));
           ?>
            <br><div class="bestForYou h4">Best For You - Music &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><button class="btn btn-info btn-sm">More Music...</button></a></div>
           <?php

 		while ($row = mysqli_fetch_array($query)) {
 			    $file_name = $row['file_name'];
				$file_owner = $row['file_owner'];
				$file_type = $row['file_type'];
				$file_id = $row['file_id'];
				$upload_date = $row['upload_date'];


				echo "
                      <ul>
                        <li style='margin-top: 30px;'>
                           <a href='#' data-id='$file_owner' title='$file_name' class=''>
                          <span class='file_owner'>by $file_owner</span>
                           <canvas class='thumbnail' id='musicCanvas' style='width: 265px; height: '></canvas>
                           <div class='file_details'>
                           <p id='file_name'>
                           <span class='file_name'>".stringCutter($file_name)."</span><br>
                           <span class='other_info'>2k downloads &bull; 2weeks ago</span>
                           </p></div>
                           </a>
                        </li>
                  </ul>
				";
 		}


 			break;
 		
 		default:
 			# code...
 			break;
 	}
 }



?>