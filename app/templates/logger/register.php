<?php $this->layout('layout', ['title' => 'Register']) ?>

<?php $this->start('main_content') ?>
	<h2>Register</h2>
	<form action="" method="POST" novalidate>

		<input type="text" name="login" placeholder="Your login" id="login"> *
		<br /><input type="email" name="email" placeholder="Your mail" id="email"> *

<br />		<input type="password" name="password1" placeholder="Your password" id="password1"> *
		<br/>
		<input type="password" name="password2" placeholder="Your confirmation password" id="password2"> *
<br/>
		<input type="date" name="birthday" id="birthday" placeholder="YYYY/MM/DD HH:ii:ss"> *
<br/>
		<input type="text" name="country" placeholder="Your country" id="country">
<br/>
		<input type="file" name="urlpicture" id="urlpicture">
<br/>
		<textarea name="biography" id="biography">Your bio...</textarea>

		<div class="g-recaptcha" data-sitekey="6LfqUBYTAAAAAECHlJlb4E3z3y8IGzOxqvRQxbq2" ></div>

		<button type="submit" name="btn">Ok</button>

	</form>
	<?=$passwordError?>
<?php $this->stop('main_content') ?>
