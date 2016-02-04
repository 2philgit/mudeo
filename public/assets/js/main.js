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
		//e.preventDefault();
		$("#user_Hover").stop(true).slideToggle(250).toggleClass("hide");
	});
	//fin menu utilisateur


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

	/*MDP oublié*/
	$("#forget_Mdp").on("click", function(e){
		e.preventDefault();
		$("#recover_Mdp").toggleClass("hide");
		$("#recover_Button").toggleClass("hide");
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

	$( "#btnchangepsw" ).click(function() {
	  $( "#formChangePassword" ).submit();
	});

	/*Stop la lecture si l'élément n'est plus visible dans le navigateur*/
	//Fonction trouvée sur Stack Overflow
	function isInView(el) {
		var rect = el.getBoundingClientRect();           // absolute position of video element
	  	return !(rect.top > $(window).height() || rect.bottom < 0);   // visible?
	}

	$(document).on("scroll", function() {
	  	$(".player").each(function() {
	  		//Si c'est visible
		    if (isInView($(this)[0])) {
		      	//On test que le contenu n'est pas déjà en pause, auquel cas on le met en pause
		      	if (!$(this)[0].paused){
		      	 	$(this)[0].pause();
		      	} 
		  	}
		})
	});


	/*Arrête de lire le contenu si un autre est activé*/
	$(".player").each(function(){
		$(this).bind("play", stopPlaying); 
	})

	function stopPlaying(){
		var currentPlayingId = $(this).attr("id");
		$(".player").each(function(){
			var elementId = $(this).attr("id");
			if(elementId != currentPlayingId){
				$(this)[0].pause();
			}
		});
	}
	/**IMPORTANT : RAJOUTER LA CLASSE PLAYER SUR LES BALISE VIDEO ET AUDIO**/
	/**IMPORTANT : CHAQUE BALISE AUDIO ET VIDEO DOIVENT AVOIR UN ID (le titre par exemple)**/

});