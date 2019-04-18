<?php
    
    $data = new \App\Controller\UserController();

    extract($data->document());

?>
<div class="panel-group" id="accordion">
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
                                <input type="text" name="faculte"    value="<?php echo (!empty($user) ? $faculte->nom : 'Aucune faculter n\'est selectioner'); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4">
                                <select class="selectpicker form-control" name= "annee" readonly>
                                    <option value="<?php echo $user->annee_en_cours ?>"><?php echo $user->annee_en_cours ?> anee</option>                                   
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="hidden" name="faculter_id" value="<?php echo (!empty($user) ? $user->faculte_id : (1)); ?>" />
                                <input type="hidden"  />
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
    <?php foreach ($courses as $key => $value) { 
        $lists = $document->findCoursById($value->id);
        ?>
    <div class="panel panel-default card">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#cours<?php echo $value->id; ?>"><span class="glyphicon glyphicon-plus"> <?php echo $value->nom; ?> </span></a>
            </h4>
        </div>
        <div id="cours<?php echo $value->id; ?>" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="list-goup">
                    <?php foreach ($lists as $key => $list) { ?>
                        <li class="list-group-item"><?php echo $list['titre']; ?>
                            <a href="<?php echo $list['lien']; ?>" class="pull-right">Telecharger...</a>
                        </li>
                    <?php } ?>
                </ul>
                <?php foreach ($lists as $key => $list) {
                    if ($value->nom == $list['titre']) {
                       echo '<p>Pout telecharger l\'ensemble de ces cours dans un seul ficher zip cliquez sur ce lien stp <a href="'.$list['lien'].'" target="_blank">Telecharger le tout</a></p>';
                    }
                        /*<a href="<?php echo $list['lien']; ?>" class="pull-right">Telecharger...</a>*/
                } ?>
                
            </div>
        </div>
    </div>
    <?php } ?>
</div>
