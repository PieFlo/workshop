<?php
session_start();
include_once('header.html');
include_once('functions.php'); // Permet de se connecter à la base de données.

if(isset($_SESSION['email'])){
    if(isset($_SERVER['HTTP_REFERER'])){
        If ($_SERVER['HTTP_REFERER'] == "http://".$_SERVER['HTTP_HOST'].$_SERVER['CONTEXT_PREFIX']."/index.php"
            || $_SERVER['HTTP_REFERER'] == "http://".$_SERVER['HTTP_HOST'].$_SERVER['CONTEXT_PREFIX']) {
            echo "<div class=\"alert alert-success\">Bienvenue ".$_SESSION['nom']." !</div>";
        }
    }
if(isset ($_SESSION['mot'])){
    $_SESSION['nbrErreur']=[];
    $_SESSION['mot'] = [];
    $_SESSION['tentatives'] = [];
    $_SESSION['definition'] =[];
    $_SESSION['trouvee'] =[];
}
?>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Panel</h4>
                <br>
                <a href="pendu.php" class="card-link">Jouer</a><br><br>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profil</h4>
                <a href="updateClient.php" class="card-link">Modifier ses informations</a><br>
                <a href="updateClientMdp.php" class="card-link">Modifier son mot de passe</a><br>
                <?php       if ($_SESSION['admin']==true) { ?>
                    <a href="listeClient.php" class="card-link">Liste des clients</a><br>
                <?php       } ?>
                <a data-toggle="modal" href="#unregister" class="button">Se désinscrire</a>
                <div class="modal fade" id="unregister" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Désinscription</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <?php       if ($_SESSION['admin']==false) { ?>
                                <p>Êtes-vous sûr de vouloir vous désinscrire ?</p>
                            </div>
                            <?php       } else { echo "<p>L'administrateur ne peut pas se désinscrire</p>";} ?>
                            <div class="modal-footer">
                                <?php       if ($_SESSION['admin']==false) { ?>
                                    <a href="unregister.php" class="card-link"><button type="button" class="btn btn-danger">Oui</button></a>
                                <?php       } ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <?php if ($_SESSION['admin']==false) echo "Non"; else echo "Fermer";?></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php

}else{
	header('Location:logout.php'); // permet de ne pas pouvoir acceder à la page directement en modifiant l'URL. Il faut obligatoirement s'inscrire.
}
//displayVar();
include_once('footer.html');
?>
