<?php
require_once("$racine/modele/histRecherche.php");

class HistRechercheManager extends Manager
{
    /**
     * Renvoie un tableau contenant l'ensemble des objets HistRecherche
     *
     * @return array
     */

    public function getList() : array
    {
        try
        {
            $q = $this->getPDO()->prepare('SELECT * FROM histrecherche');
            $q->execute();
            $historique = $q->fetchAll(PDO::FETCH_ASSOC);

            $historiques = array();
            foreach($historique as $histo)
            {
                $historiques[] = new HistRecherche($histo['titre'], $histo['typeDocument'], $histo['typeRecherche'], $histo['derniereRecherche'], $histo['nbResultats']);
            }
            return $historiques;
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function addRechInHist(string $texte, string $typeDoc, int $nbR)
    {
        try
        {
            $typeRech = "Recherche simple";
            $q = $this->getPDO()->prepare('INSERT INTO histrecherche (titre, typeDocument, typeRecherche, derniereRecherche, nbResultats) VALUES (:texte, :typeDoc, :typeRech, CURRENT_DATE, :nbR)');
            $q->bindParam(':texte', $texte, PDO::PARAM_STR);
            $q->bindParam(':typeDoc',  $typeDoc, PDO::PARAM_STR);
            $q->bindParam(':typeRech',  $typeRech, PDO::PARAM_STR);
            $q->bindParam(':nbR',  $nbR, PDO::PARAM_INT);
            $q->execute();
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function supprimerHistorique(): bool {
        try {
            $sql = 'DELETE * FROM histrecherche';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function supprimerHistoriqueByTitre(string $titreH): bool {
        try {
            $sql = 'DELETE FROM histrecherche WHERE titre = :titreH';
            $stmt = $this->getPDO()->prepare($sql);
            $stmt->bindParam(':titreH', $titreH, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}