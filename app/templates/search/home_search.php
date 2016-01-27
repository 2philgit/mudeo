<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>

	<h2>Recherches</h2>

	<form method="GET" id="form-search" action="<?php echo $this->url('home_search') ?>" novalidate>

		<input type="text" name="input_search" data-url="<?php echo $this->url('completed_search') ?>" id="input-search" placeholder="Recherche..." autocomplete="off">

		<button type="submit" id="button-search">Rechercher</button>
		<section id="show-selected"></section>
	</form>

	<!-- SELECT *  FROM `files` WHERE `content_type` LIKE 'video' OR `content_type` LIKE 'music' -->

	<div id="wapper" class="clearfix">
		<section id="header-tri" class="clearfix">
			<ul>
				<li><h2>Tri par :</h2></li>
				<li><a href="?input_search=video&column=content_type&order=ASC<?php if (array_key_exists('in', $_GET)) {
				        	 	echo "&in[]=" . implode("&in[]=",$_GET['in']);
				        	 	}
				        	 	?>">Vidéo</a></li>
				<li><a href="?input_search=music&column=content_type&order=ASC<?php if (array_key_exists('in', $_GET)) {
				        	 	echo "&in[]=" . implode("&in[]=",$_GET['in']);
				        	 	}
				        	 	?>">Musique</a></li>
				<li><a href="?input_search=video&column=content_type&order=ASC<?php if (array_key_exists('in', $_GET)) {
				        	 	echo "&in[]=" . implode("&in[]=",$_GET['in']);
				        	 	}
				        	 	?>">Tout</a></li>
			</ul>
		</section>

		<section id="header-voir" class="clearfix">
			<ul>
				<li><h2>Voir par :</h2></li>
				<li>Nouveauté</li>
				<li>J'aime</li>
				<li>Upload</li>
			</ul>
		</section>

		<section id="box-right">
			<h2>Catégories</h2>
			<article>
				<h3>Vidéo</h3>
				<ul>
					<li>Animation</li>
					<li>Documentaire</li>
					<li>Clip</li>
					<li>Personnel</li>
				</ul>
			</article>
			<article>
				<h3>Musique</h3>
				<ul>
					<li>Pop</li>
					<li>Rock</li>
					<li>Jazz</li>
					<li>Electronique</li>
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
