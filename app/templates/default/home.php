<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content'); ?>

<!--Logger section-->
	<section id="log_Section">
		<h2><strong>Entre musique et vidéo</strong></h2>
		
		<!-- form register -->
		<form id="logger" action ="" method="POST">
			<input name="email" type="email" placeholder="Votre email"></input>
			<!--<div class="errorLogger">
				<h6>Le champs email n'est pas au bon format !</h6>
			</div>-->
			<input name="password" type="text" placeholder="Votre mot de passe"></input>
			<!--<div class="errorLogger">
				<h6>Le champs email n'est pas au bon format !</h6>
			</div>-->
			<input id="repeat_Password" class="" name="passwordRepeat" type="text" placeholder="Répétez votre mot de passe"></input>
			<!--<div class="errorLogger">
				<h6>Le champs email n'est pas au bon format !</h6>
			</div>-->

			<!--switch lien/button-->
			<div id="switch" class="clearfix">

				<!--Switch1 : se connecter-->
				<div id="switch_1" class="clearfix">	
					<!--Button Se connecter-->
					<a href="#logger"><input id="connect_Button" type="submit" value="Se connecter"></input></a>
					<!--Lien pour faire apparaître le button S'inscrire-->
					<a id="join_Link" href="#logger" title="S'inscrire">Inscription</a>
				</div>

				<!--Switch2 : s'inscrire-->
				<div id="switch_2" class="hide clearfix">
					<!--Lien pour faire apparaître le button Se connecter-->
					<a id="connect_Link" href="#logger" title="Se connecter">Se connecter</a>
					<!--Button S'inscrire-->
					<a href="#logger"><input id="inscription_Button" type="submit" value="S'inscrire"></input></a>
				</div>

			</div>

			<!--lien de connection/récupération-->
			<div id="other_Link" class="clearfix">
				<!--Se souvenir de moi-->
				<div id="remember_Me">
					<input type="checkbox" name="remember" id="remember_User"></input>
					<label for="remember">Se souvenir de moi</label>
				</div>
				<!--Utiliser facebook pour la connexion/inscription-->
				<a id="facebook_Connect" href=""><img src="<?=$this->assetUrl('img_site/facebook_connect.png')?>" alt="Connection par facebook"><p>Utiliser facebook</p></a>
				<!--Mot de passe oublié-->
				<a id="forget_Mdp" href="">Mot de passe oublié?</a>
				<!--Apparaît quand on click sur MDP oublié-->
				<input id="recover_Mdp" class="hide" type="email" name="password_Recovery" placeholder="Tapez votre email"></input>
				<!--<div class="errorLogger">
					<h6>Le champs email n'est pas au bon format !</h6>
				</div>-->

			</div>

			<!--Captcha google-->
			<div class="g-recaptcha hide marge" data-sitekey="your_site_key"></div>
			<!--Blabla certifier opquast de merde-->
			<p class="hide last_P">En vous inscrivant, vous acceptez nos <a href="" title="conditions d'utilisation"><strong>conditions d'utilisation</strong></a> et notre <a href="" title="politique de confidentialité"><strong>politique de confidentialité</strong></a>.</p>
		</form>
		<span style="color:red"><?=$passwordError?></span>
		
		<div id="discover_More">
			<h4>Découvrir mudéo</h4>
			<a href=""><img src="<?=$this->assetUrl('img_site/discover.png')?>"></a>			
		</div>
	</section>

	<!--Content section-->
	<section id="latest_Content" class="wrap clearfix">

		<h2><strong>Découvrez les contenus produits par notre communauté</strong></h2>
		<div id="content_Container">
		<!--Pour une vidéo-->
			<figure class="clearfix">
				<video id="mavideo" controls>
				    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

				    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
				</video>
				<figcaption>
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?=$this->assetUrl('img_site/like.png')?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user.png')?>"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>

			<!--Pour de l'audio-->
			<figure class="clearfix">
				<video id="mamusique" controls poster="<?=$this->assetUrl('img_site/moutainsmin.jpg')?>">
				    <source src="dossierbidon/musique/morceau.mp3" type="audio/mp3">

				    <p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
				</video>
				<figcaption>
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?=$this->assetUrl('img_site/like.png')?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user.png')?>"></a>

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
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?=$this->assetUrl('img_site/like.png')?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user.png')?>"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>
		</div>

		<div id="see_More">
			<a href="home_content.html"><button>En voir plus</button></a>
		</div>

	</section>
