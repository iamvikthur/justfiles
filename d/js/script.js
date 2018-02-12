$(document).ready(function(){
    //load files to the homepage automatically when the page has been loaded
  //the files that will be loaded will be according to the users location, preference(what he searches for most)
  //, ip will be needed, and etc. God bless...
  //var s = $("#centerWindow .tab-content").load('../server_pages/defaultContent.php?mode=all');
  //console.log(s);
//check if the logged in user is the owner of the hub. if he ix, show admin contents or else, 
//show user contents
	var check = $("body").data("id");
	$.ajax({
		url: '../server_pages/determineUser.php',
		data: {hub: check},
		type: 'post',
		success: function(result){
          if (result == "true" ) {
          	//load admin contents
          	$("#upWindow").load('../theme/upWindow.php');
          	$("#rightSideBar").load('../theme/rightSideBar.php');
          	$("#centerWindow").load('../theme/centerWindow.php');
          	$("#leftSideBar").load('../server_pages/updateFiles.php');
               //update number of files
               //$("#leftSideBar ul#nestedFileList").load('../server_pages/updateFiles.php');
          	console.log(result);
          }else{
          	//load user contents
               $("#upWindow").load('../theme/UserUpWindow.php');
          	$("#leftSideBar").load("../theme/sidebar.php")
                                 .removeClass("col-md-3 col-sm-2 col-xs-2")
                                 .addClass("col-md-2 col-sm-2 col-xs-2 sidebar")
                                
               $("#centerWindow").load("../theme/userPage.php")
                                 .removeClass("col-md-6 col-sm-6 col-xs-6")
                                 .addClass("col-md-10 col-sm-10 col-xs-10 userPage")
                                 
               $("#rightSideBar").remove();

          }
		}
	})
     //ajax end
      
     
})