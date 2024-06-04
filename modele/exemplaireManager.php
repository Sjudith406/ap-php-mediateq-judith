<?php

class ExemplaireManager extends Manager {

    /**
            * Retourne la liste des exemplaires sous forme d'un tableau d'objets exemplaire instanciés.
            *
            * @return array
            */
            public function getList() : array 
            {
               /* $abonneeManager = new AbonneeManager(); */
                $livreManager = new LivreManager();
                $rayonManager = new RayonManager();
                $etatManager = new EtatManager();
                $dvdManager = new DvdManager();
                $dvds = $dvdManager->getList();
                $livres = $livreManager->getList(); 
                $rayons = $rayonManager->getList(); 
                $etats = $etatManager->getList(); 
                $exemplaires = [];
                $req = $this->getPDO()->prepare("SELECT * FROM exemplaire");
                $req->execute();
                $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
                foreach ($donnees as $exemplaire)
                {
                    if($exemplaire['idDocument'] <= 25){
                        $livre = $livres[$exemplaire['idDocument']];
                        $etat = $etats[$exemplaire['idEtat']];
                        $rayon = $rayons[$exemplaire['idRayon']];
                        $exemplaires[$exemplaire['idDocument']-$exemplaire['numero']] = new Exemplaire($livre, $exemplaire['numero'], $exemplaire['dateAchat'], $rayon, $etat);
                    }
                    else{
                        $dvd = $dvds[$exemplaire['idDocument']];
                        $etat = $etats[$exemplaire['idEtat']];
                        $rayon = $rayons[$exemplaire['idRayon']];
                        $exemplaires[$exemplaire['idDocument']-$exemplaire['numero']] = new Exemplaire($dvd, $exemplaire['numero'], $exemplaire['dateAchat'], $rayon, $etat);
                    }
                }
                
                return $exemplaires;
            }

            public function getById(int $numDoc, int $numExemplaire) : Exemplaire
            {
                $livreManager = new LivreManager(); // TODO emplacer par DocumenbtManager
                $rayonManager = new RayonManager();
                $etatManager = new EtatManager();
                $livre = $livreManager->getLivreById($numDoc); 
                $rayons = $rayonManager->getList(); 
                $etats = $etatManager->getList(); 
                $req = $this->getPDO()->prepare("SELECT * FROM exemplaire WHERE idDocument =:idD AND numero =:numE");
                $req->bindParam(':idD', $numDoc , PDO::PARAM_INT);
                $req->bindParam(':numE',  $numExemplaire, PDO::PARAM_INT);
                $req->execute();
                $donnees = $req->fetch(PDO::FETCH_ASSOC);

                $etat = $etats[$donnees['idEtat']];
                $rayon = $rayons[$donnees['idRayon']];
                
                $exp = new Exemplaire($livre, $donnees['numero'], $donnees['dateAchat'], $rayon, $etat);
                return $exp;
            }

            public function estDispo(int $id, int $numero): string {
                try {
                    // Vérifier si l'exemplaire est réservé
                    $sql = 'SELECT * FROM reservationDoc WHERE numExemplaire = :numero and idDoc = :id';
                    $stmt = $this->getPDO()->prepare($sql);
                    $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
                    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
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