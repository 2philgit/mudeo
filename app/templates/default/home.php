k<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content'); ?>

<!--Logger section-->
	<section id="logSection">
		<h2><strong>Entre musique et vidéo</strong></h2>

			<!--switch lien/button-->
			<div id="switch" class="clearfix">

				<!--Switch1 : se connecter-->
				<div id="switch1" class="clearfix">	
					
					<!--Button Se connecter-->
					<a href="#logger"><button id="connectButton">Se connecter</button></a>
					<!--Lien pour faire apparaître le button S'inscrire-->
					<a id="joinLink" href="#logger" title="S'inscrire">S'incrire</a>
					
					<form id="logger" name="logger" action ="<?=$this->url('log')?>" method="POST">

						<input name="logger" type="text" placeholder="Votre email/login"></input>
						<!--<div class="errorLogger">
							<h6>Le champs email n'est pas au bon format !</h6>
						</div>-->
						<input name="password" type="password" placeholder="Votre mot de passe"></input>

						<button type="submit" form="logger" name="btn_log">OK!</button>
						<!--Se souvenir de moi-->
						<div id="rememberMe">
							<input type="checkbox" name="remember" id="rememberUser"></input>
							<label for="remember">Se souvenir de moi</label>
						</div>

					</form>
				</div>

				<!--Switch2 : s'inscrire-->
				<div id="switch2" class="hide clearfix">
					
					<form id="loggerregister" name="form2" action ="<?=$this->url('quickRegister')?>" method="POST">

						<input name="email" type="email" placeholder="Votre email"></input>
						<!--<div class="errorLogger">
							<h6>Le champs email n'est pas au bon format !</h6>
						</div>-->
						<input name="password" type="password" placeholder="Votre mot de passe"></input>
						<!--<div class="errorLogger">
							<h6>Le champs email n'est pas au bon format !</h6>
						</div>-->
						<input id="repeat_password" name="password_repeat" type="password" placeholder="Répétez votre mot de passe"></input>
						<!--<div class="errorLogger">
							<h6>Le champs email n'est pas au bon format !</h6>
						</div>-->
						<button type="submit" form="loggerregister" name="btn_insc">OK!!</button>
					</form>

					<!--Lien pour faire apparaître le button Se connecter-->
					<a id="connectLink" href="#logger" title="Se connecter">Se connecter</a>
					<!--Button S'inscrire-->
					<a href="#logger"><button id="inscriptionButton">S'inscrire</button></a>
					
					
					
				</div>

			</div>

			<!--lien de connection/récupération-->
			<div id="otherLink" class="clearfix">
				<!--Captcha google-->
			<div class="g-recaptcha hide marge" data-sitekey="6LfqUBYTAAAAAECHlJlb4E3z3y8IGzOxqvRQxbq2"></div>
				<!--Utiliser facebook pour la connexion/inscription-->
					<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
					</fb:login-button>

					<div id="status">
					</div>				
				<!--Mot de passe oublié-->
				<a id="forgetMdp" href="">Mot de passe oublié?</a>
				<!--Apparaît quand on click sur MDP oublié-->
			<!-- 	<form method="POST" action="">
					<input type="email" name="emailPasswordRecovery" />
					<input type="submit" />
				</form> -->
				<form id="forgeta" name="formForget" method="POST" action="<?=$this->url('forget')?>" >
					<input id="recoverMdp" class="" type="email" name="emailPasswordRecovery" placeholder="Tapez votre email" />
					<button type="submit" form="formForget" class="" name="btn_forget_mdp">Ok</button>
				</form>
				<!--<div class="errorLogger">
					<h6>Le champs email n'est pas au bon format !</h6>
				</div>-->

			</div>

			
			<!--Blabla certifier opquast de merde-->
			<p class="hide lastP">En vous inscrivant, vous acceptez nos <a href="" title="conditions d'utilisation"><strong>conditions d'utilisation</strong></a> et notre <a href="" title="politique de confidentialité"><strong>politique de confidentialité</strong></a>.</p>
		</form>
		<?php echo $passwordError; ?>
		<div id="discoverMore">
			<h4>Découvrir mudéo</h4>
			<a href=""><img src="<?= $this->assetUrl('img_site/discover.png') ?>"></a>			
		</div>
	</section>

	<!--Content section-->
	<section id="latestContent" class="wrap">

		<h2><strong>Découvrez les contenus produits par notre communauté</strong></h2>
		<div id="contentContainer">
		<!--Pour une vidéo-->
			<figure>
				<video id="mavideo" controls>
				    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

				    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
				</video>
				<figcaption>
						<div class="infoTop">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="socialNav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?= $this->assetUrl('img_site/like.png') ?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="infoBottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="userMin" src="<?= $this->assetUrl('img_site/user.png') ?>"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>

			<!--Pour de l'audio-->
			<figure>
				<video id="mamusique" controls poster="<?= $this->assetUrl('img_site/mountainsmin.jpg') ?>">
				    <source src="dossierbidon/musique/morceau.mp3" type="audio/mp3">

				    <p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
				</video>
				<figcaption>
						<div class="infoTop">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="socialNav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?= $this->assetUrl('img_site/like.png') ?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="infoBottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="userMin" src="<?= $this->assetUrl('img_site/user.png') ?>"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>

			<!--Pour une vidéo-->
			<figure class="clearfix">
				<video id="mavideo" controls>
				    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

				    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
				</video>
				<figcaption>
						<div class="infoTop">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="socialNav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?= $this->assetUrl('img_site/like.png') ?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="infoBottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="userMin" src="<?= $this->assetUrl('img_site/user.png') ?>"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>

			<!--Pour une vidéo-->
			<figure class="clearfix">
				<video id="mavideo" controls>
				    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

				    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
				</video>
				<figcaption>
						<div class="infoTop">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="socialNav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?= $this->assetUrl('img_site/like.png') ?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="infoBottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="userMin" src="<?= $this->assetUrl('img_site/user.png') ?>"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>

			<!--Pour une vidéo-->
			<figure class="clearfix">
				<video id="mavideo" controls>
				    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

				    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
				</video>
				<figcaption>
						<div class="infoTop">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="socialNav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?= $this->assetUrl('img_site/like.png') ?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="infoBottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="userMin" src="<?= $this->assetUrl('img_site/user.png') ?>"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>

			<!--Pour une vidéo-->
			<figure class="clearfix">
				<video id="mavideo" controls>
				    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

				    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
				</video>
				<figcaption>
						<div class="infoTop">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="socialNav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?= $this->assetUrl('img_site/like.png') ?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="infoBottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="userMin" src="<?= $this->assetUrl('img_site/user.png') ?>"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>

			<!--Pour une vidéo-->
			<figure class="clearfix">
				<video id="mavideo" controls>
				    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

				    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
				</video>
				<figcaption>
						<div class="infoTop">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="socialNav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?= $this->assetUrl('img_site/like.png') ?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="infoBottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="userMin" src="<?= $this->assetUrl('img_site/user.png') ?>"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>
		</div>

		<div id="seeMore">
			<a href="home.html"><button>En voir plus</button></a>
		</div>

	</section>

<?php $this->stop('main_content') ?>
