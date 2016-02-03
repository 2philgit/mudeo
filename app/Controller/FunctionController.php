<?php

namespace Controller;

use \W\Controller\Controller;

class FunctionsController extends Controller
{

	public function confirmAccount($token){

		if($user['token_timestamp'] != 0 && $user['token_timestamp'] < time()){
			$passwordError = "Please check your mail for confirmation's account !";
		}
		if($user['token_timestamp'] != 0 && time() > $user['token_timestamp']){

			$usermanager->delete($_SESSION['user']['id']);		
			$auth->logUserOut();
			setcookie("auth", "", time()-3600, '/', 'localhost', false, true);
			$passwordError = "Account deleted Mother Fucker!";
		}else{
			$passwordError = "Log correct !";		
		}				

		return $passwordError;
	}
}