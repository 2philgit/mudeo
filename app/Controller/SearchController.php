<?php

namespace Controller;

use \W\Controller\Controller;

class SearchController extends Controller
{

	/**
	 * Page de la recherche
	 */

	public function search()
	{
		// si user connecté, permet l'affichage de la page userhome, si non : affiche la page home_nolog (home d'accueil si non connecté)
		$user=$this->getUser();
		if ($user) {
			$this->show('user/userhome');
		} else {
			$this->show('user/home_nolog');
		}
	}

	public function completedSearch() {

		$fileManager = new \Manager\FileManager;
		$results = $fileManager->search();
		$this->showJson($results);
	}

}