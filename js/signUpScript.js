$(document).ready(function(){
  //trigger when u click on signIn button
	$(".load_contents").on("click", "#button_reg", function(){
    console.log("okkkkkkkkkkkkkkkkkk");
		var email = $(".load_contents #email").val();
        var uname = $(".load_contents #uname").val();
        var pass1 = $(".load_contents #pass1").val();
        var pass2 = $(".load_contents #pass2").val();
        var country = $(".load_contents #country").val();
        var gender = $(".load_contents #gender").val();
		
		$.ajax({
			type: 'post',
			url: 'server_pages/signUpPhp.php',
			data: {email:email, uname:uname, pass1:pass1, pass2:pass2, country:country, gender:gender},
			success: function(result){
             $(".load_contents #signInResult").html(result);
			}
		})
	});
  //end of signIn
     // Clear an elements Warnings and Messages when its been focused 
	$(".load_contents").on("focus", "#email", function(){
		$(".load_contents .email_help").html(" ");
		$(".load_contents #signInResult").html(" ");
	})
	$(".load_contents").on("focus", "#uname", function(){
		$(".load_contents .uname_help").html(" ");
		$(".load_contents #signInResult").html(" ");
	})
	$(".load_contents").on("focus", "#pass1", function(){
		$(".load_contents .pass1_help").html(" ");
		$(".load_contents #signInResult").html(" ");
	})
	$(".load_contents").on("focus", "#pass2", function(){
		$(".load_contents .pass2_help").html(" ");
		$(".load_contents #signInResult").html(" ");
	})
	$(".load_contents").on("focus", "#country", function(){
		$(".load_contents #signInResult").html(" ");
	})
	$(".load_contents").on("focus", "#gender", function(){
		$(".load_contents #signInResult").html(" ");
	});
     // Email Verification
	$(".load_contents").on("keyup", "#email", function(){
		$email = $(".load_contents #email").val();
    if($email.length == 0){
      $(".load_contents #email_form").removeClass("has-warning")
                                           .removeClass("has-success")
                  $(".load_contents #email_feedback").removeClass("glyphicon glyphicon-warning-sign")
                                               .removeClass("glyphicon glyphicon-ok-sign")
                  $(".load_contents .email_help").html("");
                  $(".load_contents #button_reg").show();
                  
    }else{
		$val = $email.indexOf('@');
		$vall = $email.lastIndexOf('.');
        if($val == -1 || $vall == -1 || $vall+3 > $email.length){
        	$(".load_contents .email_help").html("Not a valid Email");
        	$(".load_contents #button_reg").hide();
        }else{
        	$(".load_contents .email_help").html("checking email....")
        	$.ajax({
        		type: 'post',
        		url: 'server_pages/signUpPhp.php',
        		data: {check_value: $email},
        		success: function(result){
                 if(result == "true"){
                 	$(".load_contents #email_form").removeClass("has-warning")
                 	                         .addClass("has-success")
                 	$(".load_contents #email_feedback").removeClass("glyphicon glyphicon-warning-sign")
                 	                             .addClass("glyphicon glyphicon-ok-sign")
                 	$(".load_contents .email_help").html(" ");
                 	$(".load_contents #button_reg").show();
                 }else{
                 	$(".load_contents #email_form").removeClass("has-success")
                 	                         .addClass("has-warning") 
                 	$(".load_contents #email_feedback").removeClass("glyphicon glyphicon-ok-sign")
                 	                             .addClass("glyphicon glyphicon-warning-sign")
                 	$(".load_contents .email_help").html("sorry! Email already Registered try another");
                 	$(".load_contents #button_reg").hide();
                     }
        		}
        	})
        }
      }
	})
 //end email verification
	//UserName Verification
   $(".load_contents").on("keyup", "#uname", function(){
      $uname = $(".load_contents #uname").val();
      if($uname.length == 0){
             $(".load_contents #uname_form").removeClass("has-warning")
                                    .removeClass("has-success")
            $(".load_contents #uname_feedback") .removeClass("glyphicon glyphicon-warning-sign")
                                         .removeClass("glyphicon glyphicon-ok-sign");
                                         $(".load_contents .uname_help").html("")
             $(".load_contents #button_reg").show();
      }else{
   	  $(".load_contents .uname_help").html("checking...")
      $pattern = /[^ a-z0-9_-]/gi;
      $new_value = $uname.replace($pattern, "");
      $(".load_contents #uname").val($new_value);
      if($new_value.length < 3){
        $(".load_contents .uname_help").html("User cannot be lessthan 3 characters!")
        $(".load_contents #button_reg").hide();
      }else{
        $.ajax({
        url: 'server_pages/signUpPhp.php',
        type: 'post',
        data:{uname_check_value: $new_value},
        success: function(result){
          if(result == "true"){
            $(".load_contents #uname_form").removeClass("has-warning")
                                    .addClass("has-success")
            $(".load_contents #uname_feedback") .removeClass("glyphicon glyphicon-warning-sign")
                                         .addClass("glyphicon glyphicon-ok-sign");
                                         $(".load_contents .uname_help").html("")
             $(".load_contents #button_reg").show();
          }else{
            $(".load_contents #uname_form").removeClass("has-success")
                                    .addClass("has-warning")
            $(".load_contents #uname_feedback").removeClass("glyphicon glyphicon-ok-sign")
                                         .addClass("glyphicon glyphicon-warning-sign")
             $(".load_contents .uname_help").html(result);
             $(".load_contents #button_reg").hide();

             }
            }
          })
        }
      }
   })
 //end username verification 
 //start password verification
 //password field one
    $(".load_contents").on("keyup", "#pass1", function(){
      $pass1 = $(".load_contents #pass1").val();
      if($pass1.length < 6){
        $(".load_contents #pass1_form").removeClass("has-success")
                                 .addClass("has-warning")
        $(".load_contents #pass1_feedback").removeClass("glyphicon glyphicon-ok-sign")
                                     .addClass("glyphicon glyphicon-warning-sign")
        $(".load_contents .pass1_help").html("password cannot be lessthan six(6) characters");
        $(".load_contents #button_reg").hide();
      }else{
        $(".load_contents #pass1_form").removeClass("has-warning")
                                 .addClass("has-success")
        $(".load_contents #pass1_feedback").removeClass("glyphicon glyphicon-warning-sign")
                                     .addClass("glyphicon glyphicon-ok-sign")
        $(".load_contents .pass1_help").html("");
        $(".load_contents #button_reg").show();

      }
    })
    //password field one verification ends

    $(".load_contents").on("keyup", "#pass2", function(){
      $pass2 = $(".load_contents #pass2").val();
      $pass1 = $(".load_contents #pass1").val();
      if($pass2 != $pass1){
        $(".load_contents #pass2_form").removeClass("has-success")
                                 .addClass("has-warning")
        $(".load_contents #pass2_feedback").removeClass("glyphicon glyphicon-ok-sign")
                                     .addClass("glyphicon glyphicon-warning-sign")
        $(".load_contents .pass2_help").html("passwords did not match")
        $(".load_contents #button_reg").hide();
      }else{
        $(".load_contents #pass2_form").removeClass("has-warning")
                                 .addClass("has-success")
        $(".load_contents #pass2_feedback").removeClass("glyphicon glyphicon-warning-sign")
                                     .addClass("glyphicon glyphicon-ok-sign")
        $(".load_contents .pass2_help").html("")
        $(".load_contents #button_reg").show();
      }
    })
})