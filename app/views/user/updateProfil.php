<div class="panel-group" id="accordion">
    <div class="panel panel-default card1">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#Search"><span class="glyphicon glyphicon-plus"></span> Mise a jour du profil</a>
            </h4>
        </div>
        <div id="Search" class="panel-collapse collapse in">
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" >
                    <legend class="text-center">Information</legend>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Nom</label>                       
                        <div class="col-sm-8">
                            <input type="text" name="nom" class="form-control" id="email" value="<?php echo (!empty($user->nom) ? ($user->nom) : 'Aucun nom n\'est enregistre'); ?>" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Prenom</label>                       
                        <div class="col-sm-8">
                            <input type="text" name="prenom" class="form-control" id="email" value="<?php echo (!empty($user->prenom) ? ($user->prenom) : 'Aucun prenom n\'est enregistre'); ?>" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Pseudo</label>                       
                        <div class="col-sm-8">
                            <input type="text" name="pseudo" class="form-control" id="email" value="<?php echo (!empty($user->pseudo) ? ($user->pseudo) : 'Aucun pseudo n\'est enregistre'); ?>" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Email</label>                       
                        <div class="col-sm-8">
                            <input type="text" name="email"  class="form-control" id="email" value="<?php echo (!empty($user->email) ? ($user->email) : 'Aucune adresse n\'est enregistre'); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Telephone</label>                       
                        <div class="col-sm-8">
                            <input type="text" name="telephone"  class="form-control" id="email" value="<?php echo (!empty($user->telephone) ? ($user->telephone) : 'Aucun numero n\'est enregistre'); ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">                                    
                        <div class="col-sm-offset-3 col-sm-8">
                            <input type="hidden" name="option" value="updateProfil">
                            <input type="hidden" name="action" value="updateProfil">
                            <input type="submit" value="Envoyer" class="form-control btn-success" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    
if(!empty($_POST['action']) AND $_POST['action'] == 'updateProfil'){
    
    $update = new \App\Controller\UserController();
    
    $update->update($_POST);

} 
