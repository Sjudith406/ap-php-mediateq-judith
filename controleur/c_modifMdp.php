<?php

$titre = "Modification du mot de passe";

$abonneeManager = new AbonneeManager();
$abonnee = $abonneeManager->get($_SESSION["loginA"]);

$options = [
    'cost' => 12,
];

if (isset($_POST["Nmdp"])) {
    $mdpA = password_hash($_POST["mdpA"], PASSWORD_BCRYPT, $options);
    $Nmdp = password_hash($_POST["Nmdp"], PASSWORD_BCRYPT, $options);
    $login = $abonnee->getLogin();
    $modif = $abonneeManager->modifMdp($Nmdp, $login);
}

// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
include "$racine/vue/v_modifMdp.php";
include "$racine/vue/footer.php";
