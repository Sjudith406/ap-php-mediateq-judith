<?php

require_once("$racine/modele/connexionManager.php");
$connexionManager = new ConnexionManager();

$connexionManager->logout();
$titre = "Deconnexion";    

        include "$racine/Vue/header.php";
        include "$racine/vue/deconnexion.php";
        include "$racine/vue/footer.php";
?>