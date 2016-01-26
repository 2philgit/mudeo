<?php $this->layout('layout', ['title' => 'Mail']) ?>

<?php $this->start('main_content') ?>
<?php

$controller = new \W\Controller\Controller();

			$lien = '<a href="localhost/projects/mudeo/public/?to='.$token.'">http://www.mudeo.com/verif/u675CXIV9YOLHbYIjhgc8O7UNM</a>';
			$lien_img = "http://img.clubic.com/07220896-photo-logo-samsung-milk-music.jpg";
			
			$msg = "<img src='".$lien_img."' style='width:100px;height:100px'/> <h2>Mudéo </h2>";
			$msg .= "<h4>MFF Corp.</h4><br/><br/>";
			$msg .= "Pour pouvoir confirmer l'activation de votre compte sur le réseau de partage musique et vidéos de Mudéo pour le compte de <span style='font-weight:bold;'>".strtoupper($login)."</span>. Veuillez cliquer sur le lien suivant qui vous redirigera vers notre site<br/><br/>".$lien;
			$msg .= "<br/><br/>Attention ce message s'auto-détruira dans 5.. 4.. 3.. 2.. 1.. bon dans 1 heure en fait !!!!! ";
			
			require_once '../public/assets/inc/mailer.php';
			
			smtpmailer('mudeo.wf3@gmail.com', 'oday972@gmail.com', 'Admin', 'Vérification de la création de compte Mudéo', $msg);

?>

<?php $this->stop('main_content') ?>