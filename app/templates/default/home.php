<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content'); ?>

<!--Logger section-->
	<section id="log_Section">
		<h2><strong>Entre musique et vidéo</strong></h2>

	<div id="logger">
		<form id="logger_inscription" class="hide" action ="<?=$this->url('quickRegister')?>" method="POST" name="inscription">
			<input name="email" type="email" placeholder="Votre email"></input>
			<!--<div class="errorLogger">
				<h6>Le champs email n'est pas au bon format !</h6>
			</div>-->
			<input name="password" type="password" placeholder="Your password"></input>
			<!--<div class="errorLogger">
				<h6>Le champs email n'est pas au bon format !</h6>
			</div>-->

			<input id="repeat_Password" class="" name="passwordRepeat" type="password" placeholder="Please confirm your password"></input>

			<!--Utiliser facebook pour la connexion/inscription-->
				<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
				</fb:login-button>

				<div id="status">
				</div>

			<!--Captcha google-->
			<div class="g-recaptcha hide marge" data-sitekey="6LfqUBYTAAAAAECHlJlb4E3z3y8IGzOxqvRQxbq2" ></div>			<!--Blabla certifier opquast de merde-->
			<p class="hide last_P">En vous inscrivant, vous acceptez nos <a href="" title="conditions d'utilisation"><strong>conditions d'utilisation</strong></a> et notre <a href="" title="politique de confidentialité"><strong>politique de confidentialité</strong></a>.</p>

			<div class="error_Logger">
				<h6><?php if(isset($_SESSION['error']['quickRegister'])) echo $_SESSION['error']['quickRegister'];?></h6>
			</div>
		</form>

		<form name="login" id="logger_login" action="<?=$this->url('log')?>" method="POST">
			<input name="logger" type="text" placeholder="Connect with login or email"></input>
			
			<input name="password" type="password" placeholder="Votre mot de passe"></input>
			
			<!--Se souvenir de moi-->
			<div id="remember_Me">
				<input type="checkbox" name="remember" id="remember_User"></input>
				<label for="remember">Se souvenir de moi</label>
			</div>

			<div class="error_Logger">
				<h6><?php if(isset($_SESSION['error']['log'])) echo $_SESSION['error']['log'];?></h6>
			</div>
		</form>
		
		<!--switch lien/button-->
		<div id="switch" class="clearfix">

			<!--Switch1 : se connecter-->
			<div id="switch_1" class="clearfix">	
				<!--Button Se connecter-->
				<input id="connect_Button" type="submit" form="login" value="Se connecter" />
				<!--Lien pour faire apparaître le button S'inscrire-->
				<a id="join_Link" href="" title="S'inscrire">Inscription</a>
			</div>

			<!--Switch2 : s'inscrire-->
			<div id="switch_2" class="hide clearfix">
				<!--Lien pour faire apparaître le button Se connecter-->
				<a id="connect_Link" href="" title="Se connecter">Se connecter</a>
				<!--Button S'inscrire-->
				<input id="inscription_Button" form="inscription" type="submit" value="S'inscrire"></input>
			</div>

		</div>

			<!--lien de connection/récupération-->
			<div id="other_Link" class="clearfix">
								
				<!--Mot de passe oublié-->
				<span id="">Mot de passe oublié?</span>
				<form action="<?=$this->url('forget')?>" method="POST" novalidate>
						<!--Apparaît quand on click sur MDP oublié-->
						<input id="" class="" type="email" name="emailPasswordRecovery" placeholder="Tapez votre email" />
						<div class="error_Logger">
							<h6><?php if(isset($_SESSION['error']['forgetpassword'])) echo $_SESSION['error']['forgetpassword'];?></h6>
						</div>
				</form>
			</div>			
	</div>	

		
		

<?php $this->stop('main_content') ?>
