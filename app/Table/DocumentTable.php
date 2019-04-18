<?php

	namespace App\Table;
	use Core\Table\Table;

	/**
	* 
	*/
	class DocumentTable extends Table
	{

		
		public function findCoursById($id)
		{
			
			return $this->_db->prepare('SELECT * FROM document where cours_id = :id', compact('id'));

		}

		public function saveDocuments($attr)
		{

			return $this->_db->prepare('INSERT INTO document (titre, lien, annee_en_cours, cours_id, date_upload) VALUES(:titre, :lien, :annee_en_cours, :cours_id, now())', $attr);

		}

		public function loadDocuments($data, $donner)
		{

			if($this->move_doc($data['path'], $donner)){

				unset($data['path']);

				$this->saveDocuments($data);

				return true;
			}
			
		}


		function move_doc($path, $files)
		{
			$repertoire = $path;
			$ficher = '';
			$ficher_temp = $files['doc']['tmp_name'];
			$i = 0;
			$extension = array('pdf', 'docx', 'pptx', 'txt', 'zip', 'zip', '' );
			$size = 10 * 1024 * 1024;

			//on verifie que le ficher est accessible
			if(!is_writable($repertoire)){
				$_SESSION['erreur'] = ('Impossible d\'ecrire dans le repertoire cible');
				return;
			}
			
			//on verifie que la variable #$_FILE[] n'est pas vide
			if(!isset($files['doc'])){
				$_SESSION['erreur'] = ('Aucun contenue pour le telechargement');
				return;
			}

			//var_dump($files['doc']);

			//verification des erreurs possible durant le chargement
			switch ($files['doc']['error']) {
				case 1:
					$_SESSION['erreur'] = ('Le ficher depasse la limite autoriser par le serveur');
					return;
				case 2:
					$_SESSION['erreur'] = ('Le ficher depasse la valeur autoriser par le formulaire');
					return;
				case 3:
					$_SESSION['erreur'] = ('Le ficher a ete interrompu pendant le transfert');
					return;
				case 4:
					$_SESSION['erreur'] = ('Le ficher que vous essayer d\'envoyer a une taille nulle');
					return;
			}

			//on verifie si le ficher est du bon format	
			$extension_upload = substr(strrchr($files['doc']['name'], '.'), 1);


			if(!in_array($extension_upload, $extension)){
				$_SESSION['erreur'] = ('Extension non prise en charge par le serveur');
				return;
			}
				

			//on verifi si le nom du ficher existe deja avant de faire l'enregistrement pour eviter l'ecrasement
			if(file_exists($repertoire.'/'.$files['doc']['name']))
			{

				//boucle pour voir combien de fois le ficher existait
				while ( file_exists($repertoire.'/'.$i.$files['doc']['name']))
					$i++;

				//ici on a trouver un nom disponible pour notre ficher
				if($i != 0)
					$ficher = $repertoire.'/'.$i.$_FILES['doc']['name'];
			}else
				$ficher = $repertoire.'/'.$_FILES['doc']['name'];

			//alor on effectue notre deplacement bien reussi
			if( move_uploaded_file( $ficher_temp, $ficher))
				$_SESSION['success'] = "Telechargement du ficher reussie";
			else
				$_SESSION['erreur'] = "Telechargement echouer veullez reessayer";
			
			return true;

		}

		
	}