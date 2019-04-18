<?php

namespace App\Controller;

use \Core\Controller\Controller;

use \App\Controller\AuthController;


/**
* 
*/
class AppController extends Controller
{
	
	protected $template;

	
	function __construct()
	{
		parent::__construct();
		
		if(empty($_SESSION['id']))
			$this->template = 'default';
		else
			$this->template = 'default-membre';

		$this->viewPath = ROOT.'/app/views/';

	}


	protected function loadModel($var_mode)
	{
		
		$this->$var_mode = \App::getInstance()->getTable($var_mode);

	}

}