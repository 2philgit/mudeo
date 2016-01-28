<?php
// http://www.berejeb.com/2009/09/envoyer-des-mails-avec-phpmailer-et-le-smtp-de-gmail/
// require_once('../vendor/phpmailer/class.phpmailer.php'); 
// require_once('../vendor/phpmailer/class.smtp.php'); 
// require_once '../vendor/phpmailer/PHPMailerAutoload.php';
//require '../../inc/functions.php';
define('GMailUSER', 'mudeo.wf3@gmail.com'); // utilisateur Gmail
define('GMailPWD', 'mudeowf32015'); // Mot de passe Gmail

function smtpMailer($to, $from, $from_name, $subject, $body) {
	$mail = new \PHPMailer();  // Cree un nouvel objet PHPMailer
	$mail->IsSMTP(); // active SMTP
	$mail->IsHTML(true);
	$mail->CharSet = "utf-8";
	$mail->SMTPDebug = 4;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 25;
	$mail->Username = GMailUSER;
	$mail->Password = GMailPWD;
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	$mail->setLanguage('fr', '/optional/path/to/language/directory/');
	//debug($mail);
	if(!$mail->Send()) {
		$passwordError = 'Mail error: '.$mail->ErrorInfo;
	} else {
		$passwordError = 'Un email vient de vous être envoyé. Cliquez sur le lien présent dans ce mail pour activer votre compte.';
	}
}