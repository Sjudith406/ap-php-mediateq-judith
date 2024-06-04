<?php
function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["rechercheSimple"] = "c_rechercheSimple.php";
    $lesActions["rechercheAvancee"] = "c_rechercheAvancee.php";
    $lesActions["nouveautes"] = "c_nouveautes.php";
    $lesActions["faq"] = "c_faq.php";
    $lesActions["connexion"] = "c_formulaireConnexion.php";
    $connexion  = new connexionManager();

    if($connexion->isLoggedOn()){
        $lesActions["deconnexion"] = "c_deconnexion.php";
        $lesActions["dossier"] = "c_mondossier.php";
        $lesActions["emprunt"] = "c_emprunts.php";
        $lesActions["prolongerE"] = "c_prolongerEmprunt.php";
        $lesActions["reservation"] = "c_reservation.php";
        $lesActions["frais"] = "c_mondossier.php";
        $lesActions["hist_pret"] = "c_hist_pret.php";
        $lesActions["hist_recherche"] = "c_histoRecherche.php";
        $lesActions["connexion"] = "c_rechercheSimple.php";
        $lesActions["details"] = "c_details.php";
        $lesActions["modifMdp"] = "c_modifMdp.php";
        $lesActions["modifDossier"] = "c_modifDossier.php";
        $lesActions["reserverDoc"] = "c_reserverDoc.php";
        $lesActions["liste"] = "c_listes.php";
        $lesActions["contenuListe"] = "c_contenuListes.php";
    }
    $lesActions["accueil"] = $lesActions["rechercheSimple"] ;
    $lesActions["defaut"] = $lesActions["accueil"];


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}


function chargerModeles($racine){
    require_once("$racine/modele/Manager.php");
    require_once("$racine/modele/Document.php");
    require_once("$racine/modele/Livre.php");
    require_once("$racine/modele/Dvd.php");
    require_once("$racine/modele/Exemplaire.php");
    require_once("$racine/modele/ExemplaireManager.php");
    require_once("$racine/modele/Parution.php");
    require_once("$racine/modele/LivreManager.php");
    require_once("$racine/modele/DvdManager.php");
    require_once("$racine/modele/Etat.php");
    require_once("$racine/modele/EtatManager.php");
    require_once("$racine/modele/Rayon.php");
    require_once("$racine/modele/RayonManager.php");
    require_once("$racine/modele/Revue.php");
    require_once("$racine/modele/RevueManager.php");
    require_once("$racine/modele/TypePublic.php");
    require_once("$racine/modele/TypePublicManager.php");
    require_once("$racine/modele/connexion.php");
    require_once("$racine/modele/connexionManager.php");
    require_once("$racine/modele/AbonneeManager.php");
    require_once("$racine/modele/Abonnee.php");
    require_once("$racine/modele/Emprunts.php");
    require_once("$racine/modele/EmpruntsManager.php");
    require_once("$racine/modele/parutionManager.php");
    require_once("$racine/modele/reservationDoc.php");
    require_once("$racine/modele/reservationRevue.php");
    require_once("$racine/modele/reservationManager.php");
    require_once("$racine/modele/liste.php");
    require_once("$racine/modele/listeManager.php");
}
?>

