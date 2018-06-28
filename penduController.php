<?php

include("functions.php");

function main(){
    $start = getVar('start');
    if($start){
        // Démarrage d'un nouveau pendu
        $motObj = getRandomMot();
        $mot = str_split($motObj['mot'], 1);
        $definition = $motObj['definition'];
        session_start();
        $_SESSION = [];
        $_SESSION['nbrErreur']=0;
        $_SESSION['mot'] = $mot;
        $_SESSION['tentatives'] = [];
        $_SESSION['definition'] = $definition;
        $trouvee = [];
        for ($i=0; $i < sizeof($mot); $i++) { 
            $trouvee[$i] = '_';
        }
        $_SESSION['trouvee'] = $trouvee;
        header('Location: pendu.php');
        exit(1);
    }else{
        // On récupére les paramètres
        $mot = sessionVar('mot');
        $tentatives = sessionVar('tentatives');
        $trouvee = sessionVar('trouvee');
        if(is_bool($mot) || is_bool($trouvee)){
            // Le mot n'existe pas, on rappel la page avec 'start'
            //header('Location: penduController.php?start');
            exit(1);
        }
        $lettre = postVar('lettre');
        if(is_bool($lettre)){
            // Pas de lettre !!
            header('Location: pendu.php');
            exit(1);
        }
        $_SESSION['tentatives'][] = $lettre;
        $_SESSION['trouvee'] = checkLetter($mot, $lettre, $trouvee);
        if(isMotTrouvee($_SESSION['trouvee'])){
            header('Location: pendu.php?win'); 
        }else{
        header('Location: pendu.php');
        }
        if($_SESSION['nbrErreur'] == 10){
            header('Location: pendu.php?loose');
        }
        exit(0);
    }
}

function getRandomMot(){
    $id = rand(1, 21);
    $bdd = getDataBase();
    $mot = $bdd->prepare("SELECT mot, definition FROM definition WHERE id_definition=:id");
    $mot->execute(array('id'=>$id));
    return $mot->fetch();
}

function checkLetter($mot, $lettre, $trouvee){
    $found = false;
    for ($i=0; $i < sizeof($mot); $i++) { 
        if($mot[$i] == $lettre){
            $trouvee[$i] = $lettre;
            $found = true;
        }
    }
    if($found == false)
        $_SESSION['nbrErreur']++;
    return $trouvee;
}

function isMotTrouvee($trouvee){
    return in_array('_', $trouvee) === FALSE;
}

main();