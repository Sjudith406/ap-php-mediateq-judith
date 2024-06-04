<?php
require_once("$racine/modele/empruntsManager.php");
require_once("$racine/modele/connexionManager.php");
require_once("$racine/modele/abonneeManager.php");

$empruntManager = new EmpruntsManager();
$connexionManager = new ConnexionManager();
$abonneeManager = new AbonneeManager();

$titre = "Mes Emprunts";
$nombre = "";

// recuperation des donnees GET, POST, et SESSION

if (isset($_SESSION["loginA"])){
    // 
    $login = $_SESSION["loginA"];
    $abo = $abonneeManager->get($login);
    $emprunts = $empruntManager->getEmpruntsEnCours($abo);
    $nbPret = count($emprunts);

    $nombre = "Vous avez ".$nbPret." emprunt en cours";

    include "$racine/vue/header.php";
    include "$racine/vue/v_emprunts.php";
    include "$racine/vue/footer.php";
    
}else {
        // on affiche le formulaire de connexion
        $titre = "Erreur de connexion";
        include "$racine/vue/v_formulaireConnexion.php";
        include "$racine/vue/footer.php";
    }
// controleur prolonger_emprunt a créé

?>