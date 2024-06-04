<?php
class ConnexionManager extends Manager
{
     /*
     Retourne un objet de type Connexion
     

    public function get(string $mailU)  : Connexion 
    {
        $mailU = (string) $mailU;
        $q = $this->getPDO()->prepare('SELECT mailU, mdpU FROM utilisateur WHERE mailU = :mailU');
        $q->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        return new Connexion($donnees['mailU'], $donnees['mdpU']);
    } */

    public function getUtilisateurByMailU(string $loginA) : Abonnee {
        $abonneeManager = new AbonneeManager();
       
        return $abonneeManager->get($loginA);
    }

    // deconnexion
    public function logout() : void {
        if (!isset($_SESSION)) {
            session_destroy();
        }
        unset($_SESSION["loginA"]);
        unset($_SESSION["mdpA"]);
    }

    //est connecté
    public function isLoggedOn() : bool {
        if (!isset($_SESSION)) {
            session_start();
        }
        $ret = false;
    
        if (isset($_SESSION["loginA"])) {
            $abonneeManager = new AbonneeManager();
            $util = $abonneeManager->get($_SESSION["loginA"]);
            if ($util->getLogin() == $_SESSION["loginA"] && $util->getMdp() == $_SESSION["mdpA"]
            ) {
                $ret = true;
            }
        }
        return $ret;
    }

    //connexion
    public function login(string $loginA, string $mdpA) : void {
        if (!isset($_SESSION)) {
            session_start();
        }
        $abonneeManager = new AbonneeManager();
        $util = $abonneeManager->get($loginA);
        $mdpBD = $util->getMdp();
    
        // if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
        if (password_verify($mdpA, $mdpBD)) {
            // le mot de passe est celui de l'utilisateur dans la base de donnees
            $_SESSION["loginA"] = $util->getLogin();
            $_SESSION["mdpA"] = $util->getMdp();
        }
    }
}
?>