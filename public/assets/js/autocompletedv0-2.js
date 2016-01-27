/*  POUR L'AUTOCOMPLETION LORS DE LA RECHERCHE */


function autocompletedSearch() {

// test sur le nb de caractères sur le champ de recherche (3 caractères minimum)
	$search = $("#input-search").val();
	// si 3 caractères
	if ($search.length >= 3) {

		// faire une requête Ajax (URL\autocompletion...)
		// récupère tous ce qui a dans le champ
		$.ajax({
			"url": "/autocompletion/",
			"type": "GET",
			"data": $('#form-search').serialize()
		}).done(function(response){
			console.log(response);

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
		});

	} else {
		console.log("Pas 3 caractères");
	}
}

// mise sous écoute du champ de recherche

$("#input-search").on("keyup", autocompletedSearch);

