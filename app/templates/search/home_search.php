<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>

	<h2>Recherches</h2>

	<form method="GET" action="<?php echo $this->url('result_search') ?>" novalidate>

		<input type="text" name="input_search" placeholder="Recherche...">

		<button type="submit">Rechercher</button>

		<p>Critères de recherche :</p>

		<input type="checkbox" name="in[in_title]" value="title"> titre
		<input type="checkbox" name="in[in_user]" value="user_id"> auteur
		<input type="checkbox" name="in[in_file]" value="file_type"> type de fichier
		<input type="checkbox" name="in[in_like]" value="nb_like"> popularité
		<input type="checkbox" name="in[in_category]" value="category"> catégorie
		<br/>
		<input type="checkbox" name="in[in_keywords]" value="keywords"> mots-clés
		<input type="checkbox" name="in[in_description]" value="description"> description
		<input type="checkbox" name="in[in_licence]" value="licence"> public ciblé
		<input type="checkbox" name="in[in_content]" value="content_type"> type de média
		<input type="checkbox" name="in[in_created]" value="created"> date de création (dépôt)
		
	</form>

<?php $this->stop('main_content') ?>
