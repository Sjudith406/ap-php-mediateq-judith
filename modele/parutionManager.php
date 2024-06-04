<?php

class ParutionManager extends Manager
{
    /**
     * Renvoie un tableau contenant l'ensemble des objets Parution
     *
     * @return array
     */
    public function getList() : array
    {
        $revue = new revueManager(); // Création d'un objet manager de type de public
        $lesRevues = $revue->getList();

        $etat = new etatManager(); // Création d'un objet manager de type de public
        $lesEtats = $etat->getList();

        $q = $this->getPDO()->prepare('SELECT * FROM parution');
        $q->execute();
        $resultats = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $lesParutions = array();
        foreach ($resultats as $resultat)
        {
            if ($resultat['photo'] == null){
                $resultat['photo'] = "pas de photo"; }
            $lesParutions[] = new Parution($resultat['numero'], $lesRevues[$resultat['idRevue']], $resultat['dateParution'], $resultat['photo'], $lesEtats[$resultat['idEtat']]);
        }

        return $lesParutions;
    }

    public function estDispo(string $numero): string {
        try {
            // Vérifier si l'exemplaire est réservé
            $sql = 'SELECT * FROM reservationRevue WHERE numero = :numero';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->fetchColumn();
            if($count==0){
                return "1";
            }
            else{
                return "0";
            }
        } catch (PDOException $e) {
            // Gérer l'erreur ici (enregistrement des erreurs dans un fichier de journal, etc.)
            return "false";
        }
    }
}
?>