<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>

	<h2>Recherches</h2>

	<form method="GET" id="form-search" action="<?php echo $this->url('home_search') ?>" novalidate>

		<input type="text" name="input_search" data-url="<?php echo $this->url('completed_search') ?>" id="input-search" placeholder="Recherche..." autocomplete="off">

		<button type="submit" id="button-search">Rechercher</button>
		<section id="show-selected"></section>
	</form>

	<div id="wapper" class="clearfix">
		<section id="header-tri" class="clearfix">
			<ul>
				<li><h2>Tri par :</h2></li>
				<li><a class="select-search" data-type="video" href="#">Vidéo</a></li>
				<li><a class="select-search"  data-type="musique" href="#">Musique</a></li>
				<li><a class="select-search"  data-type="vm" href="#">Tout</a></li>
			</ul>
		</section>

		<section id="header-voir" class="clearfix">
			<ul>
				<li><h2>Voir par :</h2></li>
				<li><a class="select-search" data-type2="created" href="#">Nouveauté</a></li>
				<li><a class="select-search" data-type2="nb_like" href="#">J'aime</a></li>
				<li><a class="select-search" data-type2="created+user_id" href="#">Upload</a></li>
			</ul>
		</section>

		<section id="box-right">
			<h2>Catégories</h2>
			<article>
				<h3>Vidéo</h3>
				<ul>
					<li><a class="select-search" data-type="animation" href="#">Animation</a></li>
					<li><a class="select-search" data-type="documentaire" href="#">Documentaire</a></li>
					<li><a class="select-search" data-type="clip" href="#">Clip</a></li>
					<li><a class="select-search" data-type="personnel" href="#">Personnel</a></li>
				</ul>
			</article>
			<article>
				<h3>Musique</h3>
				<ul>
					<li><a class="select-search" data-category="pop" href="#">Pop</a></li>
					<li><a class="select-search" data-category="rock" href="#">Rock</a></li>
					<li><a class="select-search" data-category="jazz" href="#">Jazz</a></li>
					<li><a class="select-search" data-category="electronique" href="#">Electronique</a></li>
				</ul>
			</article>
		</section>

		<section id="search-result">
		RESULTATS
		</section>

	</div>
		
	

	<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/autocompleted-search.js') ?>"></script>

<?php $this->stop('main_content') ?>
