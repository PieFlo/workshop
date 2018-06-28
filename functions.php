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
function getVar($name) {
	if (isset ( $_GET [$name] )) {
		if (! empty ( $_GET [$name] )) {
			return $_GET [$name];
		}
		return TRUE;
	}
	return FALSE;
}

function postVar($name) {
	if (isset ( $_POST [$name] )) {
		if (! empty ( $_POST [$name] )) {
			return $_POST [$name];
		}
		return TRUE;
	}
	return FALSE;
}

function sessionVar($name) {
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	if (isset ( $_SESSION [$name] )) {
		if (! empty ( $_SESSION [$name] )) {
			return $_SESSION [$name];
		}
		return TRUE;
	}
	return FALSE;
}

?>