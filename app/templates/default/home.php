k<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content'); ?>
	<h2>Accueil</h2>


<?php
	
	if(isset($passwordError)){

		echo $passwordError;
	}  

?>


<?php $this->stop('main_content') ?>
