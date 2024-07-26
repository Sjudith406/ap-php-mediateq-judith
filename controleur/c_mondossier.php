<?php
require_once("$racine/modele/abonneeManager.php");
require_once("$racine/modele/empruntsManager.php");
require_once("$racine/modele/reservationManager.php");
$titre = "Mon dossier";

$abonneeManager = new AbonneeManager();
$empruntsManager = new EmpruntsManager();
$reservationManager = new reservationManager();
$abonnee = $abonneeManager->get($_SESSION["loginA"]);

$emprunts = $empruntsManager->getEmpruntsEnCours($abonnee);
    $nbPret = count($emprunts);
    
$reservationDoc =$reservationManager->getReservationDocByAbo($_SESSION["loginA"]);
$reservationRevue =$reservationManager->getReservationRevueByAbo($_SESSION["loginA"]);
    $nbReservations = count($reservationDoc) + count($reservationRevue);

// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
include "$racine/vue/v_monDossier.php";
include "$racine/vue/footer.php";
?>
