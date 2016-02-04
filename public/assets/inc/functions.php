<?php

function displayInfo($donnees){

	if($donnees[0] == 2){
		$_SESSION['message']['success'] = $donnees[1];
	}else if($donnees[0] == 1){
		$_SESSION['message']['error'] = $donnees[1];
	}else if($donnees[0] == 3){
		$_SESSION['message']['info'] = $donnees[1];
	}

}


function isIsset($donnees){
	
	// $cles = array_keys($donnees);
	// $count = count($donnees);

	foreach($donnees as $key => $value){
		if($value == null){
			return null;
		}
	}
	return true;
}

function dateFormatFR($date, $format = 0){
	/*****  $format --> paramétre du format date=[0] , datetime->(1) // sans l'affichage de l'heure // et datetime->(2) // avec affichage de l'heure //  *****/
	if($format == 1){
		$data = explode(' ', $date);
		$date_split = $data[0] = explode('-', $data[0]);
		$date_format = $date_split[2].'/'.$date_split[1].'/'.$date_split[0];
	}else if($format == 2){
		$data = explode('-', $date);
		$data_cut = explode(' ', $data[2]);
		$date_format = $data_cut[0].'/'.$data[1].'/'.$data[0].' à '.$data_cut[1];
	}else{
		$data = explode('-', $date);
		$date_format = $data[2].'/'.$data[1].'/'.$data[0];
	}

	return $date_format;
}

function isComfirmedAccount($id){

	$usermanager = new \Manager\UserManager();

	$user = $usermanager->find($id);

	if($user['subscription'] == 0)  $response = false; else $response = true;
	//die($response);
	return $response;
}

function confirmAccount($token,$subscription){
	//die(time().'---'.$token.'---->'.$subscription);
	if($token != 0 && time() < $token && $subscription == 0){

		$response[0] = true;
		$response[1] = "Log correct but please check your mail for confirmation's account !";
	}else{

		if($token != 0 && time() > $token && $subscription == 0){

			$usermanager = new \Manager\UserManager();
			$auth = new \W\Security\AuthentificationManager();

			$usermanager->delete($_SESSION['user']['id']);		
			$auth->logUserOut();
			
			setcookie("auth", "", time()-3600, '/', 'localhost', false, true);
			
			$response[0] = false;
			$response[1] = "Your account don't confirm during 3 days so I deleted it Mother Fucker!";
		}else{

			$response[0] = true;		
			$response[1] = "Log correct !";		
		}				
	}
	return $response;
}

function uploadUserPicture(){

	if(!empty($_FILES['photo_user']['name'])){

		$file_name = $_FILES['photo_user']['name'];
	    $file_size = $_FILES['photo_user']['size'];
	    $tmp_file = $_FILES['photo_user']['tmp_name'];
	    $file_type = $_FILES['photo_user']['type'];
	    $error = $_FILES['photo_user']['error'];
	    $size_max = 4194304;

		$file_name = preg_replace("/[^a-zA-Z0-9.]/", "", $file_name);

		$content_dir = "assets/img_site/user/";
			
		if(!is_uploaded_file($tmp_file)){

			$_SESSION['error']['controlProfilModify'] = "Le fichier est introuvable";
			return "";

		}elseif(!move_uploaded_file($tmp_file, $content_dir.$file_name)){
			
			$_SESSION['error']['controlProfilModify'] = "Impossible de copier l'image ";
			return "";
		}
		else{
			
			return $file_name;
		}

	}else{

		$_SESSION['error']['controlProfilModify'] = "Votre profil a bien été modifié ! ";
		return $_SESSION['user']['urlpicture'];
	}
}
