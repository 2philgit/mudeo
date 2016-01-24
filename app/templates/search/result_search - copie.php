<?php $this->layout('layout', ['title' => 'Résultat de la recherche']) ?>

<?php $this->start('main_content') ?>
	<h2>Résultat de la recherche :</h2>
	<?php foreach ($results as $result): ?>
		<h3><?= $result['title'] ?></h3>
		<h3><?= $result['nb_like'] ?></h3>
		<h3><?= $result['category'] ?></h3>
	<?php endforeach ?>
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
<?php $this->stop('main_content') ?>
