<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>

<div class="wrap">
	<!--Tri section-->
	<section id="tri_Section" class="clearfix">

		<div id="tri">
		<!--Barre principal de tri pour smartphone et tablette-->
			<nav id="tri_Min">
				<ul>
					<!--class="selected" pour le tri sélectionner (Tout par défaut)-->
					<li><a id="tri_All" class="selected select-type" data-type="video" href="#tri" title="Voir tout les contenus">Tout</a></li>
					<li><a id="tri_Music" class="select-type" data-type="musique" href="#tri" title="Voir seulement la musique">Musique</a></li>
					<li><a id="tri_Video" class="select-type" data-type="vm" href="#tri" title="Voir seulement les vidéos">Vidéo</a></li>
				</ul>
			</nav>
			<!--Barre pour la version Desktop-->
			<nav id="tri_Desktop" class="clearfix">
				<h4>Tri par :</h4>
				<ul>
					<li><a id="tri_All" class="selected select-type" data-type="vm" href="#tri" title="Voir tous les contenus">Tout</a></li>
					<li><a id="tri_Music" class="select-type" data-type="musique" href="#tri" title="Voir seulement la musique">Musique</a></li>
					<li><a id="tri_Video" class="select-type" data-type="video" href="#tri" title="Voir seulement les vidéos">Vidéo</a></li>
				</ul>
			</nav>
		</div>

	<!-- ******************************* -->
	<!-- Affichage de ce qui a été recherché ainsi que le nombre d'éléments trouvés -->
	<section class="search-result clearfix">
		<ul>
			<li id="msg-search"></li>
			<li id="new-search"><a href="<?=$this->url('home_nolog')?>" title="nouvelle recherche">Nouvelle recherche</a></li>
		</ul>
    </section>
	<!-- ******************************* -->

	<!--Content section-->
	<section id="latest_Content" class="wrap home_Content clearfix">

		<div id="content_Container">
		<!--Pour une vidéo-->
			<figure class="clearfix">
				<video id="mavideo" class="clearfix player" controls>
				    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.webm" type="video/webm">
				    <source src="http://clips.vorwaerts-gmbh.de/VfE.ogv" type="video/ogg">

				    <p class="alert">Votre navigateur ne supporte pas la balise vidéo ! Mettez-le à jour !</p>
				</video>
				<figcaption class="clearfix">
						<div class="info_Top clearfix">
							<h3><a href="content.html" title="Voir la vidéo"><strong>Video title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?=$this->assetUrl('img_site/like.png')?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom clearfix">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="photo de..."></a>

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
						<audio id="mamusique" class="clearfix player" controls>
						    <source src="<?=$this->assetUrl('medias/files/musics/asap.mp3')?>" type="audio/mp3">

						    <p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
						</audio>
				</div>
				<figcaption class="clearfix">
						<div class="info_Top clearfix">
							<h3><a href="content.html" title="Ecouter la musique"><strong>Audio title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?=$this->assetUrl('img_site/like.png')?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom clearfix">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="photo de..."></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>
			<!--Pour de l'audio-->
			<figure class="clearfix">
				<video id="mamusique" class="clearfix player" controls poster="<?=$this->assetUrl('img_site/moutainsmin.jpg')?>">
				    <source src="<?=$this->assetUrl('medias/files/musics/asap.mp3')?>" type="audio/mp3">

				    <p class="alert">Votre navigateur ne supporte pas la balise video ! Mettez-le à jour !</p>
				</video>
				<figcaption class="clearfix">
						<div class="info_Top clearfix">
							<h3><a href="content.html" title="Ecouter la musique"><strong>Audio title</strong></a></h3>
							<span class="social_Nav">
								<a id="none" class="follow" href="" title="Suivre l'auteur"><button>Suivre</button></a>
								<a id="none" class="like" href="" title="Aimer le contenu"><img src="<?=$this->assetUrl('img_site/like.png')?>" alt="j'aime"></a>
							</span>
						</div>
						<div class="info_Bottom clearfix">
							<a href="Profil.html" title="Voir le profil de ..."><img class="user_Min" src="<?=$this->assetUrl('img_site/user/user.png')?>" alt="photo de..."></a>

							<span class="author">
								<h4><strong>Ross Heng</strong></h4>
								<p>publier le 21/01/2016</p>
							</span>
						</div>
				</figcaption>
			</figure>

		</div>

		<!--Uniquement sur la version desktop-->
		<section id="tri_Complet">
				<h4>Catégories</h4>
			<nav>
				<h5>Video</h5>
				<ul>
					<li><a class="select-category" data-category="animation" href="#tri" title="animation">Animation</a></li>
					<li><a class="select-category" data-category="arts&design" href="#tri" title="art et design">Arts &amp; Design</a></li>
					<li><a class="select-category" data-category="camera&tech" href="#tri" title="caméra et techniques">Caméra &amp; Techniques</a></li>
					<li><a class="select-category" data-category="comedie" href="#tri" title="comédie">Comédie</a></li>
					<li><a class="select-category" data-category="documentaire" href="#tri" title="documentaire">Documentaire</a></li>
					<li><a class="select-category" data-category="experimental" href="#tri" title="expérimental">Expérimental</a></li>
					<li><a class="select-category" data-category="fashion" href="#tri" title="fashion">Fashion</a></li>
					<li><a class="select-category" data-category="cuisine" href="#tri" title="cuisine">Cuisine</a></li>
					<li><a class="select-category" data-category="education" href="#tri" title="education">Education</a></li>
					<li><a class="select-category" data-category="narration" href="#tri" title="narration">Narration</a></li>
					<li><a class="select-category" data-category="personnel" href="#tri" title="personnel">Personnel</a></li>
					<li><a class="select-category" data-category="reportage" href="#tri" title="reportage">Reportage</a></li>
					<li><a class="select-category" data-category="sports" href="#tri" title="sports">Sports</a></li>
					<li><a class="select-category" data-category="voyage" href="#tri" title="voyage">Voyage</a></li>
					<li><a class="select-category" data-category="clip" href="#tri" title="clip">Clip</a></li>
				</ul>
			</nav>
			<nav>
				<h5>Musique</h5>
				<ul>
					<li><a class="select-category" data-category="pop" href="#tri" title="pop">Pop</a></li>
					<li><a class="select-category" data-category="rock" href="#tri" title="rock">Rock</a></li>
					<li><a class="select-category" data-category="hiphop" href="#tri" title="hiphop">HipHop</a></li>
					<li><a class="select-category" data-category="jazz" href="#tri" title="jazz">Jazz</a></li>
					<li><a class="select-category" data-category="classique" href="#tri" title="classique">Classique</a></li>
					<li><a class="select-category" data-category="blues" href="#tri" title="blues">Blues</a></li>
					<li><a class="select-category" data-category="metal" href="#tri" title="metal">Metal</a></li>
					<li><a class="select-category" data-category="rnb" href="#tri" title="r&amp;b">R&amp;B</a></li>
					<li><a class="select-category" data-category="reggae" href="#tri" title="reggae">Reggae</a></li>
					<li><a class="select-category" data-category="alt" href="#tri" title="alternative">Alternative</a></li>
					<li><a class="select-category" data-category="folk" href="#tri" title="folk">Folk</a></li>
					<li><a class="select-category" data-category="monde" href="#tri" title="musique du monde">Musique du monde</a></li>
				</ul>
			</nav>
			
		</section>	

		<!--Pour charger plus de contenu-->
		<div id="load_More" class="clearfix">
			<a href="home_content.html" title="Charger plus de contenu">Charger plus de contenu</a>
		</div>

	</section>
</div>

<?php $this->stop('main_content') ?>

 <!-- Est inséré au layout afin de permettre la mise sous écoute du fomulaire de recherche sans que les résultats ne soient envoyés dans le container de la home d'accueil > -->
<?php $this->start('js') ?>
      <script type="text/javascript" src="<?= $this->assetUrl('js/autocompleted-search.js') ?>"></script>
<?php $this->stop('js') ?>