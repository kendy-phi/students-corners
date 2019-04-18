<style type="text/css">
	h4{
		font-size: 25px;
		font-family: bold;
	}
</style>
<!-- bread-crumb start here -->
</div>
<div class="bread-crumb">
	<img src="assets/images/banner-top.jpg" class="img-responsive" alt="banner-top" title="banner-top">
	<div class="container">
		<div class="matter">
			<h2>Inscrivez-vous maintenant</h2>
			<ul class="list-inline">
				<li>
					<a href="index.php?p=log">Connexion</a>
				</li>
				<li>
					<a href="index.php?p=home">Inscription</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- bread-crumb end here -->	
<div class="login">
	<div class="container"> 
		<div class="col-md-12 col-sm-12 col-xs-12 box1 padd0 " id="loged">
			<div class="col-md-6 col-sm-6 col-xs-12 bor">
				<h4>Connexion</h4>
				<hr>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">	
						<label>Adresse email*</label>
						<input type="text" name="email" value="" placeholder="Johndoe@example.com" id="email" class="form-control" required />
					</div>
					<div class="form-group">
						<label>password*</label>
						<input type="password" name="password" value="" placeholder="********" id="password" class="form-control"  required />
					</div>
					<div class="links">
						<input type="checkbox"  class="checkclass checkbox-inline"/>se souvenir de moi
						<a href="#" class="pull-right">mot de passe oublie?</a>
					</div>
					<input type="hidden" name="action" value="connexion">
					<button type="submit" class="btn btn-primary btn-block" >Connexion</button>
				</form>
				<div class="donot">Vous n'avez pas de compte? <a href="index.php?p=log#created">Creer un nouveau compte</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 " id="created">
				<h4>Inscription</h4>
				<hr>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">	
						<label>Nom*</label>
						<input type="text" name="nom" value="" placeholder="John Doe" id="input-name" class="form-control" required />
					</div>
					<div class="form-group">	
						<label>Prenom*</label>
						<input type="text" name="prenom" value="" placeholder="Johnny" id="email" class="form-control" required />
					</div>
					<div class="form-group">	
						<label>Pseudo*</label>
						<input type="text" name="pseudo" value="" placeholder="Johnny-big" id="input-name" class="form-control" required />
					</div>
					<div class="form-group">	
						<label>Adresse email*</label>
						<input type="mail" name="email" value="" placeholder="Johndoe@example.com" id="email" class="form-control" required />
					</div>
					<div class="form-group">
						<label>password*</label>
						<input type="password" name="password" value="" placeholder="********" id="password" class="form-control" required />
					</div>
					<div class="form-group">
						<label>Faculte</label>	
						<select class="form-control" name="faculte_id">
							<?php
								foreach ($facultes as $key => $faculte)
                                   echo $faculte->getOption();
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Annee</label>	
						<select class="form-control" name="annee_en_cours">
							<option value="1" selected="true">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>					
						</select>
					</div>
					<div class="links">
						<input type="checkbox"  name="credit" class="checkclass checkbox-inline" required/>
						Avoir lu, compris et accepte les condittions.
					</div>
					<input type="hidden" name="action" value="inscription">
					<button type="submit" class="btn btn-primary btn-block" >Envoyer</button>
				</form>
				<div class="donot">
					Vous avez deja un compte? 
					<a href="index.php?p=log#loged">Connectez-vous</a>
				</div>
			</div>	
		</div>
	</div>
</div>
<!-- login end here -->
<?php
	
	if (!empty($_POST)) {

		$log = new \App\Controller\AuthController();

		$log->connect($_POST);

	}
	
?>