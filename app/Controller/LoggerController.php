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
						$token = \W\Security\StringUtils::randomString(32);
						// $usermanager->insert([
						// 	"id" => "",
						// 	"username" => $email,
						// 	"email" => $email,
						// 	"password" => password_hash($password, PASSWORD_DEFAULT),
						// 	"birthday" => date("Y-m-d H:i:s"),
						// 	"country" => "",
						// 	"urlpicture" => "",
						// 	"biography" => "",
						// 	"subscription" => 1,
						// 	"created" => date("Y-m-d H:i:s"),
						// 	"token" => $token
						// ]);
						
						$user = $usermanager->getUserByUsernameOrEmail($email);

						$auth = new \W\Security\AuthentificationManager();
						$auth->logUserIn($user);

						$passwordError = "Register done !";
						// on redirige l"utilisateur
	
						$this->show('mail/mail',["login"=>$email,"token"=>$token]);					
	
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

								if(isset($_POST['remember'])){

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

							if(isset($_POST['remember'])){

								setcookie("auth", $user['id'] . '-----' . sha1($user['username'] . $user['password'] . $_SERVER['REMOTE_ADDR']), time()+3600 * 24 * 3, '/', 'localhost', false, true);
							}		
							
							if(!empty($_SESSION['user']['token'])){
								$passwordError = "Your account isn't checked! Please go to your mail & click on the link!";
							}else{
								$passwordError = "Success!";
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
		setcookie("auth", "", time()-3600, '/', 'localhost', false, true);
		$this->redirectToRoute('log');
	}

	public function forgetpassword(){
		$passwordError = "";
		

		
		$this->show('logger/forgetpassword', [
			"passwordError" => $passwordError
			]);					
	}

	public function veriftoken(){
		
		$usermanager = new \Manager\UserManager();
		$lastID = $usermanager->lastID();
		$usermanager->update(['token' => ''],$lastID);		
		
		$this->redirectToRoute('home', ["passwordError" => "Account validate! MF"]);
	}

	public function register(){

		$passwordError = "";

		if($_POST){

			$isValid = true;
			
			if($_POST['login'] == null || $_POST['email'] == null || $_POST['password1'] == null || $_POST['password2'] == null || $_POST['birthday'] == null ){

				$isValid = false;
				$passwordError = "vide!";

			}else{

				if(strpos($_POST['login'],'@') !== false){
					$passwordError = "@ don't accept for the login";
				}else{

				$login = $_POST['login'];
				$email = $_POST['email'];
				$password1 = $_POST['password1'];
				$password2 = $_POST['password2'];				
				$birthday = $_POST['birthday'];				

				isset($_POST['country']) ? $country = $_POST['country'] : $country = "";
				isset($_POST['urlpicture']) ? $urlpicture = $_POST['urlpicture'] : $urlpicture = "";
				isset($_POST['biography']) ? $biography = $_POST['biography'] : $biography = "";

				

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
					
					if($usermanager->usernameExists($login) == false){
					// si c'est valide 
						if(isset($_POST['g-recaptcha-response'])){ $captcha = $_POST['g-recaptcha-response'];}

					    if(!$captcha)
					    {
					        $passwordError = 'Il faut cocher le captcha !';					        
					    }else{
					    	 	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfqUBYTAAAAADkoRy9mGz7cDUl_4aJz27jUR4oV&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
					    		
					    	 	$response = json_decode($response, true);

							    if($response["success"] == false)
							    {
							        $passwordError = 'La tu es un robot ! DEGAGE !!!!';
							    }
							    else
							    {
							        if ($isValid) {
									
									$token = \W\Security\StringUtils::randomString(32);

									// on insère en bdd
									$usermanager->insert([
										"id" => "",
										"username" => $login,
										"email" => $email,
										"password" => password_hash($password, PASSWORD_DEFAULT),
										"birthday" => $birthday,
										"country" => $country,
										"urlpicture" => $urlpicture,
										"biography" => $biography,
										"created" => date("Y-m-d H:i:s"),
										"token" => $token
									]);

									$user = $usermanager->getUserByUsernameOrEmail($login);

									$auth = new \W\Security\AuthentificationManager();
									$auth->logUserIn($user);

									$passwordError = "Register done !";
									// on redirige l"utilisateur
									//$this->show('mail/mail',["login"=>$login,"token"=>$token]);					
									$this->show('logger/register',[
			"passwordError" => $passwordError	]);									
									
								}else{
									$isValid = false;
									$passwordError = "Login déjà utilisé !";
								}
							}
					    }
					}
					   
						
				}				
			}
		}
	}



		$this->show('logger/register', [
			"passwordError" => $passwordError
			]);					
	}


}