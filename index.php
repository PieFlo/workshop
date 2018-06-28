<?php
session_start();
if (!empty($_SESSION)){
    header('Location:panel.php');
}else session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <title>Accueil - Workshop</title>

</head>
<body>

<!-- NaveBar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/icon.png" width="35" height="35" class="d-inline-block align-top" alt="">
            Pendu à l'informatique
        </a>

            <form class="form-inline">

                <button type="button" class="btn btn-outline-info my-2 my-sm-0" data-toggle="modal" data-target="#login">Connexion
                </button>&nbsp
                <button type="button" class="btn btn-outline-info my-2 my-sm-0" data-toggle="modal" data-target="#register">Inscription
                </button>

            </form>

    </div>
</nav>

<!-- Modal inscription-->
<div id="register" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="register.php" onsubmit="return identicalPassword(this);" class="form-horizontal">
            <div class="modal-header">
                <h4 class="modal-title">Inscription</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="inputNom" class="control-label col-xs-4">Nom d'utlisateur</label>
                        <div class="col-xs-5">
                            <input type="text" id="inputNom" name="nom" placeholder="xXxDarkSasuke74xXx" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-xs-4">Email</label>
                        <div class="col-xs-5">
                            <input type="text" id="inputEmail" name="email" placeholder="darksasuke74@gmail.com"
                                   class="form-control" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label col-xs-4">Mot de passe</label>
                        <div class="col-xs-5">
                            <input type="password" id="inputPassword" name="password" placeholder="********"
                                   class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputRepeatPassword" class="control-label col-xs-4">Confirmation du mot de
                            passe</label>
                        <div class="col-xs-5">
                            <input type="password" id="inputRepeatPassword" name="repeatpassword" placeholder="********"
                                   class="form-control" required><br>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <label for="inputInscription" class="control-label col-xs-4"></label>
                <input type="submit" id="inputInscription" value="S'inscrire" class="btn btn-primary"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
            </form>
        </div>

    </div>
</div>
<!-- Modal connexion-->
<div id="login" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="login.php" class="form-horizontal">
            <div class="modal-header">
                <h4 class="modal-title">Connexion</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="inputCoEmail" class="control-label col-xs-4">Email</label>
                        <div class="col-xs-5">
                            <input type="text" id="inputCoEmail" name="email" placeholder="john.doe@gmail.com"
                                   class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCoPassword" class="control-label col-xs-4">Mot de passe</label>
                        <div class="col-xs-5">
                            <input type="password" id="inputCoPassword" name="password" placeholder="********"
                                   class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <label for="inputConnexion" class="control-label col-xs-4"></label>
                <input type="submit" id="inputConnexion" value="Se connecter" class="btn btn-primary"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
            </form>
        </div>

    </div>
</div>
<!-- Corps de la page -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Apprendre l'informatique en s'amusant !</h1>
        <p class="lead">Site dédié à l'apprentissage du vocabulaire informatique grâce au célèbre jeu du pendu.<br>
        Inscrivez vous dès maintenant pour jouer !</p>
    </div>
</div>

<img src="images/bonhomme-pendu.jpg" alt="Hôtel Neptune" class="rounded-circle mx-auto d-block" width="904" height="636"/>
<br>
<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Apprendre l'informatique</h2>
            <p class="lead">Apprendre le vocabulaire de l'informatique et de la programmation à l'aide de notre principe.</p>
            <!--<p><a class="btn btn-default" href="#" role="button">Voir Plus De Détails &raquo;</a></p>-->
        </div>
        <div class="col-md-4">
            <h2>S'amuser avec l'informatique</h2>
            <p class="lead">Pour permettre cette apprentissage, venez vous amuser grâce à notre mini-jeu afin de découvrir les mots qui se cache dans celui-ci.</p>
            <!--<p><a class="btn btn-default" href="#" role="button">Voir Plus De Détails &raquo;</a></p>-->
        </div>
        <div class="col-md-4">
            <h2>Le populaire jeu du pendu</h2>
            <p class="lead">Pour ce faire nous avons repris le jeu du pendu qui est un bon moyen afin de mémoriser des mots. Qui sont ici accompagner par une définition afin de guider l'utilisateur dans sa recherche.</p>
            <!--<p><a class="btn btn-default" href="#" role="button">Voir Plus De Détails &raquo;</a></p>-->
        </div>
    </div>
    <hr>

    <footer>
        <p>&copy; 2018 Workshop 2 B2</p>
    </footer>
</div>
<!--<script src="bootstrap-4.0.0/js/tests/vendor/jquery-1.9.1.min.js"></script>
<script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
--><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
    function identicalPassword(form){
        if(form.password.value != form.repeatpassword.value){
            alert("Les mots de passe ne correspondent pas. Veuillez réessayer.");
            return false;
        } else return true;
    }
</script>
</body>

</html>