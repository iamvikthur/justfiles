function buildFiles(){
  alert("");
}
function LoadMediaContents(){
  $("#centerWindow .tab-content").load('../server_pages/defaultContent.php?mode=all');
}
function loadHubChoosenVideo(){
  $("#centerWindow .hubMedia").load('../server_pages/defaultContent.php?mode=hubMedia')
}
function drawImageFunc(){
   var canvas = document.querySelectorAll("#videoCanvas")
   for (var i = 0; i < canvas.length; i++) {
   var video = document.querySelectorAll("#video")
   var ctx = canvas[i].getContext("2d");
   ctx.drawImage(video[i], 0, 0, 300, 160);
   }
   console.log("canvas "+canvas.length);
   console.log("video "+video.length);
}
setInterval(function(){
   drawImageFunc();
},1000)
function drag(){
   var dropzone = document.getElementById("dropzone");
   dropzone.ondragover = function(){
       console.log("iam here");
       this.className = "dragNdrop ondragover";
       this.innerHTML = "drop files to upload";
       return false;
   }
} 

function leave(){
   var dropzone = document.getElementById("dropzone");
   dropzone.ondragleave = function(){
       console.log("iam");
       this.className = "dragNdrop";
       this.innerHTML = "drag and drop files to upload";
       return false;
   }
}
function dropfile(event){
	   var dropzone = document.getElementById("dropzone");
       dropzone.className = "dragNdrop";
       dropzone.innerHTML = "Working on droped file";
       event.preventDefault();
       upload(event.dataTransfer.files);
   }

function upload(event){
	var formData = new FormData();
	var ajax = new XMLHttpRequest();

	for (var i = 0; i < event.length; i++) {
		formData.append('file[]', event[i])
      }

      ajax.upload.addEventListener("progress", progressHandler, false);
      ajax.addEventListener("load", loadHandler, false);
     
     ajax.onreadystatechange = function(){
      if (ajax.readyState == 4 && ajax.status == 200) {
        var text = ajax.responseText;
        var dropzone = document.getElementById("dropzone");
        if (text == "true") {
          dropzone.className = "dragNdrop";
        dropzone.innerHTML = "File Upload Successful!";
        }
        
        
      }
     }
      
		ajax.open('post', '../server_pages/upload.php');
		ajax.send(formData);
	
}
function progressHandler(event){
  var dropzone = document.getElementById("dropzone");
  var percent = Math.round((event.loaded / event.total)*100)+"%";
  dropzone.className = "spin";
  dropzone.innerHTML = percent+" uploading...";
}
function loadHandler(){
  var dropzone = document.getElementById("dropzone");
  dropzone.className = "dragNdrop";
  dropzone.innerHTML = "File Upload Sucessfull";
  updateFiles();
  LoadMediaContents();
  return false;
}
function updateFiles(){
  $("#leftSideBar").load('../server_pages/updateFiles.php');
}

function loadUser(e){
  e.preventDefault();
  $("#upWindow").load('../theme/UserUpWindow.php');
            $("#leftSideBar").load("../theme/sidebar.php")
                                 .removeClass("col-md-3 col-sm-2 col-xs-2")
                                 .addClass("col-md-2 col-sm-2 col-xs-2 sidebar")
                                
               $("#centerWindow").load("../theme/userPage.php")
                                 .removeClass("col-md-6 col-sm-6 col-xs-6")
                                 .addClass("col-md-10 col-sm-10 col-xs-10 userPage")
                                 
               $("#rightSideBar").remove();
                    
}


