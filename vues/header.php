<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>GameXchange - Jeux Vidéos d'occasion</title>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.html"></a>
        <a href="index.html"><img src="images/logo.png" height="60" class="logo" title="GameXchange" alt="GameXchange Logo"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#btn-navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="btn-navbar">
            <ul class="navbar-nav">
                <li class="nav-item pr-4">
                    <form class="form-inline m-0">
                        <input class="form-control mr-1" type="text" placeholder="Chercher pour jeux">
                        <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
            </ul>
            <a id="btn-login" class="btn navbar-btn text-white btn-secondary">
                <i class="far fa-user-circle"></i> Se connecter</a>
        </div>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="modal-login" role="dialog">
    <div class="modal-dialog">
        <!-- Contenu du formulaire MODAL de connexion d'utilisateur-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <h4><i class="fas fa-sign-in-alt"></i> Se connecter</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="usrname" placeholder="Courriel">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="psw" placeholder="Mot de passe">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" checked> Se souvenir de moi</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt"></i> Se connecter</button>
                    <div class="pt-2">
                        Mot de passe <a class="font-weight-bold" href="#">oublié?</a>
                    </div>
                </form>
            </div>
            <!-- Footer du modal -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default float-right" data-dismiss="modal"><i class="fas fa-times"></i> Canceller</button>
            </div>
        </div>
    </div>
</div>