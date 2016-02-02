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

				$_SESSION['error']['forgetpassword'] = "Account validate! Mother Fucker";
			}else{
				$_SESSION['error']['forgetpassword'] = "Link don't accept! You can re-generate a mail <a href=".$this->generateUrl('regenerateMailAccount',['token'=>$token,'id'=>$id]).">click here</a>";
			}
		}else{
				$_SESSION['error']['forgetpassword'] = "Missing argument";
		}

		$this->show('default/home');
	}

	public function mailPasswordRecovery($token,$id){

		unset($_SESSION['error']);

		if(isset($token) && isset($id)){

			$usermanager = new \Manager\UserManager();
			
			$user = $usermanager->find($id);
			
			$tokenVerif = $user['token'];			 

			if(password_verify($token,$tokenVerif)){		
			
				$_SESSION['error']['forgetpassword'] = "Vous pouvez changer votre mot de passe ! ";
				$this->redirectToRoute('changepassword',['id'=>$id]);
			}else{
				$_SESSION['error']['forgetpassword'] = "Link don't accept! You can re-generate a mail <a href=".$this->generateUrl('regenerateMailAccount',['token'=>$token,'id'=>$id]).">click here</a>";
			}
		}else{
				$_SESSION['error']['forgetpassword'] = "Missing argument";
		}

		$this->show('default/home');
	}

	public function regenerateMailAccount(){

	}
	
}