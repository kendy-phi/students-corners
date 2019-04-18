<?php

	namespace App\Table;
	use Core\Table\Table;

	/**
	* 
	*/
	class DevoirTable extends Table
	{


		public function getAll($data)
		{
			return $this->_db->prepare('SELECT * from devoir where faculte_id = :faculte_id and annee = :annee', $data, str_replace('Table', 'Entity', get_class($this)));
		}



		public function loadDevoir($data, $file)
		{
			
			$this->load($file, $data);
			
			$titre = $data['titre'];
			
			$dossier = str_replace('cours/'.$data['faculter'], 'devoirs', $data['path']);

			$faculte_id = $data['fac_id'];

			$annee = (explode('-', $data['path'])[1][0]);

			$this->save(compact('titre', 'dossier', 'faculte_id', 'annee'));

		}

		public function load($files, $data)
		{

			$repertoire = str_replace('cours/'.$data['faculter'], 'devoirs', $data['path']);
			
			$ficher = '';
			
			$ficher_temp = $files['devoir']['tmp_name'];
			
			$i = 0;
			
			$extension = array('sh', 'bath', 'php' );
			
			$size = 10*1024*1024;

			//on verifie que le ficher est accessible
			if(!is_writable($repertoire))
				die('Impossible d\'ecrire dans le repertoire cible');
			
			//on verifie que la variable #$_FILE[] n'est pas vide
			if(!isset($files['devoir']))
				die('Aucun contenue pour le telechargement');

			//var_dump($files['devoir']);

			//verification des erreurs possible durant le chargement
			switch ($files['devoir']['error']) {
				case 1:
					die('Le ficher depasse la limite autoriser par le serveur');
					break;
				case 2:
					die('Le ficher depasse la valeur autoriser par le formulaire');
					break;
				case 3:
					die('Le ficher a ete interrompu pendant le transfert');
					break;
				case 4:
					die('Le ficher que vous essayer d\'envoyer a une taille nulle');
					break;
			}

			//on verifie si le ficher est du bon format	
			$extension_upload = substr(strrchr($files['devoir']['name'], '.'), 1);


			if(in_array($extension_upload, $extension))
				die('Extension non prise en charge par le serveur');
				

			//on verifi si le nom du ficher existe deja avant de faire l'enregistrement pour eviter l'ecrasement
			if(file_exists($repertoire.'/'.$files['devoir']['name']))
			{

				//boucle pour voir combien de fois le ficher existait
				while ( file_exists($repertoire.'/'.$i.$files['devoir']['name']))
					$i++;

				//ici on a trouver un nom disponible pour notre ficher
				if($i != 0)
					$ficher = $repertoire.'/'.$i.$_FILES['devoir']['name'];
			}else
				$ficher = $repertoire.'/'.$_FILES['devoir']['name'];

			//alor on effectue notre deplacement bien reussi
			move_uploaded_file( $ficher_temp, $ficher);
			
			return true;

		}

		public function save($data)
		{

			return $this->_db->prepare('INSERT INTO devoir (titre, dossier, faculte_id, annee) VALUES(:titre, :dossier, :faculte_id, :annee)', $data);

		}




	}