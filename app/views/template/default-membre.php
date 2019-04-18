<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Mirrored from ocsolutions.co.in/html/education/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 May 2018 19:29:22 GMT -->
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title; ?></title>
<!-- Bootstrap stylesheet -->
<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
<!-- icofont -->
<link href="assets/icofont/css/icofont.css" rel="stylesheet" type="text/css" />
<!-- font-awesome -->
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- crousel css -->
<link href="assets/js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
<!--bootstrap select-->
<link href="assets/js/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<!-- stylesheet -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>

<link href="assets/css/costum.css" rel="stylesheet" type="text/css"/>

<script src="assets/js/jquery.2.1.1.min.js" type="text/javascript"></script>
 <link rel="icon" href="images/ico.png">
</head>
<body>
<!--top start here -->
<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <ul class="list-inline pull-left icon">
                    <li>
                        <a href="index.php?p=aide"><i class="icofont icofont-exclamation-circle"></i>Centre d'aide</a>
                    </li>
                    <li>
                        <a href="index.php?p=fac"><i class="icofont icofont-support-faq"></i>faq</a>
                    </li>
                    <li>
                        <!--language code start here-->
                        <form  method="post" enctype="multipart/form-data" id="language">
                            <div class="btn-group">
                                <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                    <span class="text"><i class="icofont icofont-globe"></i> Lang : Francais</span> <i class="icofont icofont-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="#"><img src="images/flag.jpg" alt="english" title="english" /> English</a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                        <!--language code end here-->
                    </li>
                </ul>
                <ul class="list-inline pull-right icon">
                    <li>
                        <a href="index.php?p=admin"><i class="icofont icofont-user"></i>Admin</a>
                    </li>
                    <li>
                        <a href="index.php?p=home&deco=deco_user"><i class="icofont icofont-key"></i>deconn</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--top end here -->

<!-- header start here-->
<!-- header start here-->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div id="logo">
                    <a href="index.php">
                        <img class="" src="assets/images/logo.png" alt="logo" title="logo" height="100px;" width="197px;" />
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <!-- menu start here -->
                <div id="menu"> 
                    <nav class="navbar">
                        <div class="navbar-header">
                            <span class="menutext visible-xs">Menu</span>
                            <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="btn btn-navbar navbar-toggle" type="button">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse padd0">
                            <ul class="nav navbar-nav text-right">
                                <li>
                                    <a href="index.php?p=home">Acceuil</a>
                                </li>                                
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Espace etudiant</a>
                                    <div class="dropdown-menu repeating">
                                        <div class="dropdown-inner">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="index.php?p=compte&cours=true">Documents</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?p=devoirs&devoirs=true">Devoir</a>                                                                           
                                                </li>       
                                                <li>
                                                    <a href="index.php?deco=deco_user">Deconnexion</a>                                                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Bibliotheque</a>
                                    <div class="dropdown-menu repeating">
                                        <div class="dropdown-inner">
                                            <ul class="list-unstyled">
                                                <?php 
                                                
                                                    foreach ($facultes as $key => $faculte)
                                                       echo $faculte->getCoursUrl();
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Espace professeur</a>
                                    <div class="dropdown-menu repeating">
                                        <div class="dropdown-inner">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="index.php?p=prof">Liste des professeurs</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?p=devoir">Reception des devoirs</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- menu end here -->
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <ul class="list-inline icon pull-right">
                    <li>
                        <form class="form-horizontal" method="post" id="srch">
                            <fieldset>
                                <div class="form-group">
                                    <input name="recherche" value="" class="form-control" placeholder="Search" type="text">
                                </div>
                                <button type="submit" value="submit" class="btn">
                                    <i class="icofont icofont-search"></i>
                                </button>
                            </fieldset>
                        </form>
                    </li>
                </ul>
            </div>
            <hr>
        </div>
    </div>
</header><!-- header end here -->

<!-- header end here -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-4">
            <div class="text-center"> 
                <?php if(!empty($erreur)) { ?>
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Erreur!! </strong><?php echo $erreur; ?>
                    </div>
                    <?php
                } else if(!empty($success)) { ?>
                     <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success!!</strong> <?php echo $success; ?>
                    </div>
                <?php } ?>
            </div>
            
           
        </div>        
    </div>
  <?php echo $content;?>
</div>
  
