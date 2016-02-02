<!DOCTYPE html>
<html lang="fr">
<head>
	
  <meta charset="UTF-8">
  <title><?= $this->e($title) ?></title>
  <!-- <title>Mudéo | Entre musique et vidéo</title> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
	  
  <!--Tag for responsive-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--jQuery CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <!--Recaptcha Google-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!--CSS/reset+perso-->

  <link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
  
  <!--Font-->
  <!--Favicon-->
  <link rel="icon" type="image/png" href="<?= $this->assetUrl('img_site/favicon.png') ?>" />
  <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="img_site/favicon.png" /><![endif]-->
	
</head>
<body>

<!-- <pre><?php //debug($_SESSION); ?> </pre> -->
  <script src="<?=$this->assetUrl('js/facebook.js')?>" async defer></script>


<!-- Affichage des erreurs  -->
          <?php if (isset($_SESSION['message']['success'])){ 
                echo '<h6 id="error-label" style="color: green;">'.$_SESSION['message']['success'].'</h6>';
              unset($_SESSION['message']);              
            }else if(isset($_SESSION['message']['error'])){
              echo '<h6 id="error-label" style="color: red;">'.$_SESSION['message']['error'].'</h6>';
              unset($_SESSION['message']);
            }else if(isset($_SESSION['message']['info'])){
              echo '<h6 id="error-label" style="color: blue;">'.$_SESSION['message']['info'].'</h6>';
              unset($_SESSION['message']);
            }
       ?>

	<!--Header-->
  <header id="top_Anchor">
    <nav class="wrap">

      <!--Pour smartphone et tablette-->
      <h1 id="logo_Min"><a href="<?=$this->url('home')?>" title="mudéo, renvoi à l'accueil"><img src="<?=$this->assetUrl('img_site/logo_min.png')?>" alt="mudéo"></a></h1>
      <!--Burger menu-->
      <span id="burger_Menu"></span>
      <!--Pour desktop-->
      <h1 id="logo"><a href="<?=$this->url('home')?>" title="mudéo, renvoi à l'accueil"><img src="<?=$this->assetUrl('img_site/logo.png')?>" alt="mudéo"></a></h1>

      <ul id="main_Menu" class="hide">
        <li><a href="<?=$this->url('home_nolog')?>">Regarder</a></li>
        <?php if(isset($_SESSION['user'])) { ?>
        <li><a href="<?=$this->url('upload_files')?>">Mettre en ligne</a></li>
        <?php } ?>
        <!--Apparait seulement si non-connecté-->
        <li><a href="index.html#logger" title="Connection">Connection</a></li>
        <!--Apparait seulement si connecté sur smartphone et tablette-->
        <li><a class="desktop_Hide" href="profil.html" title="Profil">Profil</a></li>
        <!--Apparait seulement si connecté sur smartphone et tablette-->
        <li><a class="desktop_Hide" href="index.html" title="Deconnection">Deconnection</a></li>
        <!--Seulement pour smartphone et tablette-->
        <li><a class="desktop_Hide" href="aide.html" title="Aide">Aide</a></li>
        <!--Compte upgrade-->
        <li><a href="upgrade.html" title="Abonnement">Abonnement</a></li>
      </ul>
 
    <!--Apparait une fois l'utilisateur connecté en version Desktop-->
    <a id="user_Profil" title="accès au profil"><img src="<?php if(isset($_SESSION['user'])) echo $this->assetUrl("img_site/user/".$_SESSION['user']['urlpicture']); else echo $this->assetUrl("img_site/user/user.png"); ?>" alt="profil">   
    </a>    
      
    <!--Champs de recherche-->
      <form id="search_Field" method="GET" action="<?php if(isset($_SESSION['user'])) { 
                                                    echo $this->url('home_user'); 
                                                    } else { echo $this->url('home_nolog'); 
                                                    }
                                                    ?>" novalidate> 
        <input id="search" list="autocomplete" type="search" name="input_search" data-url="<?php echo $this->url('completed_search') ?>" placeholder="Rechercher dans mudeo" value="<?php if (!empty($_GET['input_search'])) {echo $_GET['input_search']; }?>" autocomplete="off"></input>

        <datalist id="autocomplete">

        </datalist>
        
        <span id="search_Icon"><input type="submit" name="search_Submit" value=""></input></span>
      </form>

    </nav>
  </header>

  <?php if(isset($_SESSION['user'])) { ?>
  <div id="user_Hover" class="hide">
    <nav class="wrap">
      <ul>
        <li><a href="<?=$this->url('profile')?>" title="Profil">Profil</a></li>
        <li><a href="<?=$this->url('logout')?>" title>Deconnection</a></li>
      </ul>
    </nav>
  </div>
<?php } ?>

		<!-- <section> -->
			<?= $this->section('main_content') ?>
		<!-- </section> -->

<!--Footer-->
<footer>
    <!--Version Desktop uniquement-->
    <section id="top_Part">
      <div id="centered_Menu">
        <nav id="mudeo_Menu">
          <h5>Mudeo</h5>
          <ul>
            <li><a href="" title="A propos de mudeo">A propos de mudeo</a></li>
            <li><a href="" title="Règles du site">Règles</a></li>
            <li><a href="" title="Conditions d'utilisation">Conditions d'utilisation</a></li>
            <li><a href="" title="Confidentialité">Confidentialité</a></li>
          </ul>
        </nav>
        <nav id="aide_Menu">
          <h5>Aide</h5>
          <ul>
            <li><a href="" title="Centre d'aide">Centre d'aide</a></li>
            <li><a href="" title="FAQ">FAQ</a></li>
            <li><a href="" title="Droit d'auteur">Droit d'auteur</a></li>
          </ul>
        </nav>
        <nav id="Plus_Menu">
          <h5>Plus</h5>
          <ul>
            <li><a href="" title="Mettre en ligne">Mettre en ligne</a></li>
            <li><a href="" title="Plan du site">Plan du site</a></li>
          </ul>
        </nav>
      </div>
    </section>

    <section id="bottom_Part">
      <span>
        <realised>Réalisé par:</realised>
        <jerem>Jeremie,</jerem>
        <etienne>Etienne,</etienne>
        <philippe>Philippe,</philippe>
        <arthur>Arthur</arthur>
      </span>
      <a id="back_To" href="#top_Anchor" title="Retour en haut"><img src="<?=$this->assetUrl('img_site/backtotop.png')?>" alt="Retour en haut"></a>
    </section>
  </footer>

<script type="text/javascript">
  var assetUrl = "<?=$this->assetUrl('')?>";
</script>

   <!--jQuery pour le site-->
  <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/main.js') ?>"></script>

    <!-- <section js> -->
      <?= $this->section('js') ?>
    <!-- </section js> -->

<!-- 	</div> -->

</body>
</html>