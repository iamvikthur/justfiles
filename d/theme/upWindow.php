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
		<span>
			<ul class="modes">
				<li class="" id="useractive">
					<a  href="#" id="userMode" onclick="loadUser(event)">User Mode</a>
				</li>
                <li class="active" id="adminactive">
                	<a href="#" id="adminMode">Admin Panel</a>
                </li>
			</ul>
		</span>
	</div>
</div>