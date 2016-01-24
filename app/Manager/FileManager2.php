<?php

namespace Manager;

//la classe de base du framework pour les fichiers
class FileManager extends \W\Manager\Manager {

	public function search() {

		$inputSearch = $_GET['input_search'];
		$resultString = "";
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

////////////////// RECUP DES CRITERES DE RECHERCHE

				// test champ title

				// test champ user_id (auteur)

				// test type de fichier (mp3...)

				// test nb_like (les plus populaires)

				// test catégory

				////// GROS MORCEAU // test mots-clés

				// test description

				// test licence

				// test type de contenu (vidéo ou musique)

				// cf test sur la date de créationt ? (du moins l'année)

				if ($_GET['in_title']) {
					$selectSearch = $_GET['in_title'];
				} 
				if ($_GET['in_description']){
					$selectSearch = " OR " . $_GET['in_description'];
				}

				echo("$selectSearch");
				die();

				// pdo	
				// création de la requête de recherche (sur title)
				$statement = $this->dbh->prepare("SELECT * FROM files WHERE $selectSearch LIKE '%$inputSearch%';");
				$statement->execute();
				$result = $statement->fetchAll();

				return $result;

			} else { // le champ de recherche est vide

				$resultString = "Vous n'avez rien saisi ! Veuillez effectuer une recherche";
				return $resultString;

			  }
		}
	}
}