<?php $this->layout('layout', ['title' => 'Profile']) ?>

<?php $this->start('main_content') ?>
	<h2>Profile</h2>
	
	<p> Login : </p> <span><?=$_SESSION['user']['username']?></span> <i><a id="userUpdate">Modifier</a></i>
	<div id="loginUpdateBlock">
		<input type="text" name="loginUpdate" placeholder="change your login?" id="loginUpdate"/>
		<button type="submit">Update!</button>
	</div>
	<p><a href="<?=$this->url('deleteAccount')?>">Delete Account</a></p>
	<?=$passwordError?>

<?php $this->stop('main_content') ?>
