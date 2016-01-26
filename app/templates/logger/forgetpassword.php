<?php $this->layout('layout', ['title' => 'Forget Password']) ?>

<?php $this->start('main_content') ?>
	<h2>Forget Password</h2>
	<p>Please enter your address mail before request a new password : </p>
	<form action="" method="POST" novalidate>

		<input type="email" name="email" placeholder="Your mail" id="logger">
		<!-- <br /><span id="loggerError" class="logError">Entrez un email valide<br /></span> -->

		<!-- <br /><span id="passwordError" class="logError">Les deux champs ne correspondent pas!<br /></span> -->
		<button type="submit" name="btn">Ok</button>

	</form>

	<?=$passwordError?>
<?php $this->stop('main_content') ?>