<!-- footer start here -->
<footer>
    <div class="container">
        <div class="row inner">
            <div class="col-sm-3 links1">
                <h5>Zone etudiant(e)s</h5>
                <hr>
                <ul class="list-unstyled">
                    <li>
                        <a href="index.php?p=compte&cours=true"><i class="fa fa-link"></i>Telecharger documents</a>
                    </li>
                    <li>
                        <a href="index.php?p=compte&option=profil"><i class="fa fa-link"></i>Profil</a>
                    </li>
                    <li>
                        <a href="index.php?p=compte*devoirs=true"><i class="fa fa-link"></i>Remettre un devoir</a>
                    </li> 
                    <li>
                        <a href="index.php?p=bibliotheque"><i class="fa fa-link"></i>Consulter</a>
                    </li> 
                    <li>
                        <a href="http://207.246.123.38/~kendy/"><i class="fa fa-link"></i>Fac</a>
                    </li>
                    <li>
                        <a href="http://207.246.123.38/~kendy/"><i class="fa fa-link"></i>Discution</a>
                    </li>
                </ul>
            </div>
            
            <div class="col-sm-3 links1">
                <h5>Racoursi</h5>
                <hr>
                <ul class="list-unstyled">
                    <li>
                        <a href="index.php?p=compte&option=profil"><i class="fa fa-link"></i>Identification</a>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-link"></i>Acceuil</a>
                    </li>
                    <li>
                        <a href="index.php?p=bibliotheque"><i class="fa fa-link"></i>Cours</a>
                    </li>
                    <li>
                        <a href="index.php?p=compte"><i class="fa fa-link"></i>Compte</a>
                    </li>
                    <li>
                        <a href="http://207.246.123.38/~kendy/"><i class="fa fa-link"></i>Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 links2">
                <h5>Faculte ....</h5>
                <hr>
                <ul class="list-unstyled">
                    <li class="box" style="margin-top: 5px;">
                        <img src="images/c1.png" class="img-responsive" alt="image" title="image" width="40px" height="40px" />
                        <p>Sciences et Technologie</p>
                    </li>
                    <li class="box" style="margin-top: 5px;">
                        <img src="images/c2.png" class="img-responsive" alt="image" title="image" width="40px" height="40px"/>
                        <p>Administration</p>
                    </li>
                    <li class="box" style="margin-top: 5px;">
                        <img src="images/c3.png" class="img-responsive" alt="image" title="image" width="40px" height="40px"/>
                        <p>Management des affaires</p>
                    </li>
                    <!-- <li class="box" style="margin-top: 5px;">
                        <img src="images/c3.png" class="img-responsive" alt="image" title="image" width="40px" height="40px"/>
                        <p>Gouvernance</p>
                    </li> -->
                </ul>
            </div>
            <div class="col-sm-3 links2">
                <h5>contactez nous</h5>
                <hr>
                <p class="des1">Vous pouvez nous contactez apartir des informations suivantes</p>
                <ul class="list-unstyled contact">
                    <li>
                        <i class="icofont icofont-home"></i> Address : Route Nationale # 7, Chateau, Jeremie, Haiti (WI)
                    </li>
                    <li>
                        <i class="icofont icofont-phone"></i>Phone: (509) 2270-5989 / (509) 2270-5534<br>
                    </li>
                    <li>
                        <i class="icofont icofont-globe"></i> <a href="#">E-mail: rectoratUPGA@yahoo.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="social">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-inline">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank"><i class="icofont icofont-social-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/" target="_blank"><i class="icofont icofont-social-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/" target="_blank"><i class="icofont icofont-social-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank"><i class="icofont icofont-social-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/uas/login" target="_blank"><i class="icofont icofont-social-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="https://in.pinterest.com/" target="_blank"><i class="icofont icofont-social-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="https://www.skype.com/en/" target="_blank"><i class="icofont icofont-social-skype"></i></a>
                        </li>
                        <li>
                            <a href="https://www.stumbleupon.com/" target="_blank"><i class="icofont icofont-social-stumbleupon"></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/" target="_blank"><i class="icofont icofont-social-youtube"></i></a>
                        </li>
                        <li>
                            <a href="https://www.tumblr.com/" target="_blank"><i class="icofont icofont-social-tumblr"></i></a>
                        </li>
                        <li>
                            <a href="https://dribbble.com/" target="_blank"><i class="icofont icofont-social-dribbble"></i></a>
                        </li>
                        <li>
                            <a href="https://envato.com/" target="_blank"><i class="icofont icofont-social-envato"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="powered">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <ul class="list-inline">
                        <li>
                            <a href="index.php?p=home">Acceuil</a>
                        </li>
                        <li>
                            <a href="index.php?p=cours">Les cours</a>
                        </li>
                        <li>
                            <a href="http://207.246.123.38/~kendy/">Apropos du developpeur</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-7 text-right">
                    <p>La bibliotheque en ligne © 2018 <a href="http://207.246.123.38/~kendy/">creation de Philibert Kendy</a>, Tout droit etre reserve</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end here -->
<!-- jquery -->
<!-- bootstrap js -->
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--bootstrap select-->
<script src="assets/js/dist/js/bootstrap-select.js" type="text/javascript"></script>
<!-- owlcarousel js -->
<script src="assets/js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<!--internal js-->
<script src="assets/js/internal.js" type="text/javascript"></script>
</body>

<!-- Mirrored from ocsolutions.co.in/html/education/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 May 2018 19:32:23 GMT -->
</html>