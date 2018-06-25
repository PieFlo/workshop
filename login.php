<?php
session_start();
include 'functions.php';
if(isset($_POST) && count($_POST) > 0){
    extract(array_map("htmlspecialchars", $_POST));

	$bdd = getDataBase();
	$login = $bdd->prepare("SELECT * FROM clients WHERE email=:email AND password=:password");
    $login->bindParam(':email', $email);
    $login->bindParam(':password', $password);
	$login->execute();
    $donnees = $login->fetch();

	if($donnees){
		$_SESSION = [
			'numeroClient' => $donnees['numeroClient'],
			'nom' => $donnees['nom'],
			'email'=> $donnees['email'],
			'password'=> $donnees['password'],
			'admin'=> $donnees['admin']
		];
		header('Location:panel.php');
	}else{
        echo "Adresse email ou mot de passe incorrect !";
        session_destroy();
    }
}
?>
