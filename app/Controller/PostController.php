<?php

namespace App\Controller;

use \Core\Controller\Controller;

use \App\Controller\AuthController;

use \App;

/**
* 
*/
class PostController extends AppController
{

	public function __construct()
	{
		parent::__construct();

		AuthController::getInstance()->auth();

		$this->loadModel('faculte');
		
		$this->loadModel('cours');
		
		$this->loadModel('user');

	}
	
	public function index()
	{

		$title = 'Acceuil';		

		$facultes = $this->faculte->all('commentaires', 'faculte_id');

		$courses = $this->cours->all();

		$this->render('posts.index', compact('facultes', 'courses', 'title'));

	}

	
	public function bibliotheque($id = null)
	{
		
		$title = 'Bibliotheque';

		if($id)
			$courses = $this->cours->getCoursByFacId($id);
		else
			$courses = $this->cours->all();

		$facultes = $this->faculte->all();

		$this->render('posts.cours', compact('facultes', 'courses', 'title'));


	}


	public function professeur()
	{

		$title = 'Professeur';

		$facultes = $this->faculte->all();

		$this->render('user.professeurs', compact('facultes', 'title'));

	}

	public function notFound()
	{
		$title = '404';

		$facultes = $this->faculte->all();

		$this->render('404', compact('facultes', 'title'));
	}








}