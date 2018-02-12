$(document).ready(function(){
	$(".load_contents").on("submit", "form", function(e){
      e.preventDefault();
      $form = $(this);
      var i = $(this).attr("id");
      uploadMyFile($form , i);
	})

	//upload my file function
	function uploadMyFile($form , i){
		var formdata = new FormData($form[0]);

		var ajax = new XMLHttpRequest()

		//Listen to progress event and update my progress bar
		ajax.upload.addEventListener("progress", function(e){
			var percent = Math.round(e.loaded/e.total*100);
			$(".load_contents #progress"+i).width(percent+"%").html(percent+"%")
			                                                   .removeClass("progress-bar-danger")
			                                                    .removeClass("progress-bar-success");
		});

		//when is complete
		ajax.addEventListener("load", function(e){
			$(".load_contents #progress"+i).removeClass("progress-bar-danger")
			                           .addClass("progress-bar-success")
			                           .html("Upload complete");
			$(".load_contents .row"+i).html("<span style='color: green'>Your File Was Uploaded Successfully "+
			                           "Click The Button Bellow To Build</span><br><br>"+
			                           "<button class='btn btn-primary'>Build File Now</button>")
			console.log(ajax.responseText);
		});


		ajax.open('post', 'server_pages/uploadPhp.php');
		ajax.send(formdata);

       $(".load_contents .row"+i).on("click", "#cancel", function(){
       	ajax.abort();
       	$(".load_contents #progress"+i).removeClass("progress-bar-success")
       	                           .addClass("progress-bar-danger")
       	                           .html("Upload Canceled");
       })
	}
})