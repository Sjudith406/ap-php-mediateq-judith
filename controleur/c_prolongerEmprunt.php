<?php
require_once("$racine/modele/empruntsManager.php");
require_once("$racine/modele/connexionManager.php");
require_once("$racine/modele/abonneeManager.php");

$empruntManager = new EmpruntsManager();
$exemplaireManager = new ExemplaireManager();
$abonneeManager = new AbonneeManager();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les données du corps de la requête POST
    $data = json_decode(file_get_contents("php://input"), true);
    // Vérifier si les données sont présentes et valides
    if (isset($data['idAb'], $data['idDocument'], $data['numeroE'], $data['dateDebutEmp'])) {
        $Abonnee = $data['idAb'];
        $Document = $data['idDocument'];
        $numeroExemplaire = $data['numeroE'];
        $dateDebutEmprunt = $data['dateDebutEmp'];

        // Récupérer l'abonné et l'exemplaire
        $abonnee = $abonneeManager->get($Abonnee);
        $exemplaire = $exemplaireManager->getById($Document, $numeroExemplaire);

        // Récupérer l'emprunt
        $emprunt = $empruntManager->getEmpruntByInfo($abonnee, $exemplaire, $dateDebutEmprunt);

        // Logique pour prolonger l'emprunt dans la base de données
        $empruntManager->prolongerEmprunt($emprunt);
        $nouvelleDateFin = $emprunt->getDateFin();
        $infos = $emprunt->getAbonne()->getLogin() .'_'.$emprunt->getExemplaire()->getDocument()->getId() . '_'.$emprunt->getExemplaire()->getNumero() .'_'. str_replace('-','_',$emprunt->getDateDebut());
        // Envoyer une réponse JSON indiquant le succès de l'opération et envoyer la nouvelle date de fin de l'emprunt
        $response = ['success' => true, 'message' => 'Emprunt prolongé avec succès.', 'newDateFin' => $nouvelleDateFin, 'div' => $infos];
        echo json_encode($response);
    } else {
        // Envoyer une réponse JSON indiquant que des données sont manquantes ou incorrectes
        $response = ['success' => false, 'message' => 'Données manquantes ou incorrectes.'];
        echo json_encode($response);
    }
    } else {
    // Envoyer une réponse JSON indiquant que la méthode de requête est incorrecte
    $response = ['success' => false, 'message' => 'Méthode de requête incorrecte. Utilisez POST.'];
    echo json_encode($response);

    // Rediriger l'utilisateur vers la page Mes Emprunts après la prolongation
    include "$racine/vue/header.php";
    include "$racine/vue/v_emprunts.php";
    include "$racine/vue/footer.php";
}

?>