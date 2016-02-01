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

	public function changePassword($id){

		$this->show('user/changepassword');

	}

	public function controlChangePassword($id){
die('uig');
		unset($_SESSION['error']);

		if($_POST){

			if(\isIsset($_POST)){
				if($password == $passwordRepeat){

					$usermanager = new \Manager\UserManager();
					$usermanager->update([

								'password' => password_hash($password, PASSWORD_DEFAULT),
								],$id);

					$_SESSION['error']['controlChangePassword'] = "Changement effectuer !  ";

				}else{
						$_SESSION['error']['controlChangePassword'] = "Les mots de passe de correspondent pas !  ";
					 }
			}else{
					$_SESSION['error']['controlChangePassword'] = "Veuillez remplir tous les champs ! ";
				 }
		}
	}


}
