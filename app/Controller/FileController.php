<?php 

namespace Controller;

use \W\Controller\Controller;

class FileController extends Controller
{

	/**
	 * 
	 */
	public function uploadFiles()
	{
		// si user connecté, permet l'affichage de la page upload_files, si non : redirige vers la home (si lien apparant dans le menu en non-connecté)
		if ($user) {
		$user=$this->getUser();  
			$this->show('file/upload_files');
		} else
		$this->redirectToRoute('home'); 
		
	}



	/**
	 * affiche les detail sur le fichier telechargé
	 */

	
		/**
	 * 
	 */
	public function addFiles()
	{	

		print_r($_FILES);
		die();
		
		$title 			=$_POST['title'];
		$category 		="";
		$description	=$_POST['describe'];
		$licence 		=$_POST['licence'];
		$content_type 	=$_POST['fileType'];
		$keyword		=$_POST['keyword'];
		$content_filter =$_POST['rate'];


		$file_name 		=$_FILES['fichier']['name'];
		$file_size		=$_FILES['fichier']['size'];
		$tmp_file		=$_FILES['fichier']['tmp_name'];
		$file_type		=$_FILES['fichier']['type'];
		$error			=$_FILES['fichier']['error'];
		$size_max		=4194304;




		var_dump($_POST);



		$content_dir="assets/";
		$dir_img= "img/";
		$dir_video= "video/";
		$dir_audio= "audio/";
		$url ="";
		$avatar="";




		// validation des données
		$isValid = true;

		



		//enleve tout caratères non desiré dans le nom du fichier qui n'est pas de A-z 09 ou un point.
		$file_name = preg_replace("/[^a-zA-Z0-9.]/", "", $file_name);



		//teste les imputs 

		$description 	= htmlentities($description,ENT_NOQUOTES);
		$title			= htmlentities($title,ENT_NOQUOTES);
		$keyword		= htmlentities($keyword,ENT_NOQUOTES);




			// verifie l'existence du fichier

		if( !is_uploaded_file($tmp_file) )
		{
			exit("Le fichier est introuvable");
		}

		    	// verifie si il y a des données dans le formulaire
		if($_POST){
			$title 			=$_POST['title'];
			$category 		="";
			$description	=$_POST['describe'];
			$licence 		=$_POST['licence'];
			$content_type 	=$_POST['fileType'];


			if (!empty($_POST['musicCategorie'] )) {
				$category = $_POST['musicCategorie'];
			}else if(!empty($_POST['videoCategorie'])){
				$category = $_POST['videoCategorie'];
			};







			$mime_audio = [
			'audio/mpeg',
			'audio/x-wav',
			'audio/wav',
			'audio/x-ms-wma',
			'audio/mp3',
			'audio/vnd.rn-realaudio',
			];

			$mime_video = [
			'video/mpeg',
			'video/mp4',
			'video/x-ms-wmv',
			'video/x-msvideo',
			'video/x-flv',
			'video/x-ms-asf',
			];

			$mime_image = [
			'image/gif',
			'image/jpeg', 
			'image/png', 
			'image/tiff',
			'image/x-icon',


			];



			$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
			$actualMime =  finfo_file($finfo, $tmp_file) ;
			

			// echo "$finfo";
			echo "***";
			echo "$actualMime";
			echo "***";
			// echo "$tmp_file";

			if (in_array($actualMime, $mime_audio ) )
			{
				echo "audio";

				$url="$dir_audio.$file_name  ";
				
				//changement de nom

				//copie dans le fichier audio
				if( !move_uploaded_file($tmp_file, $content_dir.$dir_audio . $file_name ) )
				{
					
					exit("Impossible de copier le fichier audio");
				}
				else
				{
					
					echo "Le fichier a bien été uploadé";
				}
			}
			elseif (in_array($actualMime, $mime_video ) )
			{
				echo "video";

				$url="$dir_video.$file_name";
				

					//changement de nom

				//copie dans le fichier video
				if( !move_uploaded_file($tmp_file, $content_dir.$dir_video . $file_name ) )
				{
					
					exit("Impossible de copier le fichier  video ");
				}
				else
				{
					
					echo "la video a bien été uploadé";
				}

			}
			elseif (in_array($actualMime, $mime_image ) )
			{
				$avatar="$dir_img.$file_name";
			
				
				echo "format d'image authorisée";
					//changement de nom

					//copie dans le fichier video

				if( !move_uploaded_file($tmp_file, $content_dir.$dir_img . $file_name ) )
				{
					
					exit("Impossible de copier l'image ");

				}
				else
				{

					
				}


			}
			else
			{
				echo "le format de fichier n'est pas reconnu";
				$isValid = false;
			}

			finfo_close($finfo);  

			echo "$url";

			

			$fileManager = new \Manager\FileManager();
	


			//si c'est valide

			if ($isValid){

						
			//on insere en BDD


				$fileManager->insert([
					"id"			=>"",
					"title" 		=>$title,
					"user_id"		=>"1",
					"file_type"		=>$file_type,
					"file_size"		=>$file_size,
					"url_file" 		=>$url,
					"nb_like"		=>"",
					"category"		=>$category,
					"keywords" 		=>$keyword,
					"description"	=>$description,
					"licence"		=>$licence, 
					"content_type"	=>$content_type,
					"created"		=>date("Y-m-d H:i:s"),
					"licence_filter"=>$content_filter,
					"thumbs"		=>$avatar,


					]);



			}
			else{
				//invalide, on veut afficher les erreurs

			};

			print_r($_POST);


			var_dump($_POST);
		}
	}
}
