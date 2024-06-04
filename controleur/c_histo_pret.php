<?php
require_once("$racine/modele/empruntsManager.php");
require_once("$racine/modele/abonneeManager.php");
require_once("$racine/modele/exemplaireManager.php");
require_once("$racine/modele/connexionManager.php");

$empruntManager = new EmpruntsManager();
$connexionManager = new ConnexionManager();
$abonneeManager = new AbonneeManager();

$titre = "Mon historique de prêt";
$nombresH = "";
// Vérifiez si le formulaire a été soumis
    if (isset($_POST['recherche_pret'])) {
        // Récupérez et nettoyez les données du formulaire pour eviter les attaques
        $searchType1 = ($_POST["searchType1"]);
        $searchText1 = ($_POST["searchText1"]);
        $searchType2 = ($_POST["searchType2"]);
        $searchText2 = ($_POST["searchText2"]);
        $searchType3 = ($_POST["searchType3"]);
        $searchText3 = ($_POST["searchText3"]);
        $operateur1 = ($_POST["operateur1"]);
        $operateur2 = ($_POST["operateur2"]);

        // Appel de la méthode du modèle pour effectuer la recherche
        $recherche_avancee_prets = $empruntManager->getEmpruntsByCritere([$searchType1, $searchText1, $searchType2, $searchText2, $searchType3, $searchText3, $operateur1, $operateur2]);
        $histo_emprunts = $recherche_avancee_prets;
        
        include "$racine/vue/header.php";
        include "$racine/vue/v_hist_pret.php";
        include "$racine/vue/footer.php";
    }else
    if (isset($_SESSION["loginA"])){
        //Récupérer l'abonnée
        $login = $_SESSION["loginA"];
        $abonnee = $abonneeManager->get($login);
        $histo_emprunts = $empruntManager->getHistoEmprunt($abonnee);
        $nbHistoP = count($histo_emprunts);

        $nombresH = "Vous avez ".$nbHistoP." emprunt dans votre historique";

        include "$racine/vue/header.php";
        include "$racine/vue/v_hist_pret.php";
        include "$racine/vue/footer.php";
        
    }else {
            // on affiche le formulaire de connexion
            $titre = "Erreur de connexion";
            include "$racine/vue/v_formulaireConnexion.php";
            include "$racine/vue/footer.php";
        }

?>

