<?php

		namespace App\Table;
		use Core\Table\Table;

		/**
		* classe qui gere les personnage qui sont connecter sur mon site
		*/
		class UserTable extends Table
		{


		//pour ajouter une personne a la base de donner
		public function addUser($usr)
		{
			$user['password'] = md5($user['password']);

			$req = $this->_db->prepare('INSERT INTO user (nom,
														prenom,
														email,
														pseudo,
														password,
														faculte_id,
														annee_en_cours,									 
														date_creation)
												VALUES  (:nom,
														:prenom,
														:email,
														:pseudo,
														:password,
														:faculte_id,
														:annee_en_cours,									
														 NOW())',
														 $usr);

			return $this->findById($this->_db->lastId(), true);

		}

		//pour la mise a jour d'un utilisateur
		public function updateUser($attribute)
		{
			//var_dump($user->getSettings());
			$statemet = 'UPDATE user set 	nom = :nom,
											prenom = :prenom,
											pseudo = :pseudo,
											email = :email,
											telephone = :telephone,												
											date_modification = now()
											WHERE id = :id';
			$req = $this->_db->prepare($statemet, $attribute);

			return $req;
		}

		public function updatePassword($attribute)
		{
			$attribute['password'] = md5($attribute['password']);
			
			$statemet = 'UPDATE user set	password = :password,												
											date_modification = now()
											WHERE id = :id';
			$req = $this->_db->prepare($statemet, $attribute);

			return $req;
		}

		public function is_active($id, $status)
		{
			$statemet = 'UPDATE user set	status = :status,												
											date_modification = now()
											WHERE id = :id';

			$req = $this->_db->prepare($statemet, compact('status', 'id'));

			return $req;
		}

		//pour faaire la connexion d'un membre sur le site
		public function searchUser(array $recherche)
		{

			$recherche['password'] = md5($recherche['password']);
			
			$req = $this->_db->prepare('SELECT * FROM user WHERE email = :email AND password = :password', $recherche, str_replace('Table', 'Entity', get_class($this)), true);
			
			if (!is_null($req))
				return $req->id;

		}	

		/*//pour en supprimer un participant de notre base
		public function delete(User $user)
		{
			
			$tab['id'] = $user->getId();

			$this->_db->prepare('DELETE FROM user WHERE id = :id', $tab);

		}

		//pour les mise ajours des differentes informations des membres
		

		//methode pour changer de base de donner
		public function setDb(PDO $bd)
		{

			$this->_db = $bd;

		}*/

			
		}