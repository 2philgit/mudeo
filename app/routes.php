<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET', '/recherche/', 'Search#search', 'home_search'],
		//['GET', '/recherche/', 'Search#resultSearch', 'home_search'],
		['GET', '/autocompletion/', 'Search#completedSearch', 'completed_search'],
	);