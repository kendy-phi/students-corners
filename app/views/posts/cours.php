<!-- bread-crumb start here -->
</div>
	<div class="bread-crumb">
		<img src="images/banner-top.jpg" class="img-responsive" alt="banner-top" title="banner-top">
		<div class="container">
			<div class="matter">
				<h2>Tous les cours</h2>
				<ul class="list-inline">
					<li>
						<a href="index-2.html">ACCEUIL</a>
					</li>
					<li>
						<a href="about.html">TOUS LES COURS</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
<div class="coures">
<div class="container">
	<div class="row">
		<div class="col-sm-3 col-xs-12 hidden-xs">				
				<div class="left">
					<h4>POPULAR COURSES</h4>
					<div class="popular">
						<?php 
							for ($i=0; $i < 10; $i++) 
								if( $i % 2 == 0)
									echo '<div class="box">
									<img src="images/p1.jpg" class="img-responsive" alt="img" title="img" />
									<p>Introduction to Mobile Application Develop..</p>
									<span></span>
									</div>';
								else if($i % 3 == 0)
									echo '<div class="box">
									<img src="images/p2.jpg" class="img-responsive" alt="img" title="img" />
									<p>Introduction to Mobile Application Develop..</p>
									<span></span>
									</div>';
								else
									echo '<div class="box">
									<img src="images/p3.jpg" class="img-responsive" alt="img" title="img" />
									<p>Introduction to Mobile Application Develop..</p>
									<span></span>
									</div>';
						?>				
					</div>
				</div>	
			</div>
		<!-- bread-crumb end here -->
		<div class="col-sm-9 col-xs-12 mainpage mp">
			<div class="col-sm-12 sort">
				<div class="col-md-6 col-sm-5">
					<h3>ALL COURSES</h3>
					<p>TOTAL 145 COURSES</p>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="form-group">
						<select id="input-sort" class="form-control selectpicker bs-select-hidden">
							<option value="" selected="selected">Select Categories</option>
							<option value="">1</option>
							<option value="">2</option>
							<option value="">3</option>
							<option value="">4</option>
							<option value="">5</option>
						</select>
					</div>
				</div>
				<div class="col-md-2 col-sm-3 list hidden-xs">
					<div class="btn-group btn-group-sm">
						<button type="button" id="grid-view" class="btn btn-default btngrid" data-toggle="tooltip" title="Grid"><i class="fa fa-th-large" aria-hidden="true"></i></button>
						<button  type="button" id="list-view" class="btn btn-default btngrid" data-toggle="tooltip" title="List"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>
			<div class="row">
				<?php $i; foreach ($courses as $key => $cours) { ?>
					<div class="product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="product-thumb">
							<div class="image">
								<?php 
									if($i % 3 == 0 OR $i % 2 == 0)
										echo '<a href="index.php?p=cours">
										<img src="images/1.jpg" class="img-responsive" alt="img" title="img" />
										</a>';
									else
										echo '<a href="index.php?p=cours">
										<img src="images/student.jpg" class="img-responsive" alt="img" title="img" />
										</a>';
									$i++;
								?>
								
							</div>
							<div class="caption">
								<h3><?php echo $cours->nom ?> <span class="badge pull-right"><?php echo $cours->annee.' annee'?></span></h3>
								<h4><?php echo $cours->faculte; ?></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ipsum malesuada arcu tristique, sit amet fringilla metus volutpat.</p>
								<ul class="list-inline">
									<li>
										<a href="#"><i class="icofont icofont-ui-user"></i>15</a>
									</li>
									<li>
										<a href="#"><i class="icofont icofont-comment"></i>10</a>
									</li>
									<li>
										<a href="index.php?p=cours&id="><i class="icofont icofont-folder-open"></i><?php echo substr($cours->nom, 0, 5); ?></a>
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
				<?php } ?>
			</div>
		</div>		
	</div>
</div>
</div>