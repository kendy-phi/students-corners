<?php

namespace App\Controller;

use \App;




/**
* 
*/
class UserController extends AppController
{
	private $_user;
	
	function __construct()
	{
		parent::__construct();

		AuthController::getInstance()->auth();

		$this->loadModel('faculte');
		
		$this->loadModel('cours');
		
		$this->loadModel('user');
		
		$this->loadModel('document');

		$this->loadModel('devoir');

		$this->_user = $this->user->findById(!empty($_SESSION['id']) ? $_SESSION['id'] : null, true);
		
	}

	public function index($donne = null)
	{

		$user = $this->user->findById($_SESSION['id'], true);

		$title = 'Espace etudiant';

		$facultes = $this->faculte;

		$faculte = $this->faculte->findById($this->_user->faculte_id, true);

		if($donne){

			$data = $this->$donne();

			$this->render('user.index', compact('user', 'facultes', 'faculte', 'data', 'title'));
		}else
			$this->render('user.index', compact('user', 'facultes', 'faculte', 'title'));

	}


	public function update($data)
	{

		unset($data['action']);
        
        unset($data['option']);
        
        $data['id'] = $_SESSION['id'];

        $this->user->updateUser($data);

        header('location:index.php?p=compte&option=profil');

	}

	public function updatePassword($data)
	{
		
		unset($data['action']);
        
        unset($data['option']);
        
        $data['id'] = $_SESSION['id'];

        if($data['password'] != $data['new'])
        {

            echo "confirmation echoue";

        }else{
            
            unset($data['option']);
            
            unset($data['new']);

            $data['password'] = md5($data['password']);

            $this->user->updatePassword($data);
            
            header('location:index.php?p=compte&option=profil');
        }




	}

	public function delete()
	{

		$user = $this->user->findById($_SESSION['id'], true);
		
		if ($user->status == 0)
			$this->user->is_active($_SESSION['id'], 1);
		else
			$this->user->is_active($_SESSION['id'], 0);

	}

	public function document()
	{
		$title = 'Documents';

		$faculte_id = $this->_user->faculte_id;

	    $annee = $this->_user->annee_en_cours;

	    $courses = $this->cours->allCourses(compact('faculte_id', 'annee'));

	    $document = $this->document;

	    $faculte = $this->faculte->findById($this->_user->faculte_id, true);

	    $user = $this->_user;

	    $facultes = $this->faculte->all();

	   	return compact('document', 'courses', 'faculte', 'facultes', 'user', 'title');


	}

	public function devoir()
	{
		$title = 'Devoir';

		$user = $this->_user;

		$faculte_id = $this->_user->faculte_id;

	    $annee = $this->_user->annee_en_cours;

 		$lists = $this->devoir->getAll(compact('faculte_id', 'annee'));

		return $lists;

	}

	





}