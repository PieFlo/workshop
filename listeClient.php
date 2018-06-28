<?php
session_start();
include_once ('header.html');
include('functions.php');
$bdd=getDataBase();
if($_SESSION['admin']=='1'){
    $query = $bdd->query("SELECT * FROM clients");
?>
    <h1 class="text-center">Liste des clients</h1><br>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th width="90"></th>
                <th class="text-center">Numéro</th>
                <th>Nom</th>
                <th>Email</th>
            </tr>
        </thead>
<?php   while ($donnees = $query->fetch()){     ?>
        <tr>
            <td>
                <a class="btn" href="delClient.php?id=<?=$donnees['numeroClient']?>" title="Supprimer le client">
                    <span><img src="images/trash.png" width="12" height="15"/></span>
                </a>
                <a href="updateClient.php?id=<?=$donnees['numeroClient']?>"><span><img src="images/pencil.png" width="15" height="15"/></span></a>
            </td>
            <td class="text-center"><?php echo $donnees['numeroClient'];?></td>
            <td><?php echo $donnees['nom'];?></td>
            <td><?php echo $donnees['email'];?></td>
        </tr>
<?php   }
        $query->closeCursor();?>

    </table>
<?php
}else{
    header('Location:panel.php');
}
include_once ('footer.html');
?>