// initialisation de l'objet requête recherche
// par défaut : tri par ordre alphabétique (A>Z) sur tous les médias (vidéo et musique) toutes catégories

function search_init() {

obj_search = {
	"input_search": "",
	"column" :"title",
	"order": "ASC", // pour effectuer le tri, par défaut en DESC
	"type": "vm", // (type média) pour sélectionner vidéo, musique ou les 2
	"category": "" // pour sélectionner les catégories
}
console.log("INITIALISATION : " + obj_search);
}

function build_html_video(response) {
	for (var i = 0; i < response.length; i++) {
		var show = response[i];
		var title = show.title;
		var user_id = show.user_id;
		var author = user_id;
		var category = show.category;
		var date = show.created;

		// on crée une balise figure et on lui ajoute les classes show et clearfix
		var figure = $("<figure>");
		figure.addClass("show clearfix");

		// on crée une balise vidéo et on lui ajoute la classe clearfix et l'id mavideo
		var video = $("<video>");
		video.addClass("clearfix").attr("id", "mavideo").attr("controls", "");

		// on crée une balise vidéo et on lui ajoute la classe clearfix et l'id mavideo
		var source = $("<source>");
		source.attr("src", "http://clips.vorwaerts-gmbh.de/VfE_html5.mp4");
		source.attr("type", "video/mp4");

		var p = $("<p>");
		p.addClass("alert").html("Balise video non supportée par le navigateur. Veuillez le mettre à jour");


		// on crée une balise figcaption et on lui ajoute la classe clearfix
		var figcaption = $("<figcaption>");
		figcaption.addClass("clearfix");
		

		// on crée une balise div et on lui ajoute les classes info_Top clearfix
		var div = $("<div>");
		div.addClass("info_Top clearfix");

		var h3 = $("<h3>");
		h3.append('<a href="content.html" title="Voir la vidéo">' + title + '</a>');

		var span = $("<span>");
		span.addClass("social_Nav").append('<a id="none" class="follow" href="" title="Suivre l\'auteur"><button>Suivre</button></a><a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j\'aime"></a>');


		// on crée une nouvelle balise div et on lui ajoute les classes info_Bottom clearfix
		var d = $("<div>");
		d.addClass("info_Bottom clearfix").append('<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png" alt="photo de..."></a>');

		var sp = $("<span>");
		sp.addClass("author").append('<h4>' + author + '</h4><p>publier le ' + date + "21/01/2016" + '</p>');


		// on ajoute la variable dans la video
		// video.append(content);
		// video.append('<br />' + '<a rel="title" href="#">' + title + " " + category +'</a>');
		// ajoute l'video crée dans la balise avec l'id "show-select"
		$(d).append(sp);
		$(div).append(h3).append(span);
		$(figcaption).append(div).append(d);
		$(video).append(source).append(p);
		$(figure).append(video);
		$(figure).append(figcaption);
		$('#content_Container').append(figure);
	}

	search_init()
}

function build_html_music(response) {
	for (var i = 0; i < response.length; i++) {
		var show = response[i];
		var title = show.title;
		var user_id = show.user_id;
		var author = user_id;
		var category = show.category;
		var date = show.created;
		//var url_file = show.url_file;
		//var url_file = "<?=$this->assetUrl('medias/files/musics/asap.mp3')?>";
		var url_file = "../musics/asap.mp3";

		// on crée une balise figure et on lui ajoute les classes show et clearfix
		var figure = $("<figure>");
		figure.addClass("show clearfix");

		// on crée une balise vidéo et on lui ajoute la classe clearfix et l'id mamusique
		var video_audio = $("<video>");
		video_audio.addClass("clearfix").attr("id", "mamusique").attr("controls", "").attr("poster","img_site/moutainsmin.jpg");

		// on crée une balise vidéo et on lui ajoute la classe clearfix et l'id mamusique
		var source = $("<source>");
		// console.log(obj_search.url_file);
		source.attr("src", url_file);
		source.attr("type", "audio/mp3");

		var p = $("<p>");
		p.addClass("alert").html("Balise video non supportée par le navigateur. Veuillez le mettre à jour");


		// on crée une balise figcaption et on lui ajoute la classe clearfix
		var figcaption = $("<figcaption>");
		figcaption.addClass("clearfix");
		

		// on crée une balise div et on lui ajoute les classes info_Top clearfix
		var div = $("<div>");
		div.addClass("info_Top clearfix");

		var h3 = $("<h3>");
		h3.append('<a href="content.html" title="écouter la musique">' + title + '</a>');

		var span = $("<span>");
		span.addClass("social_Nav").append('<a id="none" class="follow" href="" title="Suivre l\'auteur"><button>Suivre</button></a><a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j\'aime"></a>');


		// on crée une nouvelle balise div et on lui ajoute les classes info_Bottom clearfix
		var d = $("<div>");
		d.addClass("info_Bottom clearfix").append('<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png" alt="photo de..."></a>');

		var sp = $("<span>");
		sp.addClass("author").append('<h4>' + author + '</h4><p>publier le ' + date + "21/01/2016" + '</p>');


		// on ajoute la variable dans la video
		// video.append(content);
		// video.append('<br />' + '<a rel="title" href="#">' + title + " " + category +'</a>');
		// ajoute l'video crée dans la balise avec l'id "show-select"
		$(d).append(sp);
		$(div).append(h3).append(span);
		$(figcaption).append(div).append(d);
		$(video_audio).append(source).append(p);
		$(figure).append(video_audio);
		$(figure).append(figcaption);
		$('#content_Container').append(figure);
	}

	search_init()
}

