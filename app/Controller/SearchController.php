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
		$this->show('search/home_search');
		// de la function resltSearch
		$fileManager = new \Manager\FileManager;
		$results = $fileManager->search();
<<<<<<< HEAD

		$this->showJson($results);
		//$resultString = $fileManager->search();
		//$this->show('search/result_search', [
			//'results'=>$results,
			//'resultString'=>$resultString,
		//]);
=======
		$resultString = $fileManager->search();
		$this->show('search/home_search', [
			'results'=>$results,
			'resultString'=>$resultString,
		]);
>>>>>>> 5fd8052dc7fcfd563c061254294339eb821ef68d
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