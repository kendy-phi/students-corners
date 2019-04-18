</div>
 <!-- slider start here -->
<div class="slide" > 
	<div class="slideshow owl-carousel" >
		<div class="item" >
			<img src="images/student1.jpg" alt="banner" itle="banner" class="img-responsive" />
		</div>
		<div class="item">
			<img src="images/student.jpg" alt="banner" itle="banner" class="img-responsive"/>
		</div>
		<div class="item">
			<img src="images/banner.jpg" alt="banner" title="banner" class="img-responsive"/>
		</div>
	</div>
	<!-- slide-detail start here -->
	<div class="slide-detail">
		<div class="container">
			<div class="matter">
				<p class="text">Bienvenue sur la UPGAVIR</p>
				<h4>La Bibliotheque Virtuelle de UPGA</h4>
				<p class="des">Vous trouverez: "les cours, les documents et aussi de l'espace pour..."</p>
			</div>
		</div>
	</div>	
	<!-- slide-detail end here -->
</div>
<!-- slider end here -->

<!-- service start here -->
<div class="container">
<div class="service">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="commontop text-center">
					<h2>Liste des facultes</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<hr>
				</div>
			</div>
			<?php foreach ($facultes as $key => $faculte) {  ?>
				<div class="col-sm-3 col-xs-12 box text-center">
					<div class="icons">
						<div class="icon">
							<img src="images/icon_01.png" class="img-responsive" alt="icon" title="icon" />
						</div>
					</div>
					<h4><?php echo strtoupper($faculte->nom); ?></h4>
					<p><?php echo $faculte->commentaire;?></p>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- service end here -->

<!-- apropos du de l'application -->
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<div class="commontop text-left">
					<h2>NOTRE VISION</h2>
					<p class="des">
						L'Université est soucieuse de l'insertion professionnelle de ses étudiants, la professionnalisation
						des formations demeure ainsi une de ses préoccupations essentielles.
					</p>
					</div>
					<p class="des">
					 	L'UPGA est ouverte sur son	environnement, et notamment sur le monde de l'entreprise. Cela se traduit par la présence au sein
						de l'équipe d'enseignants, de professionnels expérimentés dans leur domaine et par l'accueil
						d'universitaires, spécialistes dans leur domaine, venant des grandes universités nationales et
						étrangères, des stages obligatoires au niveau L4 et Master2.
					</p>
					<hr>
				<div class="image">
					<img src="images/nigerian_uni.jpg" class="img-responsive" alt="img" title="img" style="height: 405px; width: 100%;" />
					<div class="icon">
						<div class="ico"><a href="#"><i class="icofont icofont-ui-play"></i></a></div>
					</div>
					<hr>
				</div>

				<div class="commontop text-left">
					<p>
						Dans le but de faciliter la recherche et d’agrandir le champ de connaissance des étudiants et
						professeurs de l’UPGA, une bibliothèque hybride est créé, respectant les tendances relatives au
						réseau en particulier le concept de « tous les périphériques, tous les contenus et toutes les
						méthodes de connexion ». Cette tendance est appelée « Bring Your Own Device » (BYOD). Le
						BYOD consiste à offrir aux utilisateurs finaux la liberté d'utiliser leurs propres outils pour accéder
						aux informations et communiquer au sein d'une entreprise ou d'un réseau de campus.
					</p>

					<hr>
					<p class="des">
						Enfin, les Facultés s'appuient sur une équipe d'enseignants-chercheurs (réguliers et non réguliers)
						et des personnels BATOS (Bibliothèque, Administratifs, Techniciens, Ouvriers) attentif et à
						l'écoute des étudiants. C'est donc tout naturellement que l'ensemble de cette équipe vous encourage
						à l'effort et vous souhaite une entière réussite dans vos projets!
					</p>
				</div>

			</div>
			<div class="col-sm-4 col-xs-12 feature">
				<div class="commontop text-left">
					<h2>Apropos de nous</h2>
					<p style="text-align: justify;">
						L'Université Publique de la Grande-Anse est cette jeune institution d'enseignement supérieur
						membre du grand Réseau des Universités Publiques en Région (RUPR). Elle n'a que 4 ans, mais
						elle accueille déjà plus de 1000 jeunes du département. Pour se mettre à la hauteur des grands défis du développement durable de son territoire
						du pays et même de la région caribéenne, elle offre
						présentement deux Unités de Formation et de Recherche (UFR) en "sciences de l'éducation" et
						en "sciences économiques et gestion". Bientôt, elle compte ouvrir deux Instituts Universitaires
						de Technologie (IUT) en "Informatique et Réseaux" et en "Gestion Logistique, Environnement et
						Tourisme". 
					</p>
				</div>
				<div class="box">
					<img src="images/icon02.png" class="img-responsive" alt="icon" title="icon" />
					<p>zone Etudiant(e)s</p>
					<a href="#">EN savoir plus</a>
				</div>
				<img src="images/logo.png" class="img-responsive" alt="ads" title="ads" />
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<div class="commontop text-left">
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- fin de l'apropos -->

<!-- courses start here -->
<div class="course">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="commontop text-center">
					<h2>Retrouver nos meilleurs cours ici</h2>
					<p>Espace reserver seulmeent aux etudiant(e)s de UPGA acces strictement interdit aux etrangers </p>
					<hr>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="courses owl-carousel">
				<?php
					$compteur = 1;
					$tab[0] = '';
					foreach ($courses as $key => $cours) {
						$tab[$compteur] = $cours;
						if($compteur % 2 === 0){ 
				?>
				<div class="item">
					<div class="col-sm-12 col-xs-12">
						<div class="product-thumb">
							<div class="image">
								<a href="index.php?p=cours">
									<img src="images/1.jpg" class="img-responsive" alt="img" title="img" />
								</a>
							</div>
							<div class="caption">
								<h3><?php echo $tab[$compteur-1]->nom ?> <span class="badge pull-right"><?php echo $tab[$compteur-1]->annee.' annee'?></span></h3>
								<h4><?php echo $tab[$compteur-1]->faculte; ?></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
								<ul class="list-inline">
									<li>
										<a href="#"><i class="icofont icofont-ui-user"></i>15</a>
									</li>
									<li>
										<a href="#"><i class="icofont icofont-comment"></i>10</a>
									</li>
									<li>
										<a href="index.php?p=cours&id="><i class="icofont icofont-folder-open"></i>Consulter</a>
									</li>
									<li>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="product-thumb">
							<div class="image">
								<a href="index.php?p=cours">
									<img src="images/student.jpg" class="img-responsive" alt="img" title="img" />
								</a>
							</div>
							<div class="caption">
								<h3><?php echo $tab[$compteur]->nom ?> <span class="badge pull-right"><?php echo $tab[$compteur]->annee.' annee'?></h3>
								<h4><?php echo $tab[$compteur-1]->faculte; ?></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
								<ul class="list-inline">
									<li>
										<a href="#"><i class="icofont icofont-ui-user"></i>15</a>
									</li>
									<li>
										<a href="#"><i class="icofont icofont-comment"></i>10</a>
									</li>
									<li>
										<a href="index.php?p=cours&id="><i class="icofont icofont-folder-open"></i>Consulter</a>
									</li>
									<li>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php
				} 
					$compteur++;
				}
				 ?>				
			</div>
		</div>
	</div>
</div>
</div>
<!-- courses end here -->
<!-- featured start here -->
<div class="featured">
	<div class="image">
		<img src="images/features/bg.jpg" class="img-responsive" alt="bg" title="bg" />
	</div>
	<div class="inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ul class="list-inline">
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons">
										<img src="images/features/icon1.png" class="img-responsive" alt="image" title="image" />	
									</div>
								</div>
								<h4>Departement</h4>
								<p>5<?php //echo $faculte->count()[0]['nbre']; ?></p>
							</div>
						</li>
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons">
										<img src="images/features/icon2.png" class="img-responsive" alt="image" title="image" />	
									</div>
								</div>
								<h4>Utilisateur enregistrer</h4>
								<p><?php //echo $membre->count()[0]['nbre']; ?></p>
							</div>
						</li>
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons">
										<img src="images/features/icon3.png" class="img-responsive" alt="image" title="image" />	
									</div>
								</div>
								<h4>Staff Membre</h4>
								<p>5</p>
							</div>
						</li>
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons">
										<img src="images/features/icon4.png" class="img-responsive" alt="image" title="image" />	
									</div>
								</div>
								<h4>Cours Disponible</h4>
								<p><?php //echo $cour->count()[0]['nbre']; ?></p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- featured end here -->
