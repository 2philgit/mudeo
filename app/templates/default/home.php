<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content'); ?>

<!--Logger section-->
<section id="log_Section">
	<h2><strong>Entre musique et vidéo</strong></h2>

	<div id="logger">
		<form id="logger_inscription" class="hide" action ="<?=$this->url('quickRegister')?>" method="POST" name="inscription">
			<input name="email" type="email" placeholder="Votre email"></input>
			
			<input name="password" type="password" placeholder="Your password"></input>
			

			<input id="repeat_Password" class="" name="passwordRepeat" type="password" placeholder="Please confirm your password"></input>

			<!--Utiliser facebook pour la connexion/inscription-->
			<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
		</fb:login-button>

		<div id="status">
		</div>

		<!--Captcha google-->
		<div class="g-recaptcha hide marge" data-sitekey="6LeqaRcTAAAAAISwotJAQs06H6t51wEsxdknQdj3" ></div>
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
		<a id="forget_Mdp">Mot de passe oublié?</a>
		<form action="<?=$this->url('forget')?>" method="POST" novalidate>
			<!--Apparaît quand on click sur MDP oublié-->
			<input id="recover_Mdp" class="hide" type="email" name="emailPasswordRecovery" placeholder="Tapez votre email" />
			<div class="error_Logger">
				<h6><?php if(isset($_SESSION['error']['forgetpassword'])) echo $_SESSION['error']['forgetpassword'];?></h6>
			</div>
		</form>
	</div>			
</div>	

<div id="discover_More">
	<h4>Découvrir mudéo</h4>
	<a href="#discover_More"><img src="<?=$this->assetUrl('img_site/discover.png')?>"></a>		
</div>
</section>

<!--Content section-->
<section id="latest_Content" class="wrap index_Content clearfix">

	<h2><strong>Découvrez les contenus produits par notre communauté</strong></h2>
	<div id="content_Container">

		<!--Pour une vidéo-->
		<figure class="clearfix">
			<video id="mavideo" class="clearfix player" controls>
				<source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
					<source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
						<source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

							<p class="alert">Votre navigateur ne supporte pas la balise video ! Mettez-le à jour !</p>

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
								<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>"></a>

								<span class="author">
									<h4><strong>Ross Heng</strong></h4>
									<p>publier le 21/01/2016</p>
								</span>
							</div>
						</figcaption>
					</figure>

					<!--Pour de l'audio-->
					<figure class="clearfix">
						<div class="poster">
							<img class="poster_Img" src="<?=$this->assetUrl('img_site/moutainsmin.jpg')?>">
							<audio id="mamusique" class="clearfix" controls>
								<source src="<?=$this->assetUrl('musics/asap.mp3')?>" type="audio/mp3">

									<p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
								</audio>
							</div>
							<figcaption class="clearfix">
								<div class="info_Top clearfix">
									<h3><a href="content.html" title="Ecouter la musique"><strong>Musique title</strong></a></h3>
									<span class="social_Nav">
										<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
										<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?=$this->assetUrl('img_site/like.png')?>" alt="j'aime"></a>
									</span>
								</div>
								<div class="info_Bottom clearfix">
									<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>"></a>

									<span class="author">
										<h4><strong>Ross Heng</strong></h4>
										<p>publier le 21/01/2016</p>
									</span>
								</div>
							</figcaption>
						</figure>

						<!--Pour une vidéo-->
						<figure class="clearfix">
							<video id="mavideo" class="clearfix player" controls>
								<source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
									<source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
										<source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

											<p class="alert">Votre navigateur ne supporte pas la balise video ! Mettez-le à jour !</p>

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
												<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>"></a>

												<span class="author">
													<h4><strong>Ross Heng</strong></h4>
													<p>publier le 21/01/2016</p>
												</span>
											</div>
										</figcaption>
									</figure>

									<!--Pour une vidéo-->
									<figure class="clearfix">
										<video id="mavideo" class="clearfix player" controls>
											<source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
												<source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
													<source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

														<p class="alert">Votre navigateur ne supporte pas la balise video ! Mettez-le à jour !</p>

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
															<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>"></a>

															<span class="author">
																<h4><strong>Ross Heng</strong></h4>
																<p>publier le 21/01/2016</p>
															</span>
														</div>
													</figcaption>
												</figure>

												<!--Pour une vidéo-->
												<figure class="clearfix">
													<video id="mavideo" class="clearfix player" controls>
														<source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
															<source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
																<source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

																	<p class="alert">Votre navigateur ne supporte pas la balise video ! Mettez-le à jour !</p>

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
																		<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>"></a>

																		<span class="author">
																			<h4><strong>Ross Heng</strong></h4>
																			<p>publier le 21/01/2016</p>
																		</span>
																	</div>
																</figcaption>
															</figure>

															<!--Pour de l'audio-->
															<figure class="clearfix">
																<div class="poster">
																	<img class="poster_Img" src="<?=$this->assetUrl('img_site/moutainsmin.jpg')?>">
																	<audio id="mamusique" class="clearfix" controls>
																		<source src="<?=$this->assetUrl('musics/asap.mp3')?>" type="audio/mp3">

																			<p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
																		</audio>
																	</div>
																	<figcaption class="clearfix">
																		<div class="info_Top clearfix">
																			<h3><a href="content.html" title="Ecouter la musique"><strong>Musique title</strong></a></h3>
																			<span class="social_Nav">
																				<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
																				<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?=$this->assetUrl('img_site/like.png')?>" alt="j'aime"></a>
																			</span>
																		</div>
																		<div class="info_Bottom clearfix">
																			<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>"></a>

																			<span class="author">
																				<h4><strong>Ross Heng</strong></h4>
																				<p>publier le 21/01/2016</p>
																			</span>
																		</div>
																	</figcaption>
																</figure>

																<!--Pour une vidéo-->
																<figure class="clearfix">
																	<video id="mavideo" class="clearfix player" controls>
																		<source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
																			<source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
																				<source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

																					<p class="alert">Votre navigateur ne supporte pas la balise video ! Mettez-le à jour !</p>

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
																						<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>"></a>

																						<span class="author">
																							<h4><strong>Ross Heng</strong></h4>
																							<p>publier le 21/01/2016</p>
																						</span>
																					</div>
																				</figcaption>
																			</figure>

																			<!--Pour de l'audio-->
																			<figure class="clearfix">
																				<div class="poster">
																					<img class="poster_Img" src="<?=$this->assetUrl('img_site/moutainsmin.jpg')?>">
																					<audio id="mamusique" class="clearfix" controls>
																						<source src="<?=$this->assetUrl('musics/asap.mp3')?>" type="audio/mp3">

																							<p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
																						</audio>
																					</div>
																					<figcaption class="clearfix">
																						<div class="info_Top clearfix">
																							<h3><a href="content.html" title="Ecouter la musique"><strong>Musique title</strong></a></h3>
																							<span class="social_Nav">
																								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
																								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?=$this->assetUrl('img_site/like.png')?>" alt="j'aime"></a>
																							</span>
																						</div>
																						<div class="info_Bottom clearfix">
																							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>"></a>

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

																		<?php $this->stop('main_content') ?>

