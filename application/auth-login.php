<?php
include "../functions/functions.php";
?>

<!doctype html>
<html lang="en">

    

<head>
        
        <meta charset="utf-8" />
        <title>Login | Minible - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index-2.html" class="mb-5 d-block auth-logo">
                                <img src="assets/images/logo-dark.png" alt="" height="22" class="logo logo-dark">
                                <img src="assets/images/logo-light.png" alt="" height="22" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Bienvenue !</h5>
                                    <p class="text-muted">Connectez-vous pour accéder au tableau de bord</p>
                                </div>
                                <div class="p-2 mt-4">
                                <?php admin_connexion(); ?>
                                    <form action="" method="post">
                                        
        
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Nom d'utilisateur</label>
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Votre nom d'utilisateur">
                                        </div>
                
                                        <div class="mb-3">
                                           
                                            <label class="form-label" for="userpassword">Mot de passe</label>
                                            <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Entrer votre mot de passe">
                                        </div>
                
                                       
                                        
                                        <div class="mt-3 text-end">
                                            <input type="submit" class="btn btn-primary w-sm waves-effect waves-light" name="connexion" value="Se connecter">
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>


                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>


</html>
