<!-- Creations des different cours -->
<div class="col-md-12 panel panel-warning">
	<form class="form-horizontal" action="" method="post" >
		<legend class="text-center">Creer un cour</legend>
		<div class="form-group">
			<label class="control-label col-sm-3" for="email">Faculter:</label>						
			<div class="col-sm-8">
				<input type="text" name="faculter" placeholder="Entrez le nom du fichier" class="form-control" id="email" value="<?php echo (!empty($_POST['discipline']) ? $_POST['discipline'] : 'Aucune faculter n\'est selectioner'); ?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="email">Nom fichier:</label>						
			<div class="col-sm-8">
				<input type="text" name="folder" placeholder="Entrez le nom du fichier" class="form-control" id="email" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="email">Annee en cour:</label>						
			<div class="col-sm-8" id="email">
				<select class="form-control" name="duree" >
					<option value="1" selected="true">1 annee</option>
					<option value="2">2 annee</option>
					<option value="3">3 annee</option>
					<option value="4">4 annee</option>
					<option value="5">5 annee</option>					
				</select>
			</div>
		</div>
		<div class="form-group">									
			<div class="col-sm-offset-3 col-sm-8">
				<input type="hidden" name="action" value="creerCours"/>
				<input type="hidden" name="facId" value="<?php echo (!empty($_POST['indice']) ? $_POST['indice'] : (0)); ?>"/>
				<input type="hidden" name="option" value="cours" />
				<input type="submit" value="Envoyer" class="form-control btn-warning" />
			</div>
		</div>
	</form>

	<p>nouvelle faculte <a href="index.php?p=admin">ici...</a></p>
</div>

<?php


	use App\Table\CoursTable;
	
	if(!empty($_POST['action']) AND $_POST['action'] === 'creerCours')
	{
		$faculter = new \App\Controller\Admin\PostController();
		$faculter->addCour($_POST);
	}
