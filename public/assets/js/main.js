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
$("#forget_Mdp").on("click", function(e){
	//e.preventDefault();
	$("#recover_Mdp").toggleClass("hide");
	$(".g-recaptcha").toggleClass("marge");//hack de merde
});
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