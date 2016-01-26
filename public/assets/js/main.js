$("#email").change(function(){

	var emailRegex = new RegExp('@');
	var rep = emailRegex.test($("#email").val());

	if(rep == false){
		$("#email").css("border","3px solid red");
		$("#emailError").css("display","initial");
	}else{
		$("#email").css("border","3px solid green");
		$("#emailError").css("display","none");
	}
	
});

$("#login").change(function(){

	var emailRegex = new RegExp('@');
	var rep = emailRegex.test($("#login").val());

	if(rep){
		$("#login").css("border","3px solid red");
		$("#loginError").css("display","initial");
	}else{
		$("#login").css("border","3px solid green");
		$("#loginError").css("display","none");
	}
	
});

$("#password2").change(function(){
	
	if($("#password1").val() != $("#password2").val()){

		$("#password1").css("border","3px solid red");
		$("#password2").css("border","3px solid red");
		$("#passwordError").css("display","initial");

	}else{
		$("#password1").css("border","3px solid green");
		$("#password2").css("border","3px solid green");
		$("#passwordError").css("display","none");
	}
	
});

$('#userUpdate').on("click",function(){
	$('#loginUpdateBlock').css("display","initial");
});