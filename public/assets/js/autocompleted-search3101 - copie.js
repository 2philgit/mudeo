// initialisation de l'objet requête recherche
// par défaut : tri par ordre alphabétique (A>Z) sur tous les médias (vidéo et musique) toutes catégories
obj_search = {
	"input_search": "",
	"column" :"title",
	"order": "ASC", // pour effectuer le tri, par défaut en DESC
	"type": "vm", // (type média) pour sélectionner vidéo, musique ou les 2
	"category": "" // pour sélectionner les catégories
}
type_flag = false;
category_flag = false; // pour vérifier si on a déjà sélectionner l'un des types (vidéo, musqiue ou tout)
console.log("INIT" + category_flag);
// console.log(obj_search);

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
		var line_result = $("<p>");
		//console.log(response);
		//console.log("LONGUEUR AJAX : " + response.length);
		// showContent(response);
	///////////////////////////
		if (response.length != 0) {

			//$('#search-result').html(""); // On remplace le contenu du html par une chaîne vide
			// line_result initialisé au début de ".done"
			line_result.html("Recherche sur : " + '"' + obj_search.input_search + '"' + "-" + " Nombre d'élement(s) trouvé(s) : " + response.length); // On affiche le nb de résultats de la recherche
			$('#search-result').append(line_result);

			if (obj_search.type == "video") {
				 console.log("VIDEO");
				// vider la liste
				$('#content_Container').html(""); // ici on remplace le contenu du html par une chaîne vide

				for (var i = 0; i < response.length; i++) {
					var show = response[i];
					var title = show.title;
					var user_id = show.user_id;
					var author = show.author;
					// var author = user_id;
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
					p.addClass("alert").html("Balise vidéo non supportée par le navigateur. Veuillez le mettre à jour");


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
				} // fin du for "video"
			
			} else { // le type, c'est de la musique ;)

				console.log("MUSIQUE");

				// vider la liste
				$('#content_Container').html(""); // ici on remplace le contenu du html par une chaîne vide
				
				for (var i = 0; i < response.length; i++) {
					var show = response[i];
					var title = show.title;
					var user_id = show.user_id;
					var author = show.author;
					// var author = user_id;
					var category = show.category;
					var date = show.created;
					var url_file = show.url_file;

					// on crée une balise figure et on lui ajoute les classes show et clearfix
					var figure = $("<figure>");
					figure.addClass("show clearfix");

					// on crée une balise vidéo et on lui ajoute la classe clearfix et l'id mamusique
					var video = $("<video>");
					video.addClass("clearfix").attr("id", "mamusique").attr("controls", "").attr("poster","<?=$this->assetUrl('img_site/moutainsmin.jpg')?>");

					// on crée une balise vidéo et on lui ajoute la classe clearfix et l'id mamusique
					var source = $("<source>");
					// console.log(obj_search.url_file);
					// source.attr("src", url_file);
					//source.attr("src", "<?=$this->assetUrl('medias/files/musics/asap.mp3')?>");
					source.attr("src", "<?=$this->assetUrl('medias/files/musics/asap.mp3')?>").attr("type", "audio/mp3");

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
					$(video).append(source).append(p);
					$(figure).append(video);
					$(figure).append(figcaption);
					$('#content_Container').append(figure);

				} // fin du for "musique"

			} // fin condition "musique"
		
		} else { // si response [] => pas de résultats

			console.log("AUCUN RESULTATS");
			line_result.html("Aucun résultat");
			$('#search-result').append(line_result);
			// $('#content_Container').html("Nous sommes désolés, aucun élément ne correspond à votre recherche. <br/> Veuillez reformuler votre demande.");

			console.log(obj_search.type + " " + obj_search.column + " " + obj_search.order + " " + obj_search.category);
		}
	
	})
	.fail(function(response){		// qd il y a une erreur
		alert("Erreur de recherche"); // pratique pour localiser une erreur
		console.log("Une erreur a été détectée");
	})
	.always(function(response){		// sera utiliser dans tous les cas	

		if (category_flag || type_flag) {
			obj_search = {
			"input_search": "",
			"column" :"title",
			"order": "ASC", // pour effectuer le tri, par défaut en DESC
			"type": "vm", // (type média) pour sélectionner vidéo, musique ou les 2
			"category": "" // pour sélectionner les catégories
			}
			type_flag = false;
			category_flag = false;
		}
		console.log("flag type :" + type_flag + " category :" + category_flag);
	});
}

/*  POUR L'AUTOCOMPLETION LORS DE LA RECHERCHE */


function autocompletedSearch() {

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

$("#search").on("keyup", autocompletedSearch);

// mise sous écoute du bouton de recherche
// $('#button-search').on("click", function() {
// })})


// mise sous écoute de tous les liens de sélections de la recherche
// pour les types (vidéo ou musique)
$(".select-type").click(function(){

	type_flag = true;
	console.log("click type" + category_flag);
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

	category_flag = true;
	console.log("click category  " + category_flag);

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


// **** CODE POUR LE MENU DE RECHERCHE (CE QUI EST SELECTIONNÉ) **** //

// pour le menu "tri par"
$("#tri a").click(function() {
 	$("#tri a").each(function(){  // boucle sur tous les éléments enfants de la section avec l'id "tri"
 		$(this).removeClass("selected");
 	});
 	$(this).addClass("selected");
 });

// pour le sous-menu (nouveauté, popularité...)
$("#tri_Second a").click(function() {
 	$("#tri_Second a").each(function(){  // boucle sur tous les éléments enfants de la section avec l'id "tri_Second" 
 		$(this).removeClass("selected_2");
 	});
 	$(this).addClass("selected_2");
 });

// pour le menu catégories (uniquement sur la version Desktop du site)
$("#tri_Complet a").click(function() {
 	$("#tri_Complet a").each(function(){ // boucle sur tous les éléments enfants de la section avec l'id "tri_Complet"
 		$(this).removeClass("selected_2");
 	});
 	$(this).addClass("selected_2");
 });

// **** FIN DU CODE POUR LE MENU DE RECHERCHE (CE QUI EST SELECTIONNÉ) **** //

