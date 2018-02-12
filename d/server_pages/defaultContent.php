<?php
session_start();
 include_once("dbconnect.php");
 include_once("functions.php");
 $hub = $_SESSION['hub'];
 if (isset($_GET['mode'])) {
 	$mode = $_GET['mode'];

 	switch ($mode) {
 		case 'all':
 			//$ip = getenv("REMOTE_ADDR");
 			//$loc = userLocation;
 		$query = mysqli_query($conn, "select * from hub_files where hub_file_type like '%video%' and hub_file_owner = '$hub' order by rand() limit 10") or die(mysqli_error($conn));
           ?>
            <br><div class="bestForYou h4">Best Of <?php echo $hub; ?> - Video &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><button class="btn btn-info btn-sm">More Videos...</button></a></div>
           <?php

 		while ($row = mysqli_fetch_array($query)) {
 			    $file_name = $row['hub_file_name'];
				$file_owner = $row['hub_file_owner'];
				$file_type = $row['hub_file_type'];
				$file_id = $row['hub_file_id'];
				$upload_date = $row['hub_file_uploaded_date'];
        $src = $file_type."/".$file_name;
 
				?>
         <ul id="defaultContentList">
           <li id="defaultContentListLi">
             <a href="" title="<?php echo $file_name; ?>">
               <canvas id="videoCanvas" style="width: 130px; height: 80px; border: 1px solid #ccc;"></canvas>
               <video id="video" style="display: none;" type="<?php echo $file_type; ?>" src="<?php echo $src ?>"></video>
               
               <p id="other_info">
                 <span id="file_name">
                   <?php echo stringCutter($file_name); ?>
                 </span><br>
                 <span id="file_info">2k downloads</span>
               </p>
             </a>
           </li>
         </ul>
        <?php
 		}

 		?><script type="text/javascript">
                 drawImageFunc();
               </script>
            <hr style="margin-bottom: -12px; margin-top: -20px;">
 		<?php

 		$query = mysqli_query($conn, "select * from hub_files where hub_file_type like '%audio%' and hub_file_owner = '$hub' order by rand() limit 10") or die(mysqli_error($conn));
           ?>
            <br><div class="bestForYou h4">Best Of <?php echo $hub; ?> - Music &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#"><button class="btn btn-info btn-sm">More Music...</button></a></div>
           <?php

 		while ($row = mysqli_fetch_array($query)) {
 			    $file_name = $row['hub_file_name'];
				$file_owner = $row['hub_file_owner'];
				$file_type = $row['hub_file_type'];
				$file_id = $row['hub_file_id'];
				$upload_date = $row['hub_file_uploaded_date'];


				?>
         <ul id="defaultContentList">
           <li id="defaultContentListLi">
             <a href="" title="<?php echo $file_name; ?>">
               <canvas id="MusicCanvas" style="width: 130px; height: 80px; border: 1px solid #ccc;"></canvas>
               <p id="other_info">
                 <span id="file_name">
                   <?php echo stringCutter($file_name); ?>
                 </span><br>
                 <span id="file_info">2k downloads</span>
               </p>
             </a>
           </li>
         </ul>
        <?php
 		}


 			break;

      case 'hubMedia':
        $query = mysqli_query($conn, "select * from hub_files where hub_file_type like '%video%' and hub_file_owner = '$hub' order by rand() limit 1") or die(mysqli_error($conn));

        $row = mysqli_fetch_array($query);
        $file_name = $row['hub_file_name'];
        $file_owner = $row['hub_file_owner'];
        $file_type = $row['hub_file_type'];
        $file_id = $row['hub_file_id'];
        $upload_date = $row['hub_file_uploaded_date'];
        $src = $file_type."/".$file_name;

        ?><span id="hubMediaName"><?php echo $file_name; ?></span>
          <video title="<?php echo $file_name;?>" id="hubLg" type="<?php echo $file_type; ?>" src="<?php echo $src; ?>" controls></video>
        <?php

        break;
 		
 		default:
 			# code...
 			break;
 	}
 }



?>