<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content'); ?>
	<h2>Accueil</h2>


<?php
	
	if(isset($_GET['to']))  $this->url('verifToken',["token" => $_GET['to']]);

?>


<?php $this->stop('main_content') ?>
