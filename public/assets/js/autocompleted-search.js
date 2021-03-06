/**************************** 
Script JS gérant la recherche 
*****************************/

// cache par défaut le lien "nouvelle recherche" (sera visible que lorsqu'une recherche aura été effectuée)
$("#new-search").hide();

/*** 
DECLARATION & INITIALISATION des variables 
***/

// initialisation de l'objet requête recherche
// par défaut : tri par ordre alphabétique (A>Z) sur tous les médias (vidéo et musique) toutes catégories
obj_search = {
	"input_search": "",
	"column" :"title",
	"order": "ASC", // pour effectuer le tri, par défaut en DESC
	"type": "vm", // (type média) pour sélectionner vidéo, musique ou les 2
	"category": "" // pour sélectionner les catégories
}

// pour le message retourné pour une recherche
str_result = "";

search ="";

// création de line_result (utilisée pour construire le message des résultats de la recherche)
var line_result = $("<p>");
/*** 
FIN DES DECLARATION & INITIALISATION des variables 
***/

/*** 
DECLARATION DES FONCTIONS UTILISEES DANS CE SCRIPT 
***/

// fonction permettant la création et l'affichage de la liste des mots-clés proposés dans la bdd 
function autocompletedKeywords(response) {
	//$("#autocomplete").css("display", "block");
	$("#autocomplete").html("");
	var list_keys = [];
	var key_verif = ""; 

	for (var i = 0; i < response.length; i++) {
		var show = response[i];
		var key = show.keywords;
		var option = $("<option>"); // création de la balise option

		// vérifie que le mot n'a pas déjà été ajouté si non : l'ajoute 
		// (en ajoutant l'attribut value à la balise option)
		if (key != key_verif) {
			option.attr("value", key);
			list_keys[i] = key;
			key_verif = key;
			$("#autocomplete").append(option); // ajout de la balise option dans la balise datalist (ayant comme id autocomplete)
		}
	}
}

// fonction pour construire le html pour les fichiers vidéo
function buildFigureVideo(id_file, author, title, date) {
	

	// création de la balise figure et ajout de la classe clearfix
	var fig_v = $("<figure>");
	fig_v.addClass("clearfix");

	// création de la balise vidéo et ajout des classes clearfix et player ainsi que l'id mavideo (+ ajout de l'attribut controls)
	var video = $("<video>");
	video.addClass("clearfix player").attr("id", id_file ).attr("controls", "");

	// création de la balise source et ajout de ses attributs et valeurs  A REVOIR (à décomposer) 
	var source_v = $("<source>");
	source_v.attr("src", "http://clips.vorwaerts-gmbh.de/VfE_html5.mp4");
	source_v.attr("type", "video/mp4");

	// création de la balise p et ajout de la classe alert et d'un message (en cas d'erreur de chargement)
	var p_v = $("<p>");
	p_v.addClass("alert").html("Votre navigateur ne supporte pas la balise vidéo ! Mettez-le à jour !");

	// création de la balise figcaption et ajout de la classe clearfix
	var figcap_v = $("<figcaption>");
	figcap_v.addClass("clearfix");
	
	// création de la balise div et ajout des classes info_Top clearfix
	var div_v = $("<div>");
	div_v.addClass("info_Top clearfix");

	// création de la balise h3 et ajout de ses attributs et valeurs  A REVOIR (à décomposer) 
	var h3_v = $("<h3>");
	h3_v.append('<a href="content.html" title="Voir la vidéo">' + title + '</a>');

	// création de la balise span et ajout de la classe social_Nav et de ses attributs et valeurs  A REVOIR (à décomposer) 
	var span_v = $("<span>");
	span_v.addClass("social_Nav").append('<a id="none" class="follow" href="" title="Suivre l\'auteur"><button>Suivre</button></a><a id="none" class="like" href="" title="Aimer le contenu"><img src="assets/img_site/like.png" alt="j\'aime"></a>');

	// création d'une nouvelle balise div et on lui ajoute les classes info_Bottom clearfix
	var d_v = $("<div>");
	d_v.addClass("info_Bottom clearfix").append('<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png" alt="photo de..."></a>');

	// création d'une autre balise span avec ajout de la classe author et de ses attributs et valeurs  A REVOIR (à décomposer)
	var sp_v = $("<span>");
	sp_v.addClass("author").append('<h4>' + author + '</h4><p>publier le ' + date + "21/01/2016" + '</p>');

	// imbrications et affichages des différentes balises précédentes
	// (BALISE CONTENANT).append(BALISE CONTENUE)
	$(d_v).append(sp_v);
	$(div_v).append(h3_v).append(span_v); // div_v contient h3_v et span_v
	$(figcap_v).append(div_v).append(d_v);
	$(video).append(source_v).append(p_v);
	$(fig_v).append(video);
	$(fig_v).append(figcap_v);
	$('#content_Container').append(fig_v);
}

