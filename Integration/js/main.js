<<<<<<< HEAD
/*BurgerMenu animation*/
$("#burgerMenu").on("click", function(e){
	e.preventDefault();
	$("#mainMenu").stop(true).slideToggle(250);
	$("#burgerMenu").toggleClass("active");
});
/*fin BurgerMenu animation*/

/*Inscription/Connection switch*/
//switch1
$("#joinLink").on("click", function(e){
	e.preventDefault();
	$("#repeatPassword").toggleClass("hide");
	$(".g-recaptcha").toggleClass("hide");
	$("#logger p").toggleClass("hide");
	$("#switch2").removeClass("hide");
	$("#switch1").addClass("hide");
});
//switch2
$("#connectLink").on("click", function(e){
	e.preventDefault();
	$("#repeatPassword").toggleClass("hide");
	$(".g-recaptcha").toggleClass("hide");
	$("#logger p").toggleClass("hide");
	$("#switch1").removeClass("hide");
	$("#switch2").addClass("hide");
});
/*fin inscription/connection switch*/

/*MDP oublié*/
$("#forgetMdp").on("click", function(e){
	e.preventDefault();
	$("#recoverMdp").toggleClass("hide");
	$(".g-recaptcha").toggleClass("marge");//hack de merde
=======
$(document).ready(function (){
	
	//scroll
   $('a[href^="#"]').click(function(){
		var the_id = $(this).attr("href");

		$('html, body').animate({
			scrollTop:$(the_id).offset().top
		}, 'slow');
		return false;
	});


	//BurgerMenu animation
	$("#burger_Menu").on("click", function(e){
		e.preventDefault();
		$("#main_Menu").stop(true).slideToggle(250);
		$("#burger_Menu").toggleClass("active");
	});
	//fin BurgerMenu animation	


	//Menu utilisateur
	$("#user_Profil").on("click", function(e){
		e.preventDefault();
		$("#user_Hover").stop(true).slideToggle(250).toggleClass("hide");
	});
	//fin menu utilisateur


	/*Inscription/Connection switch*/
	//switch1
	$("#join_Link").on("click", function(e){
		e.preventDefault();
		$("#repeat_Password").toggleClass("hide");
		$(".g-recaptcha").toggleClass("hide");
		$("#logger p").toggleClass("hide");
		$("#switch_2").removeClass("hide");
		$("#switch_1").addClass("hide");
	});
	//switch2
	$("#connect_Link").on("click", function(e){
		e.preventDefault();
		$("#repeat_Password").toggleClass("hide");
		$(".g-recaptcha").toggleClass("hide");
		$("#logger p").toggleClass("hide");
		$("#switch_1").removeClass("hide");
		$("#switch_2").addClass("hide");
	});
	/*fin inscription/connection switch*/


	/*MDP oublié*/
	$("#forget_Mdp").on("click", function(e){
		e.preventDefault();
		$("#recover_Mdp").toggleClass("hide");
		$("#recover_Button").toggleClass("hide");
		$(".g-recaptcha").toggleClass("marge");//hack de merde
	});
	/*fin MDP oublié*/

	/*if ($(window).width() < 1160){
		if (!$("#user_Hover").hasClass("hide")) {
			$("#user_Hover").stop(true).slideToggle(250).toggleClass("hide");		
		};
	};*/
>>>>>>> etienne
});


