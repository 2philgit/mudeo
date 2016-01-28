<?php

namespace Controller;

use \W\Controller\Controller;

class LoggerController extends Controller
{

	public function quickRegister()
	{
		
		$passwordError = "";

		if($_POST){

			$isValid = true;
			
			if($_POST['email'] == null || $_POST['password1'] == null || $_POST['password2'] == null ){

				$isValid = false;
				$passwordError = "vide!";

			}else{

				$email = $_POST['email'];
				$password1 = $_POST['password1'];
				$password2 = $_POST['password2'];				

				

				if ($password1 != $password2) {
					$isValid = false;
					$passwordError= "Les mots de passe ne correspondent pas !";
				}
				else{
					$password = $password1;
				}

				$usermanager = new \Manager\UserManager();				

				if ($usermanager->emailExists($email) ){
					$isValid = false;
					$passwordError = "Email déjà utilisé !";
				}else{

					// si c'est valide 
					if ($isValid) {
						// on insère en bdd
						$usermanager->insert([
							"id" => "",
							"username" => "aqw",
							"email" => $email,
							"password" => password_hash($password, PASSWORD_DEFAULT),
							"birthday" => date("Y-m-d H:i:s"),
							"country" => "france",
							"urlpicture" => "urlpicture",
							"biography" => "blablabla",
							"created" => date("Y-m-d H:i:s"),
							"token" => "gsnsgnw"
						]);

						// on redirige l"utilisateur
						$this->show('logger/quickRegister', [
							"statut" => 1					
							]);					

					}
				}				
			}
		}



		$this->show('logger/quickRegister', [
			"passwordError" => $passwordError
			]);					
	}

	public function log(){

		$usermanager = new \Manager\UserManager();
		$auth = new \W\Security\AuthentificationManager();

		$passwordError = "";
		
			if($_POST)
			{

				if($_POST['logger'] == null || $_POST['password'] == null){
					$passwordError = "vide!";
				}
				else{

					$logger = $_POST['logger'];
					$password = $_POST['password'];

					$pos = strpos($logger, '@');
					
					//on test sur le champ username
					if($pos === false){

						$username = $logger;

						if ($usermanager->usernameExists($username) ){
													
							if($auth->isValidLoginInfo($username,$password)){

								$user = $usermanager->getUserByUsernameOrEmail($username);
								$auth->logUserIn($user);

								if($_POST['remember']){

									setcookie("auth", $user['id'] . '-----' . sha1($user['username'] . $user['password'] . $_SERVER['REMOTE_ADDR']), time()+3600 * 24 * 3, '/', '127.0.0.1', false, true);
								}
		
							
								$this->show('logger/log', [
									"passwordError" => $passwordError
									]);		
							}else{
								$passwordError = "Wrong login/mp couple!";
							}


						}else{ 

							$passwordError = "Login not found!";
						}

					}else{ //sinon le log contient un @ c'est un email dc verification dans la BDD sur le champ email

						$email = $logger;

						if ($usermanager->emailExists($email) ){

								if($auth->isValidLoginInfo($email,$password)){

								$user = $usermanager->getUserByUsernameOrEmail($email);
								$auth->logUserIn($user);

								if($_POST['remember']){

									setcookie("auth", $user['id'] . '-----' . sha1($user['username'] . $user['password'] . $_SERVER['REMOTE_ADDR']), time()+3600 * 24 * 3, '/', '127.0.0.1', false, true);
								}		
									
									$this->show('logger/log', [
										"passwordError" => $passwordError
										]);		
								}else{
									$passwordError = "Wrong email/mp couple!";
								}
							
						}else{

							$passwordError = "Email not found";
						}			
					}
			
				}
				
			}
		$this->show('logger/log', [
			"passwordError" => $passwordError
			]);					
	}

	public function logout(){
		$auth = new \W\Security\AuthentificationManager();

		$auth->logUserOut();
		setcookie("auth", "", time()-3600, '/', '127.0.0.1', false, true);
		$this->redirectToRoute('log');
	}

	public function register(){

		$this->show('logger/register');
	}



}