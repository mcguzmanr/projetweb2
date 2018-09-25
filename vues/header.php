<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    </head>
    <body>
        <header class="container-fluid"> 
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.php?Jeux&action=derniers">
                        <i class="fa d-inline fa-lg"></i>
                        <b>Game Logo</b>
                    </a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa d-inline fa-lg fa-user-circle-o"></i>
                        Se connecter
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form role="form" action="index.php?Membres&action=verificationLogin" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Se connecter</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-modal-body mx-sm-1 mx-md-3 mx-lg-5">
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <input type="text" name="courriel" class="form-control" id="courriel" placeholder="Courriel">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <input type="text" name="mot_de_passe" class="form-control" id="mot_de_passe" placeholder="Mot de passe">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                            <a href="#">Vous avez oublié votre mot de passe?</a>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="modal-footer">                                      
                                        <a href="#">S'inscrire</a>
                                        <button type="button" class="btn btn-primary">Se Connecter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main>
