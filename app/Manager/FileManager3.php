<?php

namespace Manager;

//la classe de base du framework pour les fichiers
class FileManager extends \W\Manager\Manager {


	public function search() {

		$inputSearch = $_GET['input_search'];
		$result_string = "";
		$selectSearch = "(title LIKE '%$inputSearch%'
							OR user_id LIKE '%$inputSearch%'
							OR file_type LIKE '%$inputSearch%'
							OR nb_like LIKE '%$inputSearch%'
							OR category LIKE '%$inputSearch%'
							OR keywords LIKE '%$inputSearch%'
							OR description LIKE '%$inputSearch%' 
							OR licence LIKE '%$inputSearch%'
							OR content_type LIKE '%$inputSearch%'
							OR created LIKE '%$inputSearch%'
							)";
		

		// test sur le formulaire validé
		if ($_GET) {

			// teste si le champ de recherche est "non vide"
			if (!empty($inputSearch)) {

				$inputSearch = htmlentities($inputSearch);  //conversion pour éviter les injections de code

				// RECHERCHE MULTICRITERES, construction de la requête sql
				// s'il y a des critères sélectionnés pour la recherche (si non, par défaut, tout les champs utiles sont transmis à la requête)
				if (count($_GET) > 1) {
					
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
				}
				// var_dump($selectSearch);
				//die();
						
				// pdo	
				// création de la requête de recherche (sur title)
				$statement = $this->dbh->prepare("SELECT * FROM files WHERE $selectSearch;");
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