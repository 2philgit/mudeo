<?php

namespace Manager;

//la classe de base du framework pour les fichiers
class FileManager extends \W\Manager\Manager {

	public function search() {

		$inputSearch = $_GET['input_search'];
		$result_string = "";

		// test sur le formulaire validé
		if ($_GET) {
			// teste si le champ de recherche est "non vide"
			if (!empty($inputSearch)) {

				$inputSearch = htmlentities($inputSearch);  //conversion pour éviter les injections de code

				// pdo	
				// création de la requête de recherche (sur title)
				$statement = $this->dbh->prepare("SELECT * FROM files WHERE title LIKE '%$inputSearch%';");
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