<?php
	namespace Core\Table;
	
	use core\Database\Database;

	/**
	* 
	*/
	class Table
	{

		protected $table; 

		protected $_db;
		
		function __construct(Database $db)
		{
			
			$this->_db = $db;
			
			if(is_null($this->table))
			{ 
				
				$bric = explode('\\',get_class($this)); 

				$class_name = end($bric);

				$this->table = strtolower($class_name);

				$this->table = str_replace('table', '', $this->table);				

			}	

		}


		public function all($tab = null, $key = null)
		{			
			
			if($tab)
				return $this->query('SELECT * FROM ' .$this->table.','.$tab.' WHERE '.$this->table.'.id = '.$key);
			else			
				return $this->query('SELECT * FROM ' .$this->table);

		}

		public function last()
		{

			return $this->query('SELECT * FROM ' .$this->table.' ORDER BY date_entre desc limit 1');

		}		

		public function query($statement, $attributes = null, $one = false)
		{
			if(!is_null($attributes))
			{

				return $this->_db->prepare($statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);

			}else{

				return $this->_db->query($statement, str_replace('Table', 'Entity', get_class($this)));

			}
			
		}

		public function ifExiste($nom)
		{

			return $this->query("SELECT * FROM $this->table WHERE nom = :nom ", compact('nom'), true);
		}

		public function findById($id, $one = false)
		{

			return $this->_db->prepare('SELECT * FROM '.$this->table.' WHERE id = :id', compact('id'), str_replace('Table', 'Entity', get_class($this)), $one);
		
		}

		public function deleteTable()
		{

			return $this->_db->prepare('DELETE FROM '.$this->table.' WHERE id = :id', compact('id'));

		}

		public function findNameById($id)
		{
			
			return $this->_db->prepare('SELECT * FROM '.$this->table.' WHERE id = :id', compact('id'), str_replace('Table', 'Entity', get_class($this)), true)->nom;

		}

		public function count()
		{

			return $this->_db->query('SELECT COUNT(*) nbre FROM '.$this->table);

		}

		



		

	}