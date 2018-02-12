$(document).ready(function(){
    $(".load_contents").on("keyup", "#domain", function(){
    	$val = $(".load_contents #domain").val();
    	$pattern = /[^ a-z0-9_-]/gi;
        $new_value = $val.replace($pattern, "");
        $(".load_contents #domain").val($new_value);
        $(".load_contents .domain_help").html("checking...");
        $.ajax({
        	url: '../server_pages/createNewdomain.php',
        	type: 'post',
        	data: {val: $new_value},
        	success: function(result){
             if(result == "true"){
            $(".load_contents #domain_form").removeClass("has-warning")
                                    .addClass("has-success")
            $(".load_contents #domain_feedback") .removeClass("glyphicon glyphicon-warning-sign")
                                         .addClass("glyphicon glyphicon-ok-sign");
                                         $(".load_contents .domain_help").html("")
             $(".load_contents #button_domain").show();
          }else{
            $(".load_contents #domain_form").removeClass("has-success")
                                    .addClass("has-warning")
            $(".load_contents #domain_feedback").removeClass("glyphicon glyphicon-ok-sign")
                                         .addClass("glyphicon glyphicon-warning-sign")
             $(".load_contents .domain_help").html(result);
             $(".load_contents #button_domain").hide();

             }
        	}
        })
    })

	$(".load_contents").on("click", "#button_domain", function(){
		var valu = $(".load_contents #domain").val();
		$(".load_contents #button_domain").hide();
		$(".load_contents .spinner").show();
		$(".load_contents span#domainResult").html("Creating Your domain...");
		$.ajax({
			url: '../server_pages/createNewdomain.php',
			type: 'post',
			data: {domain_name: valu},
			success: function(result){
              if (result == "true") {
              	window.open("../d/"+valu , "_self");
              }else{
              	$(".load_contents span#domainResult").html(result);
              }
			}
		})

	})
})