// fonction pour construire le html pour les fichiers audio
function buildFigureMusic(id_file, author, title, date) {
	

	// création de la balise figure et ajout de la classe clearfix
	var fig_m = $("<figure>");
	fig_m.addClass("clearfix");

	// création de la balise div et ajout de la classe poster 
	var dv_m= $("<div>");
	dv_m.addClass("poster");

	// création de la balise img et ajout de la classe poster_Img (avec 1 attribut src)
	var img= $("<img>");
	img.addClass("poster_Img").attr("src", assetUrl + "img_site/moutainsmin.jpg");

	// création de la balise vidéo et ajout des classes clearfix et player ainsi que l'id mamusique (+ ajout de l'attribut controls)
	var audio= $("<audio>");
	audio.addClass("clearfix player").attr("id", "mamusique").attr("controls","");

	// création de la balise source et ajout de ses attributs et valeurs  A REVOIR (à décomposer) 
	var source_m = $("<source>");
	source_m.attr("src", assetUrl + "musics/asap.mp3").attr("type", "audio/mp3");

	// création de la balise p et ajout de la classe alert et d'un message (en cas d'erreur de chargement)
	var p_m = $("<p>");
	p_m.addClass("alert").html("Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !");

	// création de la balise figcaption et ajout de la classe clearfix
	var figcap_m = $("<figcaption>");
	figcap_m.addClass("clearfix");
	
	// création d'une nouvelle balise div et on lui ajoute les classes info_Top clearfix
	var div_m = $("<div>");
	div_m.addClass("info_Top clearfix");

	// création d'une autre balise h3 et ajout de ses attributs et valeurs  A REVOIR (à décomposer) 
	var h3_m = $("<h3>");
	h3_m.append('<a href="content.html" title="écouter la musique">' + title + '</a>');

	// création de la balise span et ajout de la classe social_Nav et de ses attributs et valeurs  A REVOIR (à décomposer) 
	var span_m = $("<span>");
	span_m.addClass("social_Nav").append('<a id="none" class="follow" href="" title="Suivre l\'auteur"><button>Suivre</button></a><a id="none" class="like" href="" title="Aimer le contenu"><img src="assets/img_site/like.png" alt="j\'aime"></a>');

	// on crée une nouvelle balise div et on lui ajoute les classes info_Bottom clearfix
	var d_m = $("<div>");
	d_m.addClass("info_Bottom clearfix").append('<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png" alt="photo de..."></a>');

	// création d'une autre balise span avec ajout de la classe author et de ses attributs et valeurs  A REVOIR (à décomposer)
	var sp_m = $("<span>");
	sp_m.addClass("author").append('<h4>' + author + '</h4><p>publier le ' + date + "21/01/2016" + '</p>');


	// imbrications et affichages des différentes balises précédentes
	// (BALISE CONTENANT).append(BALISE CONTENUE)
	$(d_m).append(sp_m);
	$(div_m).append(h3_m).append(span_m); // div_m contient h3_m et span_m
	$(figcap_m).append(div_m).append(d_m);
	$(audio).append(source_m).append(p_m);
	$(dv_m).append(img).append(audio);
	$(fig_m).append(dv_m).append(figcap_m);
	$('#content_Container').append(fig_m);
}

