<?php

namespace Core\Controller;




class Controller
{

	protected $viewPath;

	protected $template;

	public static $mesage;

	public function __construct()
	{

		

	}


	public function render($views, $data = null)
	{

		ob_start();

		
		if(!empty($_SESSION['erreur'])){
			$erreur = $_SESSION['erreur'];
			$_SESSION['erreur'] = '';
		}

		if (!empty($_SESSION['success'])){
			$success = $_SESSION['success'];
			 $_SESSION['success'] = '';
		}
		

		if($data) 
			extract($data);

		require($this->viewPath.str_replace('.', '/', $views).'.php');

		$content = ob_get_clean();
		
		require ($this->viewPath.'/template/'.$this->template.'.php');
	
	}
	
	



	
}