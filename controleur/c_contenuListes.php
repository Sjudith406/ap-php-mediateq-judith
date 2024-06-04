<?php
    $listeManager = new ListeManager(); 
    $livreManager = new livreManager();
    $dvdManager = new dvdManager();
    $revueManager = new revueManager();
    if(!isset($_REQUEST["idListeSuppr"])){
        $idListe = $_REQUEST["idListe"];
        $LoginAbo = $_SESSION["loginA"];
        $lesRevues = $revueManager->getList();
        $lesDvds = $dvdManager->getList();
        $lesLivres = $livreManager->getList();
        $laListe = $listeManager->getListebyId($idListe, $LoginAbo);
        $titre = $laListe->getNomListe();
        $text = $laListe->getNomListe();
        $contenu = $laListe->getContenu();
        include "$racine/vue/header.php";
        include "$racine/vue/v_contenuListe.php";
        include "$racine/vue/footer.php";
    }
    else{
        $idListe = $_REQUEST["idListeSuppr"];
        $idDoc = $_REQUEST["idDoc"];
        $idAbo = $_SESSION["loginA"];
        foreach($livreManager->getList() as $livre){
            if($livre->getId() == $idDoc){
                $listeManager->supprListeDoc($idDoc, $idListe, $idAbo);
            }
        }
        foreach($dvdManager->getList() as $dvd){
            if($dvd->getId() == $idDoc){
                $listeManager->supprListeDoc($idDoc, $idListe, $idAbo);
            }
        }
        foreach($revueManager->getList() as $revue){
            if($revue->getId() == $idDoc){
                $listeManager->supprListeRevue($idDoc, $idListe, $idAbo);
            }
        }
        $lesRevues = $revueManager->getList();
        $lesDvds = $dvdManager->getList();
        $lesLivres = $livreManager->getList();
        $laListe = $listeManager->getListebyId($idListe, $idAbo);
        $titre = $laListe->getNomListe();
        $text = $laListe->getNomListe();
        $contenu = $laListe->getContenu();
        include "$racine/vue/header.php";
        include "$racine/vue/v_contenuListe.php";
        include "$racine/vue/footer.php";
    }
?>