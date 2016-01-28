<?php

	//autochargement des classes
	require("../vendor/autoload.php");

    include('assets/inc/functions.php'); 
	
	//configuration
	require("../app/config.php");

	//rares fonctions globales
	require("../W/globals.php");

	//instancie notre appli en lui passant la config et les routes
	$app = new W\App($w_routes, $w_config);

	if(isset($_COOKIE['auth']) && !isset($_SESSION['user'])){

		$auth = $_COOKIE['auth'];
		$auth = explode('-----', $auth);

		$usermanager = new \Manager\UserManager();
		$user = $usermanager->find($auth[0]);
		
		$key = sha1($user['username'].$user['password'] . $_SERVER['REMOTE_ADDR']);
		
		if($key == $auth[1]){
			
			$auth = new \W\Security\AuthentificationManager();
			$auth->logUserIn($user);

			setcookie("auth", $user['id'] . '-----' . $key, time()+3600 * 24 * 3, '/', '127.0.0.1', false, true);

		}else{
			setcookie("auth", "", time()-3600, '/', '127.0.0.1', false, true);
		}
	}


	//exécute l'appli
	$app->run();