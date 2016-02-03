<?php

namespace Manager;

//la classe de base du framework pour les fichiers
// par défaut, tous les champs utilses sont passés à la requête dans l'odre croissant de la colonne title (de la bdd)
class FileManager extends \W\Manager\Manager {

	public function search() {

		// Déclaration et affectation des variables (un objet similaire est créé en JS)
		$inputSearch = $_GET['input_search'];
		$column = "title";
		if (!empty($_GET['column'])) {$column = $_GET['column'];}
		$order = "ASC";
		if (!empty($_GET['order'])) {$order = $_GET['order'];}
		$type = "vm"; // par défaut vidéo et musique
		if (!empty($_GET['type'])) {$type = $_GET['type'];}
		$category = "";
		if (!empty($_GET['category'])) {$category = $_GET['category'];}

		// RECHERCHE PAR DEFAUT (requête partielle affectée par défaut (recherche sur "tous" les champs))
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


				$inputSearch = htmlentities($inputSearch);  //conversion pour éviter les injections de code

				// RECHERCHE MULTICRITERES, construction de la requête sql
				// s'il y a des critères sélectionnés pour la recherche (si non, par défaut, tout les champs utiles sont transmis à la requête)

				// Sélection des critères d'option des résultats de recherche

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

				//SELECT *  FROM `files` WHERE `user_id` = 1 ORDER BY `created` DESC
				if ($_GET['column'] == "upload&user") {
					$selectSearch = " user_id = " . $_SESSION['user']['id'];                                                                                               ;
					$column = "created";
					//$order = "DESC";
				}


				if ($_GET['category']) {

					  $selectSearch .= " AND (category LIKE '%$category%')";
				}

				$username = "users.username";
				$author = "author";
				$id = "files.user_id = users.id";
						
				// pdo	
				// création de la requête de recherche (sur title)
				$statement = $this->dbh->prepare("SELECT files.*, $username AS author FROM users LEFT JOIN files ON $id WHERE $selectSearch ORDER BY $column $order;");
				$statement->execute();
				$result = $statement->fetchAll();

				return $result;

	}