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
		$user=$this->getUser();
		if ($user) {
		$this->show('search/home_search');
		} else (die("pas connecté"));

	}

	/**
	 * Page des résultats de recherche
	 */
	// public function resultSearch()
	// {
	// 	$fileManager = new \Manager\FileManager;
	// 	$results = $fileManager->search();
	// 	$resultString = $fileManager->search();
	// 	$this->show('search/home_search', [
	// 		'results'=>$results,
	// 		'resultString'=>$resultString,
	// 	]);
	// }

	public function completedSearch() {

		$fileManager = new \Manager\FileManager;
		$results = $fileManager->search();
		$this->showJson($results);
	}

}