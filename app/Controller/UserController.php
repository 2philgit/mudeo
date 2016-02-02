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

	public function profilmodify(){

		$this->show('user/profilmodify');
	}

	public function controlProfilModify(){

		unset($_SESSION['error']);

		if($_POST){		

				//if(\isIsset($_POST)){
					//die(var_dump($_FILES));
					if(isset($_POST['nom'])) $login = $_POST['nom'];
					if(isset($_POST['user_mail'])) $email = $_POST['user_mail'];
					if(isset($_POST['birthday'])) $birthday = $_POST['birthday'];
					if(isset($_POST['country'])) $country = $_POST['country'];
					if(isset($_POST['bio'])) $bio = $_POST['bio'];
//die();
					if(preg_match("#^([A-Z]|[a-z])(a-z)*(_)?[a-z]+$#", $login)){

						if(filter_var($email, FILTER_VALIDATE_EMAIL)){

							$urlphoto = \uploadUserPicture(); 
							//die($urlphoto);
							$usermanager = new \Manager\UserManager();
							$usermanager->update([

							'username' => $login,
							'urlpicture' => $urlphoto,
							'email' => $email,
							'birthday' => $birthday,
							'country' => $country,
							'biography' => trim($bio),
							],$_SESSION['user']['id']);

							$user = $usermanager->getUserByUsernameOrEmail($email);

							$auth = new \W\Security\AuthentificationManager();
							$auth->logUserIn($user);

							// $_SESSION['error']['controlProfilModify'] = "Votre profil a bien été modifié ! ";

						}else{
							$_SESSION['error']['controlProfilModify'] = "L'email n'est pas dans un format valide ! ";
						}

					}else{
						$_SESSION['error']['controlProfilModify'] = "Le login ne peut comporter de caractère spéciaux ( [ { / \ & # @ ] } ) ainsi que les accents! ";
					}

			// }else{
			// 		$_SESSION['error']['controlProfilModify'] = "Veuillez remplir tous les champs ! ";
			// }
		}
	
		$this->redirectToRoute('profilmodify');

	}
}

