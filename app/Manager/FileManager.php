<?php

namespace Manager;

//la classe de base du framework pour les fichiers
// par défaut, tous les champs utilses sont passés à la requête dans l'odre croissant de la colonne title (de la bdd)
class FileManager extends \W\Manager\Manager {

	public function search() {

		//$result_string = "";

		$inputSearch = $_GET['input_search'];
		$column = "title";
		if (!empty($_GET['column'])) {$column = $_GET['column'];}
		$order = "ASC";
		if (!empty($_GET['order'])) {$order = $_GET['order'];}
		$type = "vm"; // par défaut vidéo et musique
		if (!empty($_GET['type'])) {$type = $_GET['type'];}
		$category = "";
		if (!empty($_GET['category'])) {$category = $_GET['category'];}

		$selectSearch = "(title LIKE '%$inputSearch%'
							OR user_id LIKE '%$inputSearch%'
							OR file_type LIKE '%$inputSearch%'
							OR nb_like LIKE '%$inputSearch%'
							OR category LIKE '%$inputSearch%'
							OR keywords LIKE '%$inputSearch%'
							OR description LIKE '%$inputSearch%' 
							OR licence_filter LIKE '%$inputSearch%'
							OR content_type LIKE '%$inputSearch%'
							OR files.created LIKE '%$inputSearch%')";


		// test sur le formulaire validé
		//if ($_GET) {

			// teste si le champ de recherche est "non vide"
			//if (!empty($inputSearch)) {

				$inputSearch = htmlentities($inputSearch);  //conversion pour éviter les injections de code

				// RECHERCHE MULTICRITERES, construction de la requête sql
				// s'il y a des critères sélectionnés pour la recherche (si non, par défaut, tout les champs utiles sont transmis à la requête)

				// Sélection des critères d'option des résultats de recherche

				//if (!empty($inputSearch)) {
				switch ($_GET['type']) {
					    case "video":
					        $selectSearch .= " AND (content_type LIKE 'vidéo')";
					        break;
					    case "musique":
					        $selectSearch .= " AND (content_type LIKE 'musique')";
					        break;
					    case "vm":
					        $selectSearch .= " AND (content_type LIKE 'vidéo' OR content_type LIKE 'musique')";
					        break;
					}
				//}

				//SELECT *  FROM `files` WHERE `user_id` = 1 ORDER BY `created` DESC
				if ($_GET['column'] == "upload&user") {
					$selectSearch = " user_id = " . $_SESSION['user']['id'];                                                                                               ;
					$column = "created";
					//$order = "DESC";
				}

				// SELECT files.*, users.username AS author, 'likes-files.file_id' AS likes FROM users LEFT JOIN files ON files.user_id = users.id WHERE title LIKE '%ti%' ORDER BY title ASC
				//////////////////////////SELECT * FROM films,acteurs,films_acteurs WHERE films.id=film_id AND acteur_id=acteurs.id 
				// SELECT * FROM `likes-files` WHERE `user_id` = 4 
				// SELECT file_id FROM `likes-files` WHERE `user_id` = 4 
				//if ($_GET['column'] == "like_me") {
				//	$selectSearch = " user_id = " . $_SESSION['user']['id'];                                                                                               ;
				//	$column = "created";
					//$order = "DESC";
				//}


				if ($_GET['category']) {

					  $selectSearch .= " AND (category LIKE '%$category%')";
				}

				$username = "users.username";
				$author = "author";
				$id = "files.user_id = users.id";

				//SELECT files.*, users.username AS author FROM users LEFT JOIN files ON files.user_id = users.id WHERE title LIKE '%ti%' ORDER BY title ASC
						
				// pdo	
				// création de la requête de recherche (sur title)
				//$statement = $this->dbh->prepare("SELECT * FROM files WHERE $selectSearch ORDER BY $column $order;");
				$statement = $this->dbh->prepare("SELECT files.*, $username AS author FROM users LEFT JOIN files ON $id WHERE $selectSearch ORDER BY $column $order;");
				$statement->execute();
				$result = $statement->fetchAll();

				return $result;

			//} else { // le champ de recherche est vide

					//$result_string = "Vous n'avez rien saisi ! Veuillez effectuer une recherche";
					//return $result_string;

				//}
		//}

	}


// namespace Manager;



// class FileManager extends \W\Manager\Manager
// {
	
	
}