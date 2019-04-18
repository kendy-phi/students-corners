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
                            <input type="hidden" name="option" value="liste" />
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
    <?php foreach ($courses as $key => $value) { ?>
        <div class="panel panel-default card">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#cours<?php echo $value->id; ?>"><span class="glyphicon glyphicon-plus"></span> Modifier <?php echo $value->nom; ?></a>
                </h4>
            </div>
            <div id="cours<?php echo $value->id; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <!-- Creations des different cours -->
                    <div class="col-md-12 panel panel-warning">
                        <form class="form-horizontal" action="" method="post" >
                            <legend class="text-center">mise a jour du cour</legend>
                             <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Faculter:</label>                     
                                <div class="col-sm-8">                                              
                                    <input type="text" name="faculter" placeholder="Entrez le nom du fichier" class="form-control" id="email" value="<?php echo (!empty($_POST['faculte']) ? $_POST['faculte'] : 'Aucune faculter n\'est selectioner'); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Nom fichier:</label>                      
                                <div class="col-sm-8">
                                    <input type="text" name="folder" placeholder="Entrez le nom du fichier" class="form-control" id="email" value="<?php echo (!empty($value->nom) ? $value->nom : 'Aucune faculter n\'est selectioner'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="annee">Annee...</label>                      
                                <div class="col-sm-8">
                                    <select class="form-control" name="duree" id="annee">
                                        <?php
                                            for($i = 1; $i < 6; $i++ )
                                                if($i == $value->annee)
                                                    echo '<option value="'.$i.'" selected="true">'.$i.' annee</option>';
                                                else
                                                    echo '<option value="'.$i.'">'.$i.' annee</option>';
                                         ?>                  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">                                    
                                <div class="col-sm-offset-3 col-sm-8">
                                    <input type="hidden" name="action" value="creerCours"/>
                                    <input type="hidden" name="facId" value="<?php echo (!empty($_POST['indice']) ? $_POST['indice'] : (0)); ?>"/>
                                    <input type="hidden" name="option" value="liste" />
                                    <input type="submit" value="Envoyer" class="form-control btn-warning" />
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php } ?>
</div>