<?php

class ReservationManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Rayon
     *
     * @return array
     */
    public function getListDoc() : array
    {
        $q = $this->getPDO()->prepare('SELECT * FROM reservationdoc join document on reservationdoc.idDoc = document.id');
        $q->execute();
        $reservationData = $q->fetchAll(PDO::FETCH_ASSOC);
    
        $reservations = array();
        foreach($reservationData as $reservation)
        {
            if ($reservation['image'] == null){
                $reservation['image'] = "pas de photo";
            }
            $reservations[] = new ReservationDoc($reservation['idDoc'],$reservation['numExemplaire'],$reservation['idAbo'],$reservation['dateReservation'],$reservation['image'],$reservation['titre']);
        }
        return $reservations;
    }

    public function getListRevue() : array
    {
        $q = $this->getPDO()->prepare('SELECT reservationrevue.*, parution.*,revue.titre FROM reservationrevue join parution on reservationrevue.idRevue = parution.idRevue and reservationrevue.numero = parution.numero join revue on revue.id = reservationrevue.idRevue');
        $q->execute();
        $reservationData = $q->fetchAll(PDO::FETCH_ASSOC);
    
        $reservations = array();
        foreach($reservationData as $reservation)
        {
            if ($reservation['photo'] == null){
                $reservation['photo'] = "pas de photo";
            }
            $reservations[] = new ReservationRevue($reservation['idRevue'],$reservation['numero'],$reservation['idAbo'],$reservation['dateReservation'],$reservation['photo'],$reservation['titre']);
        }
        return $reservations;
    }

    public function getReservationDocByAbo(string $idAbo) : array
    {
        $reservations = $this->getListDoc();
        $reservationsByAbo = array();
        foreach ($reservations as $reservation) {
            if ($reservation->getIdAbo() == $idAbo) {
                $reservationsByAbo[] = $reservation;
            }
        }
        return $reservationsByAbo;
    }

    public function getReservationRevueByAbo(string $idAbo) : array
    {
        $reservations = $this->getListRevue();
        $reservationsByAbo = array();
        foreach ($reservations as $reservation) {
            if ($reservation->getIdAbo() == $idAbo) {
                $reservationsByAbo[] = $reservation;
            }
        }
        return $reservationsByAbo;
    }

    public function supprimerReservationDoc(int $idDoc, string $numExemplaire, string $idAbo): bool {
        try {
            $sql = 'DELETE FROM reservationDoc WHERE idDoc = :idDoc AND numExemplaire = :numExemplaire AND idAbo = :idAbo';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':idDoc', $idDoc, PDO::PARAM_INT);
            $stmt->bindParam(':numExemplaire', $numExemplaire, PDO::PARAM_STR);
            $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }

    public function supprimerReservationRevue(int $idRevue, string $numero, string $idAbo): bool {
        try {
            $sql = 'DELETE FROM reservationRevue WHERE idRevue = :idRevue AND numero = :numero AND idAbo = :idAbo';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':idRevue', $idRevue, PDO::PARAM_INT);
            $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
            $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }

    public function creerReservationRevue(string $id, string $num, string $idAbo): bool {
        try {
            $sql = 'INSERT INTO reservationrevue (idRevue, numero, idAbo, dateReservation) VALUES (:idRevue, :numero, :idAbo, CURRENT_DATE)';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':idRevue', $id, PDO::PARAM_INT);
            $stmt->bindParam(':numero', $num, PDO::PARAM_STR);
            $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }

    public function creerReservationDoc(string $id, string $num, string $idAbo): bool {
        try {
            $sql = 'INSERT INTO reservationdoc (idDoc, numExemplaire, idAbo, dateReservation) VALUES (:idRevue, :numero, :idAbo, CURRENT_DATE)';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':idRevue', $id, PDO::PARAM_INT);
            $stmt->bindParam(':numero', $num, PDO::PARAM_STR);
            $stmt->bindParam(':idAbo', $idAbo, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return false;
        }
    }
}

?>