<?php $this->layout('layout', ['title' => 'Profile']) ?>

<?php $this->start('main_content') ?>
	<section id="profil" class="wrap clearfix">

		<!--Info de l'utilisateur-->
		<section id="user_Part">
			
			<!--Nom + date + pays-->
			<div id="user_Title">
				<h2><strong><?=$_SESSION['user']['username']?></strong></h2>
				<p>Inscrit depuis le <?=\dateFormatFR($_SESSION['user']['created'])?></p>
			</div>

			<!--Photo-->
			<div id="photo">
				<img src="<?=$this->assetUrl('img_site/user/'.$_SESSION["user"]["urlpicture"])?>" alt="photo de...">
			</div>
			<!--Pour modifier le profil-->
			<a id="modify_Button" href="<?=$this->url('profilmodify')?>" title="modifier mon profil"><button>Modifier le profil</button></a>
			<!--Autre info utilisateur-->
			<div id="user_Autre">
				<p><?=$_SESSION['user']['email']?></p>
				<p><?=\dateFormatFR($_SESSION['user']['birthday'])?></p>
				<p><?=$_SESSION['user']['country']?></p>
			</div>

			<!--Description de l'utilisateur-->
			<div id="describe_User">
				<p><?=trim($_SESSION['user']['biography'])?></p>
			</div>

			<!--Ceux qui le suivent-->
			<div id="follower">
				<h2>Ils vous suivent :</h2>
				<ul class="min_Follow">
					<li><a href="" title="Voir le profil de...."><img src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="Photo de..."></a></li>
					<li><a href="" title="Voir le profil de...."><img src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="Photo de..."></a></li>
					<li><a href="" title="Voir le profil de...."><img src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="Photo de..."></a></li>
					<li><a href="" title="Voir le profil de...."><img src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="Photo de..."></a></li>
				<ul>
			</div>

			<!--Ceux qu'il suit-->
			<div id="following">
				<h2>Vous suivez :</h2>
				<ul class="min_Follow">
					<li><a href="" title="Voir le profil de...."><img src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="Photo de..."></a></li>
					<li><a href="" title="Voir le profil de...."><img src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="Photo de..."></a></li>
					<li><a href="" title="Voir le profil de...."><img src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="Photo de..."></a></li>
					<li><a href="" title="Voir le profil de...."><img src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="Photo de..."></a></li>
				<ul>
			</div>

		</section>

		<section id="uploaded_Part">

			<h2>Vos derniers upload</h2>
			<!--Ici les 4/6 derniers contenus que l'utilisateur à uploader-->
			<div id="uploaded_Container">

				<!--Video-->
				<figure class="clearfix">
						<video id="mavideo" class="clearfix" controls>
						    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
						    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
						    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

						    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
						</video>
						<figcaption class="clearfix">
								<div class="info_Top clearfix">
									<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
									<span class="social_Nav">
										<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
										<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
									</span>
								</div>
								<div class="info_Bottom clearfix">
									<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png" alt="photo de..."></a>

									<span class="author">
										<h4><strong>Ross Heng</strong></h4>
										<p>publier le 21/01/2016</p>
									</span>
								</div>
						</figcaption>
					</figure>

					<!--Audio-->
					<figure class="clearfix">
						<div class="poster">
							<img id="poster" src="img_site/moutainsmin.jpg">
							<audio id="mamusique" class="clearfix" controls>
							    <source src="dossierbidon/musique/morceau.mp3" type="audio/mp3">

							    <p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
							</audio>
						</div>
						<figcaption class="clearfix">
								<div class="info_Top clearfix">
									<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
									<span class="social_Nav">
										<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
										<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
									</span>
								</div>
								<div class="info_Bottom clearfix">
									<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png" alt="photo de..."></a>

									<span class="author">
										<h4><strong>Ross Heng</strong></h4>
										<p>publier le 21/01/2016</p>
									</span>
								</div>
						</figcaption>
					</figure>

					<figure class="clearfix">
						<video id="mavideo" class="clearfix" controls>
						    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
						    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
						    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

						    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
						</video>
						<figcaption class="clearfix">
								<div class="info_Top clearfix">
									<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
									<span class="social_Nav">
										<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
										<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
									</span>
								</div>
								<div class="info_Bottom clearfix">
									<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png" alt="photo de..."></a>

									<span class="author">
										<h4><strong>Ross Heng</strong></h4>
										<p>publier le 21/01/2016</p>
									</span>
								</div>
						</figcaption>
					</figure>

					<figure class="clearfix">
						<video id="mavideo" class="clearfix" controls>
						    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
						    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
						    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

						    <p class="alert">Ton navigateur ne supporte pas la balise vidéo ! Met toi à jour connard !</p>
						</video>
						<figcaption class="clearfix">
								<div class="info_Top clearfix">
									<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
									<span class="social_Nav">
										<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
										<a id="none" class="like" href="" title="Aimer le contenu"><img src="img_site/like.png" alt="j'aime"></a>
									</span>
								</div>
								<div class="info_Bottom clearfix">
									<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="img_site/user.png" alt="photo de..."></a>

									<span class="author">
										<h4><strong>Ross Heng</strong></h4>
										<p>publier le 21/01/2016</p>
									</span>
								</div>
						</figcaption>
					</figure>

				</div>

			<!--Pour charger plus de contenu-->
			<div id="load_More" class="clearfix">
				<a href="home_content.html" title="Charger plus de contenu">Charger tous vos contenus</a>
			</div>

		</section>

	</section>

<?php $this->stop('main_content') ?>
