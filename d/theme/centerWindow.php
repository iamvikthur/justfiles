<?php 
session_start();
?>
<div class="centerWindow">
	<div id="hubImage">
		<img src="../images/news1.jpg" alt="hubLogo" style="" id="hubLogo">
	</div>
	<div class="urHubLink">
	<label for="hubLink" id="hubLinkLabel">Your Hub LinK Is:</label>
		<input class="form-control" id="hubLink" type="text" name="" value="http://www.justfiles.com/d/<?php echo $_SESSION['hub']; ?>">
	</div>
	<div class="dragNdrop" id="dropzone" ondrop="dropfile(event);" ondragover="drag()" ondragleave="leave()">
	<div class="progress" style="display: none;">
	  <div id="prog" style="width: 0%;" class="progress-bar progress-bar-striped active"></div>
	  </div>
	drag and drop
		 files here to
		 upload
		
	</div>
</div>
