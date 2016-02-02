<?php $this->layout('layout', ['title' => 'Perdu ?']) ?>

<?php $this->start('main_content'); ?>

<section id="oops" class="wrap">
		<figure><img src="<?=$this->assetUrl('img_site/404.png')?>" alt="Erreur 404"></figure>
		<h3>Oops</h3>
		<p>Le contenu que vous recherchez n'existe pas !</p>
		<a href="<?=$this->url('home')?>" title="Retourner à l'accueil"><button>Retourner à l'accueil</button></a>
</section>

<?php $this->stop('main_content'); ?>
