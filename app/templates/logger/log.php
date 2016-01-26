<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>
	<h2>Login</h2>
	
	<form action="" method="POST" novalidate>

		<input type="text" name="logger" placeholder="Your mail or your login" id="logger">
		<!-- <br /><span id="loggerError" class="logError">Entrez un email valide<br /></span> -->

		<input type="password" name="password" placeholder="Your password" id="password">
		<!-- <br /><span id="passwordError" class="logError">Les deux champs ne correspondent pas!<br /></span> -->
		<label>remember me</label><input type="checkbox" name="remember">
		<button type="submit" name="btn">Ok</button>

	</form>
	<p><a href="<?=$this->url('forget')?>">Forget password ?</a></p>
	<?=$passwordError?>
<?php $this->stop('main_content') ?>
