<?php 
session_start();
?>
<div class="userpage">
	<div id="hubMedia">
	<div class="hubMedia">
		<script type="text/javascript">
		loadHubChoosenVideo();
	</script>
	</div>
		<div id="someInfo" class="someInfo">
			<span class="h4">
				Hub Info
			</span>
			<hr style="font-size: 12px; font-weight: bolder;">
			<ul id="someInfoList">
				<li>Total Subscribers: 90b</li>
				<li>Latest Upload: <a href="">[MUSIC]</a></s>
                    <ul id="latestUploaddate">
                    	<li>
                    		uploaded on: 12-8-2017
                    	</li>
                    </ul>
				</li>
				<li>Most downloaded File: <a href="">[MUSIC]</a>
                 <ul id="lastdownloaddate">
                 	<li>
                 		last download: just now
                 	</li>
                 </ul>
				</li>
				<li>Status: Very Active</li>
			</ul>
		</div>
	</div>
</div>
<hr style="clear: both;">
<p>
	<div class="content">
	<ul class="nav nav-tabs" id="tab" style="margin-bottom: -60px;">
		<li id="list_dropdown" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<span class="glyphicon glyphicon-facetime-video"></span>&nbsp;&nbsp;Videos <b class="caret"></b></a>
			<ul id="ul_dropdown" class="dropdown-menu">
				<li>
					<a href="#" id="" data-id="recommendedVideos" data-toggle="tab">All</a>
				</li>
				<li>
					<a href="#" id="" data-id="recommendedVideos" data-toggle="tab">Platlist</a>
				</li>
			</ul>
		</li>
		<li id="list_dropdown" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<span class="glyphicon glyphicon-music"></span>&nbsp;&nbsp;Music <b class="caret"></b></a>
			<ul id="ul_dropdown" class="dropdown-menu">
				<li>
					<a href="#" id="" data-id="recommendedMusic" data-toggle="tab">All</a>
				</li>
				<li>
					<a href="#" id="" data-id="trendingMusic" data-toggle="tab">Albums</a>
				</li>
			</ul>
		</li>
		<li id="list_dropdown" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			Applications <b class="caret"></b></a>
			<ul id="ul_dropdown" class="dropdown-menu">
				<li>
					<a href="#" id="" data-id="recommendedApps" data-toggle="tab">All</a>
				</li>
				<li>
					<a href="#" id="" data-id="exe" data-toggle="tab">EXE</a>
				</li>
				<li>
					<a href="#" id="" data-id="apk" data-toggle="tab">Mobile Apps(.APK)</a>
				</li>
				<li>
					<a href="#" id="" data-id="ios" data-toggle="tab">IOS</a>
				</li>
				<li>
					<a href="#" id="" data-id="desktopApps" data-toggle="tab">Desktop Apps</a>
				</li>
				<li>
					<a href="#" id="" data-id="pdfPptTxt" data-toggle="tab">.PDFs .PPT .TXT .</a>
				</li>
			</ul>
		</li>
		<li id="list_dropdown" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<span class="glyphicon glyphicon-picture"></span>&nbsp;&nbsp;Photo <b class="caret"></b></a>
			<ul id="ul_dropdown" class="dropdown-menu">
				<li>
					<a href="#" id="" data-id="recommendedPhotos" data-toggle="tab">All</a>
				</li>
				<li>
					<a href="#" id="" data-id="recentPhoto" data-toggle="tab">Portifolio</a>
				</li>
			</ul>
		</li>
		<li id="list_dropdown">
			<a href="#" data-toggle="tab">Others</a>
		</li>
	</ul>
	<div class="tab-content" id="videoList">
		<script type="text/javascript">
			LoadMediaContents();
		</script>
	</div>
</div>
</p>