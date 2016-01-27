function doSearch(){
		// faire une requête Ajax (URL\autocompletion...)
		// récupère tous ce qui a dans le champ
		$.ajax({
			"url":$("#input-search").attr('data-url'),
			"type": "GET",
			"data": $('#form-search').serialize()
		}).done(function(response){
			console.log(response);

			// vider la liste
			$('#search-result').html(""); // ici on remplace le contenu du html par une chaîne vide

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
				$('#search-result').append(article);
			}
}

/*  POUR L'AUTOCOMPLETION LORS DE LA RECHERCHE */


function autocompletedSearch() {

// test sur le nb de caractères sur le champ de recherche (3 caractères minimum)
	$search = $("#input-search").val();
	// si 3 caractères
	if ($search.length >= 3) {

		doSearch();
		});

	} else {
		console.log("Pas 3 caractères");
	}
}

// mise sous écoute du champ de recherche

$("#input-search").on("keyup", autocompletedSearch);

// mise sous écoute du bouton de recherche
$('#button-search').on("click", function() {
	$.ajax({
			"url":$("#input-search").attr('data-url'),
			"type": "GET",
			"data": $('#form-search').serialize()
		}).done(function(response){
			console.log(response);
})})

/*
// mise sous écoute de tous les liens
$("a").click(function(){

	// on recupère l'adresse du lien
	page=($(this).attr("href")); 

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax
	$.ajax({
		"url": page // url de la page à charger
		//"type": "GET"
		// pour envoyer les données :
		//"data": $("#rev-form").serialize() // récupère tous les champs du formulaire 
	}).done(function(response){
		showContent(response);
	});
return false; // on desactive le lien (pour éviter chargement du contenu ds une nouvelle page)
});

function showContent(response) {
	$("#search-result").empty(); // on vide la div
	$("#search-result").append(response);// on met dans la div le résultat de la requête Ajax
}
*/