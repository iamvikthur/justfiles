$(document).ready(function(){
  //load files to the homepage automatically when the page has been loaded
  //the files that will be loaded will be according to the users location, preference(what he searches for most)
  //, ip will be needed, and etc. God bless...
  $(".tab-content").load("server_pages/defaultContent.php?mode=all");

  //when a video link is clicked, load its content
  $(".content #videoList").on("click", "ul li a", function(e){
     e.preventDefault();
     $title = $(this).attr("title");
     $owner = $(this).data("id");
     $(".overlay").fadeIn(2000);
     $(".load_contents").load("includes/videoHtml.php");
     $(".load_contents").show(1000);
     $.ajax({
         type: 'post',
         data: {file: $title, owner: $owner},
         url: 'server_pages/getMedia.php',
         success: function(result){
          $(".modal-content").html(result);
         }
     })
    //$(".overlay").load("server_pages/")
  })
  //load contents videos, music apps photos and others
  $(".content").on("click", "#ul_dropdown li a", function(){
    var data = $(this).data("id");
    $(".tab-content").load("server_pages/getContents.php?mode="+data);
    //$(document).delay(1000);
    //videoCanvas();
  })
	//Load Registeration Form
	$("#reg a").click(function(e){
      e.preventDefault();
      $(".overlay").fadeIn(2500);
      $(".load_contents").load("includes/signIn.php");
       $(".load_contents").fadeIn(1000);
        });
      //Hide Overlay
      $(".load_contents").on("click", ".close", function(){
        $(".load_contents").fadeOut(1000);
      	$(".overlay").fadeOut(2500);
      });

      //Load Login Form
      $("#login a").click(function(e){
        e.preventDefault();
        $(".overlay").fadeIn(2500);
        $(".load_contents").load("includes/login.php");
        $(".load_contents").fadeIn(1000);
      })
	
})