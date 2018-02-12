$(document).ready(function(){
  //bootstrap popover function
  $("ul li a#CreateNewDomain").click(function(e){
    e.preventDefault();
    $(".overlay").fadeIn(1000);
    $(".load_contents").load("includes/createNewDomain.php");
    $(".load_contents").fadeIn(1500);
    
  });
  //load created hubs
  $(".header li#loadCreatedDomains").load("server_pages/createdHubs.php");
	//Load Upload form Form
	$("li a #uploadButton").click(function(e){
      e.preventDefault();
      $(".load_contents").load("includes/general_upload.php");
      $(".overlay").fadeIn(2500);
      $(".load_contents").fadeIn(1000);
        });
      //Hide Overlay
      $(".load_contents").on("click", ".close", function(){
      	$(".overlay").fadeOut(2500);
        $(".load_contents").fadeOut(1500);
      });

      //Append Upload fields to table
      var i = 1;
      $(document).on("click", "#add_fields", function(e){
        e.preventDefault();
        i++;
        $("#tbl").append(
          '<form id="'+i+'" class="form-group row'+i+'" enctype="multipart/form-data">'+
          '<table class="table">'+
					'<tr>'+
						'<td>'+
							'<input type="file" class="form-control" name="file" id="file">'+
							'<br>'+
							'<div class="progress">'+
								'<div id="progress'+i+'" style="width: 0%;" class="progress-bar progress-bar-striped active">'+
									
								'</div>'+
							'</div>'+
							'<button class="btn btn-info btn-sm" type="submit" id="upload">Upload</button>&nbsp;'+
							'<button class="btn btn-danger btn-sm" type="button" id="cancel">Cancel</button>'+
						'</td>'+
						'<td>'+
							'<button id="'+i+'" class="btn btn-danger rmv_fields"><span class="glyphicon glyphicon-minus"></span></button>'+
						'</td>'+
					'</tr>'+
          '</table>'+
				'</form>'
				  )
      })
      //end

      //Remove fields
      $(document).on("click", ".rmv_fields", function(e){
      	e.preventDefault();
      	$id = $(this).attr("id");
        $(".row"+$id).remove();
      })
	
})