// fonction effectuant une recherche et récupérant son résultat
function doSearch(){

	// faire une requête Ajax (URL\autocompletion...)
	// récupère les données de la bdd résultantes de la recherche sql (au format Json)
	$.ajax({
		"url":$("#search").attr('data-url'),
		"type": "GET",
		"data": obj_search
	})
	.done(function(response){ // si requête valide : faire

		// appel de la fonction autocompletedKeywords (permettant l'affichage de la liste des mots-clés sous l'input)
		autocompletedKeywords(response);
		

		// Remplacement du contenu du html de la balise (ici le message pour le résultat de la recherche) par une chaîne vide
		$('#msg-search').html(""); 


		if (response.length != 0) {

			// line_result créée au début de ".done"
			// test sur la présence ou non d'une chaîne de caractère dans le champ de recherche
			if (obj_search.input_search !="") { // s'il y a qqch
				str_result = "Recherche sur : " + '"' + obj_search.input_search + '"' + "-" + " Nombre d'élément(s) trouvé(s) : " + response.length;
			} else { 
				str_result = "Nombre d'élement(s) trouvé(s) : " + response.length;
			}

			line_result.html(str_result); // On affiche le nb de résultats de la recherche
			$('#msg-search').append(line_result);
			

			// vider la liste
			$('#content_Container').html(""); // ici on remplace le contenu du html par une chaîne vide
				
			for (var i = 0; i < response.length; i++) {
				var show = response[i];
				var title = show.title;

				// pour créer un balise id portant l'id des fichiers (id unique) qui permettra d'arrêter la lecture d'un fichier lorsqu'une lecture est lancée sur un autre fichier
				var id_file = show.id; 

				var user_id = show.user_id;
				var author = show.author;
				// var author = user_id;
				// var url_file = "<?=$this->assetUrl('../musics/asap.mp3')?>";
				var category = show.category;
				var date = show.created;
				var type = show.content_type;
				var url_file = show.url_file;


				if (type == "vidéo") {
					buildFigureVideo(id_file, author, title, date);

				} else { // le type, c'est de la musique ;)
					buildFigureMusic(id_file, author, title, date);
					} // fin condition "musique"

			} // fin du for "musique"
		
		} else { // si response [] => pas de résultats

			// vider la liste
			$('#content_Container').html(""); // ici on remplace le contenu du html par une chaîne vide


			// line_result initialisée au début de ".done"
			if (obj_search.input_search !="") { 
				str_result = "Recherche sur : " + '"' + obj_search.input_search + '"' + "-" + " Aucun résultat. Veuillez effectuer une nouvelle recherche.";
			} else { 
				str_result = "Aucun résultat. Veuillez effectuer une " +  "nouvelle recherche.";
			}

			line_result.html(str_result); // On affiche le nb de résultats de la recherche
			$('#msg-search').append(line_result);
			
		}
	
	})
	.fail(function(response){	// si requête non-valide : erreur

		$('#content_Container').html(""); // ici on remplace le contenu du html par une chaîne vide
		str_result = "Nous sommes désolés, il y a eu une erreur lors de la recherche.";
		line_result.html(str_result); // On affiche le message d'erreur
		$('#msg-search').append(line_result);

		//alert("Erreur de recherche");  // (utiliser pour les tests)
		console.log("Une erreur a été détectée");
	})
	.always(function(response){	// sera excécuté dans tous les cas

		// affiche le lien pour effectuer une nouvelle recherche (A AMELIORER avec des flags ?)
		$("#new-search").show();
	});
}


/*  POUR L'AUTOCOMPLETION LORS DE LA RECHERCHE */

