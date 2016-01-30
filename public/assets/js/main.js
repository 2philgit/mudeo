$(document).ready(function (){
	//scroll
    $("#back_To").click(function (){
        $('html, body').animate({
            scrollTop: $("#top_Anchor").offset().top
        }, 1000);
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
});


