<?php

namespace Controller;

use \W\Controller\Controller;

class MailController extends Controller
{

	public function mail($token,$id)
	{
		$passwordError = '';
		//die($to);
		if(isset($token) && isset($id)){

			//$lastID = $usermanager->lastID();
			$usermanager = new \Manager\UserManager();
			
			$user = $usermanager->find($id);
			
			$tokenVerif = $user['token'];

			if($token == $tokenVerif){				
				
				
				$usermanager->update([

								'token' => '',
								'token_timestamp' => 0],$id);

				$passwordError = "Account validate! Mother Fucker";
			}else{
				$passwordError = "Link don't accept!";
			}
		}else{
				$passwordError = "Missing argument";
		}

		$this->show('default/home',['passwordError' => $passwordError]);
	}
}