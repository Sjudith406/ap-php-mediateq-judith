<?php

require_once("$racine/modele/connexionManager.php");
require_once("$racine/modele/abonneeManager.php");
require_once("$racine/modele/abonnee.php");
$connexionManager = new ConnexionManager();
$titre = "Connexion";
// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["loginA"]) || !isset($_POST["mdpA"])){
    // on affiche le formulaire de connexion
    include "$racine/vue/header.php";
    include "$racine/vue/v_formulaireConnexion.php";
    include "$racine/vue/footer.php";
}
else
{
    $loginA = $_POST["loginA"];
    $mdpA = $_POST["mdpA"];
    $connexionManager->login($loginA,$mdpA);
    include "$racine/Vue/header.php";
    if ($connexionManager->isLoggedOn()){
        $titre = "Vous êtes connecté";
        include "$racine/vue/v_ConfirmationConnexion.php";
        include "$racine/vue/footer.php";
    } else {
        // on affiche le formulaire de connexion
        $titre = "Erreur de connexion";
        include "$racine/vue/v_formulaireConnexion.php";
        include "$racine/vue/footer.php";
    }
}
?>
