<?php $this->start('menu_search') ?>

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
		<nav id="tri_Desktop">
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
				<!--class="selected_2" pour le tri sélectionner (nouveautés par défaut-->
				<li><a id="tri_New" class="selected_2 select-mode" data-column="created" data-order="DESC" href="#" title="Voir les nouveaux contenus">Nouveautés</a></li>
				<li><a id="tri_Like" class="select-mode" data-column="nb_like" data-order="DESC" href="#" title="Voir mes contenus préférés">J'aime</a></li>
				<li><a id="tri_Mine" class="select-mode" data-column="upload&user" data-order="DESC" href="#" title="Voir mes contenus">Upload</a></li>
			</ul>
		</nav>
	</div>
</section>
	

	<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/autocompleted-search.js') ?>"></script>

<?php $this->stop('menu_search') ?>
