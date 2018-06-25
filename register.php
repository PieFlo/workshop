<?php
include_once('headerUnlogged.html');
include_once('functions.php');

if (isset($_POST) && count($_POST) > 0) { // Quand on presse le bouton 'submit' alors ...

    extract(array_map("htmlspecialchars", $_POST));
    $bdd = getDataBase();
    $query = $bdd->prepare("SELECT * FROM clients WHERE email=:email");
    $query->bindParam(':email', $email);
    $query->execute();
    $rows = $query->rowCount();
    if ($rows != 0) {
        echo "Cette adresse email est déjà utilisé.";
    } else {
        try {
            $stmt = $bdd->prepare("INSERT INTO clients(nom, email, password) VALUES (:nom, :email, :password)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $nbInsert = $stmt->execute();
        } catch (Exception $e) {
            $nbInsert = 0;
        }
        if ($nbInsert == 1) {
            echo "Votre inscription a bien été prise en compte, vous pouvez maintenant vous connecter.";
        } else {
            echo "Votre inscription a échoué, veuillez réessayer.";
        }
    }
} else {
    header('Location:index.php');
}
include_once('footer.html');
?>
