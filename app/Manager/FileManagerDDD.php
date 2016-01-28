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


				// construction de la requête sql de recherche


				//// RECHERCHE MULTICRITERES, 
				$inArrays = $_GET['in'];
				//print_r($inArrays);
				//$sql = implode(" OR ", $inArrays);

				
				$selectSearchDb = array_shift($inArrays);
				$selectSearchEnd = " OR " . array_pop($inArrays) . " LIKE '%$inputSearch%'";
				//echo($selectSearchDb . " & " . $selectSearchEnd);
				
				//echo "\n";
				foreach ( $inArrays as $inArray ) {
					$selectSearch .= " OR " .$inArray . " LIKE '%$inputSearch%'" ;
					//echo $selectSearch . "\n"; 
				}
				//echo "selectSearch:" . $selectSearch . "\n";
				$selectSearch .= $selectSearchEnd;
				//echo $selectSearch . "\n";
				$selectSearchDb .= $selectSearch;
				$selectSearch = $selectSearchDb;
				//echo "\n";
				//die($selectSearchDb);

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