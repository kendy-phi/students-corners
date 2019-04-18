<?php

	namespace App\Table;
	use Core\Table\Table;

	/**
	* 
	*/
	class FaculteTable extends Table
	{


		public function createFaculte($path, $quant = 1)
		{
			
			$attr['nom'] = array_pop(explode('/', $path));

			$devoir = str_replace('cours', 'devoirs', $path);

			$attr['dossier'] = $path;

			if($quant > 1)
			{
				$attr['duree'] = $quant;

				$subFolder = $path.'/'.$attr['nom'];
				
				$subFolderD = $devoir.'/'.$attr['nom'];

				if(!file_exists(PATH.'/'.$path))
				{
					//creteaion du dossier pour le faculte
					mkdir(PATH.'/'.$path, 0777, true);
					//enregistrement des informations le faculte creer
					$this->saveFac($attr);

					for ($i=0; $i < $quant ; $i++) { 

						if(!is_dir(PATH.'/'.$subFolder.$i+1))
						{
							
							mkdir(PATH.'/'.$subFolder.'-'.($i+1), 0777, true);
							
							mkdir(PATH.'/'.$devoir.'-'.($i+1), 0777, true);

						}				

					}

					$_SESSION['success'] = "Creation d'une nouvelle faculte reussie";

					return true;

				}else
				{
					$_SESSION['erreur'] = "Il y a une erreur dans la creation des fichiers \n Document dupliquer";
					return false;
				}

			}		

		}
		
		public function saveFac($attr)
		{
			
			if(!$this->ifExiste($attr['nom'])){
				$this->_db->prepare('INSERT INTO faculte (nom, dossier, duree, date_creation) VALUES(:nom, :dossier, :duree, now())', $attr, null);
			}else{
				
				$_SESSION['erreur'] = "Duplication de donnee";

				header('Location:index.php?p=admin');

			}

			
		}



		
		
		
	}