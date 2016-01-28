// initialisation de l'objet requête recherche
// par défaut : tri par ordre alphabétique (A>Z) sur tous les médias (vidéo et musique) toutes catégories
obj_search = {
	"input_search": "",
	"column" :"title",
	"order": "ASC", // pour effectuer le tri, par défaut en DESC
	"type": "vm", // (type média) pour sélectionner vidéo, musique ou les 2
	"category": "" // pour sélectionner les catégories
}

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
			console.log(response);
			// showContent(response);

			// vider la liste
			$('#content_Container').html(""); // ici on remplace le contenu du html par une chaîne vide

			for (var i = 0; i < response.length; i++) {
				var show = response[i];
				var title = show.title;
				var user_id = show.user_id;
				var category = show.category;
				// on crée une balise article et on lui ajoute une classe todo
				var article = $("<article>");
				article.addClass("show");
				// on ajoute la variable dans l'article
				// article.append(content);
				article.append('<br />' + '<a rel="title" href="#">' + title + " " + category +'</a>');
				// ajoute l'article crée dans la balise avec l'id "show-select"
				$('#content_Container').append(article);
			}
			console.log(obj_search.type + " " + obj_search.column + " " + obj_search.order);
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
// 	$.ajax({
// 			"url":$("#search").attr('data-url'),
// 			"type": "GET",
// 			"data": $('#form-search').serialize()
// 		}).done(function(response){
// 			console.log(response);
// })})


// mise sous écoute de tous les liens de sélections de la recherche
// pour les types (vidéo ou musique)
$(".select-type").click(function(){

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax
	if (typeof obj_search.type !== 'undefined') {
		obj_search.type = $(this).attr('data-type');
		}
	console.log(obj_search);
	console.log(obj_search.type + " " + obj_search.column + " " + obj_search.order);
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
	console.log(obj_search.type + " " + obj_search.column + " " + obj_search.order);
	doSearch();
	return false; // on desactive le lien (pour éviter chargement du contenu ds une nouvelle page)
});


// pour les catégories
$(".select-category").click(function(){

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax
	if (typeof obj_search.type !== 'undefined') {
		obj_search.type = $(this).attr('data-type');
		}
		console.log(obj_search);
		console.log(obj_search.type + " " + obj_search.column + " " + obj_search.order);
		doSearch();
return false; // on desactive le lien (pour éviter chargement du contenu ds une nouvelle page)
});