// fonction permettant l'affichage dans le contenant
function autocompletedSearch() {

	// test sur le nb de caractères sur le champ de recherche (3 caractères minimum)
	search = $("#search").val();

	// si 2 caractères entrés 
	if (search.length >= 2) {
		
		// l'objet recherche récupère la chaîne de caractères entrée dans le champ de recherche
		obj_search.input_search = search;
		// appel de la fonction permettant de traiter la recherche en JS
		doSearch();

	} else {
	}
}
/*** 
FIN DE LA DECLARATION DES FONCTIONS UTILISEES DANS CE SCRIPT 
***/

/*** 
LES MISES SOUS ECOUTE
***/

// mise sous écoute du champ de recherche

$("#search").on("keyup", autocompletedSearch);

// mise sous écoute du formulaire de recherche
$('#search_Field').on("submit", function(e) {
	
	e.preventDefault(); // pour éviter le fonctionnement normal du champ (renvoi de la demande/clic répétitif) (évite au formulaire de se soumettre)
	autocompletedSearch(); // à l'origine doSearch() appellée, mais chgt pour récupérer les données dans le champ formulaire
});


/* mise sous écoute de tous les liens de sélections de la recherche */

// pour les types (vidéo ou musique)
$(".select-type").click(function(){

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax
	if (typeof obj_search.type !== 'undefined') {
		obj_search.type = $(this).attr('data-type');
		}

	doSearch();
	return false; // Désactive le lien (pour éviter chargement du contenu ds une nouvelle page)
});

// pour le mode de vue (nouveauté, likes, upload)
$(".select-mode").click(function(){

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax

	if (typeof obj_search.column !== 'undefined') { // test pour vérifier que le champ n'est pas indéfini
		obj_search.column = $(this).attr('data-column');
		}
	if (typeof obj_search.order !== 'undefined') {
		obj_search.order = $(this).attr('data-order');
		}

	doSearch();
	return false; // Désactive le lien (pour éviter chargement du contenu ds une nouvelle page)
});


// pour les catégories
$(".select-category").click(function(){

	// on va se charger en Ajax de cette soumission
	// on déclenche maintenant la requête en Ajax
	if (typeof obj_search.category !== 'undefined') {
		obj_search.category = $(this).attr('data-category');
		}

		doSearch();

return false; // Désactive le lien (pour éviter chargement du contenu ds une nouvelle page)

});


/* CODE POUR LE MENU DE RECHERCHE (CE QUI EST SELECTIONNÉ) */

// pour le menu "tri par"
$("#tri a").click(function() {
	if (search == "") {
	$("#tri_Second a").removeClass("selected_2");
	}
 	$("#tri a").each(function(){  // boucle sur tous les éléments enfants de la section avec l'id "tri"
 		$(this).removeClass("selected");
 	});
 	$(this).addClass("selected");

 });

// pour le sous-menu (nouveauté, popularité...)
// (uniquement si l'internaute est connecté)
$("#tri_Second a").click(function() {

 	$("#tri_Second a").each(function(){  // boucle sur tous les éléments enfants de la section avec l'id "tri_Second" 
 		$(this).removeClass("selected_2"); // retire la classe à l'élément sélectionné
 	});
 	$(this).addClass("selected_2"); // ajoute la classe à l'élément sélectionné
 });

// pour le menu catégories (uniquement sur la version Desktop du site)
$("#tri_Complet a").click(function() {
 	$("#tri_Complet a").each(function(){ // boucle sur tous les éléments enfants de la section avec l'id "tri_Complet"
 		$(this).removeClass("selected_2");
 	});
 	$(this).addClass("selected_2");
 });


/* FIN DU CODE POUR LE MENU DE RECHERCHE (CE QUI EST SELECTIONNÉ) */

/*** 
FIN DES MISES SOUS ECOUTES 
***/

/* Appel du submit du formulaire pour afficher le résultat de la recherche dans la home (connecté ou non)*/
$('#search_Field').submit(function() {
	$("#tri_Second a").removeClass("selected_2");
});
