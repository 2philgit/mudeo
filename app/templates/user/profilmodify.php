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
				<input value="<?=$_SESSION['user']['username']?>" type="text" name="nom" placeholder="Votre nom">
				<!-- <div class="error">
					<h6>Le nom ne doit pas comporter de caractères spéciaux !</h6>
				</div> -->
			</div>
			<div id="photo_Profil" class="field_Box">
				<h3>Photo de profil</h3>
				<p class="add_Min">Les formats .jpg, .png, .gif sont acceptés. Taille 400 x 400px maximum</p>
				<input id="uploadUserPicture" type="file" name="photo_user" accept="image/png, image/jpg, image/gif"/>
				<!-- <div class="error">
					<h6>Le format d'image n'est pas valide !</h6>
				</div> -->
			</div>
			<div id="mail" class="field_Box">
				<h3>email</h3>
				<p class="add_Min">Adresse mail pour que l'on puisse vous contactez</p>
				<input value="<?=$_SESSION['user']['email']?>" type="email" name="user_mail" placeholder="Votre adresse email">
				<!-- <div class="error">
					<h6>Le format de l'email n'est pas valide !</h6>
				</div> -->
			</div>
			<div id="birthday" class="field_Box">
				<h3>Date de naissance</h3>
				<p class="add_Min">La date doit être au format JJ/MM/AAAA</p>
				<input value="<?=$_SESSION['user']['birthday']?>"type="date" name="birthday" placeholder="Votre date de naissance">
				<!-- <div class="error">
					<h6>Le format de la date n'est pas valide !</h6>
				</div> -->
			</div>
			<div id="Pays" class="field_Box">
				<h3>Pays</h3>
				<p class="add_Min">Indiquez dans quel pays vous vivez</p>
				<?php include 'assets/inc/listePays.html'; ?>
			
			<div id="Biographie" class="field_Box">
				<h3>Votre bio</h3>
				 <p class="add_Min">Que voulez-vous dire à notre membres? Qu'est-ce que vous faites? Qu'aimez-vous? Quels sont vos objectifs? etc...</p>
				<textarea type="text" name="bio" placeholder="Dites nous tout">
					<?php if(!empty($_SESSION['user']['biography']))echo $_SESSION['user']['biography']; ?>
				</textarea>
				<!-- <div class="error">
					<h6>Votre bio doit comporter au minimum 3 caractères !</h6>
				</div> -->
			</div>
			<div class="error_Logger">
				<h6><?php if(isset($_SESSION['error']['controlProfilModify'])) echo $_SESSION['error']['controlProfilModify'];?></h6>
			</div>
			<input type="submit" value="Valider">
		</form>
		<div id="conseil">
			<h2>Votre profil</h2>
			<p class="add_Min">Votre profil correspond à ce que les gens sauront de vous sur mudeo, alors présenter le meilleur de vous. C'est votre chance de décrire qui vous êtes, vos compétences, vos rêves et bien plus...</p>
		</div>
	</section>

<?php $this->stop('main_content') ?>
