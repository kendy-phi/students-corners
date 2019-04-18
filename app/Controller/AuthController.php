<?php

namespace App\Controller;

use \App;



/**
* 
*/
class AuthController extends AppController
{
	private $_user;

	protected static $instance;

	protected static $auth = false;
	
	function __construct()
	{

		if(empty($_SESSION['id']))
			$this->template = 'default';
		else
			$this->template = 'default-membre';

		$this->viewPath = ROOT.'/app/views/';

		$this->loadModel('user');
		
		$this->loadModel('faculte');

	}

	public function login()
	{
		
		$title = 'Identification';

		$facultes = $this->faculte->all();

		$this->render('user.log', compact('title', 'facultes'));


	}

	public function logout()
	{
		
		unset($_SESSION);

		session_destroy();

		header('location:index.php?p=log');

	}

	public static function getInstance()
	{
		if(is_null(self::$instance))
			return self::$instance = new AuthController();
		else
			return self::$instance;
	}

	public function auth()
	{
		if(!self::$auth){

			if(empty($_SESSION['id'])){

				$this->login();

			}

		}else
			return self::$auth;

	}

	public function connect($data = null)
	{

		if (!empty($data) and $data['action'] === 'inscription') {
			
			unset($data['action']);
			
			unset($data['credit']);
			
			unset($data['confirmpassword']);

			if(in_array('', $data))
			{
				$_SESSION['erreur'] = 'Toutes les informations se sont pas renseignes';
			
			}
			else
			{
				

				$_SESSION['id'] = $this->user->addUser($data)->id;

				self::$auth = true;

				header('Location:index.php?p=home');
			}

		}elseif (!empty($data) and $data['action'] === 'connexion') {
		
			unset($data['action']);

			if(in_array('', $data))
			{
				$_SESSION['erreur'] = 'Toutes les informations se sont pas renseignes';
			
			}
			else
			{

				$_SESSION['id'] = $this->user->searchUser($data);

				header('Location:index.php?p=home');
			}
		}

	}

	public function is_admin()
	{


	}

	public function is_active()
	{


	}

	




}