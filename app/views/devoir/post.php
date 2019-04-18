<div class="panel-group" id="accordion">
    <div class="panel panel-default card1">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#Search10"><span class="glyphicon glyphicon-plus"> Devoir</span></a>
            </h4>
        </div>
        <div id="Search10" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="col-md-6">
                    <ul class="list-goup">
                        <?php foreach ($data as $key => $list) { ?>
                            <li class="list-group-item"><?php echo explode('.', $list->titre)[0]; ?>
                                <em><a href="<?php echo $list->dossier.'/'.$list->titre ?>" class="pull-right">Telecharger...</a></em>
                            </li>
                        <?php } ?>
                    </ul>                        
                </div>
            </div>
        </div>
    </div>
</div>