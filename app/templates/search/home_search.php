<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>

	<h2>Recherches</h2>

	<form method="GET" id="form-search" action="<?php echo $this->url('result_search') ?>" novalidate>

		<input type="text" name="input_search" id="input-search" placeholder="Recherche..." autocomplete="off">

		<button type="submit">Rechercher</button>
		<section id="show-selected"></section>

		<p>Critères de recherche :</p>

		<input type="checkbox" name="in[in_title]" value="title"> titre
		<?php if (empty($_GET['in[in_title]'])) {$flag=true;} else {$flag=false;}?>
		<input type="checkbox" name="in[in_user]" value="user_id"> auteur
		<?php if (!empty($_GET['in[in_user]'])) {$flag=true;} else {$flag=false;}?>
		<input type="checkbox" name="in[in_file]" value="file_type"> type de fichier
		<?php if (!empty($_GET['in[in_file]'])) {$flag=true;} else {$flag=false;}?>
		<input type="checkbox" name="in[in_like]" value="nb_like"> popularité
		<?php if (!empty($_GET['in[in_like]'])) {$flag=true;} else {$flag=false;}?>
		<input type="checkbox" name="in[in_category]" value="category"> catégorie
		<?php if (!empty($_GET['in[in_category]'])) {$flag=true;} else {$flag=false;}?>
		<br/>
		<input type="checkbox" name="in[in_keywords]" value="keywords"> mots-clés
		<?php if (!empty($_GET['in[in_keywords]'])) {$flag=true;} else {$flag=false;}?>
		<input type="checkbox" name="in[in_description]" value="description"> description
		<?php if (!empty($_GET['in[in_description]'])) {$flag=true;} else {$flag=false;}?>
		<input type="checkbox" name="in[in_licence]" value="licence"> public ciblé
		<?php if (!empty($_GET['in[in_Licence]'])) {$flag=true;} else {$flag=false;}?>
		<input type="checkbox" name="in[in_content]" value="content_type"> type de média
		<?php if (!empty($_GET['in[in_content]'])) {$flag=true;} else {$flag=false;}?>
		<input type="checkbox" name="in[in_created]" value="created"> date de création (dépôt)
		<?php if (!empty($_GET['in[in_created]'])) {$flag=true;} else {$flag=false;}?>
		
	</form>


	<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/autocompleted-search.js') ?>"></script>

<?php $this->stop('main_content') ?>
