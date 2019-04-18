<?php

	namespace App\Users;
	use \PDO;
	/*
	*	la classe UserManager va nous permettre de
	*	la gestion de tous les operations des persoonnes
	*	qui sont sont deja inscris et d'autre qui en voudrons bien faire 
	*	partie de notre communauter
	*/
	/**
	* 
	*/
	class UserManager
	{
		
		//declaration de la variable qui aura l'instance de PDO
		private $_db;

		
		function __construct($db)
		{
			# code...
			$this->_db = $db;

		}

		//pour ajouter une personne a la base de donner
		public function addUser(User $usr)
		{


			$req = $this->_db->prepare('INSERT INTO user (nom,
																prenom,
																email,
																pseudo,
																password,													 
																date_creation)
														VALUES  (:nom,
																:prenom,
																:email,
																:pseudo,
																:password,														
																 NOW())',
																 $usr->getSettings());

			$usr->setId($this->_db->lastId());

			return $usr;

		}

		//pour faaire la connexion d'un membre sur le site
		public function searchUser(array $recherche)
		{

			$recherche['password'] = md5($recherche['password']);
			
			$req = $this->_db->prepare('SELECT * FROM user WHERE email = :email AND password = :password', $recherche);
			
			if (!is_null($req))
				return $req;

		}

		//pour charger un participant dans la communauter
		public function loadUser($code_user)
		{
			$tab['id'] = $code_user;

			$req = $this->_db->prepare('SELECT * FROM user WHERE id = :id', $tab );

			//$data = $req->fetch(PDO::FETCH_ASSOC);

			return new User($req);

		}

	

		//pour en supprimer un participant de notre base
		public function delete(User $user)
		{
			
			$tab['id'] = $user->getId();

			$this->_db->prepare('DELETE FROM user WHERE id = :id', $tab);

		}

		//pour les mise ajours des differentes informations des membres
		public function update(User $user, $attribute)
		{
			//var_dump($user->getSettings());

			$statemet = 'UPDATE user set nom = :nom,
												prenom = :prenom,
												useremail = :useremail,
												pseudo = :pseudo,
												password = :password,
												telephone = :telephone,
												status = :status,
												type = :type,
												date_creation = :date_creation
												WHERE code_user = :code_user';
			$req = $this->_db->prepare($statemet, $user->getSettings());

			$req->execute($attribute);

			return $req;
		}

		//methode pour changer de base de donner
		public function setDb(PDO $bd)
		{

			$this->_db = $bd;

		}





	}
