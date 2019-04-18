<?php

		namespace App\Users;

		/**
		* classe qui gere les personnage qui sont connecter sur mon site
		*/
		class User
		{
			// definition des variables de font de notre application web

			private $nom;

			private $prenom;

			private $pseudo;

			private $email;

			private $telephone;

			private $password;

			private $id;

			private $status;

			private $type;

			private $date_creation;

			private $date_modification;

			private $settings = [];

			/*
			**definition du constructeur par defaut de notre application web
			*/ 
			function __construct( array $info)
			{

				$this->hydrate($info);	

			}


			/*
			*definition des getter de la classe
			*/

			public function getNom()
			{

				return $this->nom;

			}

			public function getPrenom()
			{
				
				return $this->prenom;

			}

			public function getPseudo()
			{

				return $this->pseudo;

			}

			public function getEmail()
			{

				return $this->mail;

			}

			public function getPassword()
			{

				return $this->password;

			}

			public function getTelephone()
			{

				return $this->telephone;

			}

			public function getId()
			{

				return $this->id;

			}

			public function getDate_creation()
			{

				return $this->date_creation;

			}

			public function getDate_modification()
			{
				return $this->date_modification;
			}

			public function getSettings()
			{

				return $this->settings;
				
			}

			public function getStatus()
			{

				return $this->status;

			}

			public function getType()
			{

				return $this->type;
			}


			/*
			 *definition des setter pour les memes buts
			 */
			public function setNom($nom)
			{

				$this->nom = $nom;

			}

			public function setPrenom($prenom)
			{

				$this->prenom = $prenom;

			}


			public function setPseudo($pseudo)
			{

				$this->pseudo = $pseudo;

			} 

			public function setEmail($mail)
			{

				$this->mail = $mail;

			}

			public function setTelephone($telephone)
			{

				$this->telephone = $telephone;

			}

			public function setPassword($password)
			{

				$this->password = $password;
			}

			public function setId($id)
			{

				$this->id = $id;
				
			}

			public function setDate_creation($date_creation)
			{

				$this->date_creation = $date_creation;

			}

			public function setDate_modification($date_modification)
			{

				$this->date_modification = $date_modification;

			}

			public function setStatus($status)
			{

				$this->status = $status;

			}

			public function setType($type)
			{

				$this->type = $type;
				
			}

			public function postNom()
			{
				return $this->nom.' '.$this->prenom;
			}

			//function pour crypter les mots de passe des administrateurs
			private function cacher_password()
			{
				$this->password = md5($this->getPassword());
			}

			/**
			*definiton de a fonction d'hydratation
			*pour charger automatiquement
			*la gestion de chargement et d'enregistrement
			*/
			private function hydrate(array $info)
			{

				foreach ($info as $key => $value) {
					# code...

					$method = 'set'.ucfirst($key);

					//on verifi si la ethode existe grace a la fonction methodd_exists
					if(method_exists($this, $method))
					{
						$this->$method($value);
						//pour crypter les mots de passe
						if ($key == 'password'){

							$this->cacher_password();

							$this->settings[$key] = $this->password;

						}else if($key != 'settings'){

							$this->settings[$key] = $value;	

						}

					}

				}

			}

			public function toStringStatus()
			{
				if ($this->getStatus() === '1')
					return 'connected';
				else
					return 'visited';
			}

			public function toStringType()
			{
				if($this->getType() == '1')
					return 'administrateur';
				else
					return 'membre';
			}


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
		public function loadUser($id)
		{

			$req = $this->_db->prepare('SELECT * FROM user WHERE id = :id', compact('id'));

			//$data = $req->fetch(PDO::FETCH_ASSOC);

			var_dump($req);

			die();

			//return new User($req);

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