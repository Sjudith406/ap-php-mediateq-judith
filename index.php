<?php
session_start();

include "getRacine.php";
require_once "infoBDD.inc.php";
include "$racine/controleur/controleurPrincipal.php";
chargerModeles($racine);

if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    $action = "defaut";
}
$connexion  = new connexionManager();
$fichier = controleurPrincipal($action);
include "$racine/controleur/$fichier";
?>
     