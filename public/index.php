<?php

	use \App\Controller\PostController;
	use \App\Controller\UserController;
	use \App\Controller\AuthController;
	
	error_reporting(-1);
	ini_set('display_errors', 'On');

	//chargement de l'autoloader pour la gestion automatique des class
	define('ROOT', dirname(__DIR__));
	define('PATH', __DIR__);

	require ROOT.'/app/App.php';

	//chargement de notre autoloader
	App::load();

	/*la gestion de la variable $p
	*pour gere plusieurs pages
	*ainsi la gestion en php est
	*100 plus pratique que jamais
	*/

	if(isset($_GET['p']))
	{
		//si notre variable est defini on la met dans une autre
		$p = $_GET['p'];
	}
	else
	{
		//dans le cas contraire on initialise la page d'aceuille par defaut
		$p = 'home';
	}

	if(isset($_GET['deco']) AND $_GET['deco'] === 'deco_user')
	{
		
		AuthController::getInstance()->logout();

	}

	if(empty($_SESSION['id']))
	{
		//dans le cas contraire on initialise la page d'aceuille par defaut
		$p = 'log';
	
	}

	//un switch pour tout controle dans notre index.php
	switch ($p)
	{

		case 'log':
			AuthController::getInstance()->login();
			break;
		case 'home':
			# code...
			$post = new PostController();
			$post->index();
			break;
		case 'bibliotheque':
			$post = new PostController();			
			$post->bibliotheque((!empty($_GET['id']) ? htmlspecialchars($_GET['id']) : null));
			break;
		case 'prof':
			$post = new PostController();
			$post->professeur();
			break;
		case 'compte':
			$user = new UserController();
			$user->index();
			break;
		case 'devoirs':
			$user = new UserController();
			$user->index('devoir');
			break;
		case 'admin':
			$admin = new \App\Controller\Admin\PostController();
			$admin->index();
			break;
		case 'devoir':
			$admin = new \App\Controller\Admin\UserController();
			$admin->index('devoir');
			break;
		default:
			$post = new PostController();
			$post->notFound();
			break;
	}
