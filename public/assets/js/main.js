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
	$(".g-recaptcha").toggleClass("marge");//hack de merde
});
/*fin MDP oublié*/