<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>

	<!--Tri section-->
	<section id="tri_Section" class="clearfix">

		<div id="tri">
		<!--Barre principal de tri pour smartphone et tablette-->
			<nav id="tri_Min">
				<ul>
					<!--class="selected" pour le tri sélectionner (Tout par défaut)-->
					<li><a id="tri_All" class="selected" href="" title="Voir tout les contenus">Tout</a></li>
					<li><a id="tri_Music" href="" title="Voir seulement la musique">Musique</a></li>
					<li><a id="tri_Video" href="" title="Voir seulement les vidéos">Vidéo</a></li>
				</ul>
			</nav>
			<!--Barre pour la version Desktop-->
			<nav id="tri_Desktop">
				<h4>Tri par :</h4>
				<ul>
					<li><a id="tri_All" class="selected" href="" title="Voir tout les contenus">Tout</a></li>
					<li><a id="tri_Music" href="" title="Voir seulement la musique">Musique</a></li>
					<li><a id="tri_Video" href="" title="Voir seulement les vidéos">Vidéo</a></li>
				</ul>
			</nav>
		</div>
		
		<!--Barre secondaire pour les utilisateurs connectés-->
		<div id="tri_Second">
			<nav>
				<ul>
					<!--class="selected_2" pour le tri sélectionner (nouveautés par défaut-->
					<li><a id="tri_New" class="selected_2" href="Voir les nouveaux contenus">Nouveautés</a></li>
					<li><a id="tri_Like" href="" title="Voir mes contenus préférés">J'aime</a></li>
					<li><a id="tri_Mine" href="" title="Voir mes contenus">Upload</a></li>
				</ul>
			</nav>
		</div>
	</section>

	

	<!--Content section (fourre-tout)-->
	<section id="latest_Content" class="wrap home_Content clearfix">

		<div id="content_Container">
		<!--Pour une vidéo-->
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

			<!--Pour de l'audio-->
			<figure class="clearfix">
				<video id="mamusique" class="clearfix" controls poster="img_site/moutainsmin.jpg">
				    <source src="dossierbidon/musique/morceau.mp3" type="audio/mp3">

				    <p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
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
			<!--Pour de l'audio-->
			<figure class="clearfix">
				<video id="mamusique" class="clearfix" controls poster="img_site/moutainsmin.jpg">
				    <source src="dossierbidon/musique/morceau.mp3" type="audio/mp3">

				    <p class="alert">Votre navigateur ne supporte pas la balise audio ! Mettez-vous à jour !</p>
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

		<!--Uniquement sur la version desktop-->
		<section id="tri_Complet">
				<h4>Catégories</h4>
			<nav>
				<h5>Video</h5>
				<ul>
					<li><a href="" title="animation">Animation</a></li>
					<li><a href="" title="art et design">Arts &amp; Design</a></li>
					<li><a href="" title="caméra et techniques">Caméra &amp; Techniques</a></li>
					<li><a href="" title="comédie">Comédie</a></li>
					<li><a href="" title="documentaire">Documentaire</a></li>
					<li><a href="" title="expérimental">Expérimental</a></li>
					<li><a href="" title="fashion">Fashion</a></li>
					<li><a href="" title="cuisine">Cuisine</a></li>
					<li><a href="" title="education">Education</a></li>
					<li><a href="" title="narration">Narration</a></li>
					<li><a href="" title="personnel">Personnel</a></li>
					<li><a href="" title="reportage">Reportage</a></li>
					<li><a href="" title="sports">Sports</a></li>
					<li><a href="" title="voyage">Voyage</a></li>
					<li><a href="" title="clip">Clip</a></li>
				</ul>
			</nav>
			<nav>
				<h5>Musique</h5>
				<ul>
					<li><a href="" title="pop">Pop</a></li>
					<li><a href="" title="rock">Rock</a></li>
					<li><a href="" title="hiphop">HipHop</a></li>
					<li><a href="" title="jazz">Jazz</a></li>
					<li><a href="" title="classique">Classique</a></li>
					<li><a href="" title="blues">Blues</a></li>
					<li><a href="" title="metal">Metal</a></li>
					<li><a href="" title="r&amp;b">R&amp;B</a></li>
					<li><a href="" title="reggae">Reggae</a></li>
					<li><a href="" title="alternative">Alternative</a></li>
					<li><a href="" title="folk">Folk</a></li>
					<li><a href="" title="musique du monde">Musique du monde</a></li>
				</ul>
			</nav>
			
		</section>	

		<!--Pour charger plus de contenu-->
		<div id="load_More" class="clearfix">
			<a href="home_content.html" title="Charger plus de contenu">Charger plus de contenu</a>
		</div>

	</section>


<?php $this->stop('main_content') ?>