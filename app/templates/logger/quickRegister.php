<?php $this->layout('layout', ['title' => 'Quick Register']) ?>

<?php $this->start('main_content') ?>
	<h2>Quick Register</h2>
	<form action="" method="POST" novalidate>

		<input type="email" name="email" placeholder="Your mail" id="email">
		<br /><span id="emailError" class="logError">Entrez un email valide<br /></span>

		<input type="password" name="password1" placeholder="Your password" id="password1">
		<br/>
		<input type="password" name="password2" placeholder="Your confirmation password" id="password2">

		<br /><span id="passwordError" class="logError">Les deux champs ne correspondent pas!<br /></span>

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>
		<button type="submit" name="btn">Ok</button>

	</form>
	<?php if(isset($passwordError)) echo $passwordError; ?>


<?php $this->stop('main_content') ?>
