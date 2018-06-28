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
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Saisir lettre :</h4>

                <?php
                if(getVar('win') || getVar('loose')){
                        if(getVar('win')){
                            echo '<img src="images/win.jpg">';
                        } else if ($_SESSION['nbrErreur']== 10) {
                            echo '<img src="images/lose.jpg">';
                        }
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
            <div class="col-md-6">
                <?php echo "Erreurs : ". $_SESSION['nbrErreur'];
                echo "<br/>"."Nombre de tentatives : ". sizeof($_SESSION['tentatives'])."<br/>";

                switch ($_SESSION['nbrErreur']) {
                    case 1:
                        echo "<img src='images/Pendu0.PNG'>";
                        break;
                    case 2:
                        echo "<img src='images/Pendu1.PNG'>";
                        break;
                    case 3:
                        echo "<img src='images/Pendu2.PNG'>";
                        break;
                    case 4:
                        echo "<img src='images/Pendu3.PNG'>";
                        break;
                    case 5:
                        echo "<img src='images/Pendu4.PNG'>";
                        break;
                    case 6:
                        echo "<img src='images/Pendu5.PNG'>";
                        break;
                    case 7:
                        echo "<img src='images/Pendu6.PNG'>";
                        break;
                    case 8:
                        echo "<img src='images/Pendu7.PNG'>";
                        break;
                    case 9:
                        echo "<img src='images/Pendu8.PNG'>";
                        break;
                    case 10:
                        echo "<img src='images/Pendu9.PNG'>";
                        break;
                }
                ?>

            </div>
        </div>
    </div>
</div>

<?php
displayVar();
include_once 'footer.html';
?>