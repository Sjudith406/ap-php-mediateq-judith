<?php
require_once("$racine/modele/abonneeManager.php");
require_once("$racine/modele/empruntsManager.php");
$titre = "Mon dossier";

$abonneeManager = new AbonneeManager();
$empruntsManager = new EmpruntsManager();
$abonnee = $abonneeManager->get($_SESSION["loginA"]);

$emprunts = $empruntsManager->getEmpruntsEnCours($abonnee);
    $nbPret = count($emprunts);

// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
include "$racine/vue/v_monDossier.php";
include "$racine/vue/footer.php";
?>
