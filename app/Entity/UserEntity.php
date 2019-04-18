<?php

	namespace App\Entity;	
	
	use Core\Entity\Entity;

	/**
	* 
	*/
	class UserEntity extends Entity
	{


		public function toStringStatus()
		{
			if ($this->status === '1')
				return 'actif';
			else
				return 'expire';
		}

		public function toStringType()
		{
			if($this->type == '1')
				return 'Administrateur';
			else
				return 'Etudiant';
		}



		public function is_admin()
		{
			if($this->type === '1')
				return true;
			else				
				header('Location:index.php');
		}


		public function updateUserPassword()
		{
			
			return 
				'<form class="form-horizontal" action="index.php?p=compte" method="post">
					<div class="form-group">
						<input type="hidden" name="option" value="updatePassword" />
						<input type="submit" class="form-control btn btn-warning" value="changer password" />
					</div>
				</form>';

		}

		public function getUserProfil()
		{
			
			return 
				'<form class="form-horizontal" action="index.php?p=compte" method="post">
					<div class="form-group">
						<input type="hidden" name="option" value="profil" />
						<input type="submit" class="form-control btn btn-primary" value="voir profil" />
					</div>
				</form>';

		}


		public function UpdateUserProfil()
		{
			
			return 
				'<form class="form-horizontal" action="index.php?p=compte" method="post">
					<div class="form-group">
						<input type="hidden" name="option" value="update" />
						<input type="hidden" name="faculter_id" value="'.$this->id.'" />
						<input type="hidden" name="faculte" value="'.$this->nom.'" />
						<input type="hidden" name="option" value="updateProfil" />
						<input type="submit" class="form-control btn btn-info" value="Modifier profil" />
					</div>
				</form>';
			/*return '<a href="index.php?p=test&id='.$this->id.'&discipline='.$this->nom.'&indice='.$this->id.'&option=cours"><span class="glyphicon glyphicon-list text-info"> Modifier cours</span></a>';*/

		}

		public function DeleteUserProfil()
		{

			return 
				'<form class="form-horizontal" action="index.php?p=compte" method="post">
					<div class="form-group">
						<input type="hidden" name="option" value="deleteProfil" />
						<input type="submit" class="form-control btn btn-danger" value="fermer compte" />
					</div>
				</form>';

		}




	}