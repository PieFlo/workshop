<?php
function getDataBase()
{
    $host = "mysql.montpellier.epsi.fr";
    $dbName = "Pendu_Workshop";
    $login = "tanguy.orgiazzi";
    $password = "password";

    try{
        $bdd = new PDO('mysql:host='.$host.';port=5206;dbname='.$dbName.';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    catch (Exception $e){
        $bdd = null;
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}

function displayVar(){
    echo '<pre>';
    print_r($GLOBALS);
    echo '</pre>';
}

?>