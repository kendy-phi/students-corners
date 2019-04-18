<div class="section">       
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default card">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#profil" href="#profil" id="menu1"><span class="glyphicon glyphicon-folder-open">
                            <?php echo $user->pseudo ?> Profil</span></a>
                        </h4>
                    </div>
                    <div id="profil" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <?php
                                                                        
                                    echo $user->getUserProfil();
                                    
                                    echo $user->updateUserProfil();
                                   
                                    echo $user->updateUserPassword();
                                    
                                    echo $user->deleteUserProfil();

                                ?>                 
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default card">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="menu1"><span class="glyphicon glyphicon-folder-open">
                            <?php isset($faculte->nom) ? $faculte->nom : '' ?></span></a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="index.php?p=compte&cours=true"><span class="glyphicon glyphicon-pencil text-primary"/> Documents</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="index.php?p=devoirs&devoirs=true"><span class="glyphicon glyphicon-flash text-primary" /> Devior </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="index.php?deco=deco_user"><span class="glyphicon glyphicon-file text-info" />  Login out</a>
                                    </td>
                                </tr>                               
                            </table>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title text-center">Tableau de board</h4>
                </div>
                <?php
                    
                    if(!empty($_GET['cours']) AND $_GET['cours'] === 'true')
                        require 'cour.php';

                    if(!empty($_GET['devoir']) AND $_GET['devoir'] === 'true')
                        require '../app/views/devoir/index.php';
                    
                    if(!empty($_GET['devoirs']) AND $_GET['devoirs'] === 'true')
                        require '../app/views/devoir/post.php';

                    
                    if(!empty($_POST['option']) AND $_POST['option'] == 'profil'){
                        
                        require 'profil.php';

                    }elseif(!empty($_POST['option']) AND $_POST['option'] == 'updateProfil'){

                        require 'updateProfil.php';

                    }elseif(!empty($_POST['option']) AND $_POST['option'] == 'updatePassword'){

                        require 'updatePassword.php';

                    }elseif(!empty($_POST['option']) AND $_POST['option'] == 'deleteProfil'){

                        require 'deleteProfil.php';

                    }


                    if(!empty($_GET['option']) AND $_GET['option'] == 'profil'){
                        
                        require 'profil.php';

                    }


                ?>
            </div>
        </div>
    </div>
</div>

