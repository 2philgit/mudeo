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
			$this->show('user/user_home');
			//$this->show('user/search_home');
			//$this->show('search/home_user');
		} else
		//(die("pas connecté"));
		$this->show('default/home');

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