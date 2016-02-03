<?php

namespace Controller;

use \W\Controller\Controller;

class UpgradeController extends Controller
{

	/**
	 * Page de la l'abonnement
	 */

	public function upgrade()
	{
		$this->show('default/upgrade');
	}
}