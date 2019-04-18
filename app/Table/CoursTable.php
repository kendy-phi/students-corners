<?php

	namespace App\Table;
	use Core\Table\Table;

	/**
	* 
	*/
	class CoursTable extends Table
	{

		public function createCours($donner)
		{

			$path = PATH.'/'.$donner['dossier'];

			$devoir = PATH.'/'.$donner['devoir'];

			unset($donner['devoir']);

			if(!file_exists($path))
			{
				if( mkdir($path, 0755, true) &&	mkdir($devoir, 0755, true) ){
					$this->saveCours($donner);
					return true;
				}
				else{
					$_SESSION['erreur'] = "Vous n'avez pas le droit d'ecriture dans ce dossier";
					header('Location:index.php?p=admin');
				}

			}else{

				$_SESSION['erreur'] = "Le ficher existe dans le repertoire parent";
				header('Location:index.php?p=admin');
			}
		
		}

		public function updateCours($donner, $faculte)
		{
			$path = ROOT.'/'.$donner['dossier'];

			$devoir = str_replace('cours/'.$faculte, 'devoirs', $path);

		}
		
		public function saveCours($donner)
		{

			if(!$this->ifExiste($donner['nom'])){

				return $this->_db->prepare('INSERT INTO cours (nom, dossier, annee, faculte_id, date_creation) VALUES(:nom, :dossier, :annee, :faculte_id, now())', $donner);
			}else{
				$_SESSION['erreur'] = "Ce cours est deja enregistre dans la base de donnee";
			}
		
		}

		public function allCourses($donner)
		{
			return $this->_db->prepare('SELECT * from cours WHERE faculte_id = :faculte_id AND annee = :annee', $donner, str_replace('Table', 'Entity', get_class($this)));
		}

		public function getCoursByFacId($id)
		{

			return $this->_db->prepare('SELECT * from cours WHERE faculte_id = :id', compact('id'), str_replace('Table', 'Entity', get_class($this) ) );
		}
		
	}