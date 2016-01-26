<?php

namespace Manager;

//la classe de base du framework pour les fichiers
// par défaut, tous les champs utilses sont passés à la requête dans l'odre croissant de la colonne title (de la bdd)
class FileManager extends \W\Manager\Manager {


	public function search() {

		$inputSearch = $_GET['input_search'];
		$result_string = "";
		$column = "title";
		if (!empty($_GET['column'])) {$column = $_GET['column'];}
		$order = "ASC";
		if (!empty($_GET['column'])) {$column = $_GET['column'];}
		if (!empty($_GET['order'])) {$order = $_GET['order'];}
		$selectSearch = "(title LIKE '%$inputSearch%'
							OR user_id LIKE '%$inputSearch%'
							OR file_type LIKE '%$inputSearch%'
							OR nb_like LIKE '%$inputSearch%'
							OR category LIKE '%$inputSearch%'
							OR keywords LIKE '%$inputSearch%'
							OR description LIKE '%$inputSearch%' 
							OR licence LIKE '%$inputSearch%'
							OR content_type LIKE '%$inputSearch%'
							OR created LIKE '%$inputSearch%')";
		// SELECT * FROM `files` WHERE title LIKE '%tit%' ORDER BY `title` ASC 

		// test sur le formulaire validé
		if ($_GET) {

			// teste si le champ de recherche est "non vide"
			if (!empty($inputSearch)) {

				var_dump($flag);

				$inputSearch = htmlentities($inputSearch);  //conversion pour éviter les injections de code

				// RECHERCHE MULTICRITERES, construction de la requête sql
				// s'il y a des critères sélectionnés pour la recherche (si non, par défaut, tout les champs utiles sont transmis à la requête)
				if (count($_GET) > 1) {
					if (array_key_exists('in', $_GET)) {
						// var_dump($_GET['in']);
						$inArrays = $_GET['in'];
						
						//var_dump($inArrays);
						//die();
						if (count($inArrays) >= 3) {
							$selectSearchDb = array_shift($inArrays). " LIKE '%$inputSearch%'";
							$selectSearchEnd = " OR " . array_pop($inArrays) . " LIKE '%$inputSearch%'";
						
							$selectSearch = "";
						
							foreach ( $inArrays as $inArray ) {

								$selectSearch .= " OR " .$inArray . " LIKE '%$inputSearch%'" ;
						
							}
						
							$selectSearch .= $selectSearchEnd;
						
							$selectSearchDb .= $selectSearch;

							$selectSearch = $selectSearchDb;
						} elseif (count($inArrays) == 2) {
							$selectSearchDb = array_shift($inArrays). " LIKE '%$inputSearch%'";
							$selectSearchEnd = " OR " . array_pop($inArrays) . " LIKE '%$inputSearch%'";
							$selectSearch = $selectSearchDb . $selectSearchEnd;
						} else {
							$selectSearch = array_shift($inArrays). " LIKE '%$inputSearch%'";
						}
					}// fin if test 'in'
				}
				//var_dump($_GET);
				// die();

				// TEST SUR L'ORDRE D'AFFICHAGE DES RESULTATS DE RECHERCHE

				// print_r($_SERVER ['REDIRECT_QUERY_STRING']);
				// $queryString = explode ( "=", $_SERVER ['REDIRECT_QUERY_STRING']);
				// var_dump($queryString);

				// #^u$#
				// if () {

				// }
						
				// pdo	
				// création de la requête de recherche (sur title)
				$statement = $this->dbh->prepare("SELECT * FROM files WHERE $selectSearch ORDER BY $column $order;");
				$statement->execute();
				$result = $statement->fetchAll();

				return $result;

			} else { // le champ de recherche est vide

					$result_string = "Vous n'avez rien saisi ! Veuillez effectuer une recherche";
					return $result_string;

				}
		}

	}
}