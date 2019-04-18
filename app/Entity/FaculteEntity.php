<?php

	namespace App\Entity;	
	
	use Core\Entity\Entity;

	/**
	* 
	*/
	class FaculteEntity extends Entity
	{

		
		public function getUrlOption()
		{
			return '<a href="index.php?p=test&id='.$this->id.'&discipline='.$this->nom.'&indice='.$this->id.'&option=cours"> '.$this->nom.'</a>';
		}

		public function getUrlcreate()
		{
			return 
				'<form class="form-horizontal" action="index.php?p=admin" method="post">
					<div class="form-group">
						<input type="hidden" name="id" value="'.$this->id.'" />
						<input type="hidden" name="discipline" value="'.$this->nom.'" />
						<input type="hidden" name="indice" value="'.$this->id.'" />
						<input type="hidden" name="option" value="cours" />
						<input type="submit" class="form-control btn btn-warning" value="Creer cours" />
					</div>
				</form>';
			
			/*return '<a href="index.php?p=test&id='.$this->id.'&discipline='.$this->nom.'&indice='.$this->id.'&option=cours"><span class="glyphicon glyphicon-list text-primary"> Creer un cours </span></a>';*/

		}
		public function getUrlList()
		{
			
			return 
				'<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<input type="hidden" name="faculte_id" value="'.$this->id.'" />
						<input type="hidden" name="faculte" value="'.$this->nom.'" />
						<input type="hidden" name="option" value="liste" />
						<input type="submit" class="form-control btn btn-primary" value="lister cours" />
					</div>
				</form>';

			/*return '<a href="index.php?p=test&id='.$this->id.'&discipline='.$this->nom.'&indice='.$this->id.'&option=cours"><span class="glyphicon glyphicon-list text-primary"> Consulter un cours </span></a>';*/

		}

		public function getUrlUpload()
		{
			
			return 
				'<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<input type="hidden" name="option" value="upload" />
						<input type="hidden" name="faculte_id" value="'.$this->id.'" />
						<input type="hidden" name="faculte" value="'.$this->nom.'" />
						<input type="submit" class="form-control btn btn-info" value="uplaod document" />
					</div>
				</form>';
			/*return '<a href="index.php?p=test&id='.$this->id.'&discipline='.$this->nom.'&indice='.$this->id.'&option=cours"><span class="glyphicon glyphicon-list text-info"> Modifier cours</span></a>';*/

		}


		public function getUrlUpdate()
		{
			
			return 
				'<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<input type="hidden" name="option" value="update" />
						<input type="hidden" name="faculte_id" value="'.$this->id.'" />
						<input type="hidden" name="faculte" value="'.$this->nom.'" />
						<input type="submit" class="form-control btn btn-info" value="update document" />
					</div>
				</form>';
			/*return '<a href="index.php?p=test&id='.$this->id.'&discipline='.$this->nom.'&indice='.$this->id.'&option=cours"><span class="glyphicon glyphicon-list text-info"> Modifier cours</span></a>';*/

		}


		public function getUrlDelete()
		{

			return 
				'<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<input type="submit" class="form-control btn btn-danger" value="Supprimer cours" />
					</div>
				</form>';

		}


		public function getCoursUrl()
		{
			return
				'<li>
					<a href="index.php?p=bibliotheque&id='.$this->id.'"> '.$this->nom.'</a>
				</li>';
		}

		public function getOption()
		{
			return '<option value="'.$this->id.'">'.$this->nom.'</option>';
		}
	}