<?php
require_once("$racine/modele/abonneeManager.php");
require_once("$racine/modele/exemplaireManager.php");
require_once("$racine/modele/reservationManager.php"); // Inclusion du fichier contenant la définition de $reservationManager

$exemplaireManager = new ExemplaireManager();
$abonneeManager = new AbonneeManager();
$reservationManager = new reservationManager();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du corps de la requête POST
    $data = json_decode(file_get_contents("php://input"), true);
    // Vérifier si les données sont présentes et valides
    if (isset($data['NumeroEx'], $data['idDocument'])) {
        $Document = $data['idDocument'];
        $numeroExemplaire = $data['NumeroEx'];
        $idAbo = $_SESSION["loginA"];
        $reservationManager->creerReservationDoc($Document,$numeroExemplaire,$idAbo);
        // Envoyer une réponse JSON indiquant le succès de l'opération et envoyer la nouvelle date de fin de l'emprunt
        include "$racine/vue/header.php";
        include "$racine/vue/v_accueil.php";
        include "$racine/vue/footer.php";
        exit; // Arrêter l'exécution du script après avoir envoyé la réponse JSON
    } 
} else {
    // Envoyer une réponse JSON indiquant que la méthode de requête est incorrecte
    $response = ['success' => false, 'message' => 'Méthode de requête incorrecte. Utilisez POST.'];
    echo json_encode($response);

    // Redirection vers la page Mes Emprunts après la prolongation
    header("Location: $racine/vue/v_reservation.php"); // Redirection vers la page Mes Emprunts
    exit; // Arrêter l'exécution du script après la redirection
}
?>
