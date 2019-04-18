<div class="panel panel-default card1">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#Search"><span class="glyphicon glyphicon-plus"> Recherche</span></a>
        </h4>
    </div>
    <div id="Search" class="panel-collapse collapse in">
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="">
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="col-sm-4">
                            <input type="text" name="faculte" value="<?php echo (!empty($_POST['faculte']) ? $_POST['faculte'] : 'Aucune faculter n\'est selectioner'); ?>" class="form-control" readonly>
                        </div>
                        <div class="col-sm-4">
                            <select class="selectpicker form-control" name= "annee">
                                <option value="1">1 anee</option>
                                <option value="2">2 anee</option>
                                <option value="3">3 anee</option>
                                <option value="4">4 anee</option>
                                <option value="5">5 anee</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                        	<input type="hidden" name="faculte_id" value="<?php echo (!empty($_POST['faculte_id']) ? $_POST['faculte_id'] : (1)); ?>" />
                        	<input type="hidden" name="option" value="update" />
                            <input name="s" class="form-control" value="" placeholder="Search Text" type="text">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-success" type="submit">Recherche</button>
                    </div>
                </div>
            </form>                
        </div>
    </div>
</div>

<div class="panel-group" id="accordion">
<?php $i= 0; foreach ($courses as $key => $value) { ?>
    <div class="panel panel-default card">
    	 <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#cours<?php echo $value->id; ?>"><span class="glyphicon glyphicon-plus"></span> Upload document pour <strong><?php echo $value->nom; ?></strong></a>
            </h4>
        </div>
        <div id="cours<?php echo $value->id; ?>" class="panel-collapse collapse">
            <div class="panel-body">
                <!-- Creations des different cours -->
				<div class="col-md-12 panel panel-warning">
					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
						<legend class="text-center">Telechargement des documents</legend>
						 <div class="form-group">
							<label class="control-label col-sm-3" for="email">Faculter:</label>						
							<div class="col-sm-8">									      
								<input type="text" name="faculter" placeholder="Entrez le nom du fichier" class="form-control" id="email" value="<?php echo (!empty($_POST['faculte']) ? $_POST['faculte'] : 'Aucune faculter n\'est selectioner'); ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="email">Nom fichier:</label>						
							<div class="col-sm-8">
								<input type="text" name="folder" placeholder="Entrez le nom du fichier" class="form-control" id="email" value="<?php echo $value->nom; ?>" required readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="annee">document</label>						
							<div class="col-sm-8">
								<div class="input-group">
					                <label class="input-group-btn">
					                    <span class="btn btn-default"><span class="glyphicon glyphicon-folder-open"></span>
					                        Browse&hellip; <input type="file" name="doc" style="display: none;" multiple>
					                    </span>
					                </label>
					                <input type="text" class="form-control" name="titre" readonly>
					            </div>
							</div>
						</div>
						<div class="form-group">									
							<div class="col-sm-offset-3 col-sm-8">
								<input type="hidden" name="chemin" value="<?php echo $value->dossier; ?>">
								<input type="hidden" name="aec" value="<?php echo $value->annee; ?>"/>
								<input type="hidden" name="cid" value="<?php echo $value->id; ?>">
								<input type="hidden" name="option" value="upload" />
								<input type="hidden" name="upload" value="true" />
								<input type="submit" value="Envoyer" class="form-control btn-warning" id="send" />
							</div>
						</div>
					</form>
				</div>

            </div>
        </div>
    </div>
<?php } ?>
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
	
	if(!empty($_POST['upload']) AND $_POST['upload'] == true){

		$uploads = new \App\Controller\Admin\PostController();

		$uploads->upload($_POST, $_FILES);

	}

?>