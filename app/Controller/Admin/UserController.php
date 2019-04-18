<?php

namespace App\Controller\Admin;

use \App\Controller\AppController;



/**
* 
*/
class UserController extends AppController
{

	public function __construct()
	{
		parent::__construct();

		$this->loadModel('faculte');
		
		$this->loadModel('cours');
		
		$this->loadModel('user');

		$this->loadModel('devoir');

		$this->_user = $this->user->findById(!empty($_SESSION['id']) ? $_SESSION['id'] : null, true);

	}

	public function index()
	{

		$user = $this->user->findById($_SESSION['id'], true);

		$title = 'Espace etudiant';

		$facultes = $this->faculte->all();

		$cours = $this->cours;

		$devoir = $this->devoir;

		$this->render('devoir.index', compact('user', 'facultes', 'cours', 'devoir', 'title'));

	}

}