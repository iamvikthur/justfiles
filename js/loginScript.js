$(document).ready(function(){
	$(".load_contents").on("click", "#button_log", function(){
		$valu = $(".load_contents #dunno").val();
		$pattern = /[^ a-z0-9.@_-]/gi;
        $dunno = $valu.replace($pattern, "");
        $(".load_contents #dunno").val($dunno);
		$pass = $(".load_contents #pass").val();
		$val = $dunno.indexOf('@');
		$vall = $dunno.lastIndexOf('.');
        if($val == -1 || $vall == -1 || $vall+3 > $dunno.length){
        	//its username
        	$uname = $dunno;
        	$.ajax({
			type: 'post',
			data: {uname: $uname, pass: $pass},
			url: 'server_pages/loginPhp.php',
			success: function(result){
				$(".load_contents #logInResult").html(result)
				if (result == "true") {
					$(".load_contents #button_log").hide();
					$(".load_contents #button_cancel").hide();
					$(".load_contents .spinner").show();
					$(".load_contents #logInResult").html("<span class='login_sucess'>Logged In Sucessfully please wait...</span>")
					window.open("./user/index.php","_self");
				}
			}
		})
        	//if its an email
        }else{
        	$email = $dunno;
        	$.ajax({
			type: 'post',
			data: {email: $email, pass: $pass},
			url: 'server_pages/loginPhp.php',
			success: function(result){
				$(".load_contents #logInResult").html(result)
			}
		})
        }
        

		
	})
})