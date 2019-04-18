<?php

namespace App\Controller\Admin;

use \App\Controller\AppController;



/**
* 
*/
class PostController extends AppController
{

	public function __construct()
	{
		parent::__construct();

		$this->loadModel('faculte');
		
		$this->loadModel('cours');
		
		$this->loadModel('user');

		$this->loadModel('document');

		$this->loadModel('commentaires');

		$this->_user = $this->user->findById(!empty($_SESSION['id']) ? $_SESSION['id'] : null, true);

	}
	
	public function index()
	{

		$title = 'Adminstration';	

		$facultes = $this->faculte->all();

		$this->render('admin.pages.index', compact('facultes', 'title'));

	}

	public function homeWork()
	{
		
		$title = 'Adminstration | Devoir';	

		$facultes = $this->faculte->all();

		$courses = $this->cours->all();		

		$this->render('admin.pages.index', compact('facultes', 'courses', 'title'));

	}

	public function addFaculte($data)
	{

		$about = $data['apropos'];

		$data = array_map('strtolower', $data);
				
		$path = strtolower('documents/cours/'.$data['folder']);

		$nbre = (int)$data['duree'];
		
		if ($this->faculte->createFaculte($path, $nbre)) {

			$this->commentaires->addComment($about);
		}

		header('Location:index.php?p=admin');


	}

	public function addCour($data)
	{

		$data = array_map('strtolower', $data);

		$fac = $data['faculter'];
		
		$nom = $data['folder'];
		
		$annee = (int)$data['duree'];
		
		$dossier = 'documents/cours/'.$fac.'/'.$fac.'-'.$annee.'/'.$nom;
		
		$devoir  = 'documents/devoirs/'.$fac.'-'.$annee.'/'.$nom;

		$faculte_id = $data['facId'];

		if ($this->cours->createCours(compact('nom', 'dossier', 'annee', 'faculte_id','devoir'))) {
			 $_SESSION['success'] ="Operation reussie";
		}
		
		header('Location:index.php?p=admin');

	}

	public function loadDocument($data)
	{

		if(empty($data['annee']))
			$data['annee'] = 1;
    
	    $faculte_id = (!empty($data['faculte_id']) ? $data['faculte_id'] : 1);
	    
	    $annee = $data['annee'];

	    $courses = $this->cours->allCourses(compact('faculte_id','annee'));

	   return compact('courses');

	}


	public function upload($data, $files)
	{

		$data = array_map('strtolower', $data);
		
		$nom = explode('.', $data['titre']);
		
		$lien = $data['chemin'].'/'.$data['titre'];

		$path = PATH.'/'.$data['chemin'];

		$titre = $nom[0];

		$cours_id =  $data['cid'];

		$annee_en_cours = $data['aec'];	

		$this->document->loadDocuments(compact('lien','titre', 'cours_id', 'annee_en_cours', 'path'), $files);

		header('Location:index.php?p=admin');

	}


}