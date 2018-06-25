<?php
session_start();
include_once('header.html');
include_once('functions.php');
if (isset($_POST) && count($_POST) > 0) {
    extract(array_map("htmlspecialchars", $_POST));
    $bdd = getDataBase();
    try {
        $stmt = $bdd->prepare("UPDATE clients SET nom = :nom, email = :email WHERE numeroClient = :numeroClient");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':numeroClient', $numeroClient);
        $nbModifs = $stmt->execute();
    } catch (Exception $e) {
        $nbModifs = 0;
    }
    if ($nbModifs == 1) {
        if ($_SESSION['selfEdit']==true){
            $_SESSION['nom'] = $nom;
            $_SESSION['email']= $email;

            unset($_SESSION['selfEdit']);
        }
        echo "<div class=\"alert alert-success\">La mise à jour a réussie.</div>";
    } else {
        echo "<div class=\"alert alert-danger\">La mise à jour a échoués</div>";
    }
} else {
    $numeroClientToEdit = -1;
    if(isset($_GET) && count($_GET) > 0 && $_SESSION['admin']== true){
        $numeroClientToEdit = $_GET['id']; // si l'admin modifi un client
        $_SESSION['selfEdit'] = false;
    }else{
        $numeroClientToEdit = $_SESSION['numeroClient']; // quand un client modifi ses propres infos
        $_SESSION['selfEdit'] = true;
    }
    if ($numeroClientToEdit > 0){ // a-t-on bien le numéro d'un client ?

        $bdd = getDataBase();
        $query = $bdd->prepare("SELECT * FROM clients WHERE numeroClient=:numeroClientToEdit");
        $query->bindParam(':numeroClientToEdit', $numeroClientToEdit);
        $query->execute();

        $clients = $query->fetch(PDO::FETCH_OBJ);
        if (! $clients) {
            $numeroClientToEdit = -1;
        }
    }
    ?>
    <h1 class="text-center">Modifier les informations</h1><br>
    <form method="post" action="updateClient.php" class="form-horizontal">

        <div class="form-group">
                <input type="hidden" id="inputNumCli" name="numeroClient" class="form-control" value="<?php echo $clients->numeroClient?>">
        </div>
        <div class="form-group">
            <label for="inputNom" class="control-label col-xs-4">Nom</label>
            <div class="col-xs-5">
                <input type="text" id="inputNom" name="nom" class="form-control" value="<?php echo $clients->nom ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-4">Email</label>
            <div class="col-xs-5">
                <input type="text" id="inputEmail" name="email"
                       class="form-control" value="<?php echo $clients->email ?>" required>
            </div>
        </div>
        <label  class="control-label col-xs-4"></label>
        <input type="submit" value="Enregister" class="btn btn-primary"/>
    </form>
    <?php
}
include_once('footer.html');
?>