function doSearch(){
		// faire une requête Ajax (URL\autocompletion...)
		// récupère tous ce qui a dans le champ

		$.ajax({
			"url":$("#search").attr('data-url'),
			"type": "GET",
			// "data": $('#form-search').serialize()
			"data": obj_search
		})
		.done(function(response){
			console.log(response);
			// showContent(response);
		//////////////////////////
			if (response != []) {

				if (obj_search.type == "video") {

					 console.log("VIDEO");

					// vider la liste
					$('#content_Container').html(""); // ici on remplace le contenu du html par une chaîne vide
					build_html_video(response);
					
				} else if (obj_search.type == "musique") { // le type, c'est de la musique ;)

					console.log("MUSIQUE");

					// vider la liste
					$('#content_Container').html(""); // ici on remplace le contenu du html par une chaîne vide
					build_html_music(response);

				} else if (obj_search.type == "vm"){

					console.log("VIDEO ET MUSIQUE");

					// vider la liste
					$('#content_Container').html(""); // ici on remplace le contenu du html par une chaîne vide
					build_html_music(response);
					build_html_video(response);

				}
					

			} // fin du if sur response []


			console.log(obj_search.type + " " + obj_search.column + " " + obj_search.order + " " + obj_search.category);

			// else $('#content_Container').html("Aucun résultat");

		})
		.fail(function(response){		// qd il y a une erreur
			alert("Erreur de recherche"); // pratique pour localiser une erreur
			console.log("Une erreur a été détectée");
		});
}

/*  POUR L'AUTOCOMPLETION LORS DE LA RECHERCHE */


function autocompletedSearch() {
	search_init()
	// test sur le nb de caractères sur le champ de recherche (3 caractères minimum)
	search = $("#search").val();
	// console.log(search);
	// si 3 caractères
	if (search.length >= 3) {
		// on recupère l'adresse du lien
		
		obj_search.input_search = search;
		doSearch();

	} else {
		console.log("Pas 3 caractères");
	}
}



// mise sous écoute du champ de recherche
search_init()
$("#search").on("keyup", autocompletedSearch);

// mise sous écoute du bouton de recherche
// $('#button-search').on("click", function() {
// 	$.ajax({
// 			"url":$("#search").attr('data-url'),
// 			"type": "GET",
// 			"data": $('#form-search').serialize()
// 		}).done(function(response){
// 			console.log(response);
// })})


// mise sous écoute de tous les liens de sélections de la recherche
// pour les types (vidéo ou musique ou les 2)
$(".select-type").click(function(){

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax
	if (typeof obj_search.type !== 'undefined') {
		// CF $(this).addClass("selected").last().removeClass("selected");  CF
		obj_search.type = $(this).attr('data-type');
		}
	console.log(obj_search);
	console.log(obj_search.type + " " + obj_search.column + " " + obj_search.order + " " + obj_search.category);
	doSearch();
	return false; // on desactive le lien (pour éviter chargement du contenu ds une nouvelle page)
});

// pour le mode de vue (nouveauté, like, upload)
$(".select-mode").click(function(){

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax
	if (typeof obj_search.column !== 'undefined') {
		obj_search.column = $(this).attr('data-column');
		}
	if (typeof obj_search.order !== 'undefined') {
		obj_search.order = $(this).attr('data-order');
		}
	console.log(obj_search);
	console.log(obj_search.type + " " + obj_search.column + " " + obj_search.order + " " + obj_search.category);
	doSearch();
	return false; // on desactive le lien (pour éviter chargement du contenu ds une nouvelle page)
});


// pour les catégories
$(".select-category").click(function(){

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax
	if (typeof obj_search.category !== 'undefined') {
		obj_search.category = $(this).attr('data-category');
		}
		console.log(obj_search);
		console.log(obj_search.type + " " + obj_search.column + " " + obj_search.order + " " + obj_search.category);
		doSearch();
return false; // on desactive le lien (pour éviter chargement du contenu ds une nouvelle page)
});



