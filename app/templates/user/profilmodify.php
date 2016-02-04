<?php $this->layout('layout', ['title' => 'Modification du Profil']) ?>

<?php $this->start('main_content') ?>

<!--Modifier le profil-->
	<section id="modif_Profil" class="wrap">
		
		<h2>Modifier mon profil</h2>
		<!--Formulaire de modification du profil-->
		
		<form enctype="multipart/form-data" id="modify_Form" action="<?=$this->url('controlProfilModify')?>" method="POST">
			<div id="nom" class="field_Box">
				<h3>Login</h3>
				<p class="add_Min">Comment voulez-vous que l'on vous appelles?</p>
				<input value="<?=$_SESSION['user']['username']?>"  type="text" name="nom" placeholder="Votre nom">
				
			</div>
			<div id="photo_Profil" class="field_Box">
				<h3>Photo de profil</h3>
								<?php if(!empty($_SESSION['user']['urlpicture'])){ ?> Votre photo de profile actuelle <br/> <img src="<?php echo $this->assetUrl('img_site/user/'.$_SESSION["user"]["urlpicture"]);?>" alt="photo de profil" height="250px" width="200px" /> <?php } ?>
				<p class="add_Min">Les formats .jpg, .png, .gif sont acceptés. Taille 400 x 400px maximum</p>
				<input id="uploadUserPicture" type="file" name="photo_user" accept="image/png, image/jpg, image/gif"/>
				
			</div>
			<div id="mail" class="field_Box">
				<h3>Email</h3>
				<p class="add_Min">Adresse mail pour que l'on puisse vous contactez</p>
				<input value="<?=$_SESSION['user']['email']?>" type="email" name="user_mail" placeholder="Votre adresse email">
				
			</div>
			<div id="birthday" class="field_Box">
				<h3>Date de naissance</h3>
				<p class="add_Min">La date doit être au format JJ/MM/AAAA</p>
				<input value="<?=$_SESSION['user']['birthday']?>" type="date" name="birthday" placeholder="Votre date de naissance">
				
			</div>
			
			<div id="Pays" class="field_Box">
				<h3>Pays</h3>
				<p class="add_Min">Indiquez dans quel pays vous vivez</p>
				<select id="selectCountry" name="country">
				<?php include 'assets/inc/listePays.php'; ?>
				</select>
			</div>	

			<?php $country = $_SESSION["user"]["country"];  ?>
			
			

			<div id="Biographie" class="field_Box">
				<h3>Votre bio</h3>
				 <p class="add_Min">Que voulez-vous dire à notre membres? Qu'est-ce que vous faites? Qu'aimez-vous? Quels sont vos objectifs? etc...</p>
				<textarea type="text" name="bio" placeholder="Dites nous tout">
					<?php if(isset($_SESSION['user']['biography'])) echo $_SESSION['user']['biography']; ?>
				</textarea>
				
			</div>
			<div class="error_Logger">
				<h6><?php if(isset($_SESSION['error']['controlProfilModify'])) echo $_SESSION['error']['controlProfilModify'];?></h6>
			</div>
			<input type="submit" value="Valider">

		</form>

		<a id="delete_Account" href="<?=$this->url('deleteAccount');?>" title="Supprimer votre compte">Supprimer votre compte </a>
		
		<div id="conseil">
			<h2>Votre profil</h2>
			<p class="add_Min">Votre profil correspond à ce que les gens sauront de vous sur mudeo, alors présenter le meilleur de vous. C'est votre chance de décrire qui vous êtes, vos compétences, vos rêves et bien plus...</p>
		</div>
	</section>

<?php $this->stop('main_content') ?>

<?php $this->start('js') ?>
	<script type="text/javascript">

		function recupCountry(country){
			$('#selectCountry option[value="'+country+'"]').attr("selected", "selected");
		}
		
		recupCountry("<?= $country; ?>");
				
	</script>
<?php $this->stop('js') ?>