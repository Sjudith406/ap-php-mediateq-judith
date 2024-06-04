<?php
if (!isset($_REQUEST["idListe"]) && !isset($_POST["nomListe"])){
    $titre = "Mes Listes";
    $text = "Mes Listes";
    $listeManager = new ListeManager(); 
    $LoginAbo = $_SESSION["loginA"];
    $lesListes = $listeManager->getList($LoginAbo);
    $nbListe = 0;
    foreach ($lesListes as $liste) { 
        $nbListe = $nbListe + 1;
    }
    include "$racine/vue/header.php";
    include "$racine/vue/v_listes.php";
    include "$racine/vue/footer.php";
}
else {
    if(isset($_POST["nomListe"])){
    $titre = "Mes Listes";
    $text = "Liste Créé";

    $listeManager = new ListeManager(); 
    $LoginAbo = $_SESSION["loginA"];
    $lesListes = $listeManager->getList($LoginAbo);
    $idListe = 1;
    foreach ($lesListes as $liste) { 
        $idListe = $liste->getIdListe() + 1;
    }
    $idListeString = strval($idListe);
    $nomDoc = $_POST["nomListe"];
    $listeManager->creerListe($LoginAbo, $idListeString, $nomDoc);
    $lesListes = $listeManager->getList($LoginAbo);
    $nbListe = 0;
    foreach ($lesListes as $liste) { 
        $nbListe = $nbListe + 1;
    }
    include "$racine/vue/header.php";
    include "$racine/vue/v_listes.php";
    include "$racine/vue/footer.php";
    }
    else{
        $titre = "Mes Listes";
        $text = "Liste suprimée";
    
        $listeManager = new ListeManager(); 
        $LoginAbo = $_SESSION["loginA"];
        $idListe = $_REQUEST["idListe"];
        $listeManager->suprListe($LoginAbo, $idListe);
        $lesListes = $listeManager->getList($LoginAbo);
        $nbListe = 0;
        foreach ($lesListes as $liste) { 
            $nbListe = $nbListe + 1;
        }
        include "$racine/vue/header.php";
        include "$racine/vue/v_listes.php";
        include "$racine/vue/footer.php";   
    }
}
?>

