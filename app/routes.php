<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],



		
		//file
		['GET|POST', '/telechargement/video/','File#uploadFiles','upload_files' ],
		['POST', '/telechargement/video/add','File#addFiles','add_files' ],
		

	);