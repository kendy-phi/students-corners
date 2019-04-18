<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <!-- Bootstrap stylesheet -->
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- font -->
        <link href="assets/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
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

         <link rel="icon" href="images/ico.png">

         <script src="assets/js/jquery.2.1.1.min.js" type="text/javascript"></script>
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--top end here -->
        <div class="man">
            <?php echo $content; ?>    
        </div>
        <!-- footer start here -->
        <footer>
            <div class="container">
                <div class="col-sm-offset-1 col-sm-8 text-right">
                    <p style="color: white;">La bibliotheque en ligne © 2018 <a href="http://207.246.123.38/~kendy/">creation de Philibert Kendy</a>, Tout droit etre reserve</p>
                </div>
            </div>
        </footer>
        <!-- footer end here -->

        <!-- jquery -->
        <script src="assets/js/jquery.2.1.1.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!--bootstrap select-->
        <script src="assets/js/dist/js/bootstrap-select.js" type="text/javascript"></script>
        <!-- owlcarousel js -->
        <script src="assets/js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
        <!--internal js-->
        <script src="assets/js/internal.js" type="text/javascript"></script>
    </body>
</html>