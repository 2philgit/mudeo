<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{

	public function profile(){

		$passwordError = "";

		if($_POST){

			$usermanager = new \Manager\UserManager();

			if(isset($_POST['loginUpdate'])) $login = $_POST['loginUpdate']; else $passwordError = 'vide!';
			if ($usermanager->usernameExists($login) ){
				$passwordError = "Login déja existant !";
			}else{
				//$usermanager->update([$login],$_SESSION['user']['id']);
				$passwordError = 'Success !';
			}
		}

		$this->show('user/profile', [
			"passwordError" => $passwordError
			]);					
	}

	public function deleteaccount(){

		$passwordError = "Your account has deleted!";
		
		$auth = new \W\Security\AuthentificationManager();
		$usermanager = new \Manager\UserManager();

		$usermanager->delete($_SESSION['user']['id']);
		
		$auth->logUserOut();
		setcookie("auth", "", time()-3600, '/', 'localhost', false, true);		

		// $this->show('default/home', [
		// 	"passwordError" => $passwordError
		// 	]);					

		$this->redirectToRoute('home',["passwordError"=>$passwordError]);


	}

	public function userhome(){
		$this->show('user/userhome');
	}


}
