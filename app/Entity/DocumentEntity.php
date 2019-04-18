<?php

	namespace App\Entity;	
	
	use Core\Entity\Entity;

	/**
	* 
	*/
	class DocumentEntity extends Entity
	{

		public function getUrl()
		{
			return '<a href="index.php?p=test&id='.$this->id.'&discipline='.$this->nom.'"> '.$this->nom.'</a>';
		}


	}