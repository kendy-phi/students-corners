<?php

	namespace App\Entity;	
	
	use Core\Entity\Entity;

	/**
	* 
	*/
	class CoursEntity extends Entity
	{
		protected $faculte;

		public function getUrl()
		{
			return '<a href="index.php?p=bibliotheque&id='.$this->id.'"> '.$this->nom.'</a>';
		}


		public function getFaculte()
		{

			$this->faculte = explode('/', $this->dossier);

			return $this->faculte[2];

		}


	}