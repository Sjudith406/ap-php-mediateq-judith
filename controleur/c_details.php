<?php
require_once("$racine/modele/livreManager.php");
require_once("$racine/modele/dvdManager.php");
require_once("$racine/modele/revueManager.php");
require_once("$racine/modele/parutionManager.php");
$livreManager = new livreManager();
$dvdManager = new dvdManager();
$revueManager = new revueManager();
$parutionManager = new parutionManager();
$reservationManager = new reservationManager();
$exemplaireManager = new ExemplaireManager();
$listeManager = new ListeManager(); 
$LoginAbo = $_SESSION["loginA"];
$lesListes = $listeManager->getList($LoginAbo);
if(!isset($_REQUEST["idListeAjout"])){
    if(!isset($_REQUEST["idListeSuppr"])){
        if(!isset($_POST["numero"])){
            if(!isset($_POST["num"]) || !isset($_POST['idDoc'])){
                $id = $_POST["id"];
                foreach($livreManager->getList() as $livre){
                    if($livre->getId() == $id){
                        $doc = $livreManager->getLivreById($id);
                    }
                }
                foreach($dvdManager->getList() as $dvd){
                    if($dvd->getId() == $id){
                        $doc = $dvdManager->getDvdById($id);
                    }
                }
                foreach($revueManager->getList() as $revue){
                   if($revue->getId() == $id){
                        $doc = $revueManager->getRevueById($id);
                        if($revue->getPeriod() == "MS"){
                            $periodicite = "Mensuel";
                        }
                        if($revue->getPeriod() == "HB"){
                            $periodicite = "Hebdomadaire";
                        }
                        if($revue->getPeriod() == "QT"){
                            $periodicite = "Quotidien";
                        }
                    }
                }
                $titre = $doc->getTitre();
                if(get_class($doc) == "Livre"){
                    include "$racine/vue/header.php";
                    include "$racine/vue/v_detailsLivre.php";
                }
                if(get_class($doc) == "Dvd"){
                    include "$racine/vue/header.php";
                    include "$racine/vue/v_detailsDvd.php";
                }
        
                if(get_class($doc) == "Revue"){
                    include "$racine/vue/header.php";
                    include "$racine/vue/v_detailsRevue.php";
                }
            }
            else{
                foreach($exemplaireManager->getList() as $exemplaire){
                    if($exemplaire->getNumero() == $_POST["num"]){
                        if($exemplaire->getDocument()->getId() == $_POST['idDoc']){
                            $num = $exemplaire->getNumero();
                            $id = $exemplaire->getDocument()->getId();
                            $idAbo = $_SESSION["loginA"];
                            $reservationManager->creerReservationDoc($id,$num,$idAbo);
                        }
                        
                    }
                }
                include "$racine/controleur/c_reservation.php";
            }
        }
        else{
            foreach($parutionManager->getList() as $parution){
                if($parution->getNumero() == $_POST["numero"]){
                    $num = $parution->getNumero();
                    $id = $parution->getRevue()->getId();
                    $idAbo = $_SESSION["loginA"];
                    $reservationManager->creerReservationRevue($id,$num,$idAbo);
                    include "$racine/controleur/c_reservation.php";
                }
            }
        }
    }
    else
    {
        $id = $_REQUEST["idDoc"];
        $idListe = $_REQUEST["idListeSuppr"];
        $idAbo = $_SESSION["loginA"];
        foreach($livreManager->getList() as $livre){
            if($livre->getId() == $id){
                $listeManager->supprListeDoc($id, $idListe, $idAbo);
            }
        }
        foreach($dvdManager->getList() as $dvd){
            if($dvd->getId() == $id){
                $listeManager->supprListeDoc($id, $idListe, $idAbo);
            }
        }
        foreach($revueManager->getList() as $revue){
            if($revue->getId() == $id){
                $listeManager->supprListeRevue($id, $idListe, $idAbo);
            }
        }


        foreach($livreManager->getList() as $livre){
            if($livre->getId() == $id){
                $doc = $livreManager->getLivreById($id);
            }
        }
        foreach($dvdManager->getList() as $dvd){
            if($dvd->getId() == $id){
                $doc = $dvdManager->getDvdById($id);
            }
        }
        foreach($revueManager->getList() as $revue){
            if($revue->getId() == $id){
                $doc = $revueManager->getRevueById($id);
                if($revue->getPeriod() == "MS"){
                    $periodicite = "Mensuel";
                }
                if($revue->getPeriod() == "HB"){
                    $periodicite = "Hebdomadaire";
                }
                if($revue->getPeriod() == "QT"){
                    $periodicite = "Quotidien";
                }
            }
        }
        $titre = $doc->getTitre();
        if(get_class($doc) == "Livre"){
            include "$racine/vue/header.php";
            include "$racine/vue/v_detailsLivre.php";
        }
        if(get_class($doc) == "Dvd"){
            include "$racine/vue/header.php";
            include "$racine/vue/v_detailsDvd.php";
        }
        if(get_class($doc) == "Revue"){
            include "$racine/vue/header.php";
            include "$racine/vue/v_detailsRevue.php";
        }
    }
}
else{
    $id = $_REQUEST["idDoc"];
    $idListe = $_REQUEST["idListeAjout"];
    $idAbo = $_SESSION["loginA"];
    foreach($livreManager->getList() as $livre){
        if($livre->getId() == $id){
            $listeManager->ajoutListeDoc($id, $idListe, $idAbo);        
        }
    }
    foreach($dvdManager->getList() as $dvd){
        if($dvd->getId() == $id){
            $listeManager->ajoutListeDoc($id, $idListe, $idAbo);        
        }
    }
    foreach($revueManager->getList() as $revue){
        if($revue->getId() == $id){
            $listeManager->ajoutListeRevue($id, $idListe, $idAbo);
        }
    }


    foreach($livreManager->getList() as $livre){
        if($livre->getId() == $id){
            $doc = $livreManager->getLivreById($id);
        }
    }
    foreach($dvdManager->getList() as $dvd){
        if($dvd->getId() == $id){
            $doc = $dvdManager->getDvdById($id);
        }
    }
    foreach($revueManager->getList() as $revue){
        if($revue->getId() == $id){
            $doc = $revueManager->getRevueById($id);
            if($revue->getPeriod() == "MS"){
                $periodicite = "Mensuel";
            }
            if($revue->getPeriod() == "HB"){
                $periodicite = "Hebdomadaire";
            }
            if($revue->getPeriod() == "QT"){
                $periodicite = "Quotidien";
            }
        }
    }
    $titre = $doc->getTitre();
    if(get_class($doc) == "Livre"){
        include "$racine/vue/header.php";
        include "$racine/vue/v_detailsLivre.php";
    }
    if(get_class($doc) == "Dvd"){
        include "$racine/vue/header.php";
        include "$racine/vue/v_detailsDvd.php";
    }
    if(get_class($doc) == "Revue"){
        include "$racine/vue/header.php";
        include "$racine/vue/v_detailsRevue.php";
    }
}
?>