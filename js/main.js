function initializeFunctions() {
	musicCanvas();
	videoCanvas();
}

function videoCanvas(){
	var canvas = document.querySelectorAll("#videoCanvas");
	for(var i = 0; i <= canvas.length; i++) {
		//var mycanvas = document.querySelector("#videoCanvas");
		var video = document.querySelectorAll("#video");
		var context = canvas[i].getContext("2d");
		context.drawImage(video[i], 0,0, 300, 170);
	}
}

function musicCanvas(){
	var img = new Image();
	img.src = "images/bg.jpg";
	var mycanvas  = document.querySelectorAll("#musicCanvas");
	for (var i = 0; i <= mycanvas.length; i++) {
		//var mycanvas = document.querySelector("#musicCanvas");
		var ctx = mycanvas[i].getContext("2d");
		ctx.drawImage(img, 0,0,300,170);
	}
}

setInterval(function(){
   videoCanvas();
},3000)

setInterval(function(){
  musicCanvas();
},3000)

