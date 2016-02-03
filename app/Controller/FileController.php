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
		$this->show('file/upload_files');
	}



	/**
	 * affiche les detail sur le fichier telechargé
	 */

	
		/**
	 * 
	 */
	public function addFiles()
	{	

		
		
		
		$title 			=$_POST['title'];
		$category 		="";
		$description	=$_POST['describe'];
		$licence 		=$_POST['licence'];
		$content_type 	=$_POST['fileType'];
		$keyword		=$_POST['keyword'];
		$content_filter =$_POST['rate'];

		
		/****************************
		fichier en upload video ou musique
		*****************************/
		$file_name 		=$_FILES['fichier']['name'];
		$file_size		=$_FILES['fichier']['size'];
		$tmp_file		=$_FILES['fichier']['tmp_name'];
		$file_type		=$_FILES['fichier']['type'];
		$error			=$_FILES['fichier']['error'];
		
		

		/****************************
		fichier en upload img
		*****************************/
		
		$imgFile_name 		=$_FILES['thumb']['name'];
		$imgFile_size		=$_FILES['thumb']['size'];
		$imgTmp_file		=$_FILES['thumb']['tmp_name'];
		$imgFile_type		=$_FILES['thumb']['type'];
		$imgError			=$_FILES['thumb']['error'];
		
		
		


		$content_dir="assets/";
		$dir_img= "img/";
		$dir_video= "video/";
		$dir_audio= "audio/";
		$url ="";
		$avatar="";

		$data = array( "image" => "", "video" => "", "music" => "" );


		// validation des données
		$isValid = true;

		



		//enleve tout caratères non desiré dans le nom du fichier qui n'est pas de A-z 09 ou un point.
		$file_name = preg_replace("/[^a-zA-Z0-9.]/","",$file_name);



		//teste les imputs 

		$description 	= htmlentities($description,ENT_NOQUOTES);
		$title			= htmlentities($title,ENT_NOQUOTES);
		$keyword		= htmlentities($keyword,ENT_NOQUOTES);




			// verifie l'existence du fichier

		if( !is_uploaded_file($tmp_file) )
		{
			$isvalid = false;
			exit("Le fichier est introuvable");
		}else if (!is_uploaded_file($imgTmp_file)){
			exit("Le fichier est introuvable");
			$isvalid = false;
		}

		    	/*********************************************
				verifie si il y a des données dans le formulaire
		    	***********************************************/ 
		if($_POST){
			$title 			=$_POST['title'];
			$category 		="";
			$description	=$_POST['describe'];
			$licence 		=$_POST['licence'];
			$content_type 	=$_POST['fileType'];


			if (!empty($_POST['musicCategory'] )) {
				$category = $_POST['musicCategory'];
			}else if(!empty($_POST['movieCategory'])){
				$category = $_POST['movieCategory'];
			};





			/*************************
			les extensions autorisées.
			*************************/

			$mime_audio = [
			'audio/mpeg',
			'audio/x-wav',
			'audio/wav',
			'audio/x-ms-wma',
			'audio/mp3',
			'audio/vnd.rn-realaudio',
			'audio/mp4',

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
			$imgActualMime = finfo_file($finfo, $imgTmp_file);
			

			

			if (in_array($actualMime, $mime_audio ) )
			{
				
				$url=$dir_audio.$file_name;
				
				//changement de nom

				//copie dans le fichier audio
				if( !move_uploaded_file($tmp_file, $content_dir.$dir_audio.$file_name ) )
				{
					$data["music"] = "error musique file ";
					exit("Impossible de copier le fichier audio");
				}
				else
				{
					
				}
			}
			elseif (in_array($actualMime, $mime_video ) )
			{
				
				$url=$dir_video.$file_name;
				/****************************
					changement de nom et 
				copie dans le fichier video

				****************************/
				if( !move_uploaded_file($tmp_file, $content_dir.$dir_video.$file_name ) )
				{
					$data["video"] = "error music file";
					exit("Impossible de copier le fichier  video ");

				}
				else
				{
					
					
				}
			}	
			else if(in_array($actualMime, $mime_image ) )
			{
				
				$isValid = false;
				$data["image"] = "error file ";
			}

			


			if (in_array($imgActualMime, $mime_image ) )
			{
				$avatar=$dir_img.$imgFile_name;
			
				
					//changement de nom

					//copie dans le fichier video

				if( !move_uploaded_file($imgTmp_file, $content_dir.$dir_img.$imgFile_name ) )
				{
					$data["image"] = "error img file ";
					exit("Impossible de copier l'image ");
					$isValid = false;

				}
				else
				{

					
				}



			finfo_close($finfo);  



			
						
			$fileManager = new \Manager\FileManager();
	
			//si c'est valide

			if ($isValid){

						
			//on insere en BDD


				$fileManager->insert([
					"id"			=>"",
					"title" 		=>$title,
					"user_id"		=>"",
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

			header("Content-Type: application/json; charset=UTF-8");
			echo json_encode($data);
		}
	}}
}