=======

<?php $this->start('main_content'); ?>

<!--Logger section-->
	<section id="log_Section">
		<h2><strong>Entre musique et vidéo</strong></h2>

		<form id="logger" action ="" method="POST">
			<input name="email" type="email" placeholder="Votre email"></input>
			<!--<div class="errorLogger">
				<h6>Le champs email n'est pas au bon format !</h6>
			</div>-->
			<input name="password" type="text" placeholder="Votre mot de passe"></input>
			<!--<div class="errorLogger">
				<h6>Le champs email n'est pas au bon format !</h6>
			</div>-->
			<input id="repeat_Password" class="hide" name="passwordRepeat" type="text" placeholder="Répétez votre mot de passe"></input>
			<!--<div class="errorLogger">
				<h6>Le champs email n'est pas au bon format !</h6>
			</div>-->

			<!--switch lien/button-->
			<div id="switch" class="clearfix">

				<!--Switch1 : se connecter-->
				<div id="switch_1" class="clearfix">	
					<!--Button Se connecter-->
					<a href="#logger"><input id="connect_Button" type="submit" value="Se connecter"></input></a>
					<!--Lien pour faire apparaître le button S'inscrire-->
					<a id="join_Link" href="#logger" title="S'inscrire">Inscription</a>
				</div>

				<!--Switch2 : s'inscrire-->
				<div id="switch_2" class="hide clearfix">
					<!--Lien pour faire apparaître le button Se connecter-->
					<a id="connect_Link" href="#logger" title="Se connecter">Se connecter</a>
					<!--Button S'inscrire-->
					<a href="#logger"><input id="inscription_Button" type="submit" value="S'inscrire"></input></a>
				</div>

			</div>

			<!--lien de connection/récupération-->
			<div id="other_Link" class="clearfix">
				<!--Se souvenir de moi-->
				<div id="remember_Me">
					<input type="checkbox" name="remember" id="remember_User"></input>
					<label for="remember">Se souvenir de moi</label>
				</div>
				<!--Utiliser facebook pour la connexion/inscription-->
				<a id="facebook_Connect" href=""><img src="img_site/facebook_connect.png" alt="Connection par facebook"><p>Utiliser facebook</p></a>
				<!--Mot de passe oublié-->
				<a id="forget_Mdp" href="">Mot de passe oublié?</a>
				<!--Apparaît quand on click sur MDP oublié-->
				<input id="recover_Mdp" class="hide" type="email" name="password_Recovery" placeholder="Tapez votre email"></input>
				<!--<div class="errorLogger">
					<h6>Le champs email n'est pas au bon format !</h6>
				</div>-->

			</div>

			<!--Captcha google-->
			<div class="g-recaptcha hide marge" data-sitekey="your_site_key"></div>
			<!--Blabla certifier opquast de merde-->
			<p class="hide last_P">En vous inscrivant, vous acceptez nos <a href="" title="conditions d'utilisation"><strong>conditions d'utilisation</strong></a> et notre <a href="" title="politique de confidentialité"><strong>politique de confidentialité</strong></a>.</p>
		</form>
		
		<div id="discover_More">
			<h4>Découvrir mudéo</h4>
			<a href=""><img src="img_site/discover.png"></a>			
		</div>
	</section>

	<!--Content section-->
	<section id="latest_Content" class="wrap">

		<h2><strong>Découvrez les contenus produits par notre communauté</strong></h2>
		<div id="content_Container">
		<!--Pour une vidéo-->
			<figure class="clearfix">
				<video id="mavideo" controls>
				    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

				    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
				</video>
				<figcaption>
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png"></a>

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
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png"></a>

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
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png"></a>

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
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png"></a>

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
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>

			<!--Pour de l'audio-->
			<figure class="clearfix">
				<video id="mamusique" controls poster="img_site/moutainsmin.jpg">
				    <source src="dossierbidon/musique/morceau.mp3" type="audio/mp3">

				    <p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
				</video>
				<figcaption>
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png"></a>

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
						<div class="info_Top">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png"></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>
		</div>

		<div id="see_More">
			<a href="home.html"><button>En voir plus</button></a>
		</div>

	</section>

<?php $this->stop('main_content') ?>
