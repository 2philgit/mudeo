<?php

namespace Controller;

use \W\Controller\Controller;

class LoggerController extends Controller
{

	public function quickRegister()
	{
		unset($_SESSION['error']);

		if($_POST){
			
			$isValid = true;
			
			if(\isIsset($_POST)){

				$email = $_POST['email'];
				$password = $_POST['password'];
				$passwordRepeat = $_POST['passwordRepeat'];
				$captcha = $_POST['g-recaptcha-response'];

	    	 	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfqUBYTAAAAADkoRy9mGz7cDUl_4aJz27jUR4oV&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);	    		
	    	 	$response = json_decode($response, true);

			    if($response["success"])
			    {
			    	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				   
					    if ($password == $passwordRepeat) {
							
							$usermanager = new \Manager\UserManager();				

							if (!$usermanager->emailExists($email) ){
								
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

								//
								// on redirige l"utilisateur

								$lien = '<a href="'.$this->generateUrl('mailAccount',['token'=>$token,'id'=>$_SESSION['user']['id']],true).'">http://www.mudeo.com/verif/u675CXIV9YOLHbYIjhgc8O7UNM</a>';
								$lien_img = "http://img.clubic.com/07220896-photo-logo-samsung-milk-music.jpg";

								$msg = "<img src='".$lien_img."' style='width:100px;height:100px'/> <h2>Mudéo </h2>";
								$msg .= "<h4>MFF Corp.</h4><br/><br/>";
								$msg .= "Pour pouvoir confirmer l'activation de votre compte sur le réseau de partage musique et vidéos de Mudéo pour le compte de <span style='font-weight:bold;'>".strtoupper($email)."</span>. Veuillez cliquer sur le lien suivant qui vous redirigera vers notre site<br/><br/>".$lien;
								$msg .= "<br/><br/>Attention ce message s'auto-détruira dans 5.. 4.. 3.. 2.. 1.. bon dans 1 heure en fait !!!!! ";

								require_once 'assets/inc/mailer.php';

								if(isset($errorMail)) $_SESSION['error']['quickRegister'] = $error; else $_SESSION['error']['quickRegister'] = "Please tcheck your email and confirm your registration !"; 

								smtpmailer('mudeo.wf3@gmail.com', 'oday972@gmail.com', 'Admin', 'Vérification de la création de compte Mudéo', $msg);							
								
								}else{
										$isValid = false;
										$_SESSION['error']['quickRegister'] = "Email déjà utilisé !";							
								 	 }

							}else{
									$isValid = false;
									$_SESSION['error']['quickRegister']= "Les mots de passe ne correspondent pas !";
								 }					 
						
					}else{
							$isValid = false;
							$_SESSION['error']['quickRegister']= "Le format de l'email n'est pas valide !";					
						 }   
			    
			    }else{
			    		$isValid = false;
			    		$_SESSION['error']['quickRegister'] = 'La tu es un robot ! DEGAGE !!!!';
					 }

			}else{
					$isValid = false;
					$_SESSION['error']['quickRegister'] = "Veuillez remplir tous les champs !";								
				 }	
		}

		$this->redirectToRoute('home');					
	}

	public function log(){

		$usermanager = new \Manager\UserManager();
		$auth = new \W\Security\AuthentificationManager();

		unset($_SESSION['error']);
		$isValid = true;
		
		if($_POST)
		{
			if(\isIsset($_POST)){

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
							
							$_SESSION['error']['log'] = \confirmAccount($user['token_timestamp']);	

						}else{
								$isValid = false;
								$_SESSION['error']['log'] = "Wrong login/mp couple!";								
							 }

					}else{ 
							$isValid = false;
							$_SESSION['error']['log'] = "Login not found!";
						 }

				}else{ //sinon le log contient un @ c'est un email dc verification dans la BDD sur le champ email

					$email = $logger;

					if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

						 if ($usermanager->emailExists($email) ){

							if($auth->isValidLoginInfo($email,$password)){

								$user = $usermanager->getUserByUsernameOrEmail($email);
								$auth->logUserIn($user);

								
								if(isset($_POST['remember'])){

									setcookie("auth", $user['id'] . '-----' . sha1($user['username'] . $user['password'] . $_SERVER['REMOTE_ADDR']), time()+3600 * 24 * 3, '/', 'localhost', false, true);
								}		
								
								$return = \confirmAccount($user['token_timestamp'],$_SESSION['user']['subscription']);
								
								$isValid = $return[0];
								$_SESSION['error']['log'] = $return[1];

							}else{
									$isValid = false;
									$_SESSION['error']['log'] = "Wrong email/mp couple!";
								 }
							
						}else{
								$isValid = false;
								$_SESSION['error']['log'] = "Email not found";
							 }

					}else{
						 	$isValid = false;
						 	$_SESSION['error']['log']= "Le format de l'email n'est pas valide !";									
						 }
				} // fin si mail

			}else{
				 	$isValid = false;
			 	 	$_SESSION['error']['log'] = "Veuillez remplir tous les champs !";				
				 }				
		}
	
		if($isValid) $this->redirectToRoute('userhome'); else $this->redirectToRoute('home');	
	}

	public function logout(){
		
		unset($_SESSION['error']);
		
		$auth = new \W\Security\AuthentificationManager();

		$auth->logUserOut();
		
		setcookie("auth", "", time()-3600, '/', 'localhost', false, true);
		
		$this->redirectToRoute('home');
	}

	public function forgetpassword(){
	
		unset($_SESSION['error']);
	
		if($_POST){

			if(\isIsset($_POST)){
				
				$emailPasswordRecovery = $_POST['emailPasswordRecovery'];
				
				if (filter_var($emailPasswordRecovery, FILTER_VALIDATE_EMAIL)) {
								
					$usermanager = new \Manager\UserManager();

					if($usermanager->emailExists($emailPasswordRecovery)){				
						
						$user = $usermanager->getUserByUsernameOrEmail($emailPasswordRecovery);				
						
						if(\isComfirmedAccount($user['id'])){ //On ne peut pas réinitialiser son password si le compte n'est pas confirmé 
					
							$token = \W\Security\StringUtils::randomString(32);
							$tokentime = time() + (20*60);
							
							$usermanager->update([

								'token' => password_hash($token, PASSWORD_DEFAULT),
								'token_timestamp' => $tokentime]
								,$user['id']);

							$lien = '<a href="'.$this->generateUrl('mailPassword',['token'=>$token,'id'=>$user['id']],true).'">http://www.mudeo.com/verif/u675CXIV9YOLHbYIjhgc8O7UNM</a>';
							$lien_img = "http://img.clubic.com/07220896-photo-logo-samsung-milk-music.jpg";

							$msg = "<img src='".$lien_img."' style='width:100px;height:100px'/> <h2>Mudéo </h2>";
							$msg .= "<h4>MFF Corp.</h4><br/><br/>";
							$msg .= "Pour pouvoir changer de mot de passe <span style='font-weight:bold;'>".strtoupper($user['username'])."</span>. Veuillez cliquer sur le lien suivant qui vous redirigera vers notre site<br/><br/>".$lien;
							$msg .= "<br/><br/>Attention ce message s'auto-détruira dans 5.. 4.. 3.. 2.. 1.. bon dans 1 heure en fait !!!!! ";

							require_once 'assets/inc/mailer.php';

							smtpmailer('mudeo.wf3@gmail.com', 'oday972@gmail.com', 'Admin', 'Vérification de la création de compte Mudéo', $msg);

							if(isset($errorMail)) $_SESSION['error']['forgetpassword'] = $error; else $_SESSION['error']['forgetpassword'] = "Please tcheck your email and confirm your request !"; 

						}else{
								$_SESSION['error']['forgetpassword'] = "Confirmez votre compte sur votre adresse mail ".$user['email']." avant de pouvoir utiliser cette fonctionalité";
							 }	

					}else{
							$_SESSION['error']['forgetpassword'] = "Email inexistant !";
						 }

				}else{
						$_SESSION['error']['forgetpassword']= "Le format de l'email n'est pas valide !";
					 }

			}else{
					$_SESSION['error']['forgetpassword'] = "Veuillez remplir le champ !";
				 }
		}

		$this->show('Default/home');					
	}

	/*public function register(){

		$_SESSION['error'][''] = "";

		if($_POST){
			die('register');
			$isValid = true;
			
			if($_POST['login'] == null || $_POST['email'] == null || $_POST['password1'] == null || $_POST['password2'] == null || $_POST['birthday'] == null ){

				$isValid = false;
				$_SESSION['error'][''] = "vide!";

			}else{

				if(strpos($_POST['login'],'@') !== false){
					$_SESSION['error'][''] = "@ don't accept for the login";
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
					$_SESSION['error']['']= "Les mots de passe ne correspondent pas !";
				}
				else{
					$password = $password1;
				}

				$usermanager = new \Manager\UserManager();				

				if ($usermanager->emailExists($email) ){
					$isValid = false;
					$_SESSION['error'][''] = "Email déjà utilisé !";
				}else{
					
					if($usermanager->usernameExists($login) == false){
					// si c'est valide 
						if(isset($_POST['g-recaptcha-response'])){ $captcha = $_POST['g-recaptcha-response'];}

					    if(!$captcha)
					    {
					        $_SESSION['error'][''] = 'Il faut cocher le captcha !';					        
					    }else{
					    	 	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfqUBYTAAAAADkoRy9mGz7cDUl_4aJz27jUR4oV&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
					    		
					    	 	$response = json_decode($response, true);

							    if($response["success"] == false)
							    {
							        $_SESSION['error'][''] = 'La tu es un robot ! DEGAGE !!!!';
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

									$_SESSION['error'][''] = "Please tcheck your email and confirm your registration !";
									// on redirige l"utilisateur

									$lien = '<a href="'.$this->generateUrl('mailConfimationAccount',['token'=>$token,'id'=>$_SESSION['user']['id']],true).'">http://www.mudeo.com/verif/u675CXIV9YOLHbYIjhgc8O7UNM</a>';
									$lien_img = "http://img.clubic.com/07220896-photo-logo-samsung-milk-music.jpg";

									$msg = "<img src='".$lien_img."' style='width:100px;height:100px'/> <h2>Mudéo </h2>";
									$msg .= "<h4>MFF Corp.</h4><br/><br/>";
									$msg .= "Pour pouvoir confirmer l'activation de votre compte sur le réseau de partage musique et vidéos de Mudéo pour le compte de <span style='font-weight:bold;'>".strtoupper($email)."</span>. Veuillez cliquer sur le lien suivant qui vous redirigera vers notre site<br/><br/>".$lien;
									$msg .= "<br/><br/>Attention ce message s'auto-détruira dans 5.. 4.. 3.. 2.. 1.. bon dans 1 heure en fait !!!!! ";

									require_once 'assets/inc/mailer.php';

									smtpmailer('mudeo.wf3@gmail.com', 'oday972@gmail.com', 'Admin', 'Vérification de la création de compte Mudéo', $msg);
				
									$this->show('logger/register',[
												"passwordError" => $_SESSION['error']['']	]);									
									
								}else{
									$isValid = false;
									$_SESSION['error'][''] = "Login déjà utilisé !";
								}
							}
					    }
					}
					   
						
				}				
			}
		}
	}



		$this->show('logger/register', [
			"passwordError" => $_SESSION['error']['']
			]);					
	} */


}