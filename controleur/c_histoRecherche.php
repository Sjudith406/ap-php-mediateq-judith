<?php
require_once("$racine/modele/histRechercheManager.php");

$titre = "Historique de recherche";
$histoManager = new HistRechercheManager();
$histo = $histoManager->getList();

if(isset($_POST['supprAllH']))
{
    $histo = $histoManager->supprimerHistorique();
}

// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
include "$racine/vue/v_hist_recherche.php";
include "$racine/vue/footer.php";
?>
