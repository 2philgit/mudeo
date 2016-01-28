<!DOCTYPE html>
<html lang="fr">
<head>
	
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	  
  <title><?= $this->e($title) ?></title>
  
  <!--CSS/reset+perso-->
  <link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
  
  <!--Font-->
  <!--Favicon-->
  <link rel="icon" type="image/png" href="<?= $this->assetUrl('img_site/favicon.png') ?>" />
  <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="img_site/favicon.png" /><![endif]-->

  <!--jQuery CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <!--Recaptcha Google-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
	
</head>
<body>

<pre><?php debug($_SESSION); ?> </pre>

<script type="text/javascript">
     // Load the SDK asynchronously
    (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
      getProfileImage();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
        getProfileImage();
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
        getProfileImage();
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

   window.fbAsyncInit = function() {
    FB.init({
      appId      : '1047080725312931',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  function getProfileImage() {
 
    var $photo = $('.photo'),
        $btn = $('.btn-fb'),
        $fbPhoto = $('img.fb-photo');
 
    //uploading
    $btn.text('Uploading...');
 
    FB.api("/me/picture?width=180&height=180",  function(response) {
 
        var profileImage = response.data.url.split('https://')[1], //remove https to avoid any cert issues
            randomNumber = Math.floor(Math.random()*256);
 
       //remove if there and add image element to dom to show without refresh
       if( $fbPhoto.length ){
           $fbPhoto.remove();
       }
         //add random number to reduce the frequency of cached images showing
       $photo.append('<img class=\"fb-photo img-polaroid\" src=\"http://' + profileImage + '?' + randomNumber + '\">');
        $btn.addClass('hide');
    }); 
}
  

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      console.log(response);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
        var login = response.name;
        $.ajax({
            "url": <?=$this->url('register')?>, 
            "type": "POST", 
            "data": login
        })
        .done(function(response){

        })

    });
  }
</script>
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
            }//var_dump($_COOKIE);
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
        <li><a href="<?php//$this->url('')?>">Regarder</a></li>
        <li><a href="<?php//$this->url('')?>">Mettre en ligne</a></li>
        <!--Apparait seulement si non-connecté-->
        <li><a href="index.html#logger">Connection</a></li>
        <!--Apparait seulement si connecté sur smartphone et tablette-->
        <li><a class="desktop_Hide" href="profil.html">Profil</a></li>
        <!--Seulement pour smartphone et tablette-->
        <li><a class="desktop_Hide" href="helpCenter.html">Aide</a></li>
        <!--Compte upgrade-->
        <li><a href="helpCenter.html">Abonnement</a></li>
      </ul>
 
    <a id="user_Profil" href="profil.html" title="accès au profil"><img src="<?=$this->assetUrl("img_site/user/".$w_user['urlpicture'])?>" alt="profil"></a>
    <!-- <a id="user_Profil" href="profil.html" title="accès au profil"><img src="<?php//$this->assetUrl('img_site/user/user.png')?>" alt="profil"></a> -->
      <?php if(isset($_SESSION['user'])) echo "<span id='linkUserMenu'>".$_SESSION['user']['username']." (<a href='".$this->url('logout')."'>Deconnect</a>) </span>"; ?>
      <form id="search_Field" method="GET">
        <input id="search" type="search" name="search_Input" placeholder="Rechercher dans mudeo"></input>
        <span id="search_Icon"><input type="submit" name="search_Submit" value=""></input></span>
      </form>

    </nav>
  </header>

		<!-- <section> -->
			<?= $this->section('main_content') ?>
		<!-- </section> -->

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
      <span><p>&copy; 2016</p></span>
      <a href="#header" title="Retour en haut"><img src="<?=$this->assetUrl('img_site/backtotop.png')?>" alt="Retour en haut"></a>
    </section>
  </footer>

			<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
			<script type="text/javascript" src="<?= $this->assetUrl('js/main.js') ?>"></script>

	</div>

</body>
</html>