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

	<hr />

	<!-- Affiche chaque ligne de résultat de la recherche de la bdd dans un double-bloc "section" -->
	<?php 

	// teste si $results_string est vide (teste donc si une recherche a bien été effectuée)
	// die(var_dump($results));
	if (!$_GET['input_search']=="") {


		// teste si le tableau des résultats de la recherche n'est pas vide (donc qu'au moins 1 résultat de recherche existe)
		if ($results) { ?>

			<section class="search-result">

				<table class="tableau">
					  <thead>
					    <tr>
					        <th>Titre <span class="order-click">
					        	<a href="?input_search=<?= $_GET['input_search'];?>&column=title&order=ASC<?php if (array_key_exists('in', $_GET)) {
					        	 		echo "&in[]=" . implode("&in[]=",$_GET['in']);
					        	 	}
					        	 	?>"><*</a></span>
					        	 <a href="?input_search=<?= $_GET['input_search'];?>&column=title&order=DESC<?php if (array_key_exists('in', $_GET)) {
					        	 		echo "&in[]=" . implode("&in[]=",$_GET['in']);
					        	 	}
					        	 	?>">*></a></span>
					        </th>

					        <th>Auteur<span class="order-click">
					        	<a href="?input_search=<?= $_GET['input_search'];?>&column=user_id&order=ASC<?php if (array_key_exists('in', $_GET)) {
					        	 		echo "&in[]=" . implode("&in[]=",$_GET['in']);
					        	 	}
					        	 	?>"><*</a></span>
					        	 <a href="?input_search=<?= $_GET['input_search'];?>&column=user_id&order=DESC<?php if (array_key_exists('in', $_GET)) {
					        	 		echo "&in[]=" . implode("&in[]=",$_GET['in']);
					        	 	}
					        	 	?>">*></a></span>
					        </th>
					        <th>Popularité</th>
					        <th>Catégorie</th>
					        <th>Description</th>
					        <th>Public ciblé</th>
					        <th>Date</th>
					    </tr>
					  </thead>

					  <tbody>

						<?php foreach ($results as $result): ?>
						  
						    <tr>
						    	<td><h3><?php echo str_ireplace($_GET['input_search'], '<span class="highlight">'. $_GET['input_search'] . "</span>", $result['title']); ?></h3></td>
						        <td><?= $result['user_id'] ?></td>
						        <td><?= $result['nb_like'] ?></td>
						        <td><?php echo str_ireplace($_GET['input_search'], '<span class="highlight">' . $_GET['input_search'] . "</span>", $result['category']); ?></td>
						        <td><?php echo str_ireplace($_GET['input_search'], '<span class="highlight">' . $_GET['input_search'] . "</span>", $result['description']); ?></td>
						        <td><?php echo str_ireplace($_GET['input_search'], '<span class="highlight">' . $_GET['input_search'] . "</span>", $result['licence']); ?></td>
						        <td><?= $result['created'] ?></td>
						    </tr>

						<?php endforeach; ?> 

					  </tbody>
				</table>

		<?php } else {echo "Aucun résultat n'a été trouvé";}

		} else {

		echo $resultString . '<br />'; // affiche le message attribué dans le FileManager (cf aucune recherche lancée)

	  } ?>

	  		</section>
// <?php //print_r($_SERVER); ?>

<?php $this->stop('main_content') ?>
