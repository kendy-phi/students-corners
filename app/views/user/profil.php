<div class="panel-group" id="accordion">
    <div class="panel panel-default card1">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#Search"><span class="glyphicon glyphicon-plus"> Profil</span></a>
            </h4>
        </div>
        <div id="Search" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">Nom <em class="pull-right"><?php echo $user->nom; ?></em></li>
                        <li class="list-group-item">Prenom <em class="pull-right"><?php echo $user->prenom; ?></em></li>                    
                        <li class="list-group-item">Pseudo <em class="pull-right"><?php echo $user->pseudo; ?></em></li>                    
                        <li class="list-group-item">Email  <em class="pull-right"><?php echo $user->email;  ?></em></li>                    
                        <li class="list-group-item">Telephone  <em class="pull-right"><?php echo $user->telephone; ?></em></li>                    
                    </ul>                
                    
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">Type <em class="pull-right"><?php echo $user->toStringType(); ?></em></li>                    
                        <li class="list-group-item">Status <em class="pull-right"><?php echo $user->toStringStatus(); ?></em></li>                        
                        <li class="list-group-item">Faculte <em class="pull-right"><?php echo $faculte->nom; ?></em></li>                        
                        <li class="list-group-item">Annee <em class="pull-right"><?php echo $user->annee_en_cours; ?></em></li>                        
                        <li class="list-group-item">password <em class="pull-right"><?php echo substr($user->password, 0, 10); ?></em></li>                        
                    </ul>                    
                </div>

            </div>
        </div>
    </div>
</div>
