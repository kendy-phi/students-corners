<?php

		echo "Section pour faire les telechargement des ficher de type images <br/>";
		//phpinfo();
		//var_dump($_FILE['ficher']);
		//on definit le chemin cible pour notre ficher
		$repertoire = '../public/images/';
		$ficher = '';
		$ficher_temp = $_FILES['ficher']['tmp_name'];
		$i = 0;
		$extension = array('jpg','jpeg','bmp','gif','png');

		//on verifie que le ficher est accessible
		if(!is_writable($repertoire))
			die('Impossible d\'ecrire dans le repertoire cible');

		//on verifie que la variable #$_FILE[] n'est pas vide
		if(!isset($_FILES['ficher']))
			die('Aucun contenue pour le telechargement');

		//verification des erreurs possible durant le chargement
		switch ($_FILES['ficher']['error']) {
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
		$extension_upload = substr(strrchr($_FILES['ficher']['name'], '.'), 1));
		if(!in_array($extension_upload, $extension))
			die('Extension non prise en charge par le serveur');
		

		//on verifi si le nom du ficher existe deja avant de faire l'enregistrement pour eviter l'ecrasement
		if(file_exists($repertoire.$_FILES['ficher']['name']))
		{
			
			//boucle pour voir combien de fois le ficher existait
			while ( file_exists($repertoire.$i.$_FILES['ficher']['name']))
				$i++;
			//ici on a trouver un nom disponible pour notre ficher
			$ficher = $repertoire.$i.$_FILES['ficher']['name'];
		}else
			$ficher = $repertoire.$_FILES['ficher']['name'];

		//alor on effectue notre deplacement bien reussi
		move_uploaded_file( $ficher_temp, $ficher);
		echo "Chargement reussit a plus";
?>