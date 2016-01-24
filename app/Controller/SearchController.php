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
	}

	/**
	 * Page des résultats de recherche
	 */
	public function resultSearch()
	{
		$fileManager = new \Manager\FileManager;
		$results = $fileManager->search();
		$resultString = $fileManager->search();
		$this->show('search/result_search', [
			'results'=>$results,
			'resultString'=>$resultString
		]);
	}


}