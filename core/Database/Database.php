<?php

	namespace Core\Database;

	use \PDO; 

	/*********/

	class Database
	{

		private $db_name;

		private $db_user;
		
		private $db_pass;
		
		private $db_host;

		private $pdo;

		function __construct($db_name, $db_user = '', $db_pass = '', $db_host = 'localhost')
		{

			$this->db_name = $db_name;

			$this->db_user = $db_user;

			$this->db_pass = $db_pass;

			$this->db_host = $db_host;

		}

		private function getPDO()
		{
			if($this->pdo === null)
			{

				$pdo = new PDO('mysql:dbname='.$this->db_name.';host=localhost', $this->db_user, $this->db_pass);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				$this->pdo = $pdo;

			}

			return $this->pdo;
		}


		public function query($statement, $class_name = null, $one = false)
		{

			$req = $this->getPDO()->query($statement);

			if($class_name === null)
			{
			
				$req->setFetchMode(PDO::FETCH_ASSOC);
			
			}else{

				$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
				
			}

			if($one)
				$data = $req->fetch();
			else
				$data = $req->fetchAll();

			return $data;
		}

		
		public function prepare($statement,$attribute, $class_name = null, $one = false)
		{

			$req = $this->getPDO()->prepare($statement);

			//var_dump($statement, $attribute); //die();

			$req->execute($attribute);

			if($class_name === null)
			{
			
				$req->setFetchMode(PDO::FETCH_ASSOC);
			
			}else{

				$req->setFetchMode(PDO::FETCH_CLASS, $class_name);			

				if($one)
					$req = $req->fetch();
				else
					$req = $req->fetchAll();
			}


			return $req;	

		}
		
		public function lastId()
		{

			return $req = $this->getPDO()->LastInsertId();

		}
	}
