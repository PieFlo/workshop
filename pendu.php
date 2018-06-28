<?php
include_once 'header.html';
include_once 'functions.php'; // Permet de se connecter à la base de données.
?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Définition :</h4>
        <?php
            $definition = sessionVar('definition');
            if(is_bool($definition)){
                // Le jeu n'est pas démarré
                header('Location: penduController.php?start');
                exit(1);
            }
            echo $definition;
        ?>
    </div>
</div>
<br/>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Saisir lettre :</h4>
        <?php if(getVar('win') || getVar('loose')){
                echo getVar('win') ? 'Gagné !!' : 'Perdu !!';
                ?>
                <form action="penduController.php?start" method="post">
                    <input type="submit" value="Nouvelle partie"/>
                </form>
            <?php }else{?>
                <form action="penduController.php" method="post">
            <input type="text" name="lettre" maxlength="1" required/>
            <input type="submit" name="valider"/>
        </form>
           <?php } ?>
        <?php
            $trouvee = sessionVar('trouvee');
            if(is_bool($trouvee)){
                // Le jeu n'est pas démarré
                header('Location: penduController.php?start');
                exit(1);
            }
            echo implode(' ', $trouvee);
        ?>
    </div>
</div>

<?php
include_once 'footer.html';
?>