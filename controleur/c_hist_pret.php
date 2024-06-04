<?php
require_once("$racine/modele/empruntsManager.php");
require_once("$racine/modele/abonneeManager.php");
require_once("$racine/modele/exemplaireManager.php");
require_once("$racine/modele/connexionManager.php");

$empruntManager = new EmpruntsManager();
$connexionManager = new ConnexionManager();// Création d'un objet manager de connexion
$abonneeManager = new AbonneeManager();// Création d'un objet manager d'abonnée
$livreManager = new livreManager(); // Création d'un objet manager de documents

$titre = "Mon historique de prêt";
$nombresH = "";
// Vérifiez si le formulaire a été soumis
    if (isset($_POST['recherche_pret'])) {
        $login = $_SESSION["loginA"];
        $vues = array(); // tableau des vues à appeler
        $nbR = 0;
        $texte = htmlentities($_POST['searchText']);
        $typeR = htmlentities($_POST['searchType']);
        
        switch ($typeR) {
        case "livre":
            $histo_emprunts = $empruntManager->getLivresEmpruntesByCritereSimple($abonneeManager->get($login), $texte); // chargement de l'ensemble du catalogue de livre dans les emprunts
            $nbR = count($histo_emprunts);
            $nombresH = $nbR." résultats dans les Livres pour : ". $texte;
            array_push($vues, "$racine/vue/v_hist_pret.php");
            break;
        case "dvd":
            $histo_emprunts = $empruntManager->getDvdEmpruntesByCritereSimple($abonneeManager->get($login), $texte); // chargement de l'ensemble du catalogue
            $nbR = $nbR + count($histo_emprunts);
            $nombresH = $nbR." résultats dans les DVD pour : ". $texte;
            array_push($vues, "$racine/vue/v_hist_pret.php");
            break;
        
        default:
            $livreManager = new livreManager(); // Création d'un objet manager de documents
            $histo_emprunts = $empruntManager->getLivresEmpruntesByCritereSimple($abonneeManager->get($login), $texte); // chargement de l'ensemble du catalogue
            $nbL = $nbR + count($histo_emprunts);
            array_push($vues, "$racine/vue/v_hist_pret.php");

            $dvdManager = new dvdManager(); // Création d'un objet manager de documents
            $disques = $empruntManager->getDvdEmpruntesByCritereSimple($abonneeManager->get($login), $texte); // chargement de l'ensemble du catalogue
            $nbD = $nbR + count($disques);
            array_push($vues, "$racine/vue/v_hist_pret.php");
            
            $nbR = $nbL + $nbD;
            $recherche = $nbR." résultats pour : ". $texte;

        }
        // appel du script de vue qui permet de gerer l'affichage des donnees
            include "$racine/vue/header.php";
            foreach($vues as $vue){
                include $vue;
            }
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