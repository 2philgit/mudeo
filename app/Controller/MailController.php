<?php

namespace Controller;

use \W\Controller\Controller;

class MailController extends Controller
{

	public function mailConfirmationAccount($token,$id)
	{
		unset($_SESSION['error']);

		if(isset($token) && isset($id)){

			$usermanager = new \Manager\UserManager();
			
			$user = $usermanager->find($id);
			
			$tokenVerif = $user['token'];			 
			if(password_verify($token,$tokenVerif)){		
				
				
				$usermanager->update([

								'subscription' => 1,
								'token' => '',
								'token_timestamp' => 0],$id);

				$_SESSION['error']['forgetpassword'] = "Votre compte a bien été créer ! ";
			}else{
				$_SESSION['error']['forgetpassword'] = "Le lien n'est plus valide ! ";
			}
		}else{
				$_SESSION['error']['forgetpassword'] = "Il manque des parametres au lien !";
		}

		$this->show('default/home');
	}

	public function mailPasswordRecovery($token,$id){

		unset($_SESSION['error']);

		if(isset($token) && isset($id)){

			$usermanager = new \Manager\UserManager();
			$auth = new \W\Security\AuthentificationManager();
			
			$user = $usermanager->find($id);
			
			$tokenVerif = $user['token'];			 

			if(password_verify($token,$tokenVerif)){		
				
				$usermanager->update([

								'token' => '',
								'token_timestamp' => 0,
								],$id);
				
				$auth->logUserIn($user);
				
				$_SESSION['error']['forgetpassword'] = "Vous pouvez changer votre mot de passe ! ";
				$this->show('user/changepassword',['id'=>$id]);
			}else{
				$_SESSION['error']['forgetpassword'] = "Le lien n'est plus valide ! ";
			}
		}else{
				$_SESSION['error']['forgetpassword'] = "Il manque des parametres au lien !";
		}

		$this->show('default/home');
	}
}