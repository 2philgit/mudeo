<?php $this->layout('layout', ['title' => 'Modification du mot de passe']) ?>

<?php $this->start('main_content') ?>

<section id="modif_Profil" class="wrap">

	<form id="formChangePassword" action="<?=$this->url('controlChangePassword',['id'=>$id])?>" method="POST">
		
		<div id="password" class="field_Box">

			<h3>Saissisez votre mot de passe</h3>

			<p class="add_Min">Il doit faire entre 8 et 12 caractère</p>

			<input name="password" type="password" placeholder="Your password" />					
			<input name="passwordRepeat" type="password" placeholder="Please confirm your password" />

			<div class="error_Logger">
				<h6><?php if(isset($_SESSION['error']['controlChangePassword'])) echo $_SESSION['error']['controlChangePassword'];?></h6>
			</div>

		</div>
		
		<input id="btnchangepsw" type="submit" form="formChangePassword" />

	</form>

</section>


<?php $this->stop('main_content') ?>
