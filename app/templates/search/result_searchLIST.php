<?php $this->layout('layout', ['title' => 'Résultat de la recherche']) ?>

<?php $this->start('main_content') ?>

	<h2>Résultat de la recherche :</h2>
	<p><a href="<?php echo $this->url('search') ?>" title="Nouvelle recherche">Nouvelle recherche</a></p>


	<!-- Affichage de ce qui a été recherché ainsi que le nombre d'éléments trouvés -->
	<section class="search-result clearfix">
		<ul>
			<li><h3>Recherche pour : "<strong><?php echo $_GET['input_search']; ?></strong>"</h3></li>
			<li><h3>Nombre d'élément(s) trouvé(s) : <?php if($_GET['input_search']=="") {echo "0";} else {echo count($results);} ?></h3></li>
		</ul>
	</section>

	<!-- Affiche chaque ligne de résultat de la recherche de la bdd dans un double-bloc "section" -->
	<?php 

	// teste si $results_string est vide (teste donc si une recherche a bien été effectuée)
	// die(var_dump($results));
	if (!$_GET['input_search']=="") {


		// teste si le tableau des résultats de la recherche n'est pas vide (donc qu'au moins 1 résultat de recherche existe)
		if ($results) {

			foreach ($results as $result): ?>

				<section class="search-result clearfix">
					
					<h3><?php echo str_ireplace($_GET['input_search'], "<highlight>".$_GET['input_search']."</highlight>", $result['title']); ?></h3>
					<ul>
						<li><?php echo str_ireplace($_GET['input_search'], "<highlight>".$_GET['input_search']."</highlight>", $result['category']); ?></li>
						<li><?= $result['nb_like'] ?></li>
						<li><?php echo str_ireplace($_GET['input_search'], "<highlight>".$_GET['input_search']."</highlight>", $result['licence']); ?></li>
						<li><?= $result['created'] ?></li>
					</ul>
				</section>

				<section class="search-result">
					<p><?php echo str_ireplace($_GET['input_search'], "<highlight>".$_GET['input_search']."</highlight>", $result['description']); ?></p>
					<hr>
				</section>

			<?php endforeach; 

		} else {echo "Aucun résultat n'a été trouvé";}

	} else {

		echo $resultString . '<br />'; // affiche le message attribué dans le FileManager (cf aucune recherche lancée)

	  } ?>

<?php $this->stop('main_content') ?>
