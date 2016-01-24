<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET', '/recherche/', 'Search#search', 'search'],
		['GET', '/resultats/', 'Search#resultSearch', 'result_search'],
	);