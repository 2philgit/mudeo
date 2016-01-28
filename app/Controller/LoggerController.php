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
			
			if($_POST['email'] == null || $_POST['password'] == null || $_POST['passwordRepeat'] == null ){

				$isValid = false;
				$passwordError = "vide!";

			}else{

				$email = $_POST['email'];
				$password = $_POST['password'];
				$passwordRepeat = $_POST['passwordRepeat'];				

				

				if ($password != $passwordRepeat) {
					$isValid = false;
					$passwordError= "Les mots de passe ne correspondent pas !";
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

						$tokentime = time() + (20*60);
						
						$usermanager->insert([
							"id" => "",
							"username" => $email,
							"email" => $email,
							"password" => password_hash($password, PASSWORD_DEFAULT),
							"birthday" => date("Y-m-d H:i:s"),
							"country" => "",
							"urlpicture" => "",
							"biography" => "",
							"subscription" => 1,
							"created" => date("Y-m-d H:i:s"),
							"token" => password_hash($token, PASSWORD_DEFAULT),
							"token_timestamp" => $tokentime
						]);
						
						$user = $usermanager->getUserByUsernameOrEmail($email);

						$auth = new \W\Security\AuthentificationManager();
						$auth->logUserIn($user);

						$passwordError = "Please tcheck your email and confirm your registration !";
						// on redirige l"utilisateur

						$lien = '<a href="'.$this->generateUrl('mail',['token'=>$token,'id'=>$_SESSION['user']['id']],true).'">http://www.mudeo.com/verif/u675CXIV9YOLHbYIjhgc8O7UNM</a>';
						$lien_img = "http://img.clubic.com/07220896-photo-logo-samsung-milk-music.jpg";

						$msg = "<img src='".$lien_img."' style='width:100px;height:100px'/> <h2>Mudéo </h2>";
						$msg .= "<h4>MFF Corp.</h4><br/><br/>";
						$msg .= "Pour pouvoir confirmer l'activation de votre compte sur le réseau de partage musique et vidéos de Mudéo pour le compte de <span style='font-weight:bold;'>".strtoupper($email)."</span>. Veuillez cliquer sur le lien suivant qui vous redirigera vers notre site<br/><br/>".$lien;
						$msg .= "<br/><br/>Attention ce message s'auto-détruira dans 5.. 4.. 3.. 2.. 1.. bon dans 1 heure en fait !!!!! ";

						require_once 'assets/inc/mailer.php';

						smtpmailer('mudeo.wf3@gmail.com', 'oday972@gmail.com', 'Admin', 'Vérification de la création de compte Mudéo', $msg);
						

					}
				}				
			}
		}

		$this->redirectToRoute('home', [
			"passwordError" => $passwordError
			]);					
	}

	public function log(){

		//die(debug($_POST));
		$usermanager = new \Manager\UserManager();
		$auth = new \W\Security\AuthentificationManager();
//debug($usermanager);
		$passwordError = "";
		
			if($_POST)
			{
				
				if($_POST['logger'] == null || $_POST['password'] == null){
					$error[0] = 1;
					$error[1] = "vide!";
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
								
								$error = \confirmAccount($user['token_timestamp']);	

							}else{
								$error[0] = 1;
								$error[1] = "Wrong login/mp couple!";								
							}

						}else{ 
							$error[0] = 1;
							$error[1] = "Login not found!";
						}

						\displayInfo($error);
						//if($error[0] == 2) $this->redirectToRoute('userhome'); else $this->redirectToRoute('home');

					}else{ //sinon le log contient un @ c'est un email dc verification dans la BDD sur le champ email

						$email = $logger;

						if ($usermanager->emailExists($email) ){

							if($auth->isValidLoginInfo($email,$password)){

							$user = $usermanager->getUserByUsernameOrEmail($email);
							$auth->logUserIn($user);

							
							if(isset($_POST['remember'])){

								setcookie("auth", $user['id'] . '-----' . sha1($user['username'] . $user['password'] . $_SERVER['REMOTE_ADDR']), time()+3600 * 24 * 3, '/', 'localhost', false, true);
							}		
							
							$error = \confirmAccount($user['token_timestamp']);

								$this->redirectToRoute('home');		
							}else{
								$error[0] = 1;
								$error[1] = "Wrong email/mp couple!";
							}
							
						}else{

							$error[0] = 1;
							$error[1] = "Email not found";
						}			
					}
			
				}
				
			}
		
		// $error[0] = 2;
		// $error[1] = "Log with success !";

		\displayInfo($error);
		if($error[0] == 2) $this->redirectToRoute('userhome'); else $this->redirectToRoute('home');	
	}

	public function logout(){
		$auth = new \W\Security\AuthentificationManager();

		$auth->logUserOut();
		setcookie("auth", "", time()-3600, '/', 'localhost', false, true);
		$this->redirectToRoute('log');
	}

	public function forgetpassword(){
		$passwordError = "";
		//die('eee');
		if(isset($_POST['emailPasswordRecovery'])){
			
			$emailPasswordRecovery = $_POST['emailPasswordRecovery'];

			$usermanager = new \Manager\UserManager();
			
			if($usermanager->emailExists($emailPasswordRecovery)){
					
				
				$token = \W\Security\StringUtils::randomString(32);
				$tokentime = time() + (20*60);

				$user = $usermanager->getUserByUsernameOrEmail($emailPasswordRecovery);
	
				$passwordError = "Please tcheck your email for change your password !";
				// on redirige l"utilisateur

				$lien = '<a href="'.$this->generateUrl('mail',['token'=>$token,'id'=>$user['id']],true).'">http://www.mudeo.com/verif/u675CXIV9YOLHbYIjhgc8O7UNM</a>';
				$lien_img = "http://img.clubic.com/07220896-photo-logo-samsung-milk-music.jpg";

				$msg = "<img src='".$lien_img."' style='width:100px;height:100px'/> <h2>Mudéo </h2>";
				$msg .= "<h4>MFF Corp.</h4><br/><br/>";
				$msg .= "Pour pouvoir changer de mot de passe <span style='font-weight:bold;'>".strtoupper($user['username'])."</span>. Veuillez cliquer sur le lien suivant qui vous redirigera vers notre site<br/><br/>".$lien;
				$msg .= "<br/><br/>Attention ce message s'auto-détruira dans 5.. 4.. 3.. 2.. 1.. bon dans 1 heure en fait !!!!! ";

				require_once 'assets/inc/mailer.php';

				smtpmailer('mudeo.wf3@gmail.com', 'oday972@gmail.com', 'Admin', 'Vérification de la création de compte Mudéo', $msg);



			}else{
				$passwordError = "Email inexistant !";
			}



			$this->show('Default/home', [
			"passwordError" => $passwordError
			//"email_confirm" => $email_confirm 
			]);

		}else{

		}
		
		$this->show('logger/forgetpassword', [
			"passwordError" => $passwordError
			]);					
	}

	/*public function veriftoken(){
		
		$usermanager = new \Manager\UserManager();
		$lastID = $usermanager->lastID();
		$usermanager->update(['token' => ''],$lastID);		
		
		$this->redirectToRoute('home', ["passwordError" => "Account validate! MF"]);
	}*/

	public function register(){

		$passwordError = "";

		if($_POST){
			die('register');
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
									$tokentime = time() + (3*60);
									
									$usermanager->insert([
										"id" => "",
										"username" => $email,
										"email" => $email,
										"password" => password_hash($password, PASSWORD_DEFAULT),
										"birthday" => date("Y-m-d H:i:s"),
										"country" => "",
										"urlpicture" => "",
										"biography" => "",
										"subscription" => 1,
										"created" => date("Y-m-d H:i:s"),
										"token" => $token,
										"token_timestamp" => $tokentime
									]);

									$user = $usermanager->getUserByUsernameOrEmail($login);

									$auth = new \W\Security\AuthentificationManager();
									$auth->logUserIn($user);									

									$passwordError = "Please tcheck your email and confirm your registration !";
									// on redirige l"utilisateur

									$lien = '<a href="'.$this->generateUrl('mail',['token'=>$token,'id'=>$_SESSION['user']['id']],true).'">http://www.mudeo.com/verif/u675CXIV9YOLHbYIjhgc8O7UNM</a>';
									$lien_img = "http://img.clubic.com/07220896-photo-logo-samsung-milk-music.jpg";

									$msg = "<img src='".$lien_img."' style='width:100px;height:100px'/> <h2>Mudéo </h2>";
									$msg .= "<h4>MFF Corp.</h4><br/><br/>";
									$msg .= "Pour pouvoir confirmer l'activation de votre compte sur le réseau de partage musique et vidéos de Mudéo pour le compte de <span style='font-weight:bold;'>".strtoupper($email)."</span>. Veuillez cliquer sur le lien suivant qui vous redirigera vers notre site<br/><br/>".$lien;
									$msg .= "<br/><br/>Attention ce message s'auto-détruira dans 5.. 4.. 3.. 2.. 1.. bon dans 1 heure en fait !!!!! ";

									require_once 'assets/inc/mailer.php';

									smtpmailer('mudeo.wf3@gmail.com', 'oday972@gmail.com', 'Admin', 'Vérification de la création de compte Mudéo', $msg);
				
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