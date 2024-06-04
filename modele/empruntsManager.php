<?php

class EmpruntsManager extends Manager{
    // Méthode pour récupérer les emprunts en cours d'un abonné
    /**
     * Retourne un tableau d'objets Emprunt
     * 
     * @param Abonnee $Abonne
     * @return array
     */
    public function getEmpruntsEnCours(Abonnee $abonne) : array 
    {
        $emprunts = [];

        $q = $this->getPDO()->prepare('SELECT * FROM emprunt e WHERE e.idAbonnee = :idAbonnee');
        $q->bindValue(':idAbonnee', $abonne->getLogin(), PDO::PARAM_STR);
        $q->execute();
        $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $exemplaireManager = new ExemplaireManager();

        // Logique pour récupérer les emprunts en cours depuis la base de données
        foreach($donnees as $emprunt){
            $exemplaire = $exemplaireManager->getById((int)$emprunt['idDoc'], (int)$emprunt['numeroE']);
            $emprunts[] = new Emprunts($abonne, $exemplaire, $emprunt['dateDebut'], $emprunt['dateFin'], $emprunt['lieu'], $emprunt['rendu'], $emprunt['prolongeable']);
        }
        return $emprunts;
    }
    
    // Méthode pour prolonger un emprunt
    /** 
     * @param Emprunts $emprunt
     */
    public function prolongerEmprunt(Emprunts $emprunt) {
        
        $q = $this->getPDO()->prepare('UPDATE emprunt SET dateFin = DATE_ADD(dateFin, INTERVAL 7 DAY) WHERE idAbonnee = :idAbonnee AND idDoc = :idDoc AND numeroE = :numeroE AND dateDebut = :dateDebut');
        $q->bindValue(':idAbonnee', $emprunt->getAbonne()->getLogin(), PDO::PARAM_STR);
        $q->bindValue(':idDoc', $emprunt->getExemplaire()->getDocument()->getId(), PDO::PARAM_INT);
        $q->bindValue(':numeroE', $emprunt->getExemplaire()->getNumero(), PDO::PARAM_INT);
        $q->bindValue(':dateDebut', $emprunt->getDateDebut(), PDO::PARAM_STR);
        $q->execute();
    }

    //Fonction qui renvoie un emprunt par rapport à sa clé primaire
    /**
     * @param Abonnee $abo
     * @param Exemplaire $emplaire 
     * @param string $dateD
     * @return Emprunts
     */

    public function getEmpruntByInfo(Abonnee $abo, Exemplaire $emplaire, string $dateD): Emprunts {

        $exemplaireManager = new ExemplaireManager();
        $numDocument = $emplaire->getDocument()->getId();
        $numExemple = $emplaire->getNumero();

        $q = $this->getPDO()->prepare('SELECT * FROM emprunt e WHERE e.idAbonnee = :idAbonnee AND e.idDoc = :idDoc AND e.numeroE = :numeroE AND e.dateDebut =:dateDebut');
        $q->bindValue(':idAbonnee', $abo->getLogin(), PDO::PARAM_STR);
        $q->bindValue(':idDoc', $numDocument, PDO::PARAM_INT);
        $q->bindValue(':numeroE', $numExemple, PDO::PARAM_INT);
        $q->bindValue(':dateDebut', $dateD, PDO::PARAM_STR);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        $exemplaire = $exemplaireManager->getById($numDocument, $numExemple);
        $emprunt = new Emprunts($abo, $exemplaire, $donnees['dateDebut'], $donnees['dateFin'], $donnees['lieu'], $donnees['rendu'], $donnees['prolongeable']);

        return $emprunt;
    }

    /**
     * fonction qui renvoi l'historique des prêts(prêts déja rendu)
     *
     * @param Abonnee $abonnee
     * @return array
     */
    public function getHistoEmprunt(Abonnee $abonnee): array {
         $l_emprunts= [];

        $q = $this->getPDO()->prepare('SELECT * FROM emprunt e WHERE e.idAbonnee = :idAbonnee AND e.rendu = "O"');
        $q->bindValue(':idAbonnee', $abonnee->getLogin(), PDO::PARAM_STR);
        $q->execute();
        $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $exemplaireManager = new ExemplaireManager();

        // Logique pour récupérer les emprunts en cours depuis la base de données
        foreach($donnees as $l_emprunt){
            $exemplaire = $exemplaireManager->getById((int)$l_emprunt['idDoc'], (int)$l_emprunt['numeroE']);
            $l_emprunts[] = new Emprunts($abonnee, $exemplaire, $l_emprunt['dateDebut'], $l_emprunt['dateFin'], $l_emprunt['lieu'], $l_emprunt['rendu'], $l_emprunt['prolongeable']);
        }
        return $l_emprunts;
    }
 
