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
					<li><a id="tri_All" class="selected select-type" data-type="video" href="#" title="Voir tout les contenus">Tout</a></li>
					<li><a id="tri_Music" class="select-type" data-type="musique" href="#" title="Voir seulement la musique">Musique</a></li>
					<li><a id="tri_Video" class="select-type" data-type="vm" href="#" title="Voir seulement les vidéos">Vidéo</a></li>
				</ul>
			</nav>
			<!--Barre pour la version Desktop-->
			<nav id="tri_Desktop" class="clearfix">
				<h4>Tri par :</h4>
				<ul>
					<li><a id="tri_All" class="selected select-type" data-type="vm" href="#" title="Voir tous les contenus">Tout</a></li>
					<li><a id="tri_Music" class="select-type" data-type="musique" href="#" title="Voir seulement la musique">Musique</a></li>
					<li><a id="tri_Video" class="select-type" data-type="video" href="#" title="Voir seulement les vidéos">Vidéo</a></li>
				</ul>
			</nav>
		</div>
		
		<!--Barre secondaire pour les utilisateurs connectés-->
		<div id="tri_Second">
			<nav>
				<ul>
					<!--class="selected_2" pour le tri sélectionner (nouveautés par défaut)-->
					<li><a id="tri_New" class="selected_2 select-mode" data-column="created" data-order="DESC" href="#" title="Voir les nouveaux contenus">Nouveautés</a></li>
					<li><a id="tri_Pop" class="select-mode" data-column="nb_like" data-column="created" data-order="DESC" href="#" title="Voir les plus populaires">Popularité</a></li>
					<li><a id="tri_Like" class="select-mode" data-column="like_me" data-order="DESC" href="#" title="Voir mes contenus préférés">J'aime</a></li>
					<li><a id="tri_Mine" class="select-mode" data-column="upload&user" data-order="DESC" href="#" title="Voir mes contenus">Upload</a></li>
				</ul>
			</nav>
		</div>
	</section>
	<p>HOME LOGGGG</p>
	<!-- ******************************* -->
	<!-- Affichage de ce qui a été recherché ainsi que le nombre d'éléments trouvés -->
	<section class="search-result clearfix">
	    <!-- <h3>Recherche pour : "<strong><?php //echo $_GET['input_search']; ?></strong>"</h3>
	    <h3>Nombre d'élément trouvé: <?php //if($_GET['input_search']=="") {echo "0";} else {echo count($results);} ?></h3>-->
    </section>
	<!-- ******************************* -->

	<!--Content section-->
	<section id="latest_Content" class="wrap home_Content clearfix">

		<div id="content_Container">
		<!--Pour une vidéo-->
			<figure class="clearfix">
				<video id="mavideo" class="clearfix" controls>
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
						<img id="poster" src="<?=$this->assetUrl('img_site/moutainsmin.jpg')?>">
						<audio id="mamusique" class="clearfix" controls>
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
				<video id="mamusique" class="clearfix" controls poster="<?=$this->assetUrl('img_site/moutainsmin.jpg')?>">
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
					<li><a class="select-category" data-category="animation" href="#" title="animation">Animation</a></li>
					<li><a class="select-category" data-category="arts&design" href="#" title="art et design">Arts &amp; Design</a></li>
					<li><a class="select-category" data-category="camera&tech" href="#" title="caméra et techniques">Caméra &amp; Techniques</a></li>
					<li><a class="select-category" data-category="comedie" href="#" title="comédie">Comédie</a></li>
					<li><a class="select-category" data-category="documentaire" href="#" title="documentaire">Documentaire</a></li>
					<li><a class="select-category" data-category="experimental" href="#" title="expérimental">Expérimental</a></li>
					<li><a class="select-category" data-category="fashion" href="#" title="fashion">Fashion</a></li>
					<li><a class="select-category" data-category="cuisine" href="#" title="cuisine">Cuisine</a></li>
					<li><a class="select-category" data-category="education" href="#" title="education">Education</a></li>
					<li><a class="select-category" data-category="narration" href="#" title="narration">Narration</a></li>
					<li><a class="select-category" data-category="personnel" href="#" title="personnel">Personnel</a></li>
					<li><a class="select-category" data-category="reportage" href="#" title="reportage">Reportage</a></li>
					<li><a class="select-category" data-category="sports" href="#" title="sports">Sports</a></li>
					<li><a class="select-category" data-category="voyage" href="#" title="voyage">Voyage</a></li>
					<li><a class="select-category" data-category="clip" href="#" title="clip">Clip</a></li>
				</ul>
			</nav>
			<nav>
				<h5>Musique</h5>
				<ul>
					<li><a class="select-category" data-category="pop" data-type="musique" href="#" title="pop">Pop</a></li>
					<li><a class="select-category" data-category="rock" href="#" title="rock">Rock</a></li>
					<li><a class="select-category" data-category="hiphop" href="#" title="hiphop">HipHop</a></li>
					<li><a class="select-category" data-category="jazz" href="#" title="jazz">Jazz</a></li>
					<li><a class="select-category" data-category="classique" href="#" title="classique">Classique</a></li>
					<li><a class="select-category" data-category="blues" href="#" title="blues">Blues</a></li>
					<li><a class="select-category" data-category="metal" href="#" title="metal">Metal</a></li>
					<li><a class="select-category" data-category="rnb" href="#" title="r&amp;b">R&amp;B</a></li>
					<li><a class="select-category" data-category="reggae" href="#" title="reggae">Reggae</a></li>
					<li><a class="select-category" data-category="alt" href="#" title="alternative">Alternative</a></li>
					<li><a class="select-category" data-category="folk" href="#" title="folk">Folk</a></li>
					<li><a class="select-category" data-category="monde" href="#" title="musique du monde">Musique du monde</a></li>
				</ul>
			</nav>
			
		</section>	

		<!--Pour charger plus de contenu-->
		<div id="load_More" class="clearfix">
			<a href="home_content.html" title="Charger plus de contenu">Charger plus de contenu</a>
		</div>

	</section>
</div>

      <script type="text/javascript" src="<?= $this->assetUrl('js/autocompleted-search.js') ?>"></script>

<?php $this->stop('main_content') ?>