<?php
	
	namespace Core\Entity;
	/**
	* 
	*/
	class Entity
	{

		
		public function __get($key)
		{
			
			$methode = 'get'.ucfirst($key);

			$this->$key = $this->$methode();

			return $this->$key;
		}

	}