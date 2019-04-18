<?php

	namespace App\Table;
	use Core\Table\Table;

	/**
	* 
	*/
	class CommentairesTable extends Table
	{
		

		public function getFacComments($id)
		{

			return $this->query('SELECT * FROM  commentaires WHERE faculte_id = :id', compact('id'), str_replace('Table', 'Entity', get_class($this)));

		}


		public function addComment($commentaire)
		{
			
			$faculte_id = $this->_db->lastId();

			$this->_db->prepare('INSERT INTO commentaires (faculte_id, commentaire) VALUES(:faculte_id, :commentaire)', compact('commentaire','faculte_id'));

		}
		
		
    }