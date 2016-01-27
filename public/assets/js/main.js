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
	//e.preventDefault();
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
});
/*fin MDP oublié*/