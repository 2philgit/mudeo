<?php

namespace Manager;

// use \W\Manager\UserManager;

//la classe de base du framework
class UserManager extends \W\Manager\UserManager {

	public function lastID(){
		//return $this->dbh::lastInsertId();
	}

}