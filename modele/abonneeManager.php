<?php

class AbonneeManager extends Manager
{
    public function get(string $loginA)  : Abonnee 
    {
        $loginA = (string) $loginA;
        $q = $this->getPDO()->prepare('SELECT * FROM abonnee WHERE loginA = :loginA');
        $q->bindValue(':loginA', $loginA, PDO::PARAM_STR);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        return new Abonnee( $donnees['loginA'], $donnees['nomA'], $donnees['prenomA'], $donnees['mdpA'], $donnees['adresseA'], $donnees['numTel'], $donnees['typeA'], $donnees['mailA']);
    }
 
    
    /**
    * Retourne la liste des exemplaires sous forme d'un tableau d'objets exemplaire instanciés.
    *
    * @return array
    */
            public function getList() : array 
            {
               
                $abonnees = [];
                $req = $this->getPDO()->prepare("SELECT * FROM abonnee");
                $req->execute();
                while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
                {
                    $abonnees[$donnees['loginA']] = new Abonnee($donnees['loginA'], $donnees['nomA'], $donnees['prenomA'], $donnees['mdpA'], $donnees['adresseA'], $donnees['numTel'], $donnees['typeA'], $donnees['mailA']);
                }
                
                return $abonnees;
            }

    public function modifMdp(string $mdpA, string $loginA) : void
    {
        $q = $this->getPDO()->prepare('UPDATE abonnee SET mdpA = :mdpA WHERE loginA = :loginA');
        $q->bindValue(':mdpA',  $mdpA, PDO::PARAM_STR);
        $q->bindValue(':loginA', $loginA, PDO::PARAM_STR);
        $q->execute();
    }

    public function modifDossier(string $loginA, string $nomA, string $prenomA, string $adresseA, string $num, string $mailA) : void
    {
        $q = $this->getPDO()->prepare('UPDATE abonnee SET loginA = :loginA, nomA = :nomA, prenomA = :prenomA, adresseA = :adresseA, 
        numTel = :num, mailA = :mailA WHERE loginA = :loginA');
        $q->bindValue(':loginA', $loginA, PDO::PARAM_STR);
        $q->bindValue(':nomA',  $nomA, PDO::PARAM_STR);
        $q->bindValue(':prenomA',  $prenomA, PDO::PARAM_STR);
        $q->bindValue(':adresseA',  $adresseA, PDO::PARAM_STR);
        $q->bindValue(':num',  $num, PDO::PARAM_STR);
        $q->bindValue(':mailA',  $mailA, PDO::PARAM_STR);
        $q->execute();
    }
}

    
?>