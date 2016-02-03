<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{

	public function profile(){

		unset($_SESSION['error']);

		if($_POST){

			$usermanager = new \Manager\UserManager();

			if(isset($_POST['loginUpdate'])) $login = $_POST['loginUpdate']; else $_SESSION['error']['profile'] = 'vide!';
				
				if ($usermanager->usernameExists($login) ){
				
					$_SESSION['error']['profile'] = "Login déja existant !";
				}else{
					$_SESSION['error']['profile'] = 'Success !';
				}
			}

		$this->show('user/profile');					
	}

	public function deleteaccount(){

		$passwordError = "Your account has deleted!";
		
		$auth = new \W\Security\AuthentificationManager();
		$usermanager = new \Manager\UserManager();

		$usermanager->delete($_SESSION['user']['id']);
		
		$auth->logUserOut();
		setcookie("auth", "", time()-3600, '/', 'localhost', false, true);		

		$this->redirectToRoute('home',["passwordError"=>$passwordError]);


	}

	public function userhome(){
		$this->show('user/userhome');
	}

	public function changePassword($id){

		$this->show('user/changepassword');

	}

	public function controlChangePassword($id){

		unset($_SESSION['error']);

		if($_POST){

			if(\isIsset($_POST)){
				
				$password = $_POST['password'];
				$passwordRepeat = $_POST['passwordRepeat'];

				if(preg_match("#{8,12}#", $password)){

					if($password == $passwordRepeat){

						$usermanager = new \Manager\UserManager();
						$usermanager->update([

									'password' => password_hash($password, PASSWORD_DEFAULT),								
									],$id);

					$_SESSION['error']['controlChangePassword'] = "Changement effectuer !  ";
					$this->redirectToRoute('home');

					}else{
							$_SESSION['error']['controlChangePassword'] = "Le mot de passe doit faire entre 8 et 12 caractères !  ";
						 }
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

					if(isset($_POST['nom'])) $login = $_POST['nom'];
					if(isset($_POST['user_mail'])) $email = $_POST['user_mail'];
					if(isset($_POST['birthday'])) $birthday = $_POST['birthday'];
					if(isset($_POST['country'])) $country = $_POST['country'];
					if(isset($_POST['bio'])) $bio = $_POST['bio'];

					if(preg_match("#^([A-Z]|[a-z])(a-z)*(_)?[a-z]+$#", $login)){

						if(filter_var($email, FILTER_VALIDATE_EMAIL)){

							$urlphoto = \uploadUserPicture(); 
						
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

						}else{
							$_SESSION['error']['controlProfilModify'] = "L'email n'est pas dans un format valide ! ";
						}

					}else{
						$_SESSION['error']['controlProfilModify'] = "Le login ne peut comporter de caractère spéciaux ( [ { / \ & # @ ] } ) ainsi que les accents! ";
					}

		}
	
		$this->redirectToRoute('profilmodify');

	}
}

