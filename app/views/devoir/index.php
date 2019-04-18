<div class="panel-group" id="accordion">
	<?php $i= 0; foreach ($facultes as $key => $value) { ?>
	    <div class="panel panel-default card">
	    	 <div class="panel-heading">
	            <h4 class="panel-title">
	                <a data-toggle="collapse" data-parent="#accordion" href="#cours<?php echo $value->id; ?>"><span class="glyphicon glyphicon-plus"><strong> <?php echo strtoupper($value->nom); ?></strong></span></a>
	            </h4>
	        </div>
	        <div id="cours<?php echo $value->id; ?>" class="panel-collapse collapse">
	            <div class="panel-body">
	                <!-- Creations des different cours -->
					<div class="col-md-12 panel panel-warning">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
							<legend class="text-center">Depose devoir</legend>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Faculter:</label>			
								<div class="col-sm-8">										      
									<input type="text" name="faculter" placeholder="Entrez le nom du fichier" class="form-control" id="email" value="<?php echo (!empty($value->nom) ? $value->nom : 'Aucune faculter n\'est selectioner'); ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Cours:</label>			
								<div class="col-sm-8">
									<select class="form-control" id="email" name="path">
										<?php
										
										$data = $cours->getCoursByFacId($value->id);
											foreach ($data as $key => $option) { ?>
											<option value="<?php echo $option->dossier; ?>"><?php echo $option->nom.' '.$option->annee; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="annee">document</label>						
								<div class="col-sm-8">
									<div class="input-group">
						                <label class="input-group-btn">
						                    <span class="btn btn-default"><span class="glyphicon glyphicon-folder-open"></span>
						                        Browse&hellip; <input type="file" name="devoir" style="display: none;" multiple>
						                    </span>
						                </label>
						                <input type="text" class="form-control" name="titre" readonly>
						            </div>
								</div>
							</div>
							<div class="form-group">									
								<div class="col-sm-offset-3 col-sm-8">									
									<input type="hidden" name="fac_id" value="<?php echo $value->id; ?>" />
									<input type="hidden" name="option" value="update" />
									<input type="hidden" name="upload" value="devoir" />
									<input type="submit" value="Envoyer" class="form-control btn-warning" id="send" />
								</div>
							</div>
						</form>
					</div>

	            </div>
	        </div>
	    </div>
    <?php }  ?>
</div>

<script type="text/javascript">
	
	$(function() {

		// We can attach the `fileselect` event to all file inputs on the page
		$(document).on('change', ':file', function() {
		    var input = $(this),
		    numFiles = input.get(0).files ? input.get(0).files.length : 1,
		    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		    input.trigger('fileselect', [numFiles, label]);
		    var col = input.parent();
		    col.removeClass('btn-default');
		    col.addClass('btn-success');
		    $('col span').removeClass('glyphicon-folder-close');
		    $('col span').addClass('glyphicon-folder-open');
		});

		// We can watch for our custom `fileselect` event like this
		$(document).ready( function() {
		    $(':file').on('fileselect', function(event, numFiles, label) {
		        var input = $(this).parents('.input-group').find(':text'),
		              log = numFiles > 1 ? numFiles + ' files selected' : label;

		        if( input.length ) {
		            input.val(log);
		        } else {
		            if( log ) alert(log);
		        }

		    });

		});

	});

</script>

<?php 

	if(!empty($_POST['upload']) AND $_POST['upload'] === 'devoir')
		if(!empty($_FILES))
			$devoir->loadDevoir($_POST, $_FILES);

	
?>