<?php

define('GMailUSER', 'mudeo.wf3@gmail.com'); // utilisateur Gmail
define('GMailPWD', 'mudeowf32015'); // Mot de passe Gmail

function smtpMailer($to, $from, $from_name, $subject, $body) {
	$mail = new \PHPMailer();  // Cree un nouvel objet PHPMailer
	$mail->IsSMTP(); // active SMTP
	$mail->IsHTML(true);
	$mail->CharSet = "utf-8";
	$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = GMailUSER;
	$mail->Password = GMailPWD;
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	$mail->setLanguage('fr', '/optional/path/to/language/directory/');
	//debug($mail);
	if(!$mail->Send()) {
		$errorMail = 'Mail error: '.$mail->ErrorInfo;
	}
}
