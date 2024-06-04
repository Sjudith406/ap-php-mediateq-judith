<?php

$titre = "Modification de Mon dossier";

$abonneeManager = new AbonneeManager();
$abonnee = $abonneeManager->get($_SESSION["loginA"]);

if (isset($_POST["loginA"])) {
    $login = $_POST["loginA"];
    $nom = $_POST["nomA"];
    $prenom = $_POST["prenomA"];
    $adresse = $_POST["adresseA"];
    $num = $_POST["numTel"];
    $mailA = $_POST["mailA"];
    $modif = $abonneeManager->modifDossier($login, $nom, $prenom, $adresse, $num, $mailA);
}


// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
include "$racine/vue/v_modifDossier.php";
include "$racine/vue/footer.php";
