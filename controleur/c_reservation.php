<?php
require_once("$racine/modele/reservationManager.php");

if (!isset($_POST["idreservation"]) || !isset($_POST["numero"]) || !isset($_POST["idAbo"])){
    if(!isset($_POST["idreservationR"]) || !isset($_POST["numeroR"]) || !isset($_POST["idAboR"])){
        $reservationManager = new reservationManager();
        $reservationDoc = $reservationManager->getReservationDocByAbo($_SESSION["loginA"]);
        $reservationRevue = $reservationManager->getReservationRevueByAbo($_SESSION["loginA"]);
        $titre = "Mes réservations";
        $text = "Mes réservations";
        include "$racine/vue/header.php";
        include "$racine/vue/v_reservation.php";
        include "$racine/vue/footer.php";
    }
    else{
        $reservationManager = new reservationManager();
        $idRevue = $_POST["idreservationR"];
        $num = $_POST["numeroR"];
        $idAbo = $_POST["idAboR"];
        $reservationManager->supprimerReservationRevue($idRevue, $num, $idAbo);
        $reservationDoc = $reservationManager->getReservationDocByAbo($_SESSION["loginA"]);
        $reservationRevue = $reservationManager->getReservationRevueByAbo($_SESSION["loginA"]);
        $titre = "Mes réservations";
        $text = "Réservation suprimée";
        include "$racine/vue/header.php";
        include "$racine/vue/v_reservation.php";
        include "$racine/vue/footer.php";
    }
}
else{
    $reservationManager = new reservationManager();
    $idDoc = $_POST["idreservation"];
    $num = $_POST["numero"];
    $idAbo = $_POST["idAbo"];
    $reservationManager->supprimerReservationDoc($idDoc, $num, $idAbo);
    $reservationDoc = $reservationManager->getReservationDocByAbo($_SESSION["loginA"]);
    $reservationRevue = $reservationManager->getReservationRevueByAbo($_SESSION["loginA"]);
    $titre = "Mes réservations";
    $text = "Réservation suprimée";
    include "$racine/vue/header.php";
    include "$racine/vue/v_reservation.php";
    include "$racine/vue/footer.php";
}
?>