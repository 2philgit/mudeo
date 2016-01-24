<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>

	<h2>Recherches</h2>

	<form method="GET" action="<?php echo $this->url('result_search') ?>" novalidate>

		<input type="text" name="input_search" placeholder="Recherche...">

		<button type="submit">Rechercher</button>

		<p>Critères de recherche :</p>
		
		<input type="checkbox" name="titre" value="titre"> titre
		<input type="checkbox" name="description" value="description"> description
		
	</form>

<?php $this->stop('main_content') ?>
