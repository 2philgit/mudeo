// mise sous écoute de tous les liens
$("a").click(function(){

	// on recupère l'adresse du lien
	//page=($(this).attr("href")); 
	page="/autocompletion/";

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax
	$.ajax({
		"url": page, // url de la page à charger
		"type": "GET",
		// pour envoyer les données :
		"data": $('#form-search').serialize() // récupère tous les champs du formulaire (ici 1 seul)
	}).done(function(response){
		console.log(response);
		showContent(response);
	});
return false; // on desactive le lien (pour éviter chargement du contenu ds une nouvelle page)
});

function showContent(response) {
	//$("#contenu").empty(); // on vide la div
	//$("#show-selected").append(response);// on met dans la div le résultat de la requête Ajax
	// vider la liste
			$('#show-selected').html(""); // ici on remplace le contenu du html par une chaîne vide

			for (var i = 0; i < response.length; i++) {
				var show = response[i];
				var title = show.title;
				var user_id = show.user_id;
				var category = show.category;
				// on crée une balise article et on lui ajoute une classe todo
				var article = $("<article>");
				article.addClass("show");
				// on ajoute la variable dans l'article
				article.append(content);
				article.append('<br />' + '<a rel="title" href="#">' + title + " " + category +'</a>');
				// ajoute l'article crée dans la balise avec l'id "show-select"
				$('#show-selected').append(article);
}


// d'après : http://top-news.fr/ajax-avec-jquery-exemple-changement-du-contenu-d-un-div/


// $(document).ready(function(){   // le document est chargé
/*
	$("a").click(function(){   // on selectionne tous les liens et on définit une action quand on clique dessus
		
		page=($(this).attr("href")); // on recuperer l'adresse du lien
		
		$.ajax({ // ajax
			url: page, // url de la page à charger
			// cache: false, // pas de mise en cache
			
			success:function(yo){ // si la requête est un succès
				afficher(yo);     // on execute la fonction afficher(donnees)
			},
			
			error:function(XMLHttpRequest, textStatus, errorThrows){ // erreur durant la requete
			}

		});

	return false; // on desactive le lien
	});

// });

function afficher(donnees){ // pour remplacer le contenu du div contenu

	$("#contenu").empty(); // on vide le div
	$("#contenu").append(donnees); // on met dans le div le résultat de la requête ajax

}
*/