    /**
     * fonction qui récupère des texte de recherche et renvoi les livres emprunter correspondand
     *
     * Abonnee $abonnee
     * @param string $texte
     * @return array
     */
    public function getLivresEmpruntesByCritereSimple(Abonnee $abonnee, string $texte) : array 
    {
        $l_emprunts= [];
        $q = $this->getPDO()->prepare('SELECT * FROM emprunt e join livre l on l.idDocument = e.idDoc JOIN document d ON d.id = e.idDoc WHERE e.rendu= "O" AND e.idAbonnee = :idAbonnee AND d.titre LIKE :texte');
        $q->bindValue(':texte',  "%".$texte."%", PDO::PARAM_STR);
        $q->bindValue(':idAbonnee', $abonnee->getLogin(), PDO::PARAM_STR);
        $q->execute();
        //$q->debugDumpParams();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $exemplaireManager = new ExemplaireManager();

        // Logique pour récupérer les emprunts en cours depuis la base de données
        foreach($r as $l_emprunt){
            $exemplaire = $exemplaireManager->getById((int)$l_emprunt['idDoc'], (int)$l_emprunt['numeroE']);
            $l_emprunts[] = new Emprunts($abonnee, $exemplaire, $l_emprunt['dateDebut'], $l_emprunt['dateFin'], $l_emprunt['lieu'], $l_emprunt['rendu'], $l_emprunt['prolongeable']);
        }
        return $l_emprunts;
    }

    /**
     * fonction qui récupère des texte de recherche et renvoi les dvd emprunter correspondand
     *
     * @param Abonnee $abonnee
     * @param string $texte
     * @return array
     */
    public function getDvdEmpruntesByCritereSimple(Abonnee $abonnee, string $texte) : array 
    {
        $l_emprunts= [];
        $q = $this->getPDO()->prepare('SELECT * FROM emprunt e join dvd dv on dv.idDocument = e.idDoc JOIN document d ON d.id = e.idDoc WHERE e.rendu= "O" AND e.idAbonnee = :idAbonnee AND d.titre LIKE :texte');
        $q->bindValue(':texte',  "%".$texte."%", PDO::PARAM_STR);
        $q->bindValue(':idAbonnee', $abonnee->getLogin(), PDO::PARAM_STR);
        $q->execute();
        //$q->debugDumpParams();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $exemplaireManager = new ExemplaireManager();

        // Logique pour récupérer les emprunts en cours depuis la base de données
        foreach($r as $l_emprunt){
            $exemplaire = $exemplaireManager->getById((int)$l_emprunt['idDoc'], (int)$l_emprunt['numeroE']);
            $l_emprunts[] = new Emprunts($abonnee, $exemplaire, $l_emprunt['dateDebut'], $l_emprunt['dateFin'], $l_emprunt['lieu'], $l_emprunt['rendu'], $l_emprunt['prolongeable']);
        }
        return $l_emprunts;
    }

    public function getNbProlonger(Abonnee $abo, Exemplaire $emplaire, string $dateD):int {
 
        $exemplaireManager = new ExemplaireManager();
        $numDocument = $emplaire->getDocument()->getId();
        $numExemple = $emplaire->getNumero();

        $q = $this->getPDO()->prepare('SELECT e.nbProlonger FROM emprunt e WHERE e.idAbonnee = :idAbonnee AND e.idDoc = :idDoc AND e.numeroE = :numeroE AND e.dateDebut =:dateDebut');
        $q->bindValue(':idAbonnee', $abo->getLogin(), PDO::PARAM_STR);
        $q->bindValue(':idDoc', $numDocument, PDO::PARAM_INT);
        $q->bindValue(':numeroE', $numExemple, PDO::PARAM_INT);
        $q->bindValue(':dateDebut', $dateD, PDO::PARAM_STR);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return $donnees;
    }

    public function ajouterNbProlonger(Emprunts $emprunt) {
        
        $q = $this->getPDO()->prepare('UPDATE emprunt SET nbProlonger = count($emprunt) WHERE idAbonnee = :idAbonnee AND idDoc = :idDoc AND numeroE = :numeroE AND dateDebut = :dateDebut');
        $q->bindValue(':idAbonnee', $emprunt->getAbonne()->getLogin(), PDO::PARAM_STR);
        $q->bindValue(':idDoc', $emprunt->getExemplaire()->getDocument()->getId(), PDO::PARAM_INT);
        $q->bindValue(':numeroE', $emprunt->getExemplaire()->getNumero(), PDO::PARAM_INT);
        $q->bindValue(':dateDebut', $emprunt->getDateDebut(), PDO::PARAM_STR);
        $q->execute();
    }

}
?>