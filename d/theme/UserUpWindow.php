<?php
session_start();
?>
<div class="upwindow">
	<div class ="leftSide pull-left">
		<span class="h4">
			JustFiles.Com <span class="glyphicon glyphicon-arrow-right"></span> <span id="hubName"><?php echo $_SESSION['hub']; ?></span>
		</span>
	</div>
	<div class="rightSide pull-right">
	<span class="col-md-9 col-sm-9 col-xs-9">
		<input type="text" name="upw" id="upw" placeholder="search this hub" class="form-control">
	</span>
	<span class="col-md-2 col-sm-2 col-xs-2">
		<button class="btn btn-sm btn-primary">Go</button>
	</span>
		       
	</div>
</div>