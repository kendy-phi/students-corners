<!-- Creations des different faculter -->
<div class="col-md-10 panel panel-warning">
	<form class="form-horizontal" action="" method="post" >
		<legend class="text-center">Creer une faculte</legend>
		<div class="form-group">
			<label class="control-label col-sm-3" for="email">Folder name</label>						
			<div class="col-sm-8">
				<input type="text" name="folder" placeholder="Entrez le nom du fichier" class="form-control" id="email" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-offset-1 col-sm-2" for="duree">Duree</label>						
			<div class=" col-sm-8" id="duree">
				<select class="form-control" name="duree">
					<option value="1">1 an</option>
					<option value="2">2 ans</option>
					<option value="3">3 ans</option>
					<option value="4" selected="true">4 ans</option>
					<option value="5">5 ans</option>					
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="about">apropos</label>
			<div class="col-sm-8">
				<textarea class="form-control" id="about" name ="apropos" style="height: 100px;">
					
				</textarea>
			</div>			
		</div>
		<div class="form-group">									
			<div class="col-sm-offset-3 col-sm-8">
				<input type="hidden" name="action" value="create">
				<input type="submit" value="Envoyer" class="form-control btn-warning" >
			</div>
		</div>
	</form>

	<p>Pour faire des remarques <a href="#">ici...</a></p>
</div>

<?php
	
	if(!empty($_POST['action']) AND $_POST['action'] === 'create')
	{
		
		$faculter = new \App\Controller\Admin\PostController();
		$faculter->addFaculte($_POST);

	}