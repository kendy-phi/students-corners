<div class="panel-group" id="accordion">
    <div class="panel panel-default card1">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#Search"><span class="glyphicon glyphicon-plus"></span> Modifier mot de passe</a>
            </h4>
        </div>
        <div id="Search" class="panel-collapse collapse in">
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" >
                    <legend class="text-center">Changer le mot de passe</legend>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Nouveau mot de passe</label>               
                        <div class="col-sm-8">
                            <input type="password" name="new" class="form-control" id="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Confirme mot de passe</label>               
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="email" required>
                        </div>
                    </div>


                     <div class="form-group">                                    
                        <div class="col-sm-offset-3 col-sm-8">
                            <input type="hidden" name="action" value="updatePassword">
                            <input type="hidden" name="option" value="updatePassword">
                            <input type="submit" value="Envoyer" class="form-control btn-success" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

    
    if(!empty($_POST['action']) AND $_POST['action'] == 'updatePassword'){

        $password = new \App\Controller\UserController();

        $password->updatePassword($_POST);

    }

?>