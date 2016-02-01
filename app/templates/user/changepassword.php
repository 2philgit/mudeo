<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>

<form name="formChangePassword" action="<?=$this->url('controlChangePassword',['id'=>$id])?>" method="POST">
	<!-- <input name="password" type="password" placeholder="Your password" />
				
	<input name="passwordRepeat" type="password" placeholder="Please confirm your password" />

	<div class="error_Logger">
		<h6><?php //if(isset($_SESSION['error']['controlChangePassword'])) echo $_SESSION['error']['controlChangePassword'];?></h6>
	</div> -->

	<input type="submit" form="formChangePassword" />
</form>

<?php $this->stop('main_content') ?>