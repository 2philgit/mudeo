<?php

namespace Manager;

//la classe de base du framework pour les fichiers
class FileManager extends \W\Manager\Manager {

	private function built_sql($inputSearch) {

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
	
		//// RECHERCHE MULTICRITERES, construction de la requête sql
		$inArrays = $_GET['in'];
		
		$selectSearchDb = array_shift($inArrays);
		$selectSearchEnd = " OR " . array_pop($inArrays) . " LIKE '%$inputSearch%'";
		
		$selectSearch = "";
		
		foreach ( $inArrays as $inArray ) {

			$selectSearch .= " OR " .$inArray . " LIKE '%$inputSearch%'" ;
		
		}
		
		$selectSearch .= $selectSearchEnd;
		
		$selectSearchDb .= $selectSearch;

		return $selectSearchDb;

	}

	public function search() {

		$inputSearch = $_GET['input_search'];
		$result_string = "";
		$selectSearchDb = "";
		

		// test sur le formulaire validé
		if ($_GET) {
			// teste si le champ de recherche est "non vide"
			if (!empty($inputSearch)) {

				$inputSearch = htmlentities($inputSearch);  //conversion pour éviter les injections de code


				$this->built_sql($inputSearch);	
				
				// pdo	
				// création de la requête de recherche (sur title)
				$statement = $this->dbh->prepare("SELECT * FROM files WHERE $selectSearchDb;");
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