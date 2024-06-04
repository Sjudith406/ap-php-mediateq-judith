<?php

class ListeManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Rayon
     *
     * @return array
     */
    public function getList(string $LoginAbo) : array
    {
        $q = $this->getPDO()->prepare('SELECT * FROM liste WHERE idAbo = :LoginAbo');
        $q->bindParam(':LoginAbo', $LoginAbo, PDO::PARAM_STR);
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $lesListes = array();
        foreach($r1 as $uneListe)
        {
            $contenu = array();
            $contenu = $this->getContenuById($uneListe['idListe']);
            $lesListes[$uneListe['idListe']] = new Liste($uneListe['idListe'], $uneListe['idAbo'], $uneListe['nomListe'], $contenu);
        }
        return $lesListes;
    }

    public function getListebyId(string $idListe, string $LoginAbo) : Liste
    {
        $catalogue = $this->getList($LoginAbo);
        return $catalogue[$idListe];
    }

    public function getContenuById(string $idListe) : array
    {
        $PublicManager = new TypePublicManager();
        $lesPublics = $PublicManager->getList();

        $q = $this->getPDO()->prepare('SELECT * FROM contenuelistedoc JOIN document ON contenuelistedoc.idDoc = document.id WHERE idListe = :idListe');
        $q->bindParam(':idListe', $idListe, PDO::PARAM_STR);
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);

        $q2 = $this->getPDO()->prepare('SELECT r.*, c.*, d.libelle FROM contenuelisterevue c JOIN revue r ON c.idRevue = r.id JOIN descripteur d ON r.idDescripteur = d.id WHERE c.idListe = :idListe');
        $q2->bindParam(':idListe', $idListe, PDO::PARAM_STR);
        $q2->execute();
        $r2 = $q2->fetchAll(PDO::FETCH_ASSOC);

        $contenu = array();
        foreach ($r1 as $leContenu) {
            $contenu[] = new Document($leContenu['id'], $leContenu['titre'], $leContenu['image'], $leContenu['commandeEnCours'], $lesPublics[$leContenu['idPublic']]);
        }
        foreach ($r2 as $leContenu) {
            $contenu[] = new Revue($leContenu['id'],$leContenu['titre'],$leContenu['empruntable'],$leContenu['libelle'],$leContenu['photo'],$leContenu['periodicite'],$leContenu['description']);
        }

        return $contenu;
    }

    public function creerListe(string $LoginAbo, string $idListe, string $nomListe){
        try {
            $sql = 'INSERT INTO liste (idListe, idAbo, nomListe) VALUES (:idListe, :LoginAbo, :nomListe)';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':LoginAbo', $LoginAbo, PDO::PARAM_STR);
            $stmt->bindParam(':idListe', $idListe, PDO::PARAM_STR);
            $stmt->bindParam(':nomListe', $nomListe, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }

    public function suprListe(string $LoginAbo, string $idListe){
        try {
            $sql = 'DELETE FROM liste WHERE idListe = :idListe AND idAbo = :LoginAbo';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':idListe', $idListe, PDO::PARAM_STR);
            $stmt->bindParam(':LoginAbo', $LoginAbo, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }

    public function inListeDoc(int $idDoc, string $idListe, string $idAbo) : bool {
        $ret = false;
        $sql = "SELECT COUNT(*) FROM contenuelistedoc WHERE idListe = :idListe AND idDoc = :idDoc AND idAbo = :idAbo";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindParam(':idListe', $idListe, PDO::PARAM_STR);
        $stmt->bindParam(':idDoc', $idDoc, PDO::PARAM_INT);
        $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if($count>0){
            $ret = true;
        }
        return $ret;
    }

    public function inListeRevue(int $idRevue, string $idListe, string $idAbo) : bool {
        $ret = false;
        $sql = "SELECT COUNT(*) FROM contenuelisterevue WHERE idListe = :idListe AND idRevue = :idRevue AND idAbo = :idAbo";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->bindParam(':idListe', $idListe, PDO::PARAM_STR);
        $stmt->bindParam(':idRevue', $idRevue, PDO::PARAM_INT);
        $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if($count>0){
            $ret = true;
        }
        return $ret;
    }

    public function ajoutListeDoc(string $idDoc, string $idListe, string $idAbo){
        try {
            $sql = 'INSERT INTO contenuelistedoc (idListe, idAbo, idDoc) VALUES (:idListe, :idAbo, :idDoc)';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);
            $stmt->bindParam(':idListe', $idListe, PDO::PARAM_STR);
            $stmt->bindParam(':idDoc', $idDoc, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }

    public function ajoutListeRevue(string $idRevue, string $idListe, string $idAbo){
        try {
            $sql = 'INSERT INTO contenuelisterevue (idListe, idAbo, idRevue) VALUES (:idListe, :idAbo, :idRevue)';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);
            $stmt->bindParam(':idListe', $idListe, PDO::PARAM_STR);
            $stmt->bindParam(':idRevue', $idRevue, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }

    public function supprListeDoc(string $idDoc, string $idListe, string $idAbo){
        try {
            $sql = 'DELETE FROM contenuelistedoc WHERE idListe = :idListe AND idDoc = :idDoc AND idAbo = :idAbo';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);
            $stmt->bindParam(':idListe', $idListe, PDO::PARAM_STR);
            $stmt->bindParam(':idDoc', $idDoc, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }

    public function supprListeRevue(string $idRevue, string $idListe, string $idAbo){
        try {
            $sql = 'DELETE FROM contenuelisterevue WHERE idListe = :idListe AND idRevue = :idRevue AND idAbo = :idAbo';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);
            $stmt->bindParam(':idListe', $idListe, PDO::PARAM_STR);
            $stmt->bindParam(':idRevue', $idRevue, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }

}

?>