<<<<<<< HEAD
/*BurgerMenu animation*/
$("#burger_Menu").on("click", function(e){
	e.preventDefault();
	$("#main_Menu").stop(true).slideToggle(250);
	$("#burger_Menu").toggleClass("active");
});
/*fin BurgerMenu animation*/

/*Inscription/Connection switch*/
//switch1
$("#join_Link").on("click", function(e){
	e.preventDefault();
	// $("#repeat_Password").toggleClass("hide");
	$(".g-recaptcha").toggleClass("hide");
	$("#logger p").toggleClass("hide");
	$("#switch_2").removeClass("hide");
	$("#switch_1").addClass("hide");
	$("#logger_inscription").toggleClass('hide');
	$("#logger_login").addClass("hide");
	$("#remember_Me").addClass("hide");
});
//switch2
$("#connect_Link").on("click", function(e){
	e.preventDefault();
	//$("#remember_Me").toggleClass("hide");
	$("#logger_login").toggleClass("hide");
	$("#logger_inscription").toggleClass('hide');
	$(".g-recaptcha").toggleClass("hide");
	$("#logger p").toggleClass("hide");
	$("#switch_1").removeClass("hide");
	$("#switch_2").addClass("hide");
});
/*fin inscription/connection switch*/

/*MDP oublié*/
// $("#forget_Mdp").on("click", function(e){
// 	//e.preventDefault();
// 	$("#recover_Mdp").toggleClass("hide");
// 	$(".g-recaptcha").toggleClass("marge");//hack de merde
// });
/*fin MDP oublié*/

/*Soumission du formulaire de connection*/
$( "#connect_Button" ).click(function() {
  $( "#logger_login" ).submit();
});
/*Soumission du formulaire d'inscription rapide*/
$( "#inscription_Button" ).click(function() {
  $( "#logger_inscription" ).submit();
});

$("#linkUserMenu").on("click",function(){
	$("#userMenu").toggleClass('hide');
});

/*Menu Recherche home*/

// par défaut menu caché, il apparaîtra lorsqu'une recherche aura été effectuée
$("#tri_Section").hide(); 

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
});


>>>>>>> jerem
