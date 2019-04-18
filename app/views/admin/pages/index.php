<div class="row">
	<div class="col-md-12">
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-group" id="accordion">
						<?php 
							foreach ($facultes as $key => $fac) { ?>							
							    <div class="panel panel-default">
							        <div class="panel-heading">
							            <h4 class="panel-title">
							                <a data-toggle="collapse" data-parent="#accordion" href=" #<?php echo $fac->id; ?>" class="text-primary" id="menu1"><span class="glyphicon glyphicon-folder-open">
							                 <?php echo strtoupper($fac->nom); ?></span></a>
							            </h4>
							        </div>
							        <div id="<?php echo $fac->id; ?>" class="panel-collapse collapse">
							            <div class="panel-body">
							                <table class="table" style="margin-bottom: 0px;">
							                	<?php 
							                		echo '<tr> <td> '.$fac->getUrlCreate().'</td></tr> ';
							                		echo '<tr> <td> '.$fac->getUrlList().'</td></tr> ';
							                		echo '<tr> <td> '.$fac->getUrlUpload().'</td></tr> ';
							                		echo '<tr> <td> '.$fac->getUrlDelete().'</td></tr> ';           
							                	?>
							                </table>
							            </div>
							        </div>
							    </div>
					    <?php } ?>
					</div>					
				</div>
			</div>			
		</div>
		<div class="col-md-9">
			<?php 
				
				if(!empty($_POST['option']))
					$req = htmlspecialchars($_POST['option']);
				else
					$req = 'fac';
				
				$document = new \App\Controller\Admin\PostController();
				
				switch ($req) {
					case 'fac':
						# code...
						require 'form_faculte.php';
						break;
					case 'cours':
						# code...
						require 'form_cours.php';
						break;
					case 'liste':
						# code...
						extract($document->loadDocument((!empty($_POST) ? $_POST : null)));
						require 'liste.php';
						break;	
					case 'upload':
						# code...
						extract($document->loadDocument((!empty($_POST) ? $_POST : null)));
						require 'documents.php';
						break;
					case 'document':
						require 'document.php';
						# code...
						break;		
					default:
						# code...
						require '../app/views/404.php';

						break;
				}

			 ?>			
		</div>
	</div>
</div>